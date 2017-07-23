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

                        <div class="ads-image zoom-gallery">
                            <h1 class="pricetag"> R{{$price}}</h1>                                      
                            <?php $i = 0; 
                                $previewImage = "";
                                foreach ($images as $key) { ?>
                                    
                                <?php  $previewImage = $key->name1; } 
                            ?>

                           

                               
                            <ul class="bxslider">
                            
                                @foreach($images as $image)
                                    
                                        


                  <a class="myimage" data-fancybox-group="button" href="<?php echo asset('images/user_images')?><?php echo "/".$image->name1; ?>" >
                     <img width="700" height="450" src="<?php echo asset('images/user_images')?><?php echo "/".$image->name1; ?>" alt="img">
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
        });



    $(document).ready(function() {
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

   });


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