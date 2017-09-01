@extends('layouts.master')
@section('pagetitle')
  <title>KASOCULAR - Ads Details</title>
@endsection
@section('content')
    <div class="main-container">
        <div class="container">
            <ol class="breadcrumb pull-left">
                <li><a href="http://localhost:8000"><i class="icon-home fa"></i></a></li>
                <li><a href="{{url('/ads')}}">All Ads</a></li>
                <li>
                    <?php
                        $adid = "";
                        $catagory = "";
                        $title = "";
                        $township = "";
                        $description = "";
                        $price = "";
                        $posted_on = "";
                        $featured = "";
                        $negotiable = "";
                        $main_category = " ";
                        foreach ($adDetails as $details) {
                            $adid = $details->adid;
                            $catagory = $details->catagory;
                            $title = $details->title;
                            $location = $details->location;
                            $description = $details->description;
                            $price = $details->price;
                            $posted_on = $details->created_at;
                            $featured = $details->featured;
                            $main_category =  $details->main_catagory;
                            $negotiable = $details->negotiable;
                        }

                    ?>

                    <?php 
                    $name = "";
                    $phonenumber = "";
                    $joined_in = "";
                    $avator = "";
                    $facebook_profile_url = "";
                    $email = " ";

                    foreach ($userDetails as $userDetail){
                        $name =$userDetail->name;
                        $phonenumber = $userDetail->phonenumber;
                        $joined_in = $userDetail->created_at;
                        $avator = $userDetail->avator;
                        $facebook_profile_url = $userDetail->facebook_profile_url;
                        $email =  $userDetail = $userDetail->email;
                        # code...
                    }

                ?>
                    <a href="/ads/main-category/{{strtolower(str_replace('+','-',urlencode($main_category)))}}">
                        {{  $main_category }}
                    </a>
                </li>
                <li class="active"> {{ $catagory}}</li>
            </ol>
            <div class="pull-right backtolist"><a href="{{ url()->previous() }}"> <i
                    class="fa fa-angle-double-left"></i>Back to Results</a></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h2> {{$title}}
                            <small class="label label-default adlistingtype">
                                @if($negotiable === "negotiable")
                                 {{ "Negotiable" }}
                                @elseif($featured === "None")
                                {{ "Regular ad"}}
                                @else
                                {{ "Sponsored" }}
                                @endif
                            </small>
                        </h2>
                        <span class="info-row"> <span class="date"><i class=" icon-clock"> </i>  {{ $posted_on->diffForHumans() }}</span> - <span
                                class="category">{{$catagory}} </span>- <span class="item-location"><i
                                class="fa fa-map-marker"></i> {{$location}} </span> </span>
                                
                        

                        <div id="demo-test-gallery" class="ads-image fancy-box">
                              
                            <h1 class="pricetag"> R{{$price}}</h1>
                                                       
                            <?php $i = 0; 
                                $previewImage = "";
                                foreach ($images as $key) { ?>
                                    
                            <?php  $previewImage = $key->name1; } 

                                    $imagesize = "";

                            ?>

                           

                               
                            <ul class="bxslider"> 

                                @foreach($images as $image)
                                    
                                    <?php

                                        $imageName = $image->name1;
                                        $extension = "";
                                        $i = strrpos($imageName,".");
                                        if (!$i) { $extension = ""; } 
                                        $l = strlen($imageName) - $i;
                                        $extension = substr($imageName,$i+1,$l);
                                        $extension = strtolower($extension);
                                      
                                        $fetchedImage = "";

                                        if($extension == "jpg" || $extension == "jpeg" ){
                                            $fetchedImage = imagecreatefromjpeg("images/user_images/".$image->name1);
                                        }else if($extension == "png"){
                                            $fetchedImage = imagecreatefrompng("images/user_images/".$image->name1);
                                        }else{
                                            $fetchedImage = imagecreatefromgif("images/user_images/".$image->name1);
                                        }

                                        $imageWidth = imagesx($fetchedImage);
                                        $imageHeight = imagesy($fetchedImage);
                                        $dimension = $imageWidth."x".$imageHeight;
                                        // var_dump("Width".$imageWidth."---Height".$imageHeight); die();

                                    ?>

                   <a  data-fancybox-group="button" data-size="{{$dimension}}" data-med-size="{{$dimension}}" class="fancybox-button demo-gallery__img--main" href="<?php echo asset('images/user_images')?><?php echo "/".$image->name1; ?>" >
                        <div class="zoom_in" style="display:none;height:50px;width:60px; position:absolute; z-index:100;top: 10px;"> 
                                <img src="{{ asset('images/zoom_in.png') }}" style="height:23px;width:30px; margin-left:13px; opacity:0.6;">
                        </div>     
                     <img width="100%" height="496" src="<?php echo asset('images/user_images')?><?php echo "/".$image->name1; ?>" alt="img">
                   </a>

                                @endforeach
                           </ul>


                            <div id="bx-pager">

                            <?php $i = 0; foreach ($images as $key) { ?>
                                    <a class="thumb-item-link" data-slide-index="<?php echo $i; ?>" href="#">
                                       <img src="<?php echo asset('images/user_images')?><?php echo "/".$key->name1; ?>" alt="img">
                                    </a>
                                

                            <?php $i++; }  ?>              
                        </div>
                        </div>
                        <!--ads-image-->

                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Ads Details</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <p> {{ $description }} </p>
                                  
                                    
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong>Price:</strong> R {{$price}}</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Category:</strong> {{ $catagory }} </p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Township:</strong> {{ $location }} </p>
                                            </li>
                                            <li>
                                                <p class=" no-margin "><strong>Seller's phonumber:</strong> {{$phonenumber}}</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Posted:</strong> {{ date('d F Y', strtotime($posted_on)) }}</p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li><a href="#"> <i class=" fa fa-user"></i> More ads by User </a></li>
                                            <li><a href="#" class ='saved-ad' id = "{{ $adid }}"> <i class=" fa fa-heart"></i> Save ad </a></li>
                                            <li><a href="#"> <i class="fa fa-share-alt"></i> Share ad </a></li>
                                            <li><a href="#reportAdvertiser" data-toggle="modal"> <i
                                                    class="fa icon-info-circled-alt"></i> Report ad </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer text-left">

                             @if($facebook_profile_url != null)                            
                            <a href="{{$facebook_profile_url}}" class="btn  btn-default" style="background-color:#4267b2;"
                                                                    ><i
                                    style ="font-size:15px; margin-right:6px;" class="fa fa-facebook-f"></i> Send a message </a>
                            @endif
                                     <a href="#contactAdvertiser" class="btn  btn-default" data-toggle="modal"
                                                                    ><i
                                    class=" icon-mail-2"></i> Send a message </a>
                                     <a class="btn  btn-info"><i
                                    class=" icon-phone-1"></i> {{ $phonenumber }} </a>
                                    </div>
                        </div>
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                

                <div class="col-sm-3  page-sidebar-right">
                    <aside>
                        <div class="panel sidebar-panel panel-contact-seller">
                            <div class="panel-heading">Contact Seller</div>
                            <div class="panel-content user-info">
                                <div class="panel-body text-center">
                                  <img class="userImg" src="{{$avator}}" alt="user" style="width:80px;height:75px;" onerror="this.src='{{ url('images/user.jpg')}}'"></a></h3>
                                    <div class="seller-info">

                                        
                                      
                                        <h3 class="no-margin">{{$name}}</h3>

                                        <p>Phonenumber: <strong>{{ $phonenumber }}</strong></p>

                                        <p> Joined: <strong> {{ date('d F Y', strtotime($joined_in)) }}</strong></p>
                                    </div>
                                    <div class="user-ads-action">
                                    @if($facebook_profile_url != null)
                                    <a href="{{ $facebook_profile_url }}" 
                                            class="btn  btn   btn-default btn-block" style="background-color:#4267b2; "><i style ="font-size:15px; margin-right:6px;" class="fa fa-facebook-f">  </i>                     Send a message </a>
                                    @endif

                                    <a href="#contactAdvertiser" data-toggle="modal"
                                                                    class="btn   btn-default btn-block"><i
                                            class=" icon-mail-2"></i> Send a message </a><a
                                            class="btn  btn-info btn-block"><i class=" icon-phone-1"></i> {{$phonenumber}}
                                    </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel sidebar-panel">
                            <div class="panel-heading">Safety Tips for Buyers</div>
                            <div class="panel-content">
                                <div class="panel-body text-left">
                                    <ul class="list-check">
                                        <li> Meet seller at a public place</li>
                                        <li> Check the item before you buy</li>
                                        <li> Pay only after collecting the item</li>
                                    </ul>
                                    <p><a class="pull-right" href="#"> Know more <i
                                            class="fa fa-angle-double-right"></i> </a></p>
                                </div>
                            </div>
                        </div>
                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
            </div>
        </div>
    </div>
    @endsection
   


