@extends('layouts.master')
@section('content')
<form method="post" action="/ads/search-item-cat-province">
   {{ csrf_field() }}


                
    <div class="search-row-wrapper">
        <div class="container text-center">
            <div class="col-sm-3">
                <input class="form-control keyword" required="required" type="text" {{old('searchItem')}} placeholder="e.g. Mobile Sale" name="searchItem">
            </div>
            <div class="col-sm-3">

             
                <select class="form-control" name="category" id="search-category"> 





                        <?php $i = 0; ?>
                        @foreach($categories as $cat)

                                

                             <option value="{{$cat->category}}" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled" >
                            - {{$cat->category}} -
                            </option>

                             @foreach($subCategories as $subCat)
                                
                                
                                    @if($subCat->category_id == $cat->cat_id)
                                    <option value="{{$subCat->subcategory_name}}">    
                                    {{$subCat->subcategory_name}}</option>
                                    @endif
                               
                               
                             @endforeach
                         
                        @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="prov" id="id-location">
                        <option class = "province"  value="All Provinces">All Provinces</option>
                        <option class = "province" selected="selected" value="Western Cape">Western Cape</option>
                        <option class = "province" value="Eastern Cape">Eastern Cape</option>
                        <option class = "province" value="KwaZulu-Natal">KwaZulu-Natal</option>
                        <option class = "province" value="Northen Cape">Northen Cape</option>
                        <option class = "province" value="Gauteng">Gauteng</option>
                        <option class = "province" value="North West">North West</option>
                        <option class = "province" value="Limpopo">Limpopo</option>
                        <option class = "province" value="Free State">Free State</option>
                        <option class = "province" value="Mpumalanga">Mpumalanga</option>
                     
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
                            <div class="categories-list list-filter">
                               <h5 class="list-title"><strong><a href="#"> All Categories</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                  <?php $i =0;

                                  

                                   ?>
                               
                                   @foreach($categories as $category)
                                   <!--  <a href="/ads/catagory/{{strtolower(str_replace('+','-',urlencode($category->category)))}}"><span
                                            class="title" > </span><span class="

                                            count" >
                                            <?php
                                              //  echo"99";
                                               // echo "(89)";
                                                //echo $adsPerCatagory[$i];
                                              // echo   $adsPerCatagory[$i];
                                              //   $i++;
                                            

                                            
                                            ?>
        
                                            

                                          

                                            </span></a>   -->
                                     <li id = '{{$category->cat_id}}' style="cursor:pointer;padding: 2px 15px 2px 5px;">{{$category->category }}</li>
                                   @endforeach

                                </ul>


                             


                            </div>


                            <!--/.categories-list-->
                 
                          <div class="sub-categories-list2  list-filter" >
                                <h5 style="cursor:pointer;" class="list-title all-categories"><strong><i class="fa fa-angle-left"></i>
                                    All Categories</strong></h5>
                                <ul class=" list-unstyled">
                                    <li><a href="#"><span class="title"><strong></strong></span><span class="count">&nbsp;86626</span></a>
                                        <ul class="list-unstyled townships-list long-list">
                                            
                                        </ul></a></p>
                                    </li>
                                </ul>
                            </div>
                     
                            <!--/.locations-list-->

                            

                            <div class="locations-list list-filter">
                                   <h5 class="list-title"><strong><a href="#"> Popular Townships</a></strong></h5>
                                <ul  class="browse-list list-unstyled long-list">
                                <?php $i =0; ?>
                                   @foreach($locations as $location)
                                     <li><a href="/ads/location/{{strtolower(str_replace('+','-',urlencode($location->township)))}}"><span
                                            class="title" >{{$location->township }}</span><span class="

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
                           

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-3 no-padding">
                                        <button class="btn btn-default pull-right btn-block-xs" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="sub-category-sub-location.html"><strong>All Ads</strong> <span
                                            class="count">228,705</span></a></li>
                                    <li><a href="sub-category-sub-location.html">Bagains/Cheap<span
                                            class="count">28,705</span></a></li>
                                    <li><a href="sub-category-sub-location.html">Featured Ads<span
                                            class="count">18,705</span></a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="sub-category-sub-location.html">New <span class="count">228,705</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html">Used <span class="count">28,705</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html">None </a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                            <div style="clear:both"></div>
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
                                <li class="active"><a href="#allAds" role="tab" data-toggle="tab">All Ads <span
                                        class="badge">228,705</span></a></li>
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
                                        Townships
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


                        <div class="adds-wrapper hasGridView">
                            <?php 
                                
                                
                                 ?>

                                  <?php  $nu_ads = count($ads);  ?>

                                 

                                 @if( $nu_ads <1)


            <div class="alert alert-success pgray  alert-lg icon-gl-message-warning"  style="border-radius: 0px; margin-right: 7px; margin-left: 7px; margin-top: 7px; padding-left:7%;">
                                    <h2 class="no-margin no-padding" style="font-size:16px;
    line-height: 20px;">Sorry, but we din't find any results for your search criteria. Don't panic, this site is new :) </h2> </div>
    
    @endif

    <?php $i =0; $j=0; ?>
    @foreach($ads as $ad)

        <div class="item-list make-grid" style="height:auto">
            @if($ad->featured == "agent-ad")
                <div class="cornerRibbons urgentAds">
                <a href="#"> Urgent Ad</a>
                 </div>
            @elseif($ad->featured == "bagain")
                 <div class="cornerRibbons topAds">
                    <a href="#">Bagain</a>
                 </div>
            @elseif($ad->featured == "Sponsored Ads Gallery")
                <div class="cornerRibbons featuredAds">
                    <a href="#"> Sponsored</a>
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
            <h5 class="add-title"><a href="ads-details.html">
                {{$ad->title}}</a></h5>
            <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip"
                                          data-placement="right" title="Business Ads">B </span> <span class="date"><i
                    class=" icon-clock"> </i> {{ $ad->created_at->diffForHumans() }} </span> - <span class="category">{{$ad->catagory}} </span>- <span
                    class="item-location"><i class="fa fa-map-marker"></i> {{$ad->township}} </span> </span></div>
    </div>
    <!--/.add-desc-box-->
    <div class="col-sm-3 text-right  price-box">
        <h2 class="item-price">R {{$ad->price}} </h2>
        <a class="btn btn-danger  btn-sm make-favorite" > <i class="fa fa-certificate"></i> <spanFeatured Ads</span>
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

                     <div class="inner-box relative" style="margin-top:20px;">
                        <h2 class="title-2">Sponsered ads

                            <a id="nextItem" class="link  pull-right carousel-nav"> <i class="icon-right-open-big"></i></a>
                            <a id="prevItem" class="link pull-right carousel-nav"> <i class="icon-left-open-big"></i>
                            </a>

                        </h2>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="no-margin item-carousel owl-carousel owl-theme">
                                    <div class="item"><a href="ads-details-automobile.html">
                     <span class="item-carousel-thumb"> 
                        <img class="img-responsive" src="{{ asset('images/auto/2012-mercedes-benz-sls-amg.jpg') }}" alt="img">
                     </span>
                                        <span class="item-name"> 2011 Mercedes-Benz SLS AMG  </span>
                                        <span class="price">  $204,990 </span>
                                    </a>
                                    </div>

                                    <div class="item"><a href="ads-details.html">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="{{ asset('images/item/tp/Image00006.jpg') }}"
                                                                                alt="img"> </span>
                                        <span class="item-name"> consectetuer adipiscing elit </span>
                                        <span class="price"> $ 240 </span></a></div>


                                    <div class="item"><a href="ads-details.html">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="{{ asset('images/item/tp/Image00022.jpg') }}"
                                                                                alt="img"> </span> <span
                                            class="item-name"> sed diam nonummy  </span> <span
                                            class="price"> $ 140</span></a></div>

                                    <div class="item"><a href="ads-details.html">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="{{ asset('images/item/tp/Image00013.jpg') }}"
                                                                                alt="img">  </span><span
                                            class="item-name"> feugiat nulla facilisis  </span> <span class="price"> $ 140 </span></a>
                                    </div>

                                    <div class="item"><a href="ads-details.html">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="{{ asset('images/item/FreeGreatPicture.com-46404-google-drops-nexus-4-by-100-offers-15-day-price-protection-refund.jpg') }} "
                                                                                alt="img"> </span> <span
                                            class="item-name"> praesent luptatum zzril  </span> <span class="price"> $ 220 </span></a>
                                    </div>

                                    <div class="item"><a href="ads-details.html">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="{{ asset('images/item/FreeGreatPicture.com-46405-google-drops-price-of-nexus-4-smartphone.jpg') }}"
                                                                                alt="img"> </span> <span
                                            class="item-name"> delenit augue duis dolore  </span> <span class="price"> $ 120 </span></a>
                                    </div>

                                    <div class="item"><a href="ads-details.html">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="{{ asset('images/item/FreeGreatPicture.com-46407-nexus-4-starts-at-199.jpg') }}"
                                                                                alt="img"> </span> <span
                                            class="item-name"> te feugait nulla facilisi </span> <span class="price"> $ 251 </span></a>
                                    </div>
                                </div>
                                <a href="" style="float:right; margin-right:1%;">View All</a>
                            </div>
                        </div>


                    </div>


                     @if( $nu_ads <= 4)

                     <div class="category-list">
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" role="tablist">
                                <li class="active"><a href="#allAds" role="tab" data-toggle="tab">Top Ads <span
                                        class="badge">228,705</span></a></li>
                            </ul>
                            <div class="tab-filter">
                                <select class="selectpicker" data-style="btn-select" data-width="auto">
                                    <option>Short by</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                        <!--/.tab-box-->

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                                <div class="breadcrumb-list"><a href="#" class="current"> <span>Top ads And Bagains</span></a> </div>
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
                                        Townships
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

                        <?php $i = 0; ?>
                        <div class="adds-wrapper hasGridView">
                            @foreach($topAdsAndBargains as $topAd)
                                   <div class="item-list make-grid" style="height:auto">
            @if($topAd->featured == "agent-ad")
                <div class="cornerRibbons urgentAds">
                <a href="#"> Urgent Ad</a>
                 </div>
            @elseif($topAd->featured == "bagain")
                 <div class="cornerRibbons topAds">
                    <a href="#">Bagain</a>
                 </div>
            @elseif($topAd->featured == "Sponsored Ads Gallery")
                <div class="cornerRibbons featuredAds">
                    <a href="#"> Sponsored</a>
                 </div>
           
            @endif

    <div class="col-sm-2 no-padding photobox">
        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i>
        <?php
           $arryLength = count($topAdsAndBargains);
             echo $nuImagesPerTopAd[$i];  
                $i++;
        ?>



         </span> 
                <?php
                    $thumbnail = 'assets/thumbnail.php?adid=$ad->adid';
                ?>

               
                <a href="<?php echo asset('/ad-details/');?><?php echo "/".$topAd->adid; ?> ">

                <img id="tmbnail" class="thumbnail no-margin" src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $topAd->adid; ?>"  alt="Image not found" onerror="this.src='{{ url('images/no_image.jpg')}}'"    data-zoom-image= '{{ url('images/user_images/$topAd->name')}}'>

                </a>          
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-7 add-desc-box">
        <div class="add-details">
            <h5 class="add-title"><a href="ads-details.html">
                {{$topAd->title}}</a></h5>
            <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip"
                                          data-placement="right" title="Business Ads">B </span> <span class="date"><i
                    class=" icon-clock"> </i> {{ $topAd->created_at->diffForHumans() }} </span> - <span class="category">{{$topAd->catagory}} </span>- <span
                    class="item-location"><i class="fa fa-map-marker"></i> {{$topAd->township}} </span> </span></div>
    </div>
    <!--/.add-desc-box-->
    <div class="col-sm-3 text-right  price-box">
        <h2 class="item-price">R {{$topAd->price}} </h2>
        <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <spanFeatured Ads</span>
        </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a>
    </div>
