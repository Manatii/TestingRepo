 @extends('layouts.master')
  @section('pagetitle')
    <title>KASOCULAR - Post Free Ad</title>
  @endsection
  @section('content')
  <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified
                            Ad</strong></h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action ="/postfreead" method="post"  enctype="multipart/form-data" files='true'>
                                  {{ csrf_field() }}
                                    <fieldset>                               
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Location</label>

                                            <div class="col-md-8">
                                                <a href="#selectRegion1" id="dropdownMenu1" data-toggle="modal"><input id="" required = "" maxlength="35" name="location" value="{{old('location')}}" placeholder="Suburb / township"
                                                    class="form-control input-md township"  data-toggle="modal" type="text" autocomplete="off" readonly="readonly" style="background-color: #fff"></a>
                                                    @if ($errors->has('location'))
                                                        <span class="help-block" style="color:#a94442;">
                                                            <strong>{{ $errors->first('location') }}.</strong>
                                                        </span>                                                    
                                                    @endif      
                                            </div>  
                                                                             
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Category</label>

                                            <div class="col-md-8">
                                                <select name="category-group" id="category-group" class="selecter form-control category-group">
                                                    @foreach($categories as $cat)

                                

                             <option value="{{$cat->category}}" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled">
                            - {{$cat->category}} -
                            </option>
                                

                             @foreach($subCategories as $subCat)                            
                                     
                                    @if($subCat->category_id == $cat->cat_id)
                                        <?php $selected = "";

                                            $oldCategory = old('category-group');                                           
                                            if($oldCategory != null){
                                                $oldCategory = explode('#', $oldCategory);
                                                $oldCategory = $oldCategory[1];
                                            }                                            

                                         ?>                                      

                                        @if($subCat->subcategory_name == $oldCategory || $subCat->subcategory_name == "Mobile Phones")
                                              <?php $selected = "selected"; ?>                                                                                 
                                        @endif 
                                        <option  {{$oldCategory}} {{$selected}} value="{{$cat->category}}#{{$subCat->subcategory_name}}">{{$subCat->subcategory_name}}</option>
                                    @endif                               
                             
                             @endforeach
                         
                        @endforeach
                                                </select>
                                                    <p class="help-block job-post" style="color:#a94442;margin-bottom: 5px;"></p>
                                                </div>
                                        </div>

                                        @if(old('category-group'))

                                        @endif

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Ad title</label>
                                            <div class="col-md-8">
                                                <input id="Adtitle" name="Adtitle" value="{{old('Adtitle')}}" maxlength="35" required = "" placeholder="Ad title"
                                                class="form-control input-md"  type="text">
                                                @if ($errors->has('Adtitle'))
                                                    <span class="help-block" style="color:#a94442;">
                                                        <strong>{{ $errors->first('Adtitle') }}</strong>
                                                    </span>
                                                @else                                               
                                                    <span class="help-block">A great title needs at least 5 words</span>
                                                @endif                                            
                                            </div>
                                        </div>


                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Describe ad </label>

                                            <div class="col-md-8">
                                                <textarea class="form-control" id="textarea" name="description" placeholder="Describe
                                                    what makes your ad unique"> {{ old('description') }}</textarea>
                                                     @if ($errors->has('description'))
                                                <span class="help-block" style="color:#a94442;">
                                                    <strong>{{ $errors->first('description') }}.</strong>
                                                </span>
                                            @endif
                                            </div>
                                            
                                        </div>


                                        <!-- Prepended text-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" id="lbl-price" for="Price">Price</label>

                                            <div class="col-md-4">
                                                <div class="input-group"><span class="input-group-addon">R</span>
                                                    <input id="Price" name="Price" class="form-control"
                                                           placeholder="price" required = "" type="text" value="{{old('Price')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id ='negotiable' name="negotiable" value="negotiable">
                                                        Negotiable </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- photo -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea"> Images </label>

                                            <div class="col-md-8">
                                                <div class="mb10">
                                                    <input name = "image1" id="" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input name = "image2" id="" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input name = "image3" id="" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input name = "image4" id="input-upload-img4" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input name = "image5" id="input-upload-img5" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input name = "image6" id="input-upload-img6" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                 @if ($errors->has('image1') || $errors->has('image2') || $errors->has('image3') || $errors->has('image4') || $errors->has('image5') || $errors->has('image5') )
                                                    <span class="help-block" style="color:#a94442;">
                                                        <strong>Only images can be uploaded.</strong>
                                                    </span>
                                                @else
                                                <p class="help-block">Add up to 6 photos. Each image should not be greater than 3MB.</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content-subheading"><i class="icon-user fa"></i> <strong>Seller
                                            information</strong></div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textinput-name">Name</label>

                                            <div class="col-md-8">
                                                <input id="textinput-name" name="textinput-name"
                                                    placeholder="Seller Name" class="form-control input-md"
                                                   type="text" value='{{ Auth::user()->name }}' disabled="disabled">
                                                @if ($errors->has('textinput-name'))
                                                    <span class="help-block" style="color:#a94442;">
                                                        <strong>{{ $errors->first('textinput-name') }}.</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Appended checkbox -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="seller-email"> Seller
                                                Email</label>
                                            <div class="col-md-8">
                                                <input id="seller-email" name="email" class="form-control"
                                                       placeholder="Email" type="text" value="{{ Auth::user()->email }}" @if(Auth::user()->email) 
                                                            {{"disabled"}}
                                                       @endif >            
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="seller-Number">Phone
                                                Number</label>

                                            <div class="col-md-8">
                                                <input id="seller-Number" name="phonenumber"
                                                       placeholder="Phone Number" class="form-control input-md"
                                                       type="text" value="{{Auth::user()->phonenumber}}" @if(Auth::user()->phonenumber) 
                                                            {{"disabled"}}
                                                       @endif >

                                                        @if ($errors->has('phonenumber'))
                                                        <span class="help-block" style="color:#a94442;">
                                                            <strong>{{ $errors->first('phonenumber') }}.</strong>
                                                        </span>
                                                        @endif

                                            </div>
                                        </div>
                                        
                                        <div class="well">
                                            <h3><i class=" icon-certificate icon-color-1"></i>Sell quickly (optional)</h3>
                                            <p>Have your ad seen by hundreds of people on the home page & category page gallery, ads featured on these galleries are projected in public areas like malls, universities, and in main roads. You may tick 'Bargains' if you're selling your product for cheap, your ad will be featured on the bargains tab. <a href="#">Learn
                                                    more</a></p>

                                            <div class="form-group">
                                                <table class="table table-hover checkboxtable" style="border-bottom: 1px solid #ddd;">
                                                    <tr>
                                                        <td>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="checkbox" id="option-gallery" name="option-gallery">
                                                                    <strong>Gallery & Public display</strong></label>
                                                            </div>
                                                        </td>
                                                        <td><p id ="option-gallery-price">R95.00</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="checkbox" name="option-bargain"
                                                                           id="option-bargain" >
                                                                    <strong>Bargain</strong> </label>
                                                            </div>
                                                        </td>
                                                        <td><p id = "option-bargain-price">R34.00</p></td>
                                                    </tr>
                                                </table>
                                                <div class="">
                                                    <div class="col-xm-12 col-md-8">
                                                        <select class="selecter form-control" name="payment-method"
                                                                id="PaymentMethod">
                                                                  <option value="none">Select Payment Method</option>
                                                                <option value="Capitec Mobile Banking">Capitec Mobile Banking</option>
                                                                <option value="E-Wllet">EFT</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xm-12 col-md-7 col-md-4" style="margin-top:5px">
                                                         <p id="amount-payable"><strong>Payable Amount : R0.00</strong></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- terms -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Terms</label>

                                            <div class="col-md-8">
                                                <label class="checkbox-inline" for="checkboxes-0">
                                                    <input name="checkboxes" id="checkboxes-0"
                                                           value="Remember above contact information." type="checkbox">
                                                    Accept Terms and Conditions. </label>
                                            </div>
                                        </div>

                                        <!-- Button  -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-8"><input type="submit" id="button1id"
                                                                     class="btn btn-success btn-lg"></div>
                                        </div>
                                    </fieldset>
                                </form>
                            
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-3 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>

                        <div class="panel sidebar-panel">
                            <div class="panel-heading uppercase">
                                <small><strong>How to sell quickly?</strong></small>
                            </div>
                            <div class="panel-content">
                                <div class="panel-body text-left">
                                    <ul class="list-check">
                                        <li> Use a brief title and description of the item</li>
                                        <li> Make sure you post in the correct category</li>
                                        <li> Add nice photos to your ad</li>
                                        <li> Put a reasonable price</li>
                                        <li> Check the item before publish</li>

                                    </ul>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
                <!--/.reg-sidebar-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->

   <!-- Modal Change City -->

