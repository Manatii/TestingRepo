                            
                            @if($no_ads_message != null)
                                <div class="alert alert-success pgray  alert-lg icon-gl-message-warning"  style="border-radius: 0px; margin-right: 7px; margin-left: 7px; margin-top: 7px; padding-left:7%;">
                                    <h2 class="no-margin no-padding" style="font-size:16px;line-height: 20px;">{{$no_ads_message}}</h2>
                                </div>
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
                            <!--//I commented out this line on line 99 $('.hasGridView .item-list').addClass('make-grid');-->
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
                                                if($promotionPlan == "Sponsored"){
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
                                    <a class="btn btn-danger  btn-sm make-favorite" > <i class="fa fa-certificate"></i> <span></span>
                                    @endif
                                    </a> <a class="btn btn-success btn-sm make-favorite" id ="{{$ad->adid}}"> <i class="fa fa-heart"></i> <span>Save</span> </a>
                                </div>
                            </div>
                            <!--/.item-list-->
                        @endforeach                       
                    