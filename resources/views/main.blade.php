@extends('layouts.master')
@section('pagetitle')
  <title>KASOCULAR - Home</title>
@endsection
@section('content')
<div class="intro" style="background-image: url(images/capetown4.jpg);">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <form action ="ads/loc-search-item" method="get">
                        {{ csrf_field() }}
                        <h1 class="intro-title animated fadeInDown"> Find Classified Ads </h1>

                        <p class="sub animateme fittext3 animated fadeIn">in Western Cape with Kasocular in minutes</p>
                        <div class="row search-row animated fadeInUp">
                            <div class="col-lg-4 col-sm-4 search-col relative locationicon">
                                <i class="icon-location-2 icon-append"></i>
                                <a href='#selectRegion' id='dropdownMenu1'
                                                                                      data-toggle='modal'><input type="text" name="city" maxlength="25" required="" autocomplete='off' id="autocomplete-ajax"
                                       class="form-control locinput input-rel searchtag-input has-icon"
                                       placeholder="Province / Township / Suburb......" value=""> 
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

    <div class="main-container" >
        <div class="container"  >
            
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

        
       
            <div class="col-lg-12 content-box sponsored-ads-container sponsored-ads-desktop" style="margin-bottom:8px; ">
                <div class="row row-featured"  >
                    <div class="col-lg-12  box-title " >
                        <div class="inner"><h2><span>Sponsored </span>
                            Products <a href="#" class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>


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

       
           <div class="col-sm-9 page-content col-thin-right categories-mobile">
                    <div class="inner-box category-content" style="margin-bottom:8px;">
                        <h2 class="title-2" id ="browse-by-cat">Find Classified Ads Country Wide </h2>

                        <div class="row cat-row" style="">

                      <?php $i = 0; ?>

                       @foreach($categories as $category)
                        <div class="cat-list col-md-4 col-sm-4 " style="height:auto;">
                                <h3 class="cat-title">  <a href="/ads/main-category/{{strtolower(str_replace('%26','and', str_replace('+','-',urlencode($category->category))))}}"><i class="fa {{$category->class}} ln-shadow"></i>
                                       <span class ='main-cat'>{{ $category->category }}</span> <span class="count">{{ $adsPerCategory[$i] }}</span> </a>

                                        <span data-target=".cat-id-{{$i}}" data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class="icon-down-open-big"></span> </span>
                                </h3>
                                <ul class="cat-collapse collapse in cat-id-{{$i}} ">
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

                    
                </div>




            <div class="col-lg-12 content-box categories-desktop" >

                 


                <div class="row row-featured row-featured-category ">
                    <div class="col-lg-12  box-title no-border">
                        <div class="inner"><h2><span>Browse by</span>
                            Category <a href="#" class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>
                        </div>
                    </div>                   
                     @foreach($categories as $category)
                           <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
                            <a href="/ads/main-category/{{strtolower(str_replace('+','-',urlencode($category->category)))}}"><img src = '{{"images/category/".$category->category_image}}' class="img-responsive" alt="img">
                                <h6> {{$category->category}}</h6></a>
                        </div>
                    @endforeach


                    

                </div>


            </div>

            <div style="clear: both"></div>

            


            <div class="col-lg-12 content-box ">
                <div class="row row-featured">

                    <div style="clear: both"></div>

                    <div class=" relative  content  clearfix">


                        <div class="">
                            <div class="tab-lite">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs " role="tablist">
                                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1"
                                                                              role="tab" data-toggle="tab"><i
                                            class="icon-location-2"></i>Browse by Locations</a></li>
                                    
                                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab"
                                                               data-toggle="tab"><i class="icon-th-list"></i>Browse By Province</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab1">
                                          <select class="form-control selecter" id="province" name="region-state" style="width:199px; margin-top:14px; margin-bottom: 10px; margin-left:4%;">
                                            <option  value="Western Cape,suburbs">Western Cape,suburbs</option>
                                            <option  value="Western Cape,townships">Western Cape,townships</option>                              
                                        </select>
                                    <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                                        <div class="col-lg-12 tab-inner location-link" style="padding-top:0px;">

                          





                                            <div class="row">
                                                     <?php $i = 0 ?> 
                                                     <ul id = "locations"  class = "cat-list col-md-12 ">
                                                      @foreach($locations as $location)                                  
                                                       
                                                           
                                                
                                                            <li class="location-li"><a class = "col-md-3 col-xs-6" href="/ads/location/{{strtolower(str_replace('+','-',urlencode($location->township)))}}">{{$location->township}}</a></li>

                                                             

                                                       
                                                      
                                                            
                                                        
                                                      @endforeach
                                                        </ul>
                                                   
                                                

                                                

                                            </div>

                                        </div>


                                    </div>
                                   
                                    <div role="tabpanel" class="tab-pane" id="tab3">

                                        <div class="col-lg-12 tab-inner">

                                            <div class="row">
                                                <ul class="cat-list cat-list-border col-md-12 ">
                                                    @foreach($provinces as $province)                                     
                                                       <li class="province-li"><a class = "col-md-3" href="category.html">{{$province->province}}</a></li>
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
            <div class="row">
                <div class="col-sm-9 page-content col-thin-right categories-desktop2">
                    <div class="inner-box category-content">
                        <h2 class="title-2" id ="browse-by-cat">Find Classified Ads Country Wide </h2>

                    
                        <div class = "col-md-4 col-xs-6 column1" style="height:auto;">
                            
                        </div>
                        <div class = "col-md-4  col-xs-5 column2" style="height:auto;">
                            
                        </div>
                        <div class = "col-md-4  col-xs-6 column3" style="height:90px">
                           
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

    <div class="page-info hasOverly" style="background: url(images/bg.jpg); background-size:cover">
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

                     <div  id="loading-locations" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                     
                    <div class="col-md-12 location-link">
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
<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="assets/js/jquery/jquery-latest.js"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/BootstrapTypeahead/bootstrap3-typeahead.js')}}"></script>
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



<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>


<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
</script>
@endsection
