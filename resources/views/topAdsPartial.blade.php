 <div class="category-list">
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" role="tablist">
                                <li class="active"><a href="#allAds" role="tab" data-toggle="tab">Top Ads <span
                                        class="badge"><?php echo count($topAdsAndBargains) ?></span></a></li>
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