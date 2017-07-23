@extends('layouts.master')
@section('pagetitle')
  <title>KASOCULAR - Ads</title>
@endsection
@section('content')


<form method="get" action="/ads/search-item-cat-province">
   {{ csrf_field() }}


                
    <div class="search-row-wrapper">
        <div class="container text-center">
            <div class="col-sm-3">
                <input class="form-control keyword" required="required" type="text" {{old('searchItem')}} placeholder="e.g. Mobile Sale" name="searchItem" id='searchItem'>
            </div>
            <div class="col-sm-3 categories-container">

                @include('selectBoxCategories')
                
            </div>
            <div class="col-sm-3 province-container">
                <select  name="prov" id="id-location" class="col-sm-3 form-control">                       
                    <option  value="Western Cape,townships">Western Cape,townships</option> 
                    <option  value="Western Cape,suburbs">Western Cape,suburbs</option>  
                    <option  value="Western Cape,All">Western Cape,All</option>                    
                </select>
            </div>
            <div class="col-sm-3">
                <button id="btn-search" type = 'submit' class="btn btn-block btn-primary  "><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    </form>
    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                           @include('categories')
                            <div class="sub-categories-list2  list-filter" style="display:none; min-height:34px; ">
                                <h5 style="cursor:pointer;" class="list-title all-categories"><strong><i class="fa fa-angle-left"></i>
                                    All Categories</strong></h5>
                                <ul class="list-unstyled" style="min-height:80px;">

                                    <li><a href="#"><span class="title"><strong></strong></span><span class="count"></span></a>
                                    <div  id="loading-categories" style="margin-top:13px;"><img src="{{asset('images/loading.gif') }}" style="margin-left:40px;"></div>
                                        <ul class="list-unstyled sub-categories-list long-list" >                                        
                                        </ul></a></p>
                                    </li>
                                </ul>
                            </div>                     
                            <div class="locations-list list-filter">
                                   <h5 class="list-title"><strong><a href="#">Locations</a></strong></h5>
                                <ul  class="browse-list list-unstyled long-list">
                                <?php $i =0; ?>
                                   @foreach($locations as $location)
                                     <li><a href="/ads/location/{{strtolower(str_replace('+','-',urlencode($location->location)))}}"><span
                                            class="title" >{{ ucfirst($location->location) }}</span><span class="

                                            count" >
                                            <?php
                                              //  echo"99";
                                               // echo "(89)";
                                                //echo $adsPerCatagory[$i];
                                              echo   $adsPerTownship[$i];
                                                $i++;
                                            

                                            
                                            ?>    
                                        </span></a>
                                    </li>

                                   @endforeach
                                 


                                </ul>
                            </div>
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Search Township</a></strong></h5>

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-sm-9 no-padding">
                                        <input type="text"  width = "90px"  id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-1 no-padding text-center hidden-xs"></div>
                                    
                                    <div class="form-group col-sm-3 no-padding">
                                        <button class="btn btn-default pull-right btn-block-xs" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
                           

                           
                           
                            <!--/.list-filter-->
                            <div style="clear:both"></div>
                        </div>
                         <div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-sm-9 page-content col-thin-left">

                    <div class="category-list">
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" role="tablist">
                                <li class="active"><a href="#allAds" role="tab" data-toggle="tab">Ads found <span
                                        class="badge"><?php echo count($ads) ?></span></a></li>
                            </ul>


                            <div class="tab-filter" style="padding-top:0px">
                                <select class="selectpicker" data-style="btn-select" data-width="auto" >
                                    <option>Short by</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                </select
>                            </div>
                        </div>
                        <!--/.tab-box-->

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                                <div class="breadcrumb-list"> <?php echo $heading ?>


                                </div>
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view "><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view active"><i class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->

                        <!-- Mobile Filter bar-->
                        <div class="mobile-filter-bar col-lg-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="  icon-th-list"></i>
                                        Categories & Locations
                                    </a>
                                </li>
                                <li>                              

                                </li>
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->
                         <?php  

                            $nu_ads = count($ads);                     
                                
                            $hasView = "hasGridView";
                              if( $nu_ads%4 != 0){
                                     $hasView = "";                                     
                              }      
                        ?>

                        <div class="adds-wrapper {{ $hasView }} ">
                            <?php 
                                
                                
                                 ?>
                               
                                                          
                                @if($no_ads_message != null)


            <div class="alert alert-success pgray  alert-lg icon-gl-message-warning"  style="border-radius: 0px; margin-right: 7px; margin-left: 7px; margin-top: 7px; padding-left:7%;">
                                    <h2 class="no-margin no-padding" style="font-size:16px;
    line-height: 20px;">{{$no_ads_message}}</h2> </div>
    
    @endif

    @if( $nu_ads%4 != 0)
<script type="text/javascript">               
            $('.grid-view').removeClass("active");
            $('.list-view').addClass("active");         
