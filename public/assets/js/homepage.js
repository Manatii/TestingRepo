$(document).ready(function(){
    $('.row-featured').show();

      $(".sponsored-ads-gallery").show();
      var screenZise = $(window).width();
      if(screenZise < 500){    
          
          $('.townships-desktop').hide();                 
          $('.suburbs-desktop').hide();
          $('.owl-item').css("width","120px");
                     
      }else{
          $('.townships-mobile').hide();                 
          $('.suburbs-mobile').hide();
          $('.owl-item').css("width","120px");
      }
});
//==================================================
    //scroll on hover effect, but only on big screens
    if($(window).width()  > 767){
        $('.page-content .inner-box').css('overflow','auto');
        
        $('.page-content .inner-box').hover(function(){
             $(this).css('overflow','auto');

        });

         $('.container').hover(function(){
             $('.page-content .inner-box').css('overflow','hidden');

        });

    }

    if($(window).width()  < 767){
        $('.page-content .inner-box').css('overflow','auto');
    }




    $('.container').hover(function(){

     $('.sponsored-ads-container').css('z-index','');
     $('.autocomplete-suggestion').hide();
    });

    $('#province').on('change',function(){
        var location = $(this).val();
        if(location == 'Western Cape,suburbs'){
            // displaySuburbs(location);
        }else{
            
           // displayTownships(location);
        }
       

    });     

   

    function selectCountry(val) {
    $("#autocomplete-ajax").val(val);
    $(".autocomplete-suggestions").hide();


}
  




    $(document).ready(function(){

        // var loc = $('#suburb-or-township').val();        
        // $("select option[value='"+province+"']").attr("selected","selected");
      //  $(".location-link ul").empty(); 

       // displayTownships(province);  
    }) 

    $( ".modal-dialog .location-li" ).delegate( "a", "click", function() {

  
        $('.modal-backdrop').hide();
        $('.modal').hide();
        var location = $(this).text();
        if(location == "All Locations" || location == "All Locations"){

            var suburbsOrTownships = $('#suburb-or-township').val();
          
            if(suburbsOrTownships == "Western Cape,suburbs"){
                
               location = location+",suburbs";
            }
            else{
               location = location+",townships";
            }
        }
        $('.searchtag-input').val(location);

    });



   
    $("#locations-category").on('change',function(){ 

          suburbOrProvince = $('#locations-category').val();
          $('#popular-locations').empty();
          $('#popular-locations').append('<strong>'+suburbOrProvince+'</strong>');

          var screenZise = $(window).width();

          
          if(suburbOrProvince == "Suburbs"){                
              if(screenZise > 500){
                  $('.townships-desktop').hide();
                  $('.suburbs-desktop').show();
              }else{
                  $('.townships-mobile').hide();
                  $('.suburbs-mobile').show();
              }
          }

          if(suburbOrProvince == "Townships"){
               if(screenZise > 500){
                  //alert('yes');
                      $('.suburbs-desktop').hide();
                      $('.townships-desktop').show();
                  }else{  
                     
                     $('.suburbs-mobile').hide();
                     $('.townships-mobile').show();
                  }
          }

    });