@section('modals')



<div class="modal fade" id="reportAdvertiser" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="fa icon-info-circled-alt"></i> There's something wrong with this ads?
                </h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="report-reason" class="control-label">Reason:</label>
                        <select name="report-reason" id="report-reason" class="form-control">
                            <option value="">Select a reason</option>
                            <option value="soldUnavailable">Item unavailable</option>
                            <option value="fraud">Fraud</option>
                            <option value="duplicate">Duplicate</option>
                            <option value="spam">Spam</option>
                            <option value="wrongCategory">Wrong category</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="control-label">Your E-mail:</label>
                        <input type="text" name="email" maxlength="60" class="form-control" id="recipient-email">
                    </div>
                    <div class="form-group">
                        <label for="message-text2"  <?php if($email == null){ echo "disabled"; } ?>class="control-label">Message <span class="text-count">(300) </span>:</label>
                        <textarea class="form-control" name = 'message-text2' id="message-text2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Send Report</button>
            </div>
        </div>
    </div>
</div>

<!-- /.modal -->

<!-- Modal contactAdvertiser -->

<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class=" icon-mail-2"></i> Contact advertiser </h4>
            </div>
            <div class="modal-body">
                <form role="form" action='{{url("sendmail")}}' method="post">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Name:</label>
                        <input class="form-control required" name='name' id="recipient-name" placeholder="Your name"
                               data-placement="top" data-trigger="manual"
                               data-content="Must be at least 3 characters long, and must only contain letters."
                               type="text">
                    </div>
                    <div class="form-group">
                        <label for="sender-email" class="control-label">E-mail:</label>
                        <input id="sender-email" type="text"
                               data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual"
                               data-placement="top" placeholder="email@you.com"  name='email' class="form-control email">
                    </div>
                    <div class="form-group">
                        <label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
                        <input type="text" maxlength="60" class="form-control" id="recipient-Phone-Number" name='phonenumber'>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
                        <textarea class="form-control" id="message-text" placeholder="Your message here.."
                                  data-placement="top" name = 'message' data-trigger="manual"></textarea>
                    </div>
                    <div class="form-group">
                        <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
                            valid. </p>
                    </div>
                    <input type = 'text' hidden="true" value="{{$email}}" name='seller-email'>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success pull-right">Send message!</button>
            </div>
             </form>
        </div>
    </div>
