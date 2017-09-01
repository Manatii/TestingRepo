@extends('layouts.master')
@section('pagetitle')
<title>{{ $pageTitle }}</title>
@endsection
@section('description')
<meta name="description" content="{{$pageDescription}}">
@endsection
@section('keywords')
<meta name="keywords" content="{{$keywords}}">
@endsection
@section('content')
    <div class="search-row-wrapper search-div-desktop">
        <div class="container">
            <form action="/ads/search-item-cat-loc-cat" method="GET">
                <?php
                    $sItem = "";
                    if(isset($_GET['searchItem'])){
                        $sItem = $_GET['searchItem'];
                    }else if(isset($searchItem)){
                        $sItem = $searchItem;
                    }else if(isset($storedMainCategory)){
                        $sItem = $storedMainCategory;
                    }else if(isset($storedCategory)){
                        $sItem = $storedCategory;
                    }
                ?>
                <div class="col-sm-3">
                    <input class="form-control keyword" type="text" name="searchItem" value="{{$sItem}}" required placeholder="e.g. Mobile Sale">
                </div>
                <div class="col-sm-3">
                   @include('partials/selectBoxCategories')
                </div>
                <div class="col-sm-3">
                    <select class="form-control selecter" name="location-cat" id="id-location">
                    <?php 
                        $locationCategory = "";
                        if(isset($_GET['location-cat'])){
                            $locationCategory = $_GET['location-cat'];
                        }
                    ?>
                    <option <?php if($locationCategory == "Suburbs"){ echo "selected";} ?>  value="Suburbs">Suburbs</option>                        
                    <option <?php if($locationCategory == "Townships"){ echo "selected";} ?>  value="Townships">Townships</option>                    
                    <option <?php if($locationCategory == "All locations"){ echo "selected";} ?> value="All locations">All locations</option>  
                    </select>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-primary" type="submit"> <i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
 <div id = "intro" class="intro" style="background-image: url({{ asset('images/capetown4.jpg') }}); no-repeat center;">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <form action ="{{ url('ads/loc-search-item') }}" method="get">
                        {{ csrf_field() }}
                        <h1 class="intro-title animated fadeInDown"> Find Classified Ads </h1>
                        <p class="sub animateme fittext3 animated fadeIn">in Western Cape with Wcocular in minutes</p>
                        <?php
                            $loc = "All locations";
                            $sItem = "";
                            if(isset($_GET['location']) && isset($_GET['searchItem'])){
                                $loc  = $_GET['location'];
                                $sItem = $_GET['searchItem'];
                            }else if(isset($location) && isset($searchItem) ){
                                $loc  = $location;
                                $sItem = $searchItem;
                            }else if(isset($storedMainCategory)){
                                $sItem = $storedMainCategory;
                            }else if(isset($storedCategory)){
                                $sItem = $storedCategory;
                            }
                        ?>  
                        <div class="row search-row animated fadeInUp">
                            <div class="col-lg-4 col-sm-4 search-col relative locationicon">
                                <i class="icon-location-2 icon-append"></i>
                                <a href='#locationsModal' id='dropdownMenu1'
                                                                                      data-toggle='modal'><input type="text" name="location" readonly maxlength="25" required="" autocomplete='off' id="autocomplete-ajax"
                                       class="form-control locinput input-rel searchtag-input has-icon"
                                       placeholder="Location......" value="{{$loc}}" style="background-color: #fff"> 
                                </a>
                            </div>                             
                            <div class="col-lg-4 col-sm-4 search-col relative"><i class="icon-docs icon-append"></i>
                                <input type="text" maxlength="27" name="searchItem" required="" id = "searchItem" class="form-control has-icon"
                                       placeholder="I'm looking for a ..." value="{{$sItem}}">
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
        <div class="row">
            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
            <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
                <aside>
                    <div class="inner-box">
                       @include('partials/categories')
                        <div class="sub-categories-list2  list-filter" style="display:none; min-height:44px; ">
                            <h5 style="cursor:pointer;" class="list-title all-categories"><strong><i class="fa fa-angle-left"></i>
                                All Categories</strong></h5>
                            <ul class="list-unstyled" style="min-height:80px;">
                                <li>
                                    <a href="#"><span class="main-category-title"><strong></strong></span><span class="count"></span></a>
                                    <div  id="loading-categories" style="margin-top:13px;">
                                        <img src="{{asset('images/loading.gif') }}" style="margin-left:40px;" alt="loading">   
                                    </div>
                                    <ul class="list-unstyled sub-categories-list" >

                                    </ul>
                                </li>
                            </ul>
                        </div>                     
                        <div class="locations-list list-filter ">
                            <h5 class="list-title"><strong><a href="#">Locations</a></strong></h5>
                            <ul  class="browse-list list-unstyled long-list">
                                <?php $i =0;

                                   

                                 ?>
                                @foreach($locations as $location)
                                    <?php
                                        $location = ucfirst($location->location);
                                        $locationUrl = $location;       
                                        $firstLetter = substr($location,0,1 );
                                        $location =   substr($location,1 );
                                    ?>
                                    <li><a href="/ads/location/{{strtolower(str_replace('+','-',urlencode($locationUrl)))}}" style="font-size:13.90px;">
                                        <span class="title" >
                                           <strong>{{$firstLetter}}</strong>{{$location}}
                                        </span>
                                        <span class="count" >
                                            <?php
                                              echo "(".$adsPerTownship[$i].")";
                                                $i++;
                                            ?>    
                                        </span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                         <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="R 2000 " id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="R 3000 " id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-3 no-padding">
                                        <button class="btn btn-default pull-right btn-block-xs" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                        </div> 
                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                            <ul class="browse-list list-unstyled long-list">
                                <li><a href="{{ asset('/ads') }}"><strong>All Ads </strong> <span
                                        class="count">{{ count($ads) }}</span></a></li>
                                <li><a href="{{ asset('ads?bargains=y') }}">Bargains <span
                                        class="count">{{ $nuBargains }}</span></a></li>
                                <li><a href="{{ asset('ads?sponsored=y') }}">Sponsored Ads <span
                                        class="count">{{ $nuSponsoredAds }}</span></a></li>
                            </ul>
                        </div>                  
                        <!--/.list-filter-->
                        <div style="clear:both"></div>
                    </div>
                    <div class="inner-box no-padding">
                        <img class="img-responsive" src="images/add2.jpg" alt="">
                    </div>
                </aside>
            </div>
            <!--/.page-side-bar-->
            <div class="col-sm-9 page-content col-thin-left">
            @if(count($firstGallerySponsoredAds) > 0)
                <div class="inner-box relative sponsored-ads-gallery" style="margin-bottom:8px; display:none">
                <h2 class="title-2">Sponsored Ads
                    <a  class="link  pull-right carousel-nav nextItem"> <i class="icon-right-open-big"></i></a>
                    <a  class="link pull-right carousel-nav prevItem"> <i class="icon-left-open-big"></i>
                    </a>
                </h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="no-margin item-carousel owl-carousel owl-theme">
                            @foreach($firstGallerySponsoredAds as $sponsored)
                                <div class="item">
                                    <a href="<?php echo asset('/ad-details/');?><?php echo "/".$sponsored->adid; ?> ">
                                    <span class="item-carousel-thumb">
                                        <img class="img-responsive" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $sponsored->adid; ?>">
                                    </span>
                                    <span class="item-name"> {{ $sponsored->title }}  </span>
                                    <span class="price">R{{ $sponsored->price }} </span>
                                    </a>
                                </div>
                           @endforeach
                           <?php 
                                $i = 1;
                                if(count($firstGallerySponsoredAds) == 1){
                                    $i = 4;
                                }
                                else if(count($firstGallerySponsoredAds) == 2){
                                    $i = 3;
                                }else if(count($firstGallerySponsoredAds) == 3){
                                     $i = 2;
                                }else if(count($firstGallerySponsoredAds) == 4){
                                    $i = 1;
                                }

                           ?>
                           @for($j = 0;  $j < $i; )
                               <div class="item">
                                        <a href="">
                                        <span class="item-carousel-thumb">
                                            <img class="img-responsive" src="<?php echo asset('images/here.jpg')?>">
                                        </span>
                                        <span class="item-name"> have your ad seen here for 2 weeks for</span>
                                        <span class="price">R95</span>
                                        </a>
                                </div>
                                <?php $j++; ?>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="category-list">
                <div class="tab-box ">

                <?php 
    if(isset($_GET['page'])){ ?>
        <script type="text/javascript">
        $(document).ready(function(){
           
   

       // // Featured Listings  carousel || HOME PAGE
    var owlitem = $(".item-carousel");

    owlitem.owlCarousel({
        //navigation : true, // Show next and prev buttons
        navigation: false,
        pagination: false,
        items: 5,
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: [660, 2],
        itemsMobile: [400, 2]
    });
        
       if($(window).width() < 500 ){
          var page = "<?php echo $_GET['page']; ?>";
          var iterator = page*2;
          
          for(var i = 0;i<iterator; i++){
            //owlitem.trigger('owl.next');
          }

            
        }

        if($(window).width() > 900 ){
          var page = "<?php echo $_GET['page']; ?>";
          var iterator = page*5;
          
          for(var i = 0;i<iterator; i++){
            // owlitem.trigger('owl.next');
          }

            
        }         



                                // Custom Navigation Events
                        $("#nextItem").click(function () {
                            owlitem.trigger('owl.next');
                        })
                        $("#prevItem").click(function () {
                            owlitem.trigger('owl.prev');
                        }) 

                        // $("#nextItem2").click(function () {
                        //     owlitem.trigger('owl.next');
                        // })
                        // $("#prevItem2").click(function () {
                        //     owlitem.trigger('owl.prev');
                        //    // alert('helloo');
                        // })               

        });
     
     </script>   
<?php }
?>

                
                    <!-- Nav tabs -->
                   <div class="tab-box" role="tabpanel">
                            <!-- Nav tabs -->
    <?php  
       
        $isTab1Active = "active";
        $isTab2Active = "";
        $isTab3Active = "";
        if(isset($_GET['bargains'])){
            $isTab2Active = "active";
            $isTab1Active = "";
            $isTab3Active = "";          
          
        }else if(isset($_GET['sponsored'])){
            $isTab3Active = "active";
            $isTab1Active = "";
            $isTab2Active = "";
        }   
    ?>
    <ul class="nav nav-tabs add-tabs" role="tablist">
        <li role="presentation browse-list list-unstyled long-list" class="regular-ads-tab {{$isTab1Active}}">
            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">
                All Ads <span class="badge">{{ $ads->total() }}</span>
            </a>
        </li>
        <li role="presentation" class = "bargains-tab {{$isTab2Active}}">
            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" >
                Bargains <span class="badge" style = "background:#07af54">{{ $nuBargains }}</span>       
            </a>
        </li>
        <li role="presentation" class="sponsored-ads-tab {{$isTab3Active}}">
            <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">
                Sponsored Ads <span class="badge sponsored-ads"> {{ $nuSponsoredAds }} </span>
            </a>
        </li>
    </ul>

                        <div class="tab-filter">
                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto">
                                    <option>Sort by </option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                </div>
                <!--/.tab-box-->
                <div class="listing-filter">
                    <div class="pull-left col-xs-6">
                        <div class="breadcrumb-list"> <?php echo $heading ?></div>
                    </div>
                    <div class="pull-right col-xs-6 text-right listing-view-action">
                        <span class="list-view "><i class="  icon-th"></i></span>
                        <span class="compact-view"><i class=" icon-th-list  "></i></span>
                        <span class="grid-view active"><i class=" icon-th-large "></i></span>
                    </div>
                    <div style="clear:both"></div>
                </div>
                    <!-- Mobile Filter bar-->
                   <div class="mobile-filter-bar col-lg-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="  icon-th-list"></i>
                                        Filters
                                    </a>
                                </li>
                                <li>


                                    <div class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i> Short
                                            by </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="" rel="nofollow">Relevance</a></li>
                                            <li><a href="" rel="nofollow">Date</a></li>
                                            <li><a href="" rel="nofollow">Company</a></li>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>                  
                    <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->
                        <?php  
                            $nu_ads = count($ads);
                            $nuSponsoredAds = count($sponsoredAds);                     
                            $hasView = "hasGridView";
                            if( $nu_ads%4 != 0){
                                $hasView = "";                                     
                            }

                            $isActive = "active";

                            if(isset($_GET['sponsored']) || isset($_GET['bargains'])){
                                    $isActive = "";
                            }    
                        ?>

                   <div class="tab-content">
                       <div role="tabpanel" class="tab-pane {{$isActive}}" id="tab1">
                            <div class="adds-wrapper {{ $hasView }} "> 
                                              @if($ads->total() < 1)
                                <div class="alert alert-success pgray  alert-lg icon-gl-message-warning"  style="border-radius: 0px; margin-right: 7px; margin-left: 7px; margin-top: 7px; padding-left:7%;">
                                    <h2 class="no-margin no-padding" style="font-size:16px;line-height: 20px;">{{$no_ads_message}}</h2>
                                </div>
                                @endif
                                @if( $nu_ads%4 != 0 )
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
                                <!--//I commented out this line on line 99 $('.hasGridView .item-list').addClass('make-grid');-->
                                <div class="item-list {{ $view }}" style="height:auto;">
                                    @if($ad->featured == "bargain")
                                        <div class="cornerRibbons urgentAds">
                                            <a href="#"> Bargain </a>
                                         </div>
                                    @elseif($ad->negotiable == "negotiable")
                                         <div class="cornerRibbons topAds">
                                            <a href="#">Negotiable</a>
                                         </div>
                                    @elseif($ad->featured == "sponsored")
                                        <div class="cornerRibbons sponsored-ads">
                                            <a href="#" style="color: #fff;display: block;font-family: Roboto Condensed, Helvetica, Arial, sans-serif;font-size: 12px;font-weight: normal;text-align: center;text-decoration: none;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.8);text-transform: uppercase;border: 1px solid rgba(255, 255, 255, 0.1);transition: all 0.3s ease 0s;">Sponsored</a>
                                         </div>                               
                                    @endif
                                    <div class="col-sm-2 no-padding photobox">
                                        <div class="add-image">
                                            <span class="photo-count"><i class="fa fa-camera"></i>
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
                                                <img id="tmbnail" class="sidepan thumbnail no-margin" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $ad->adid; ?>"  alt="{{$ad->title}} in Western Cape, {{$ad->location}}" filename="{{$ad->title}} in Western Cape,{{$ad->location}}" onerror="this.src='{{ url('images/no_image.jpg')}}'">
                                            </a>          
                                        </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-7 add-desc-box">
                                        <div class="add-details">
                                            <h5 class="add-title">
                                                <a href="<?php echo asset('/ad-details/');?><?php echo "/".$ad->adid; ?> ">
                                                    {{$ad->title}}
                                                </a>
                                            </h5>
                                            <span class="info-row">
                                                <?php
                                                    $promotionPlan = $ad->featured;
                                                    $symbol = "";
                                                    if($promotionPlan == "sponsored"){
                                                        $symbol = "S";
                                                        $promotionPlan = "Sponsored Ad";
                                                    }
                                                    else{
                                                        $symbol = "R";
                                                        $promotionPlan = "Regular Ad";
                                                    }
                                                ?>
                                                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="{{$promotionPlan}}">{{$symbol}}</span>
                                                <span class="date"><i class=" icon-clock"></i> {{ $ad->created_at->diffForHumans() }}</span> -
                                                <?php $category = $ad->catagory;
                                                    if($category == "Cars"){
                                                       $category =  "Used ".$category." for sale";
                                                    }else if($category == ""){
                                                        $category = "";
                                                    }
                                                    $MainCat = strtolower($ad->main_catagory);

                                                    if($MainCat == "property"){ ?>
                                                     <span class="category"> Property - {{ $category }}</span> -
                                                  <?php } else{ ?>
                                                  <span class="category"> {{ $category }}</span> -
                                                <?php }?>
                                                <span class="item-location">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{$ad->location}}, Western Cape
                                                </span> 
                                            </span>
                                        </div>
                                    </div>
                                    <!--/.add-desc-box-->
                                    <div class="col-sm-3 text-right  price-box">
                                        <h2 class="item-price">R{{$ad->price}} </h2>
                                        @if($ad->featured != "None")
                                        <a class="btn btn-danger  btn-sm make-favorite" > <i class="fa fa-certificate"></i> <span>{{$ad->featured}}</span>
                                        @endif
                                        </a> <a class="btn btn-default btn-sm make-favorite" id ="{{$ad->adid}}"> <i class="fa fa-heart"></i> <span>Save</span> </a>
                                    </div>
                                </div>                           
                                <!--/.item-list-->
                        @endforeach
                        </div>
                        </div>
                        <?php                            
                            $nuBargains = count($nuBargains);                     
                            $hasView = "hasGridView";
                            if( $nuBargains%4 != 0){
                                $hasView = "";                                     
                            }     

                            $isActive = "";
                            if(isset($_GET['bargains'])){
                                    $isActive = "active";
                            }   
                        ?>                      
                        <div role="tabpanel" class="tab-pane {{$isActive}}" id="tab2">
                           <div class="adds-wrapper {{ $hasView }} "> 
                                @if(count($bargains) < 1)
                                <div class="alert alert-success pgray  alert-lg icon-gl-message-warning"  style="border-radius: 0px; margin-right: 7px; margin-left: 7px; margin-top: 7px; padding-left:7%;">
                                    <h2 class="no-margin no-padding" style="font-size:16px;line-height: 20px;">{{$noBargainsMessage}}</h2>
                                </div>
                                @endif
                                <?php $nuBargains = count($bargains); ?>
                                @if( $nuBargains%4 != 0)
                                    <script type="text/javascript">               
                                                $('.grid-view').removeClass("active");
                                                $('.list-view').addClass("active");         
                                    </script>
                                @endif

                                <?php 
                                 $nuBargains = count($nuBargains);
                                    $i =0; $j=0;     
                                    $view = "make-grid";
                                    if($nuBargains%4 != 0){
                                             $view = "";
                                             $height = "";
                                    }      
                                ?>                        
                                @foreach($bargains as $ad)       
                                <!--//I commented out this line on line 99 $('.hasGridView .item-list').addClass('make-grid');-->
                                <div class="item-list {{ $view }}" style="height:auto;">
                                    @if($ad->featured == "bargain")
                                        <div class="cornerRibbons urgentAds">
                                            <a href="#"> Bargain </a>
                                         </div>
                                    @elseif($ad->negotiable == "negotiable")
                                         <div class="cornerRibbons topAds">
                                            <a href="#">Negotiable</a>
                                         </div>
                                    @elseif($ad->featured == "Sponsored")
                                        <div class="cornerRibbons sponsored-ads">
                                            <a href="#">Sponsored</a>
                                         </div>                               
                                    @endif
                                    <div class="col-sm-2 no-padding photobox">
                                        <div class="add-image">
                                            <span class="photo-count"><i class="fa fa-camera"></i>
                                                <?php
                                                     echo $nuImagesBargains[$i];           
                                                    $i++;
                                                ?>
                                            </span> 
                                            <?php
                                                $thumbnail = 'assets/thumbnail.php?adid=$ad->adid';
                                            ?>
                                            <a href="<?php echo asset('/ad-details/');?><?php echo "/".$ad->adid; ?> ">
                                                <img id="tmbnail" class="sidepan thumbnail no-margin" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $ad->adid; ?>"  alt="{{$ad->title}} in Western Cape, {{$ad->location}}" filename="{{$ad->title}} in Western Cape,{{$ad->location}}" onerror="this.src='{{ url('images/no_image.jpg')}}'">
                                            </a>          
                                        </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-7 add-desc-box">
                                        <div class="add-details">
                                            <h5 class="add-title">
                                                <a href="<?php echo asset('/ad-details/');?><?php echo "/".$ad->adid; ?> ">
                                                    {{$ad->title}}
                                                </a>
                                            </h5>
                                            <span class="info-row">
                                                <?php
                                                    $promotionPlan = $ad->featured;
                                                    $symbol = "";
                                                    if($promotionPlan == "sponsored"){
                                                        $symbol = "S";
                                                        $promotionPlan = "Sponsored Ad";
                                                    }
                                                    else{
                                                        $symbol = "R";
                                                        $promotionPlan = "Regular Ad";
                                                    }
                                                ?>
                                                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="{{$promotionPlan}}">{{$symbol}}</span>
                                                <span class="date"><i class=" icon-clock"></i> {{ $ad->created_at->diffForHumans() }}</span> -
                                                <?php $category = $ad->catagory;
                                                    if($category == "Cars"){
                                                       $category =  "Used ".$category." for sale";
                                                    }else if($category == ""){
                                                        $category = "";
                                                    }
                                                    $MainCat = strtolower($ad->main_catagory);

                                                    if($MainCat == "property"){ ?>
                                                     <span class="category"> Property - {{ $category }}</span> -
                                                  <?php } else{ ?>
                                                  <span class="category"> {{ $category }}</span> -
                                                <?php }?>
                                                <span class="item-location">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{$ad->location}}, Western Cape
                                                </span> 
                                            </span>
                                        </div>
                                    </div>
                                    <!--/.add-desc-box-->
                                    <div class="col-sm-3 text-right  price-box">
                                        <h2 class="item-price">R{{$ad->price}} </h2>
                                        @if($ad->featured != "None")
                                        <a class="btn btn-danger  btn-sm make-favorite" > <i class="fa fa-certificate"></i> <span>{{$ad->featured}}</span>
                                        @endif
                                        </a> <a class="btn btn-default btn-sm make-favorite" id ="{{$ad->adid}}"> <i class="fa fa-heart"></i> <span>Save</span> </a>
                                    </div>
                                </div>                           
                                <!--/.item-list-->
                        @endforeach
                            </div>
                       </div>

                        <?php                                           
                            $hasView = "hasGridView";
                            if(count($sponsoredAds)%4 != 0){
                                $hasView = "";                                     
                            }  

                            $isActive = "";
                            if(isset($_GET['sponsored'])){
                                    $isActive = "active";
                            }      
                        ?>
                       <div role="tabpanel" class="tab-pane {{$isActive}}" id="tab3">
                            <div class="adds-wrapper {{ $hasView }} "> 
                                @if(count($sponsoredAds) < 1)
                                <div class="alert alert-success pgray  alert-lg icon-gl-message-warning"  style="border-radius: 0px; margin-right: 7px; margin-left: 7px; margin-top: 7px; padding-left:7%;">
                                    <h2 class="no-margin no-padding" style="font-size:16px;line-height: 20px;">{{$noSponsoredAdsMessage}}</h2>
                                </div>
                                @endif
                                @if(count($sponsoredAds)%4 != 0)
                                    <script type="text/javascript">               
                                                $('.grid-view').removeClass("active");
                                                $('.list-view').addClass("active");         
                                    </script>
                                @endif

                                <?php 
                                    $i =0; $j=0;     
                                    $view = "make-grid";
                                    if($nuSponsoredAds%4 != 0){
                                             $view = "";
                                             $height = "";
                                    }      
                                ?>                        
                                @foreach($sponsoredAds as $ad)       
                                <!--//I commented out this line on line 99 $('.hasGridView .item-list').addClass('make-grid');-->
                                <div class="item-list {{ $view }}" style="height:auto;">
                                    @if($ad->featured == "agent-ad")
                                        <div class="cornerRibbons urgentAds">
                                            <a href="#" style="color: #fff;display: block;font-family: Roboto Condensed, Helvetica, Arial, sans-serif;font-size: 12px;font-weight: normal;text-align: center;text-decoration: none;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.8);text-transform: uppercase;border: 1px solid rgba(255, 255, 255, 0.1);transition: all 0.3s ease 0s;"> Urgent Ad</a>
                                         </div>
                                    @elseif($ad->negotiable == "negotiable")
                                         <div class="cornerRibbons topAds">
                                            <a href="#">Negotiable</a>
                                         </div>
                                    @elseif($ad->featured == "sponsored")
                                        <div class="cornerRibbons sponsored-ads">
                                            <a href="#" style="color: #fff;display: block;font-family: Roboto Condensed, Helvetica, Arial, sans-serif;font-size: 12px;font-weight: normal;text-align: center;text-decoration: none;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.8);text-transform: uppercase;border: 1px solid rgba(255, 255, 255, 0.1);transition: all 0.3s ease 0s;">Sponsored</a>
                                         </div>                               
                                    @endif
                                    <div class="col-sm-2 no-padding photobox">
                                        <div class="add-image">
                                            <span class="photo-count"><i class="fa fa-camera"></i>
                                                <?php
                                                    $arryLength = count($sponsoredAds);
                                                      echo $nuImagesSponsoredAds[$i];           
                                                    $i++;
                                                ?>
                                            </span> 
                                            <?php
                                                $thumbnail = 'assets/thumbnail.php?adid=$ad->adid';
                                            ?>
                                            <a href="<?php echo asset('/ad-details/');?><?php echo "/".$ad->adid; ?> ">
                                                <img id="tmbnail" class="sidepan thumbnail no-margin" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $ad->adid; ?>"  alt="{{$ad->title}} in Western Cape, {{$ad->location}}" filename="{{$ad->title}} in Western Cape,{{$ad->location}}" onerror="this.src='{{ url('images/no_image.jpg')}}'">
                                            </a>          
                                        </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-7 add-desc-box">
                                        <div class="add-details">
                                            <h5 class="add-title">
                                                <a href="<?php echo asset('/ad-details/');?><?php echo "/".$ad->adid; ?> ">
                                                    {{$ad->title}}
                                                </a>
                                            </h5>
                                            <span class="info-row">
                                                <?php
                                                    $promotionPlan = $ad->featured;
                                                    $symbol = "";
                                                    if($promotionPlan == "sponsored"){
                                                        $symbol = "S";
                                                        $promotionPlan = "Sponsored Ad";
                                                    }
                                                    else{
                                                        $symbol = "R";
                                                        $promotionPlan = "Regular Ad";
                                                    }
                                                ?>
                                                <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="{{$promotionPlan}}">{{$symbol}}</span>
                                                <span class="date"><i class=" icon-clock"></i> {{ $ad->created_at->diffForHumans() }}</span> -
                                                <?php $category = $ad->catagory;
                                                    if($category == "Cars"){
                                                       $category =  "Used ".$category." for sale";
                                                    }else if($category == ""){
                                                        $category = "";
                                                    }
                                                    $MainCat = strtolower($ad->main_catagory);

                                                    if($MainCat == "property"){ ?>
                                                     <span class="category"> Property - {{ $category }}</span> -
                                                  <?php } else{ ?>
                                                  <span class="category"> {{ $category }}</span> -
                                                <?php }?>
                                                <span class="item-location">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{$ad->location}}, Western Cape
                                                </span> 
                                            </span>
                                        </div>
                                    </div>
                                    <!--/.add-desc-box-->
                                    <div class="col-sm-3 text-right  price-box">
                                        <h2 class="item-price">R{{$ad->price}} </h2>
                                        @if($ad->featured != "None")
                                        <a class="btn btn-danger  btn-sm make-favorite" > <i class="fa fa-certificate"></i> <span>{{$ad->featured}}</span>
                                        @endif
                                        </a> <a class="btn btn-default btn-sm make-favorite" id ="{{$ad->adid}}"> <i class="fa fa-heart"></i> <span>Save</span> </a>
                                    </div>
                                </div>                           
                                <!--/.item-list-->
                        @endforeach
                            </div>
                        </div>
                    </div>
                 
                    <!--/.adds-wrapper-->                        
                    <div class="tab-box  save-search-bar text-center">
                        <a href=""><i class=" icon-star-empty"></i>regular-ads</a>
                    </div>                                      
                </div> 

  @if(count($firstGallerySponsoredAds) > 5 )
                <div style = "margin-top:10px">
                    <div class="inner-box relative sponsored-ads-gallery" style="margin-bottom:8px; display:none">
    <h2 class="title-2">Sponsored Ads
        <a  class="link  pull-right carousel-nav prevItem"> <i class="icon-right-open-big"></i></a>
        <a  class="link pull-right carousel-nav prevItem"> <i class="icon-left-open-big"></i>
        </a>
    </h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="no-margin item-carousel owl-carousel owl-theme">
          
                    @foreach($secondGallerySponsoredAds as $sponsored)
                        <div class="item">
                            <a href="<?php echo asset('/ad-details/');?><?php echo "/".$sponsored->adid; ?> ">
                            <span class="item-carousel-thumb">
                                <img class="img-responsive" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $sponsored->adid; ?>">
                            </span>
                            <span class="item-name"> {{ $sponsored->title }}  </span>
                            <span class="price">R{{ $sponsored->price }} </span>
                            </a>
                        </div>
                   @endforeach
                  <?php 
                        $i = 1;
                        if(count($secondGallerySponsoredAds) == 1){
                            $i = 4;
                        }
                        else if(count($secondGallerySponsoredAds) == 2){
                            $i = 3;
                        }else if(count($secondGallerySponsoredAds) == 3){
                             $i = 2;
                        }else if(count($secondGallerySponsoredAds) == 4){
                            $i = 1;
                        }

                   ?>
                   @for($j = 0;  $j < $i; )
                       <div class="item">
                                <a href="">
                                <span class="item-carousel-thumb">
                                    <img class="img-responsive" src="<?php echo asset('images/here.jpg')?>">
                                </span>
                                <span class="item-name"> have your ad seen here for 2 weeks for</span>
                                <span class="price">R95</span>
                                </a>
                        </div>
                        <?php $j++; ?>
                    @endfor
               
            </div>
        </div>
    </div>