</script>

    @endif   

    <?php 
    $i =0; $j=0;     
    $view = "make-grid";
      if( $nu_ads%4 != 0){
             $view = "";
             $height = "";
      }      
    ?>
    @foreach($ads as $ad)       
           
        <!--
            //I commented out this line on line 99
            $('.hasGridView .item-list').addClass('make-grid');
        -->
        <div class="item-list {{ $view }}" style="height:auto;">
            @if($ad->featured == "agent-ad")
                <div class="cornerRibbons urgentAds">
                <a href="#"> Urgent Ad</a>
                 </div>
            @elseif($ad->negotiable == "negotiable")
                 <div class="cornerRibbons topAds">
                    <a href="#">Negotiable</a>
                 </div>
            @elseif($ad->featured == "Sponsored")
                <div class="cornerRibbons featuredAds">
                    <a href="#">Sponsored</a>
                 </div>
           
            @endif

    <div class="col-sm-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i>
          <?php
           $arryLength = count($ads);
             echo $nuImages[$i];           
            
                 $i++;
            
          

            ?>



         </span> 
                <?php
                    $thumbnail = 'assets/thumbnail.php?adid=$ad->adid';
                ?>

               
                <a href="<?php echo asset('/ad-details/');?><?php echo "/".$ad->adid; ?> ">

                <img id="tmbnail" class="sidepan thumbnail no-margin" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $ad->adid; ?>"  alt="Image not found" onerror="this.src='{{ url('images/no_image.jpg')}}'" 

                >

                </a>          
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
        <div class="add-details">
            <h5 class="add-title"><a href="<?php echo asset('/ad-details/');?><?php echo "/".$ad->adid; ?> ">
                {{$ad->title}}</a></h5>
            <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip"
                                          data-placement="right" title="Business Ads">B </span> <span class="date"><i
                    class=" icon-clock"> </i> {{ $ad->created_at->diffForHumans() }} </span> - <span class="category">{{$ad->catagory}} </span>- <span
                    class="item-location"><i class="fa fa-map-marker"></i> {{$ad->location}} </span> </span></div>
    </div>
    <!--/.add-desc-box-->
    <div class="col-sm-3 text-right  price-box">
        <h2 class="item-price">R{{$ad->price}} </h2>
        @if($ad->featured != "None")
        <a class="btn btn-danger  btn-sm make-favorite" > <i class="fa fa-certificate"></i> <span></span>
        @endif
        </a> <a class="btn btn-success btn-sm make-favorite" id ="{{$ad->adid}}"> <i class="fa fa-heart"></i> <span>Save</span> </a>
    </div>
</div>
                    @endforeach
<!--/.item-list-->
</div>
<!--/.adds-wrapper-->



                         <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                            Save Search </a></div>
                    </div>

                    @include('sponsoredAds')


                     @if( $nu_ads <= 4)
                        @include('topAdsPartial')                    
                     @endif
                    <div class="pagination-bar text-center">{{ $ads->links() }} </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Do you get anything for sell ? </h2>
                        <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                        @if (Auth::guest())
                            <a  href="{{asset('/login?p-ad=1')}}" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                        @else
                         <a  href= "{{asset('/postfreead')}}" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                        @endif
                    </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>

    <!-- /.main-container -->


<!-- Modal Change City -->
<div class="modal fade" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-12">

                        <p id = 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        <div class="col-sm-6 no-padding province-select-container">
                            <select class="form-control selecter" name="category" id="suburb-or-township">
                                <div class = 'option-value'><option  class = 'option-value' value="Western Cape,townships">Western Cape,townships</option></div>
                                <div class = 'option-value'><option class = 'option-value' value="Western Cape,suburbs">Western Cape,suburbs</option></div>                                                                                                  
                            </select>
                        </div>
                        <div style="clear:both"></div>

                        <hr class="hr-thin">

                    </div>

                     <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                     
                    <div class="col-md-12 "  id = "location-link">
                        <div class = "col-md-4 col-sm-4 col-xs-6 column1">
                            <ul>


                            </ul>  
                        </div>
                        <div class = "col-md-4 col-sm-4 col-xs-5 column2">
                            <ul>


                            </ul>  
                        </div>
                        <div class = "col-md-4 col-sm-4 col-xs-6 column3">
                            <ul>


                            </ul>  
                        </div>          
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.modal -->
    @endsection

@section('scripts')

<script type="text/javascript">
    function standby() {
    document.getElementById('tmbnail').src = 'https://www.google.com/images/srpr/logo11w.png'
}
</script>
    <!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/plugins/simpleselect/jquery.simpleselect.js') }}"></script>
<script src="{{ url('assets/plugins/simpleselect/jquery.simpleselect.min.js') }}"></script>
<script src="{{ url('assets/plugins/scrollbar/js/perfect-scrollbar.js') }}"></script>

<script type="text/javascript">

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

              $('#options3').css("max-height", "20px");
          
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
            path = "{{ url('get-suburbs-by-prov') }}"+"/"+province;
           
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

    function displayAdsbyLocationAndSearchItem(location, searchItem){
        
        var route = "{{ url('/ads/loc-search-item') }}"+"?city="+location+"&searchItem="+searchItem;
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
        
        var searchItem = sessionStorage.getItem('searchItem', searchItem);
        var provinceSuburbOrTownship = sessionStorage.getItem('provinceSuburbOrTownship', provinceSuburbOrTownship);

        var location =  $(this).text();

        //loaded category is not null
        if(searchItem){
            displayAdsbyLocationAndSearchItem(location, searchItem)
        }
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
                alert(data);
               
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
</script> 
<!-- include carousel slider plugin  -->
<script src="{{ url('assets/js/owl.carousel.min.js')}}"></script>

<!-- include equal height plugin  -->
<script src="{{ url('assets/js/jquery.matchHeight-min.js')}}"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="{{ url('assets/js/hideMaxListItem.js') }}"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="{{ url('assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') }}"></script>
<script src="{{ url('assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js') }}"></script>
  
<!-- include custom script for site  -->
<script src=" {{ url('assets/js/script.js') }}"></script>
@endsection