</div>

<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

          <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
          </div>

          <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>


            <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip">
                    <!-- <a href="#" class="pswp__share--facebook"></a>
                    <a href="#" class="pswp__share--twitter"></a>
                    <a href="#" class="pswp__share--pinterest"></a>
                    <a href="#" download class="pswp__share--download"></a> -->
                </div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center">
              </div>
            </div>
          </div>

        </div>


    </div>
    
  

@endsection

<!-- /.modal -->


<!-- Le javascript
================================================== -->
@section('scripts')

<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- include carousel slider plugin  -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- include equal height plugin  -->
<script src="{{ asset('assets/js/jquery.matchHeight-min.js') }}"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="{{ asset('assets/js/hideMaxListItem.js') }}"></script>

<!-- bxSlider Javascript file -->
<script src="{{ asset('assets/plugins/bxslider/jquery.bxslider.min.js') }}"></script>
<script>
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });


     $('.saved-ad').click(function(){

       
        var ad_id = $(this).attr('id');
         

        path = "{{ url('savead') }}"+"/"+ad_id;
         $.ajax({
            url: path,
            type: 'GET',
            //data: {province:province},
            success:function(data){                   
                alert(data);
               
           }
        })
     })
$(document).ready(function() {

    $('.zoom_in').css('display','inline');
    $('.zoom-gallery a').magnificPopup({
       // delegate: '.myimage',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }

      
        
    });
});



