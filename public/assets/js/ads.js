 $(".search-row-wrapper select").simpleselect();
    $(".province-select-container select").simpleselect();
   
   
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
        $('#simpleselect_suburb-or-township .options').attr("id", "options3"); 

        $('#options3').css('height', '120px');
                var container = document.getElementById('options3');
        Ps.initialize(container, {
          wheelSpeed: 2,
          wheelPropagation: true,
          minScrollbarLength: 20,
          suppressScrollX:true
        });
     });

 


 
     
      var province = "";
      var loc = "";


        function generateSlug(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
           
            replace(/^-|-$/g, '');

            return $slug.toLowerCase();
        }

        $('#btn-search').click(function(){
            var province =   $('.province-container .placeholder').html();
            sessionStorage.setItem('storedProvince',  province);

            var category = $('#search-category').val();
            sessionStorage.setItem('storedCategory', category);


            var keyword = $('.keyword').val();
            sessionStorage.setItem('storedKeyword', keyword);

            // On the pages that have the select box

            var loadedCategory = sessionStorage.getItem('storedCategory');

        })

        $('.locations-list ul li a').click(function(){
            var township = $(this).find('.title').text();
            //used to display ads by township 
            sessionStorage.setItem('storedTownship', township);


            sessionStorage.removeItem('storedCategory');
            sessionStorage.removeItem('storedKeyword');
        })

        $(document).ready(function(){
          
        var current_category = "";
        styleProvinceSelectBox();
        //province container
        var province =   $('.province-container .placeholder').html();

        $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');
        $("select option[value='"+province+"']").attr("selected","selected");
        $("#location-link ul").empty();

        var loadedProvince = sessionStorage.getItem('storedProvince');       
        province = $('#id-location').val();              
        $("select option[value='"+loadedProvince+"']").attr("selected","selected");
        
        var province =  $('.province-container .placeholder').html(province);



        var category = $('#search-category').val();            
        var loadedCategory = sessionStorage.getItem('storedCategory');
        var loadedMainCategory = sessionStorage.getItem('storedMainCategory');

        $('.keyword').val(sessionStorage.getItem('storedKeyword'));
        
        //update category select box
        if(loadedCategory){
            $('.categories-container .placeholder').html(loadedCategory);

        }
        else if(loadedMainCategory){
            $('.categories-container .placeholder').html(loadedMainCategory);
        }
        else{
            $('.categories-container .placeholder').html('Cars');
        }


        //this loadedProvince is stored on a section when a user clicks the search button
        if(loadedProvince){
            //display 'Popular cities in Western Cape/Popular cities in Gauteng etc.'
            $('#popular-cities').empty();
            $('#popular-cities').append('Popular townships in <strong>'+loadedProvince+'</strong>');  
            $("#location-link ul").empty();

            displaySuburbs(loadedProvince); 

            $('#simpleselect_suburb-or-township .placeholder').html(loadedProvince);

            $('.province-container .placeholder').html(loadedProvince);
        }   
        
        $("select option[value='"+loadedCategory+"']").attr("selected","selected");


        province = $('#id-location').val();
        $("select option[value='"+ province+"']").attr("selected","selected");      
            

        

    });

    //clears the following sessions when the user clicks the logo, going to the home page
    //give an error when a user returns back to the ads page
    $('.navbar-header').click(function(){
           //  sessionStorage.removeItem('storedCategory');
           //  sessionStorage.removeItem('storedProvince');
            // sessionStorage.removeItem('storedKeyword');
    })       
        
        
    $('#suburb-or-township').on('change',function(){           

            suburbOrProvince = $('#suburb-or-township').val();
         //   alert(suburbOrProvince);

            $(".location-li").remove(); 

            $('#loading-provinces').show();

            $('.province-container .placeholder').html(suburbOrProvince);

            //udpates selected value of the province
            $("select option[value='"+suburbOrProvince+"']").attr("selected","selected");

            $('#popular-cities').empty();
            $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');

            if(suburbOrProvince === "Western Cape,townships"){    
           //  alert(suburbOrProvince);           
                displayTownships(suburbOrProvince);
            }else if(suburbOrProvince === "Western Cape,suburbs"){
               
               displaySuburbs(suburbOrProvince);
            }else{
                //display suburbs if the user select "Western Cape, All"
                //displaySuburbs("Western Cape,suburbs");
            }       



    });

     function displaySuburbs(province){
       // alert("hahahaha");
          console.log("SDFSD")
            path = "../get-suburbs-by-prov"+"/"+province;
           
            $.ajax({
                url: path,
                type: 'GET',
                //data: {province:province},
                success:function(data){
                     $('#loading-provinces').hide();
                    var data = jQuery.parseJSON(data);
                    var i = 0;
                    var screenZise = $(window).width();
                     ;
                  //  alert(screenZise);
                    $.each(data, function(key, item) 
                    {
                    

                        if(screenZise > 500){
                            if(i<=11){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            
                            }else if(i>11 && i<=23){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);                           

                            }else if(i>26){
                             $("#location-link .column3 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            }
                        }else{
                             if(i<=18){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            
                            }else if(i>18){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);                           

                            }
                        }
                        i++;
                                           
                    });                    
               }
            });
        }

   function displayTownships(province){


      // $("#location-link li").empty();
        path = "{{ url('locations') }}"+"/"+province;
        $.ajax({
            url: path,
            type: 'GET',           
            success:function(data){
               
                 $('#loading-provinces').hide();
                 var i = 0;
                  var screenZise = $(window).width();

                var data = jQuery.parseJSON(data);
                $.each(data, function(key, item) 
                {

                  if(screenZise > 500){
                            if(i<=11){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            
                            }else if(i>11 && i<=23){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);                           

                            }else if(i>23){
                             $("#location-link .column3 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                          //  console.log(item.surbub+"-"+i);
                            }
                        }else{
                             if(i<=18){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                           // console.log(item.surbub+"-"+i);
                            
                            }else if(i>18){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                           // console.log(item.surbub+"-"+i);                           

                            }
                        }
                        i++; 
                });               
           }
        });
    }

    function styleProvinceSelectBox(){
        path = "{{ url('main-categories') }}";
        $.ajax({
            url: path,
            type: 'GET',
            data: "",
            success:function(data){
                var data = jQuery.parseJSON(data);
                $.each(data, function(key, item) 
                {   
                    $(".categories-container .options").children().each(function (){
                        current_category =  $(this).html();
                        current_category = $.trim(current_category.replace(/-/g,''));

                        if(current_category == item.category){
                              $(this).css('color', '#cccccc').css('background-color','#ffffff').css(
                                'cursor','default').css('pointerEvents', 'none');
                        }
                    });
                });      
            }    
        });
    }

    function displayAdsByLocation(township){


       // alert(township);
        township = encodeURIComponent(township).replace(/%20/g,'-').toLowerCase(); 
        var route = "{{ url('ads/location/') }}"+"/"+township;
        $('location-link').val()
        $('.modal-content').hide();
        
        window.location.href = route;  
        $('.cityName').append(location);
    }

    function displayAdsByItemLocationAndCategory(){
        var province = $('.province-container .placeholder').html();
        //used to update province combobox
        sessionStorage.setItem('storedProvince',  province);

        var searchItem = generateSlug($(".keyword").val());

        province = generateSlug(province);

        var catagory = $('.categories-container .placeholder').html();
   
        catagory = encodeURIComponent(catagory).replace(/%20/g,'-').toLowerCase(); 

        //removes spaces
        $.trim(catagory);   
    
        var route = "{{ url('search-item-loc-cat-prov') }}"+"/"+searchItem+"/"+loc+"/"+catagory+"/"+province;

        $('location-link').val()
        $('.modal-content').hide();
        
        window.location.href = route;  
        $('.cityName').append(location);
    }

    function displayAdsByItemLocationAndMainCategory(){
         var province = $('.province-container .placeholder').html();
        //used to update province combobox
        sessionStorage.setItem('storedProvince',  province);

        var searchItem = generateSlug($(".keyword").val());

        province = generateSlug(province);



        var main_catagory = $('.categories-container .placeholder').html();
   
        main_catagory = encodeURIComponent(main_catagory).replace(/%20/g,'-').toLowerCase();    
    
        var route = "{{ url('search-item-loc-main-cat-prov') }}"+"/"+searchItem+"/"+loc+"/"+main_catagory+"/"+province;

        $('location-link').val()
        $('.modal-content').hide();
        
        window.location.href = route;  
        $('.cityName').append(location);
    }

    $( "#location-link" ).delegate( "a", "click", function() {
            loc = $(this).attr('title');
            loc = encodeURIComponent(loc).replace(/%20/g,'-').toLowerCase();
    });     

    //sends a request to categories/main categories route and display result (results)
    $('#location-link').delegate( "li a", "click", function(){
        //will be null if no category is stored in session storage
        var loadedCategory = sessionStorage.getItem('storedCategory');
        var loadedMainCategory = sessionStorage.getItem('storedMainCategory');
        var township =  $(this).text();

        //loaded category is not null
        if(loadedCategory){
           displayAdsByItemLocationAndCategory();
        }
        //if main category is not null
        else if(loadedMainCategory){
           displayAdsByItemLocationAndMainCategory();      
        } 

        else{
            displayAdsByLocation(township);
        }       
       
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
                
               
           }
        });

   });

        //when the user clicks main_category
        $('.categories-list li').click(function(){
            
            //grab main category
            var title = $(this).attr('title');

            $('.categories-list').hide();
            $('.sub-categories-list2').show(); 
            $('.sub-categories-list2 .sub-categories-list').empty();
            $('.sub-categories-list2 .title').empty();

            //used to send a request to the main-category route
            var main_category_route = "{{ url('/ads/main-category/') }}";

            var url_title = encodeURIComponent(title.replace('&','and')).replace(/%20/g,'-').toLowerCase();

            //update title...just above sub-categories
            //send a request to main-category route
            $('.sub-categories-list2 .title').append("<strong><a href='"+main_category_route+"/"+url_title+"'>"+title+"</a></strong>");

            var id =   $(this).attr('id');
            //used to send request to sub-categories route
            path = "{{ url('sub-categories') }}"+"/"+id;
            var route = "{{ url('/ads/catagory') }}";
           
            //send request to sub-categories route...display the results (sub-categories)
            $.ajax({
                url: path,
                type: 'GET',
                success:function(data){

                    var data = jQuery.parseJSON(data);
                    $.each(data, function(key, item) 
                    {
                        var sub_cat = encodeURIComponent(item.subcategory_name.replace('&','and')).replace(/%20/g,'-').toLowerCase();
                        
                        console.log(sub_cat);

                        var province = encodeURIComponent($('.province-container .placeholder').html());
                        province = province.replace(/%20/g,'-').toLowerCase();
                      
                        $('.sub-categories-list2 .sub-categories-list').append('<li><a href='+route+"/"+sub_cat+"/"+province+'>'+item.subcategory_name+'</a><span class="count">('+item.nu_ads+')</span></li>');                       
                           $('#loading-categories').hide();
                    });
               }
            });
        });

        //when the user clicks 'All Categories'
        $('.sub-categories-list2 h5').click(function(){
            //display all categories
            $('.sub-categories-list2').hide();
             $('.categories-list').show();

        }); 

        //when a user clicks a sub-category
        $('.sub-categories-list').delegate( "li a", "click", function(){

            var category = $(this).text();          
            //store these keys in session storage which are used to update search category
            //select boxes
            sessionStorage.setItem('storedKeyword', category);
            sessionStorage.setItem('storedCategory', category);
            sessionStorage.setItem('storedProvince', 'Western Cape,All');
            $("select option[value='Western Cape,All']").attr("selected","selected");
            sessionStorage.removeItem('storedMainCategory');


        }) 

        //when a user clicks the title, or main category which is just above 
        //the sub-categories
        $('.sub-categories-list2').delegate( "li .title", "click", function(){
               
            var category = $(this).text();
                       
            sessionStorage.setItem('storedKeyword', category);            
            sessionStorage.setItem('storedMainCategory', category);
            sessionStorage.setItem('storedProvince', 'Western Cape,All');
            $("select option[value='Western Cape,All']").attr("selected","selected");

            //my if statement at line ... woudn't work without this statement
            //somewhere I above I check 'does the storedCategory exists ? if it exists I displayAds according to
            //the storedCategory, else I display Ads by main category'
            sessionStorage.removeItem('storedCategory');

        }) 