<div class="modal fade locations-modal" id="selectRegion1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <p id= 'popular-cities'>
                            Popular <strong>Surbubs</strong> in Western Cape.
                        </p>    
                        <div style="clear:both"></div>
                        <div class="col-sm-6 no-padding">
                            <select class="form-control selecter" id="locations-category" name="region-state">
                                <option value="Suburbs">Suburbs</option> 
                                <option value="Townships">Townships / amaKasi</option>                                                                                   
                            </select>
                        </div>
                        <div style="clear:both"></div>

                        <hr class="hr-thin">
                    </div>                    
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
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ asset('assets/js/newscripts/postfreead.js') }}"></script>
<script src="{{ asset('selectorassets/js/vendors.min.js') }}"></script>

<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery-nicescroll.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.min.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.min.js') }}"></script>
<!-- include jquery file upload plugin  -->
<script src="{{ asset('assets/js/fileinput.min.js')}}" type="text/javascript"></script>
<script>
    // initialize with defaults
    $("#input-upload-img1").fileinput();
    $("#input-upload-img2").fileinput();
    $("#input-upload-img3").fileinput();
    $("#input-upload-img4").fileinput();
    $("#input-upload-img5").fileinput();


</script>

<!-- include carousel slider plugin  -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jqueryFunctions.js') }}"></script>


<!-- include equal height plugin  -->
<script src="{{ asset('assets/js/jquery.matchHeight-min.js') }}"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="{{ asset('assets/js/hideMaxListItem.js') }}"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="{{ asset('assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js')}}"></script>
<!-- include custom script for site  -->

<script src="{{ asset('selectorassets/js/script.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nice-select .list').css('max-height','377px');
        $('.page-content .inner-box').css('overflow','initial');
    });

    $(".location-li a").click(function(){
            // loc = generateSlug($(this).attr('title'));
            $('.township').val($(this).text());
            $(".township").attr("readonly", "readonly");
            $('body').css('overflow-y', 'scroll');
            $('.modal-backdrop').hide();
            $('.modal').hide();
    }); 

</script>
@endsection