</div>
                </div>
                 @endif

          
                </script>

                <?php 

                    if(isset($_GET['page'])){ ?>
                        <script type="text/javascript">
                        $(document).ready(function(){
                           var owlitem = $(".item-carousel");
                            owlitem.owlCarousel({
                                //navigation : true, // Show next and prev buttons
                                navigation: false,
                                pagination: false,
                                items: 5,
                                itemsDesktopSmall: [979, 3],
                                itemsTablet: [768, 3],
                                itemsTabletSmall: [660, 2],
                                itemsMobile: [400, 2]
                            });
                        
                           if($(window).width() < 500 ){
                              var page = "<?php echo $_GET['page']; ?>";
                              var iterator = page*2;
                              
                              for(var i = 0;i<iterator; i++){
                                owlitem.trigger('owl.next');
                              }

                                
                            }

                            if($(window).width() > 900 ){
                               var page = "<?php echo $_GET['page']; ?>";
                               var iterator = page*5;
                              
                               for(var i = 0;i<iterator; i++){
                                  owlitem.trigger('owl.next');
                               }
                            }  
                           
                            var screenZise = $(window).width();
                            var iterator = 0;

                            if(screenZise <= 979 && screenZise > 660){
                                iterator = 3
                            }
                            else if(screenZise <= 660 ){
                                iterator = 2;
                            }else{
                                 iterator = 5
                            }

                            $(".nextItem").click(function () {
                                for(var i = 0;i<iterator; i++){
                                    owlitem.trigger('owl.next');
                                }
                                
                            })
                            $(".prevItem").click(function () {
                                for(var i = 0;i<iterator; i++){
                                    owlitem.trigger('owl.prev');
                                }
                            })            

                        });
                     
                     </script>   
                <?php } else { ?>
                    <script type="text/javascript">
                    
                        var owlitem = $(".item-carousel");
                        owlitem.owlCarousel({
                            //navigation : true, // Show next and prev buttons
                            navigation: false,
                            pagination: false,
                            items: 5,
                            itemsDesktopSmall: [979, 3],
                            itemsTablet: [768, 3],
                            itemsTabletSmall: [660, 2],
                            itemsMobile: [400, 2]
                        });

                            var screenZise = $(window).width();
                            var iterator = 0;

                            if(screenZise <= 979 && screenZise > 660){
                                iterator = 3
                            }
                            else if(screenZise <= 660 ){
                                iterator = 2;
                            }else{
                                 iterator = 5
                            }

                            $(".nextItem").click(function () {
                                for(var i = 0;i<iterator; i++){
                                    owlitem.trigger('owl.next');
                                }
                                
                            })

                            $(".prevItem").click(function () {
                                for(var i = 0;i<iterator; i++){
                                    owlitem.trigger('owl.prev');
                                }
                            })           

                    </script>
                <?php } ?>

                                         

                <?php         
                    $displayRegularAdsPagination = "";
                    $displayBargainsPagination = "";
                    $diplaySponsoredAdsPagination = "";

                    if(!isset($_GET['bargains']) && !isset($_GET['sponsored'])){
                        $diplaySponsoredAdsPagination = "display:none";
                        $displayBargainsPagination = "display:none"; 
                    }else if(isset($_GET['bargains'])){

                        $displayRegularAdsPagination = "display:none"; 
                        $diplaySponsoredAdsPagination = "display:none";       
                      
                    }else if(isset($_GET['sponsored'])){
                        $displayBargainsPagination = "display:none"; 
                        $displayRegularAdsPagination = "display:none"; 
                    }   
                ?>    
                  
                 
                    <div class="pagination-bar regular-ads-pagination text-center" style="{{$displayRegularAdsPagination}}">{{ $ads->links() }} </div>
                    <div class="pagination-bar bargains-pagination text-center" style="{{$displayBargainsPagination}}">{{ $bargainsPagination }} </div>
                    <div class="pagination-bar sponsored-ads-pagination text-center" style="{{$diplaySponsoredAdsPagination}}">{{ $sponsoredAdsPagination }} </div>
             
                  
                      
                    
                    <!--/.pagination-bar -->
                    <div class="post-promo text-center">
                        <h2>Got anything for sell ?</h2>
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
                            Popular <span class = "popular-locations"><strong>Suburbs</strong></span>
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
    <div class="modal fade second-modal" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            Popular <span class = "popular-locations"><strong>Suburbs</strong></span>
                            in Western Cape
                        </p>

                        <div style="clear:both"></div>
                        <div class="col-sm-6 no-padding province-select-container">
                            <select class="form-control selecter suburb-or-township" name="category" id="location-cat">
                                <div class = 'option-value'><option class = 'option-value' value="Suburbs">Suburbs</option></div>
                                <div class = 'option-value'><option  class = 'option-value' value="Townships">Townships</option></div>
                            </select>
                        </div>
                        <div style="clear:both"></div>

                        <hr class="hr-thin">
                    </div>
                    <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                    @include('partials/suburbsTownships')

                </div>
            </div>
        </div>
    </div>


    <?php if(isset($storedMainCategory)){ ?>


          <script type ="text/javascript">
    
         </script>

    <?php } ?>


    <?php if(isset($storedCategory)){ ?>


          <script type ="text/javascript">
        
         </script>

    <?php } ?>
