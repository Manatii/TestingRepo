<div class="inner-box relative" style="margin-top:20px;">
    <h2 class="title-2">Sponsored Ads
        <a id="nextItem" class="link  pull-right carousel-nav"> <i class="icon-right-open-big"></i></a>
        <a id="prevItem" class="link pull-right carousel-nav"> <i class="icon-left-open-big"></i>
        </a>
    </h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="no-margin item-carousel owl-carousel owl-theme">
                @foreach($sponsoredAds as $sponsored)
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
            </div>
        </div>
    </div>
</div>