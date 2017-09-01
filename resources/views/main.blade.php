@extends('layouts.master')
@section('pagetitle')
  <title>WCOCULAR - Home</title>
@endsection
@section('description')
    <meta name="description" content="Wcoculr is a classifieds website for Western Cape.  Buy and sell your stuff online for free, we will help sell your products fast."/> 
@endsection
@section('keywords')
    <meta name="keywords" content="Cars for Sale in Western Cape Jobs in Western Cape " /> 
@endsection
@section('content')
<div class="intro" style="background-image: url({{ asset('images/capetown4.jpg') }}); no-repeat center;">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <form action ="ads/loc-search-item" method="get">
                        {{ csrf_field() }}
                        <h1 class="intro-title animated fadeInDown"> Find Classified Ads </h1>
                        <p class="sub animateme fittext3 animated fadeIn">in Western Cape with Wcocular in minutes</p>
                        <div class="row search-row animated fadeInUp">
                            <div class="col-lg-4 col-sm-4 search-col relative locationicon">
                                <i class="icon-location-2 icon-append"></i>
                                <a href='#locationsModal' id='dropdownMenu1'
                                                                                      data-toggle='modal'><input type="text" name="location" readonly maxlength="25" required="" autocomplete='off' id="autocomplete-ajax"
                                       class="form-control locinput input-rel searchtag-input has-icon"
                                       placeholder="Location......" value="All locations" style="background-color: #fff"> 
                                </a>
                            </div>                           
                            <div class="col-lg-4 col-sm-4 search-col relative"><i class="icon-docs icon-append"></i>
                                <input type="text" maxlength="27" name="searchItem" required="" id = "searchItem" class="form-control has-icon"
                                       placeholder="I'm looking for a ..." value="">
                            </div>
                            <div class="col-lg-4 col-sm-4 search-col">
                                <button type = "submit" id = 'find' class="btn btn-primary btn-search btn-block"><i
                                        class="icon-search"></i><strong>Find</strong></button>
                            </div>                           
                            <div  class="autocomplete-suggestions col-lg-4 col-sm-4" style=" display:none;">
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.intro -->
    <div class="main-container">
        <div class="container">            
                      <div class="inner-box relative sponsored-ads-container sponsored-ads-mobile" style="margin-bottom:11px">
                        <h2 class="title-2">Sponsored Ads

                            <a id="nextItem" class="link  pull-right carousel-nav"> <i class="icon-right-open-big"></i></a>
                            <a id="prevItem" class="link pull-right carousel-nav"> <i class="icon-left-open-big"></i>
                            </a>
                        </h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="no-margin item-carousel owl-carousel owl-theme">
                                    @foreach($sponsoredAds as $sponsored)
                            <div class="item"><a href="<?php echo asset('/ad-details/');?><?php echo "/".$sponsored->adid; ?> ">
                        <span class="item-carousel-thumb">
                            <img class="img-responsive" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $sponsored->adid; ?>">
                        </span>
                                 <span class="item-name"> {{ $sponsored->title }}  </span>
                                <span class="price">R{{ $sponsored->price }} </span>
                            </a>
                            </div>
                               @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
            <div class="col-lg-12 content-box sponsored-ads-container sponsored-ads-desktop animated fadeIn" style="margin-bottom:15px; ">
                <div class="row row-featured"  style="display:none">
                    <div class="col-lg-12  box-title " >
                        <div class="inner"><h2><span>Sponsored </span>
                            Products <a href="{{ url('/ads?sponsored=y') }}" class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                    <div class=" relative  content featured-list-row clearfix">
                        <nav class="slider-nav has-white-bg nav-narrow-svg">
                            <a class="prev">
                                <span class="nav-icon-wrap"></span>
                            </a>
                            <a class="next">
                                <span class="nav-icon-wrap"></span>
                            </a>
                        </nav>
                        <div class="no-margin featured-list-slider ">
                            @foreach($sponsoredAds as $sponsored)
                            <div class="item">
                                <a href="<?php echo asset('/ad-details/');?><?php echo "/".$sponsored->adid; ?> ">
                                    <span class="item-carousel-thumb">
                                        <img class="img-responsive" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $sponsored->adid; ?>">
                                    </span>
                                    <span class="item-name">{{ $sponsored->title }}</span>
                                    <span class="price">R{{ $sponsored->price }} </span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 page-content col-thin-right categories-mobile">
                <div class="inner-box category-content" style="margin-bottom:8px;">
                        <h2 class="title-2" id ="browse-by-cat">Browse by Categories</h2>

                        <div class="row cat-row" style="">

                      <?php $i = 0; ?>

                       @foreach($categories as $category)
                        <div class="cat-list col-md-4 col-sm-12 " style="height:auto;">
                                <h3 class="cat-title">  <a href="/ads/main-category/{{strtolower(str_replace('%26','and', str_replace('+','-',urlencode($category->category))))}}"><i class="fa {{$category->class}} ln-shadow"></i>
                                       <span class ='main-cat'>{{ $category->category }}</span> <span class="count">{{ $adsPerCategory[$i] }}</span> </a>

                                        <span data-target=".cat-id-{{$i}}" data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class="icon-down-open-big"></span> </span>
                                </h3>
                                <ul class="cat-collapse collapse in cat-id-{{$i}}" style="">
                                    @foreach($subCategories as $subCat)
                                        @if($subCat->category_id  == $category->cat_id)
                                        <li>  <a href="/ads/catagory/{{strtolower(str_replace('%26','-',str_replace('+','-',urlencode($subCat->subcategory_name))))}}/All Provinces">{{ $subCat->subcategory_name }} </a></li>
                                        @endif
                                    @endforeach             
                                </ul>
                            </div>
                            <?php $i++;?>
                        @endforeach
                      
                   </div>
                </div>
                <div class="col-lg-12 content-box" style="margin-bottom:15px;">
                <div class="row row-featured">
                    <div style="clear: both"></div>
                    <div class=" relative  content  clearfix" style="padding-bottom:15px">
                        <div class="">
                            <div class="tab-lite">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs " role="tablist">
                                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1"
                                                                              role="tab" data-toggle="tab"><i
                                            class="icon-location-2"></i>Browse by Suburbs</a></li>
                                    
                                    <li role="presentation"><a href="#tab2" aria-controls="tab3" role="tab"
                                                               data-toggle="tab"><i class="icon-location-2"></i> Browse by Townships</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab1">
                                    <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                                        <div class="col-lg-12 tab-inner location-link" style="padding-top:15px;">
                                                <?php $i = 0; ?> 
                                                <div class = "col-md-3 col-sm-4 col-xs-6 column1">
                                                    <ul id = "locations">
                                                        @foreach($suburbs as $suburb)
                                                            @if($i <=18)                                  
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$suburb->location}}</a></li>
                                                                @if($i == 18)
                                                    </ul>  
                                                </div> 
                                                <div class = "col-md-3 col-sm-4 col-xs-6 column2">
                                                    <ul id = "locations">                                          
                                                                @endif
                                                            @elseif($i > 18)
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$suburb->location}}</a></li>
                                                            @endif                                                    
                                                            <?php $i++;  ?>
                                                          @endforeach
                                                    </ul>
                                                </div>                                                  
                                     </div>                                
                                </div>
                                        <div role="tabpanel" class="tab-pane" id="tab2">
                                    <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                                        <div class="col-lg-12 tab-inner location-link" style="padding-top:15px;color:#4e575d">
                                                <?php $i = 0; ?> 
                                                <div class = "col-md-3 col-sm-4 col-xs-6 column1">
                                                    <ul id = "locations">
                                                        @foreach($townships as $township)
                                                            @if($i <=18)                                  
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($township->location)))}}">{{$township->location}}</a></li>
                                                                @if($i == 18)
                                                    </ul>
                                                </div>                                           
                                                <div class = "col-md-3 col-sm-4 col-xs-6 column4">
                                                    <ul id = "locations">                                          
                                                                @endif
                                                            @elseif($i > 18)
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$township->location}}</a></li>
                                                            @endif                                                    
                                                            <?php $i++;  ?>
                                                          @endforeach
                                                    </ul>
                                                </div>                                                  
                                     </div>                                
                                </div>
                                </div>
                           </div>                      
                        </div>
                    </div>
                </div>
            </div>

            </div>
            <div style="clear: both"></div>          
            <div class="row">
                <div class="col-sm-9 page-content col-thin-right categories-desktop2">
                    <div class="inner-box category-content" style="margin-bottom:15px; height:1164px; overflow:hidden;">
                        <h2 class="title-2" id ="browse-by-cat">Browse by subcategories</h2>

                    
                        <div class="row">
                            <div class = "col-md-4 col-xs-6 column1" style="height:auto;">
                                <?php $i = 0; ?>
                                @foreach($categories as $category)
                                    <?php $slugMainCategory  = strtolower($category->category); ?>  
                                    <?php if($i <=3){ ?> 

                                    <div class="cat-list">
                                        <h3 class="cat-title"><a href="/ads/main-category/{{$slugMainCategory}}"><i class="fa fa-car ln-shadow"></i>
                                            {{$category->category}}<span class="count">{{$adsPerCategory[$i]}}</span> </a>

                                            <span data-target=".cat-id-{{$i}}" data-toggle="collapse"
                                                  class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                        </h3>
                                        @foreach($subCategories as $subCategory)                                       
                                            @if($category->cat_id == $subCategory->category_id )
                                             <?php $lugSubCategory = strtolower($subCategory->subcategory_name); ?>
                                                <ul class="cat-collapse collapse in cat-id-{{$i}}">
                                                    <li><a href="/ads/catagory/{{$lugSubCategory}}/all-locations">{{$subCategory->subcategory_name}}</a></li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </div>
                                    <?php  if($i == 3){ ?>                            
                            </div>
                            <div class = "col-md-4  col-xs-6 column2" style="height:auto;">
                                    <?php } } else if($i > 3 && $i <=8){ ?>                                    
                                    <div class="cat-list">
                                        <h3 class="cat-title"><a href="/ads/main-category/{{$slugMainCategory}}"><i class="fa fa-car ln-shadow"></i>
                                            {{$category->category}}<span class="count">{{$adsPerCategory[$i]}}</span> </a>

                                            <span data-target=".cat-id-{{$i}}" data-toggle="collapse"
                                                  class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                        </h3>
                                        @foreach($subCategories as $subCategory)
                                            @if($category->cat_id == $subCategory->category_id )
                                             <?php $slugSubCategory = strtolower($subCategory->subcategory_name); ?>
                                                <ul class="cat-collapse collapse in cat-id-{{$i}}">
                                                    <li><a href="/ads/catagory/{{$slugSubCategory}}/all-locations">{{$subCategory->subcategory_name}}</a></li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </div>                                 
                                <?php  if( $i == 8){ ?>
                            </div>
                            <div class = "col-md-4  col-xs-6 column3" style="height:auto">
                                 <?php } } else if($i > 8){ ?>
                                    
                                    <div class="cat-list">
                                        <h3 class="cat-title"><a href="/ads/main-category/{{$slugMainCategory}}"><i class="fa fa-car ln-shadow"></i>
                                            {{$category->category}}<span class="count">{{$adsPerCategory[$i]}}</span> </a>

                                            <span data-target=".cat-id-{{$i}}" data-toggle="collapse"
                                                  class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                        </h3>
                                        @foreach($subCategories as $subCategory)
                                            @if($category->cat_id == $subCategory->category_id )
                                                <?php $slugSubCategory = strtolower($subCategory->subcategory_name); ?>
                                                <ul class="cat-collapse collapse in cat-id-{{$i}}">
                                                    <li><a href="/ads/catagory/{{$slugSubCategory}}/all-locations">{{$subCategory->subcategory_name}}</a></li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </div>  

                                <?php  } ?>

                                <?php $i++; ?>
                                                                             
                                @endforeach
                            </div>                        
                        </div>
                        <div class = "col-md-4  col-xs-5 column2" style="height:auto;">
                            
                        </div>
                        <div class = "col-md-4  col-xs-6 column3" style="height:auto">
                           
                        </div>
            </div>


              <div class="col-lg-12 content-box" style="margin-bottom:15px; height:319px;overflow:scroll">
                <div class="row row-featured">
                    <div style="clear: both"></div>
                    <div class=" relative  content  clearfix" style="padding-bottom:15px"> 
                        <div class="">
                            <div class="tab-lite">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs " role="tablist">
                                    <li role="presentation" class="active"><a href="#tab1-desktop" aria-controls="tab1-desktop"
                                                                              role="tab" data-toggle="tab"><i
                                            class="icon-location-2"></i>Browse by Suburbs</a></li>
                                    
                                    <li role="presentation"><a href="#tab2-desktop" aria-controls="tab2-destop" role="tab"
                                                               data-toggle="tab"><i class="icon-location-2"></i> Browse by Townships</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab1-desktop">
                                    <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                                        <div class="col-lg-12 tab-inner location-link" style="padding-top:15px;">
                                                <?php $i = 0; ?> 
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column1">
                                                    <ul id = "locations">
                                                        @foreach($suburbs as $suburb)
                                                            @if($i <=9)                                  
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$suburb->location}}</a></li>
                                                                @if($i == 9)
                                                    </ul>
                                                </div>                                            
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column2">
                                                    <ul id = "locations">
                                                                @endif
                                                            @elseif($i > 9 && $i <=19 )
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$suburb->location}}</a></li>
                                                                @if($i == 19)
                                                    </ul> 
                                                </div>
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column3">    
                                                    <ul id = "locations">  
                                                                @endif
                                                            @elseif($i > 19  && $i <=29)
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$suburb->location}}</a></li>
                                                                @if($i == 29)
                                                    </ul>  
                                                </div> 
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column4">
                                                    <ul id = "locations">                                          
                                                                @endif
                                                            @elseif($i > 29)
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$suburb->location}}</a></li>
                                                            @endif                                                    
                                                            <?php $i++;  ?>
                                                          @endforeach
                                                    </ul>
                                                </div>                                                  
                                     </div>                                
                                </div>
                                        <div role="tabpanel" class="tab-pane" id="tab2-desktop">
                                    <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                                        <div class="col-lg-12 tab-inner location-link" style="padding-top:15px;color:#4e575d">
                                                <?php $i = 0; ?> 
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column1">
                                                    <ul id = "locations">
                                                        @foreach($townships as $township)
                                                            @if($i <=9)                                  
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($township->location)))}}">{{$township->location}}</a></li>
                                                                @if($i == 9)
                                                    </ul>
                                                </div>                                            
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column2">
                                                    <ul id = "locations">
                                                                @endif
                                                            @elseif($i > 9 && $i <=19 )
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($township->location)))}}">{{$township->location}}</a></li>
                                                                @if($i == 19)
                                                    </ul> 
                                                </div>
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column4">    
                                                    <ul id = "locations">  
                                                                @endif
                                                            @elseif($i > 19  && $i <=29)
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($township->location)))}}">{{$township->location}}</a></li>
                                                                @if($i == 29)
                                                    </ul>  
                                                </div> 
                                                <div class = "col-md-3 col-sm-3 col-xs-6 column4">
                                                    <ul id = "locations">                                          
                                                                @endif
                                                            @elseif($i > 29)
                                                                <li class="location-li"><a class = "" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($suburb->location)))}}">{{$township->location}}</a></li>
                                                            @endif                                                    
                                                            <?php $i++;  ?>
                                                          @endforeach
                                                    </ul>
                                                </div>                                                  
                                     </div>                                
                                </div>
                                </div>
                           </div>                      
                        </div>
                    </div>
                </div>
            </div>

                    <div class="inner-box has-aff relative">
                        <a class="dummy-aff-img" href="category.html"><img src="images/aff2.jpg" class="img-responsive"
                                                                           alt=" aff"> </a>

                    </div>
                </div>
                <div class="col-sm-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box no-padding">
                            <div class="inner-box-content"><a href="#"><img class="img-responsive"
                                                                            src="images/site/app.jpg" alt="tv"></a>
                            </div>
                        </div>
                        <div class="inner-box">
                                <div class="inner-box-content">
                                <center><img src="images/9361618978974016871.gif"></center> 
                            </div>
                        </div>

                        <div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

    <div class="page-info hasOverly" style="background:url({{ asset('images/capetown4.jpg') }}); background-size:cover">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{ $sellers }}</span></h5>

                                    <div class="iconbox-wrap-text">Trusted Seller</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{ $numOfCategogories }}</span></h5>

                                    <div class="iconbox-wrap-text">Categories</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{ $numLocations }}</span></h5>

                                    <div class="iconbox-wrap-text">Locations</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon icon-facebook"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>50,000</span></h5>

                                    <div class="iconbox-wrap-text"> Facebook Fans</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">

            <div class="page-bottom-info-content text-center">
                <h1>If you have any questions, comments or concerns, please email us via our contact form</h1>
                <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                    <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (000) 555-5555 </a>
            </div>

        </div>
    </div>
    <!-- Modal Change City -->
