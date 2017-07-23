    
    $('#find').click(function(){

        var searchItem = $('#searchItem').val();
        var provinceSuburbOrTownship = $('.searchtag-input').val();
        //alert(provinceSuburbOrTownship);
        //could've named it storedkeyword, but I named it something 
        //different coz I don't want it to be displayed on the search
        //box when the user lands on the category page
        sessionStorage.setItem('searchItem', searchItem);
        sessionStorage.setItem('provinceSuburbOrTownship', provinceSuburbOrTownship);
        
        sessionStorage.removeItem('storedMainCategory');
        sessionStorage.removeItem('storedKeyword');
        //sessionStorage.removeItem('storedProvince');

        sessionStorage.removeItem('storedCategory');
    });

    var path = "";
    $('.f-category').click(function(){

        var category = $(this).find('h6').html(); 
        
        //fix a bug that I came across becuase of that space that exists at the beggining of the
        //category
        category = $.trim(category);   
        sessionStorage.setItem('storedKeyword',category);
        sessionStorage.setItem('storedMainCategory',category);
        sessionStorage.setItem('storedProvince', 'Western Cape,All');

        sessionStorage.removeItem('storedCategory');
        sessionStorage.removeItem('searchItem');
    })
   
    $('.category-content').delegate('.main-cat', "click", function(){
            
        var category = $(this).html();
        category  = category = $.trim(category);

        sessionStorage.setItem('storedKeyword', category);
        sessionStorage.setItem('storedMainCategory', category);
        sessionStorage.setItem('storedProvince', 'Western Cape,All');

        sessionStorage.removeItem('storedCategory');
        sessionStorage.removeItem('searchItem');
    })

    $('.category-content').delegate( ".cat-collapse a", "click", function(){
            var category = $(this).html();

            alert('dsfsd');

            category  = category = $.trim(category);     
            sessionStorage.setItem('storedKeyword',category);
            sessionStorage.setItem('storedCategory',category);
            sessionStorage.setItem('storedProvince','Western Cape,All');
            sessionStorage.removeItem('storedMainCategory');
            sessionStorage.removeItem('searchItem');
    })


    function  countAdsPerCategory(category, category_id){
       var adsperCat = "";
        path = "jquery-ads-per-category"+"/"+category;
        $.ajax({
            url: path,
            type: 'GET',
           
            success:function(data){
                 
             //alert(data);
              adsperCat =  data;
              $('.'+category_id+' .count').append(adsperCat);
          }

        })      
       
    }


  $(document).ready(function(){       
        
        // display categories
       path = "get-all-categories";
        $.ajax({
            url: path,
            type: 'GET',
           
            success:function(data){
                var data = jQuery.parseJSON(data);  

                var i = 0;

                var screenZise = $(window).width();
                $.each(data, function(key, item) 
                { 
                       i++;

                    var category = item.category.toLowerCase()
                    //displays main categories on big screens in 3 columns
                    if(screenZise > 992){   
                     $('#loading-provinces').show();                    

                        if(i < 5){
                            
                            $('.category-content .column1').append('<div class="cat-list '+item.cat_id+'" style="height:auto;">'
                            +'  <h3 class="cat-title">  <a href="/ads/main-category/'+category+'">'+
                            '<i class="fa '+item.class+' ln-shadow"></i><span class = "main-cat" id ="'+item.category+'">'+item.category+'</span> <span class="count"></span></a>'+
                            '<span data-target= ".cat-id-'+i+'" data-toggle="collapse"class="btn-cat-collapsed collapsed"><span class="icon-down-open-big"></span> </span></h3>'+
                            '<div  class="loading-categories" style="margin-top:13px;"><img src="images/loading.gif"></div>');
                        }
                        else if(i >=5 && i <9){

                            $('.category-content .column2').append('<div class="cat-list '+item.cat_id+'" style="height:auto;">'
                            +'  <h3 class="cat-title">  <a href="/ads/main-category/'+category+'">'+
                            '<i class="fa '+item.class+' ln-shadow"></i><span class = "main-cat" id ="'+item.category+'">'+item.category+'</span> <span class="count"></span></a>'+
                            '<span data-target= ".cat-id-'+ i+'" data-toggle="collapse"class="btn-cat-collapsed collapsed"><span class="icon-down-open-big"></span> </span></h3>'+
                            '<div  class="loading-categories" style="margin-top:13px;"><img src="images/loading.gif"></div>');
                        }
                        else{

                            $('.category-content .column3').append('<div class="cat-list '+item.cat_id+'" style="height:auto;">'
                            +'  <h3 class="cat-title">  <a href="/ads/main-category/'+category+'">'+
                            '<i class="fa '+item.class+' ln-shadow"></i><span class = "main-cat" id ="'+item.category+'">'+item.category+'</span> <span class="count"></span></a>'+
                            '<span data-target= ".cat-id-'+i+'" data-toggle="collapse"class="btn-cat-collapsed collapsed"><span class="icon-down-open-big"></span> </span></h3>'+
                            '<div  class="loading-categories" style="margin-top:13px;"><img src="images/loading.gif"></div>');
                        }
                }
                //displays Main Categories on Tablets
                //two columns
                else if(screenZise < 992){
                    if(i <=6){
                        
                        $('.category-content .column1').append('<div class="cat-list '+item.cat_id+'" style="height:auto;">'
                            +'  <h3 class="cat-title">  <a href="/ads/main-category/'+category+'">'+
                            '<i class="fa '+item.class+' ln-shadow"></i><span class = "main-cat" id ="'+item.category+'">'+item.category+'</span> <span class="count"></span></a>'+
                            '<span data-target= ".cat-id-'+i+'" data-toggle="collapse"class="btn-cat-collapsed collapsed"><span class="icon-down-open-big"></span> </span></h3>'+
                            '<div  class="loading-categories" style="margin-top:13px;"><img src="images/loading.gif" style="margin-left:120px;"></div>');
                     }
                     else if(i >6 && i <=12){
                        
                        $('.category-content .column2').append('<div class="cat-list '+item.cat_id+'" style="height:auto;">'
                            +'  <h3 class="cat-title">  <a href="/ads/main-category/'+category+'">'+
                            '<i class="fa '+item.class+' ln-shadow"></i><span class = "main-cat" id ="'+item.category+'">'+item.category+'</span> <span class="count"></span></a>'+
                            '<span data-target= ".cat-id-'+i+'" data-toggle="collapse"class="btn-cat-collapsed collapsed"><span class="icon-down-open-big"></span> </span></h3>'+
                            '<div  class="loading-categories" style="margin-top:13px;"><img src="images/loading.gif"></div>');
                     }                 
                }
                    
                countAdsPerCategory(item.category,item.cat_id);             
            })

            //ads ul beneath cat-list div, this ul is used to display sub-categories
            $('.column1 .cat-list').append('<ul class="cat-collapse long-province-list" style="margin-bottom:6px">');
                       //alert('fdfdfd');

            $('.column1').append('</ul>')
            $('.column1').append('</div>');

            $('.column2 .cat-list').append('<ul class="cat-collapse long-province-list" style="margin-top:6px;margin-bottom:6px">');
                       //alert('fdfdfd');

            $('.column2').append('</ul>')
            $('.column2').append('</div>');

            $('.column3 .cat-list').append('<ul class="cat-collapse long-province-list" style="margin-top:6px;margin-bottom:6px">');
                       //alert('fdfdfd');

            $('.column3').append('</ul>')
            $('.column3').append('</div>');


            //displays subcategories inside the ubove-added ul            
            path = "subcategories";
                $.ajax({
                    url: path,
                    type: 'GET',                       
                    success:function(data){
                        var data = jQuery.parseJSON(data); 
                        var i = 0;                    
                        $.each(data, function(key, subCat){ 
                            
                            var subcategory = subCat.subcategory_name;
                            subcategory = $.trim(subcategory);
                            subcategory = subcategory.toLowerCase().replace(/&/g, 'and');
                            
                            //clever programming... :)
                            //somewhere above, I give the cat-list div a classname that's equal to main category id..
                            //here I reference that div....this is to make sure that every subcategory is displayed 
                            //beneath the rigt main_category
                            $('.loading-categories').hide();
                            $('.'+subCat.category_id+'  ul').append('<li class = "'+subCat.subcategory_name+'"><a href="/ads/catagory/'+subcategory+'/Western Cape,All">'+ subCat.subcategory_name +'</a></li>'); 
                                
                        })                           
                    }

            }) 

            addCategoryId();
    }
    })});

    //used by to collapse categories, this id has to match the value of 'data-target=".cat-id-1"'
    //that's inside cat-list div, otherwise the collapse won't  work
    function addCategoryId(){
         path = "get-all-categories";
        $.ajax({
            url: path,
            type: 'GET',
           
            success:function(data){
                var data = jQuery.parseJSON(data);  

                var i = 0;

               
                $.each(data, function(key, item) 
                { 
                    i++;       
                    $('.'+item.cat_id+'  ul').addClass('cat-id-'+i);

                })
            }
        })
    }

    $("#autocomplete-ajax").keyup(function(){

        path = "autocomplete";
        $('.sponsored-ads-container').css('z-index','-23');
       
        $.ajax({
            type: "GET",
            url: path,
            data:'keyword='+$(this).val(),
            beforeSend: function(){
            },
            success: function(data){
              
                $(".autocomplete-suggestions").show();
               $(".autocomplete-suggestions").html(data);       
            }
        });
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
             displaySuburbs(location);
        }else{
            
            displayTownships(location);
        }
       

    });  

    

     
    function displayTownships(location){ 
        
        $('#loading-provinces').show();               
        $(".tab-content .location-link ul").empty();
                
        path = "locations"+"/"+location;
        $.ajax({
            url: path,
            type: 'GET',
            success:function(data){
                var data = jQuery.parseJSON(data);
                console.log(data);
                $('#loading-provinces').hide();

                $.each(data, function(key, item){ 

                    var loc = encodeURIComponent(item.location).replace(/%20/g,'-').toLowerCase();
                    var route =  "ads/location"+"/"+loc;
                    $(".tab-content .location-link ul").append("<li class='location-li'><a class = 'col-md-3 col-xs-6' href='"+route+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
               
                });

                if($(window).width()  < 500){
                    $('#locations').addClass('long-province-list');
                }
           }
        });

    }

    $(document).ready(function(){
         var location = $('#suburb-or-township').val();
        if(location == 'Western Cape,suburbs'){
             displaySuburbs2(location);
        }else{
            
            displayTownships2(location);
        }
    });


    function displaySuburbs(location){

        
        $(".tab-content .location-link ul").empty();
         $('#loading-provinces').show(); 
        path = "get-suburbs-by-prov"+"/"+location;
        $.ajax({
            url: path,
            type: 'GET',
            //data: {province:province},
            success:function(data){
                $('#loading-provinces').hide();
                var data = jQuery.parseJSON(data);
                var i = 0;
                var screenZise = $(window).width();                 
               
                $.each(data, function(key, item){ 
                    
                    var loc = encodeURIComponent(item.location).replace(/%20/g,'-').toLowerCase();
                    var route =  "ads/location"+"/"+loc;
                    $(".tab-content .location-link ul").append("<li class='location-li'><a class = 'col-md-3 col-xs-6' href='"+route+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                });

                if($(window).width()  < 500) {
                    $('#locations').addClass('long-province-list');
                }
            }
        })
    }

    function selectCountry(val) {
    $("#autocomplete-ajax").val(val);
    $(".autocomplete-suggestions").hide();


}


$('#suburb-or-township').on('change',function(){
        var location = $(this).val();
        if(location == 'Western Cape,suburbs'){
            $('.location-link ul').empty();
             displaySuburbs2(location);
        }else{
             $('.location-link ul').empty();
            displayTownships2(location);
        }
       

    });  
 
 function showLoadingLocation(){
    $('#loading-locations').show();
 }



 function displaySuburbs2(province){

            var waitThreeSeconds = setTimeout(showLoadingLocation,2000);
            path = "get-suburbs-by-prov"+"/"+province;

            $.ajax({
                url: path,
                type: 'GET',
                //data: {province:province},
                success:function(data){

                    clearTimeout(waitThreeSeconds);
                    $('#loading-locations').hide();

                    var all = "All Locations";
                    $(".location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+all+"'>"+all.charAt(0).bold()+all.slice(1)+"</a></li>");

                    var data = jQuery.parseJSON(data);
                    var i = 0;
                    var screenZise = $(window).width();
                  //  alert(screenZise);
                    $.each(data, function(key, item) 
                    {

                        if(screenZise > 500){
                            if(i<=11){
                            $(".location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            
                            }else if(i>11 && i<=23){
                            $(".location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);                           

                            }else if(i>26){
                             $(".location-link .column3 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            }
                        }else{
                             if(i<=18){
                            $(".location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            
                            }else if(i>18){
                            $(".location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);                           

                            }
                        }
                        i++;
                                           
                    });                    
               }
            });
        }


 function displayTownships2(province){

       var waitThreeSeconds = setTimeout(showLoadingLocation,2000);
       $("#location-link li").empty();

        
        path = "locations"+"/"+province;
        $.ajax({
            url: path,
            type: 'GET',           
            success:function(data){
                clearTimeout(waitThreeSeconds);
                $('#loading-locations').hide();
                var all = "All Locations";
                $(".location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+all+"'>"+all.charAt(0).bold()+all.slice(1)+"</a></li>");
                            //console.log(item.surbub+"-"+i);
                var i = 0;
                var screenZise = $(window).width();

                var data = jQuery.parseJSON(data);
                $.each(data, function(key, item) 
                {
                 
                 
                  if(screenZise > 500){
                            if(i<=11){
                            $(".location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            //console.log(item.surbub+"-"+i);
                            
                            }else if(i>11 && i<=23){
                            $(".location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            //console.log(item.surbub+"-"+i);                           

                            }else if(i>23){
                             $(".location-link .column3 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                          //  console.log(item.surbub+"-"+i);
                            }
                        }else{
                             if(i<=18){
                            $(".location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                           // console.log(item.surbub+"-"+i);
                            
                            }else if(i>18){
                            $(".location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                           // console.log(item.surbub+"-"+i);                           

                            }
                        }
                        i++; 

                });               
           }
        });
    }
   
   
    $(document).ready(function(){

        province = $('.province').val();
        $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');
        $("select option[value='"+province+"']").attr("selected","selected");
        $(".location-link ul").empty(); 

        displayTownships(province);  
    }) 

    $( ".modal-content .location-link" ).delegate( "a", "click", function() {

  
        $('.modal-backdrop').hide();
        $('.modal').hide();
        $('.searchtag-input').val($(this).attr('title'));

    });