</div>



@endsection
@section('scripts')
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ asset('selectorassets/js/vendors.min.js') }}"></script>

<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery-nicescroll.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.min.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.js') }}"></script>

<script src="{{ asset('assets/js/newscripts/ads.js') }}"></script>
<script type="text/javascript">
        styleCategoriesSelectBox();
        function styleCategoriesSelectBox(){
            path = "{{ url('main-categories') }}";
           
            $.ajax({
                url: path,
                type: 'GET',
                data: "",
                success:function(data){
                    var data = jQuery.parseJSON(data);
                    $.each(data, function(key, item) 
                    {   
                        $(".col-sm-3 .list").children().each(function (){
                            current_category =  $(this).text();

                            current_category = $.trim(current_category.replace(/-/g,''));

                            if(current_category == item.category){

                                  $(this).css('color','#16A085').css('cursor','default');
                            }
                        });
                    });      
                }    
            });
        }  
        //when the user clicks main_category
        $('.categories-list li').click(function(){
            
            //grab main category
            var title = $(this).attr('title');

            $('.categories-list').hide();
            $('.sub-categories-list2').show(); 
            $('.sub-categories-list2 .sub-categories-list').empty();
            $('.sub-categories-list2 .main-category-title').empty();

            //used to send a request to the main-category route
            var main_category_route = "{{ url('/ads/main-category/') }}";

            var url_title = encodeURIComponent(title.replace('&','and')).replace(/%20/g,'-').toLowerCase();

            //update title...just above sub-categories
            //send a request to main-category route
            $('.sub-categories-list2 .main-category-title').append("<strong><a href='"+main_category_route+"/"+url_title+"'>All "+title+"</a></strong>");

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
                      
                        $('.sub-categories-list2 .sub-categories-list').append('<li><a href='+route+"/"+sub_cat+'>'+item.subcategory_name+'</a><span class="count">('+item.nu_ads+')</span></li>');                       
                           $('#loading-categories').hide();
                    });
               }
            });
        });  
</script>

<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.min.js') }}"></script>
<!-- include custom script for site  -->
<script src="{{ asset('selectorassets/js/script.js') }}"></script>
@endsection

