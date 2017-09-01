var path = "{{ route('autoComplete') }}";

    var path2 = "{{ route('autoCompleteTownship') }}";
    
   
    // $('.surbub').focus(function(){
    //   $.ajax({
    //         url: path,
    //         type: 'GET',
    //         data: {township:township},
    //         success:function(data){
                  
   
    //         }
    //     });
        
    // });


    // $("#selectRegion select").simpleselect();
    // $(".category-content select").simpleselect();

      //select your region modal
     $( ".col-sm-6" ).delegate( ".simpleselect", "click", function() {
        // alert('hi');
        $('#simpleselect_locations-category  .options').attr("id", "options2");     

        $('#simpleselect_locations-category  .options').css('height','80px');
    
        var container = document.getElementById('options2');
        Ps.initialize(container, {
          wheelSpeed: 2,
          wheelPropagation: true,
          minScrollbarLength: 20,
          suppressScrollX:true
        });
     });

    $( ".col-md-8" ).delegate( ".simpleselect", "click", function(){
      //   alert('hi');
       $('#simpleselect_category-group .options').css('height','428px').css('position','absolute').css('top','40px');
       // $('#simpleselect_category-group .options').attr("id", "options3");    
     });




  $("#locations-category").on('change',function(){ 


            suburbOrProvince = $('#locations-category').val();

            $('#popular-cities').empty();
            $('#popular-cities').append('Popular <strong>'+suburbOrProvince+'</strong> in Western Cape.');

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
   

    // $('#All-plans').click(function(){
       
    //     if ( $('#All-plans').is(':checked') ) {

    //         var category = $('.category-group').val();
    //         category = category.split("#",1);
            
    //         $('#amount-payable').empty();
    //         $('#amount-payable').append("<strong>Payable Amount : R95.00</strong>");

    //         if(category == "Jobs"){
    //             amountPayable = "255.00";
    //             $('#amount-payable').empty();
    //             $('#amount-payable').append("<strong>Payable Amount : R"+amountPayable+"</strong>");
    //         }

    //         $('#agent-ad').attr('checked', false); // Unchecks it
    //         $('#sponsored-ads-gallery').attr('checked', false); // Unchecks it
    //         $('#bagain').attr('checked', false); // Unchecks it
    //     } 
    //     else{
    //         $('#amount-payable').empty();
    //        // alert($('#amount-payable').text());
    //          amountPayable = "00";
    //          var category = $('.category-group').val();
    //          category = category.split("#",1);
    //        // $('.job-post').empty();
    //         if(category == "Jobs"){
    //            amountPayable = 160; 
    //         }
    //         $('#amount-payable').append("<strong>Payable Amount : R"+amountPayable+".00</strong>");
    //     }
    // });

    

    var sponsoredAdFee = 0;
    var bargainAdFee = 0;
    var payableAmount = 0;
    $('.category-group').on('change',function(){
        $('#option-gallery').attr('checked', false); // Unchecks it
        $('#option-bargain').attr('checked', false); // Unchecks it
        $('#amount-payable').empty();          
        $('#amount-payable').append("<strong>Payable Amount : R"+payableAmount+".00</strong>");
        getMainCategory();
    });
    getMainCategory();
    function getMainCategory(){
        var Maincategory = $('.category-group').val();
        mainCategory = Maincategory.split("#",1);
        if(mainCategory == "Vehicles" || mainCategory == "vehicles" || mainCategory == "Property" || mainCategory == "property"
        || mainCategory == "Services" || mainCategory == "services" || mainCategory == "Jobs" || mainCategory == "jobs" ){
           
           sponsoredAdFee = 130;
           bargainAdFee = 45;


        }else{
            sponsoredAdFee = 95;
            bargainAdFee = 34;
        }
        $('#option-gallery-price').empty();          
        $('#option-gallery-price').append("<strong>R"+sponsoredAdFee+".00</strong>");
        $('#option-gallery').removeAttr('value');
        $('#option-bargain').removeAttr('value'); 

        $('#option-bargain-price').empty();          
        $('#option-bargain-price').append("<strong>R"+bargainAdFee+".00</strong>");


        if(mainCategory == "Jobs"){
            $('#lbl-price').empty();
            $('#lbl-price').append('Salary');
            $('#Price').removeAttr("placeholder");
            $('#Price').attr("placeholder","salary");
        }else{
            $('#lbl-price').empty();
            $('#lbl-price').append('Price');
            $('#Price').removeAttr("placeholder");
            $('#Price').attr("placeholder","price");
        }
    }

    $('#option-gallery').click(function(){
         alert(bargainAdFee);
        payableAmount = sponsoredAdFee;
        if($(this).is(':checked') ) {

            if($('#option-bargain').is(':checked')){
               payableAmount = sponsoredAdFee+bargainAdFee;
            }

            $('#amount-payable').empty(); 
            $(this).attr('value',sponsoredAdFee);      
            $('#amount-payable').append("<strong>Payable Amount : R"+payableAmount+".00</strong>"); 
        }
        else{
            $('#option-gallery').removeAttr('value'); 
            if($('#option-bargain').is(':checked')){
               payableAmount = bargainAdFee;
            }else{
               payableAmount   = 00;              
            }
            $('#amount-payable').empty();          
            $('#amount-payable').append("<strong>Payable Amount : R"+payableAmount+".00</strong>");
        }

    });
    
    

     $('#option-bargain').click(function(){
          payableAmount = bargainAdFee;
          alert(bargainAdFee);
          if($(this).is(':checked') ){

            if($('#option-gallery').is(':checked')){
               payableAmount = sponsoredAdFee+bargainAdFee;
            }
           // $('#option-gallery').attr('checked', false); // Unchecks it
            $('#sponsored-ads-gallery').attr('checked', false); // Unchecks it

            $(this).attr('value',bargainAdFee);
           
            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R"+bargainAdFee+".00</strong>");
        }else{
            $('#option-bargain').removeAttr('value'); 

            if($('#option-gallery').is(':checked')){
               payableAmount = sponsoredAdFee;
            }else{
               payableAmount   = 00;
            }
            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R"+payableAmount+".00</strong>");
        }
    });           
        
       