<!-- Modal Change City -->
<div class="modal fade first-modal" id="locationsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            Popular <span id = "popular-locations"><strong>Suburbs</strong></span>
                            in Western Cape
                        </p>

                        <div style="clear:both"></div>
                        <div class="col-sm-6 no-padding province-select-container">
                            <select class="form-control selecter" name="category" id="locations-category">
                                <div class = 'option-value'><option class = 'option-value' value="Suburbs">Suburbs</option></div>
                                <div class = 'option-value'><option  class = 'option-value' value="Townships">Townships</option></div>
                            </select>
                        </div>
                        <div style="clear:both"></div>

                        <hr class="hr-thin">
                    </div>
                    <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                    @include('partials/locationsModal')
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- /.modal -->
@endsection

@section('scripts')
<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="assets/js/jquery/jquery-latest.js"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- include jquery list shorting plugin plugin  -->
<script src="assets/js/hideMaxListItem.js"></script>
<script src="{{ asset('assets/js/homepage.js')}}"></script>
<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>
<script defer src="assets/plugins/flexslider/jquery.flexslider.js"></script>
<script type="text/javascript">
    (function(){
 
  // store the slider in a local variable
  var $window = $(window),
      flexslider = { vars:{} };
 
  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 600) ? 2 :
           (window.innerWidth < 900) ? 3 : 4;
  }
 
  $(function() {
    SyntaxHighlighter.all();
  });
 
  $window.load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 210,
      itemMargin: 5,
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize() // use function to pull in initial value
    });
  });
 
  // check grid size on resize event
  $window.resize(function() {
    var gridSize = getGridSize();
 
    flexslider.vars.minItems = gridSize;
    flexslider.vars.maxItems = gridSize;
  });
}());

</script>

<!-- Syntax Highlighter -->
  <script type="text/javascript" src="assets/plugins/flexslider/js/shCore.js"></script>
  <script type="text/javascript" src="assets/plugins/flexslider/js/shBrushXml.js"></script>
  <script type="text/javascript" src="assets/plugins/flexslider/js/shBrushJScript.js"></script>

<!-- include equal height plugin  -->
<script src="assets/js/jquery.matchHeight-min.js"></script>
<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery-nicescroll.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.min.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.js') }}"></script>


<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="{{ asset('selectorassets/js/script.js') }}"></script>
<!-- note that, even though this code already exist in the script.js files
if I don't put here again, the slider will not show on mobile devices... -->
<script type="text/javascript">
    var owlitem = $(".item-carousel");

    owlitem.owlCarousel({
        //navigation : true, // Show next and prev buttons
        navigation: false,
        pagination: false,
        items: 7,
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: [660, 2],
        itemsMobile: [400, 2]
    });

    // Custom Navigation Events
    $("#nextItem").click(function () {
        owlitem.trigger('owl.next');
    })
    $("#prevItem").click(function () {
        owlitem.trigger('owl.prev');
    })
    
</script>
@endsection