</script>

<script type="text/javascript">

 var screenZise = $(window).width();
 if(screenZise < 500){
    $('#demo-test-gallery a').removeClass('fancybox-button');
    $('#demo-test-gallery').addClass('demo-gallery');
 }
    (function() {

        var initPhotoSwipeFromDOM = function(gallerySelector) {

            var parseThumbnailElements = function(el) {
                var thumbElements = el.childNodes,
                    numNodes = thumbElements.length,
                    items = [],
                    el,
                    childElements,
                    thumbnailEl,
                    size,
                    item;

                for(var i = 0; i < numNodes; i++) {
                    el = thumbElements[i];

                    // include only element nodes 
                    if(el.nodeType !== 1) {
                      continue;
                    }

                    childElements = el.children;

                    size = el.getAttribute('data-size').split('x');

                    // create slide object
                    item = {
                        src: el.getAttribute('href'),
                        w: parseInt(size[0], 10),
                        h: parseInt(size[1], 10),
                        author: el.getAttribute('data-author')
                    };

                    item.el = el; // save link to element for getThumbBoundsFn

                    if(childElements.length > 0) {
                      item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                      if(childElements.length > 1) {
                          item.title = childElements[1].innerHTML; // caption (contents of figure)
                      }
                    }


                    var mediumSrc = el.getAttribute('data-med');
                    if(mediumSrc) {
                        size = el.getAttribute('data-med-size').split('x');
                        // "medium-sized" image
                        item.m = {
                            src: mediumSrc,
                            w: parseInt(size[0], 10),
                            h: parseInt(size[1], 10)
                        };
                    }
                    // original image
                    item.o = {
                        src: item.src,
                        w: item.w,
                        h: item.h
                    };

                    items.push(item);
                }

                return items;
            };

            // find nearest parent element
            var closest = function closest(el, fn) {
                return el && ( fn(el) ? el : closest(el.parentNode, fn) );
            };

            var onThumbnailsClick = function(e) {
                e = e || window.event;
                e.preventDefault ? e.preventDefault() : e.returnValue = false;

                var eTarget = e.target || e.srcElement;

                var clickedListItem = closest(eTarget, function(el) {
                    return el.tagName === 'A';
                });

                if(!clickedListItem) {
                    return;
                }

                var clickedGallery = clickedListItem.parentNode;

                var childNodes = clickedListItem.parentNode.childNodes,
                    numChildNodes = childNodes.length,
                    nodeIndex = 0,
                    index;

                for (var i = 0; i < numChildNodes; i++) {
                    if(childNodes[i].nodeType !== 1) { 
                        continue; 
                    }

                    if(childNodes[i] === clickedListItem) {
                        index = nodeIndex;
                        break;
                    }
                    nodeIndex++;
                }

                if(index >= 0) {
                    openPhotoSwipe( index, clickedGallery );
                }
                return false;
            };

            var photoswipeParseHash = function() {
                var hash = window.location.hash.substring(1),
                params = {};

                if(hash.length < 5) { // pid=1
                    return params;
                }

                var vars = hash.split('&');
                for (var i = 0; i < vars.length; i++) {
                    if(!vars[i]) {
                        continue;
                    }
                    var pair = vars[i].split('=');  
                    if(pair.length < 2) {
                        continue;
                    }           
                    params[pair[0]] = pair[1];
                }

                if(params.gid) {
                    params.gid = parseInt(params.gid, 10);
                }

                return params;
            };

            var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                var pswpElement = document.querySelectorAll('.pswp')[0],
                    gallery,
                    options,
                    items;

                items = parseThumbnailElements(galleryElement);

                // define options (if needed)
                options = {

                    galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                    getThumbBoundsFn: function(index) {
                        // See Options->getThumbBoundsFn section of docs for more info
                        var thumbnail = items[index].el.children[0],
                            pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                            rect = thumbnail.getBoundingClientRect(); 

                        return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                    },

                    addCaptionHTMLFn: function(item, captionEl, isFake) {
                        if(!item.title) {
                            captionEl.children[0].innerText = '';
                            return false;
                        }
                        captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
                        return true;
                    }
                    
                };


                if(fromURL) {
                    if(options.galleryPIDs) {
                        // parse real index when custom PIDs are used 
                        // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                        for(var j = 0; j < items.length; j++) {
                            if(items[j].pid == index) {
                                options.index = j;
                                break;
                            }
                        }
                    } else {
                        options.index = parseInt(index, 10) - 1;
                    }
                } else {
                    options.index = parseInt(index, 10);
                }

                // exit if index not found
                if( isNaN(options.index) ) {
                    return;
                }



                var radios = document.getElementsByName('gallery-style');
                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        if(radios[i].id == 'radio-all-controls') {

                        } else if(radios[i].id == 'radio-minimal-black') {
                            options.mainClass = 'pswp--minimal--dark';
                            options.barsSize = {top:0,bottom:0};
                            options.captionEl = false;
                            options.fullscreenEl = false;
                            options.shareEl = false;
                            options.bgOpacity = 0.85;
                            options.tapToClose = true;
                            options.tapToToggleControls = false;
                        }
                        break;
                    }
                }

                if(disableAnimation) {
                    options.showAnimationDuration = 0;
                }

                // Pass data to PhotoSwipe and initialize it
                gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

                // see: http://photoswipe.com/documentation/responsive-images.html
                var realViewportWidth,
                    useLargeImages = false,
                    firstResize = true,
                    imageSrcWillChange;

                gallery.listen('beforeResize', function() {

                    var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
                    dpiRatio = Math.min(dpiRatio, 2.5);
                    realViewportWidth = gallery.viewportSize.x * dpiRatio;


                    if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
                        if(!useLargeImages) {
                            useLargeImages = true;
                            imageSrcWillChange = true;
                        }
                        
                    } else {
                        if(useLargeImages) {
                            useLargeImages = false;
                            imageSrcWillChange = true;
                        }
                    }

                    if(imageSrcWillChange && !firstResize) {
                        gallery.invalidateCurrItems();
                    }

                    if(firstResize) {
                        firstResize = false;
                    }

                    imageSrcWillChange = false;

                });

                gallery.listen('gettingData', function(index, item) {
                    if( useLargeImages ) {
                        item.src = item.o.src;
                        item.w = item.o.w;
                        item.h = item.o.h;
                    } else {
                        item.src = item.m.src;
                        item.w = item.m.w;
                        item.h = item.m.h;
                    }
                });

                gallery.init();
            };

            // select all gallery elements
            var galleryElements = document.querySelectorAll( gallerySelector );
            for(var i = 0, l = galleryElements.length; i < l; i++) {
                galleryElements[i].setAttribute('data-pswp-uid', i+1);
                galleryElements[i].onclick = onThumbnailsClick;
            }

            // Parse URL and open gallery if it contains #&pid=3&gid=1
            var hashData = photoswipeParseHash();
            if(hashData.pid && hashData.gid) {
                openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
            }
        };

        initPhotoSwipeFromDOM('.demo-gallery');

    })();

    </script>


<!-- include form-validation plugin || add this script where you need validation   -->
<script src="{{ asset('assets/js/form-validation.js') }}"></script>
<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="{{ asset('assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js') }}"></script>
<!-- include custom script for site  -->
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
@endsection