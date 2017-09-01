  

    $("#locations-category").on('change',function(){ 

        var suburbsOrTownships = $('#locations-category').val();
        suburbsOrTownships = $('#locations-category').val();
        $('.popular-locations').empty();
        $('.popular-locations').append('<strong>'+suburbsOrTownships+'</strong>');

            var screenZise = $(window).width();

            
            if(suburbsOrTownships == "Suburbs"){


                  
                    if(screenZise > 500){
                        $('.townships-desktop').hide();
                        $('.suburbs-desktop').show();
                    }else{
                        $('.townships-mobile').hide();
                        $('.suburbs-mobile').show();
                    }

            }
            
            if(suburbsOrTownships == "Townships"){
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

    $(".suburb-or-township").on('change',function(){ 

            var suburbsOrTownships = $('.suburb-or-township').val();
            $('.popular-locations').empty();
            $('.popular-locations').append('<strong>'+suburbsOrTownships+'</strong>');

            var screenZise = $(window).width();

            
            if(suburbsOrTownships == "Suburbs"){


                  
                    if(screenZise > 500){
                        $('.townships-desktop').hide();
                        $('.suburbs-desktop').show();
                    }else{
                        $('.townships-mobile').hide();
                        $('.suburbs-mobile').show();
                    }

            }
            
            if(suburbsOrTownships == "Townships"){
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
   
   
    $( ".col-sm-3" ).delegate( ".simpleselect", "click", function() {
        
        $('.options').css("overflow-y", "hidden");
        $('.options').addClass("scrollbar-inner");
        $('.options').addClass("col-sm-3");
        $('.options').css("css", "1000");

        $('.options').css("padding-right", "0px");
  
  
    $('.options').attr("id", "options");

           var container = document.getElementById('options');
        Ps.initialize(container, {
          wheelSpeed: 2,
          wheelPropagation: true,
          minScrollbarLength: 20,
          suppressScrollX:true
    });
    

     $('#simpleselect_id-location .options').attr("id", "options2"); 
        $('.province-select-container .options').css('height','80px');   

            var container = document.getElementById('options2');
            Ps.initialize(container, {
              wheelSpeed: 2,
              wheelPropagation: true,
              minScrollbarLength: 20,
              suppressScrollX:true
            });  


        
     });

      //select your region modal
     $( ".col-sm-6" ).delegate( ".simpleselect", "click", function() {
        
        $('#simpleselect_location-cat .options').attr("id", "options3");     

        $('.province-select-container .options').css('height','80px');
    
        var container = document.getElementById('options3');
        Ps.initialize(container, {
          wheelSpeed: 2,
          wheelPropagation: true,
          minScrollbarLength: 20,
          suppressScrollX:true
        });
     });

    //select your region modal
     $( ".col-sm-6" ).delegate( ".simpleselect", "click", function() {
       
        $('#simpleselect_locations-category .options').attr("id", "options2");     

        $('.province-select-container .options').css('height','80px');
    
        var container = document.getElementById('options2');
        Ps.initialize(container, {
          wheelSpeed: 2,
          wheelPropagation: true,
          minScrollbarLength: 20,
          suppressScrollX:true
        });
     });

      $('.regular-ads-tab').click(function(){
            $('.regular-ads-pagination').show();
            $('.sponsored-ads-pagination').hide();
            $('.bargains-pagination').hide();
      })


      $('.bargains-tab').click(function(){
            $('.regular-ads-pagination').hide();
            $('.sponsored-ads-pagination').hide();
            $('.bargains-pagination').show();
      })


      $('.sponsored-ads-tab').click(function(){
            $('.regular-ads-pagination').hide();
            $('.sponsored-ads-pagination').show();
            $('.bargains-pagination').hide();
      })

    $(document).ready(function(){
         styleCategoriesSelectBox();
        $(".sponsored-ads-gallery").show();
        var screenZise = $(window).width();
        if(screenZise < 500){    
            $('.townships-desktop').hide();                 
            $('.suburbs-desktop').hide();

            $('.owl-item').css("width","120px");                       
        }
        else{
            $('.townships-mobile').hide();                 
            $('.suburbs-mobile').hide();  
        }
    });

    $('.ads-tab').click(function(){
        var href = $(this).attr('href');
        $('.adds-wrapper').load(href);
    });


    $('.sponsored-ads-navigation').click(function(){
        $('.tab3').removeClass('active');
        $('.tab3').removeClass('active');
        $('.tab3').addClass('active');
    });

    $(".second-modal #location-link a" ).click(function() {
           
           $('.modal-content').hide();
           $('.modal-backdrop').hide();
    });

    $(".first-modal #location-link a" ).click(function() {
          var location = $(this).text();
          $('.locinput').val(location);
           
            $('.modal-backdrop').hide();
            $('.modal').hide();
    });     

    

   //save ad
   $('.make-favorite').click(function(){

        var ad_id = $(this).attr('id');

        path = "{{ url('savead') }}"+"/"+ad_id;
         $.ajax({
            url: path,
            type: 'GET',
            data: {province:province},
            success:function(data){                   
                //alert(data);
               
           }
        });

   });

  //when the user clicks 'All Categories'
  $('.sub-categories-list2 h5').click(function(){
      //display all categories
      $('.sub-categories-list2').hide();
       $('.categories-list').show();

  }); 