</div>
                            <!--/. item-list make-grid-->
                            @endforeach
                        </div>
                        <!--/.adds-wrapper-->

                          

                        <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                            Save Search </a></div>
                    </div>
                    @endif


                    <div class="pagination-bar text-center">{{ $ads->links() }} </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Do you get anything for sell ? </h2>
                        <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                        <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
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

                        <p>Popular cities in <strong>New York</strong>
                        </p>

                        <div style="clear:both"></div>
                        <div class="col-sm-6 no-padding">
                            <select class="form-control selecter" id="region-province" name="region-state">
                                <option value="Western Cape">Western Cape</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="Mpumalanga">Mpumalanga</option>
                                <option value="North West">North West</option>
                                <option value="Northern Cape">Northern Cape</option>
                                <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                                <option value="Free State">Free State</option>
                                <option value="Limpopo">Limpopo</option>                                                      
                            </select>
                        </div>
                        <div style="clear:both"></div>

                        <hr class="hr-thin">
                    </div>
                    <div class="col-md-12 "  id = "location-link">
                     <ul class='col-md-12'>
                     </ul>                        
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

<script type="text/javascript">
   

      var province = "";
      var loc = "";


        function generateSlug(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }

        $('#btn-search').click(function(){
            var province = $('#id-location').val();
            localStorage.setItem('storedProvince',  province);

            var category = $('#search-category').val();
            localStorage.setItem('storedCategory', category);

            var keyword = $('.keyword').val();
            localStorage.setItem('storedKeyword', keyword);

            // On the pages that have the select box

            var loadedCategory = localStorage.getItem('storedCategory');

        })

        $(document).ready(function(){



            var loadedProvince = localStorage.getItem('storedProvince');
            province = $('#id-location').val();              
            $("select option[value='"+loadedProvince+"']").attr("selected","selected");  

            var category = $('#search-category').val();            
            var loadedCategory = localStorage.getItem('storedCategory');

             $('.keyword').val(localStorage.getItem('storedKeyword'));

            $("select option[value='"+loadedCategory+"']").attr("selected","selected");






            province = $('#id-location').val();
            $("select option[value='"+ province+"']").attr("selected","selected");

           
            

            path = "{{ url('locations') }}"+"/"+province;
             $.ajax({
                url: path,
                type: 'GET',
                data: {province:province},
                success:function(data){

                    var data = jQuery.parseJSON(data);
                    $.each(data, function(key, item) 
                    {

                     // $("#location-link").append("<li class='col-md-3'><a class='info_link' href='#' title='"+item.township+"'>"+item.township+"</a></li>");       
                     
                    });
               }
            });

        });


        $('.navbar-header').click(function(){
             localStorage.removeItem('storedCategory');
             localStorage.removeItem('storedProvince');
             localStorage.removeItem('storedKeyword');
        })
           
        
         
        
    

        $('#region-province').on('change',function(){
            province = $('#region-province').val();

            path = "{{ url('locations') }}"+"/"+province;
             $.ajax({
                url: path,
                type: 'GET',
                data: {province:province},
                success:function(data){

                    

                    var data = jQuery.parseJSON(data);

                    var townshipsArray = [];
                     $(".location-li").remove(); 
                    $.each(data, function(key, item) 
                    { 

                        var first_letter = item.township.charAt(0);
                       
                        
                      
                        if(townshipsArray.indexOf(first_letter) ==-1){
                            townshipsArray.push(first_letter);
                        }       


                             

                        function asc_sort(a, b){
                            return ($(b).text()) < ($(a).text()) ? 1 : -1;    
                        }  

                        
                             $("#location-link ul").append("<li class='location-li' ><a style ='color: #4e575d;font-size: 12px;font-style: normal;line-height: normal;padding: 3px 0;transition: all 0.1s ease 0s;'class='info_link col-md-4' href='#' title='"+item.township+"'>"+item.township.charAt(0).bold()+item.township.slice(1)+"</a></li>");   
                         

                       
       
                    });

               
                

                }           

                  
                
            });
        });




         $('.province').click(function(){
            alert("DSFDSFDS");
        });

  
  $( "#location-link" ).delegate( "a", "click", function() {
        loc = generateSlug($(this).attr('title'));
 });

       


        $('#location-link').click(function(){
            var searchItem = generateSlug($(".keyword").val());

            province = generateSlug(province );
           
            var catagory =  generateSlug($('#search-category').val());
         
            var route = "{{ url('search-item-loc-cat-prov') }}"+"/"+searchItem+"/"+loc+"/"+catagory+"/"+province;

             $('location-link').val()

             $('.modal-content').hide();


             window.location.href = route;  
            $('.cityName').append(location);
           
        });  
       
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


       // $('.item-list.make-grid').hover(function(){
       //      $(this).addClass('w3-opacity-max');

       // });
   
        
       

    





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

  @if( $nu_ads < 4)

                                   <script type="text/javascript">
                                   
   

                                        $(window).load(function(e){
                                            e.preventDefault();
                                            $('.item-list').removeClass("make-grid");
                                            $(function () {
                                            $('.item-list').matchHeight('remove');
                                             });

                                        }) 
                                 

                                       
                                       
                                   </script>

                                   @endif

@endsection