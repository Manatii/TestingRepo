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
                                         <!-- Select Basic -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Province</label>

                                            <div class="col-md-8">
                                                <select name="province" id="category-group" class="form-control province">
                                                    
                                                    <option value="Western Cape">Western Cape</option>
                                                    <option value="Gauteng"><b>Gauteng</b></option>                                                                                                     
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Select Basic -->

                                         <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Location</label>

                                            <div class="col-md-8">
                                                <a href="#selectRegion" id="dropdownMenu1" data-toggle="modal"><input id="" maxlength="35" name="township" value="{{old('township')}}" placeholder="Suburb / township"
                                                    class="form-control input-md township"  data-toggle="modal" type="text" autocomplete="off" readonly="readonly" style="background-color: #fff"></a>
                                                    @if ($errors->has('township'))
                                                        <span class="help-block" style="color:#a94442;">
                                                            <strong>{{ $errors->first('township') }}.</strong>
                                                        </span>                                                    
                                                    @endif      
                                            </div>  
                                                                             
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Category</label>

                                            <div class="col-md-8">
                                                <select name="category-group" id="category-group" class="form-control category-group">
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

                                        @if($subCat->subcategory_name == $oldCategory)
                                              <?php $selected = "selected"; ?>                                            
                                        @endif 
                                        <option {{$oldCategory}} {{$selected}} value="{{$cat->category}}#{{$subCat->subcategory_name}}">{{$subCat->subcategory_name}}</option>
                                    @endif                               
                             
                             @endforeach
                         
                        @endforeach
                                                </select>
                                                </div>
                                        </div>

                                        @if(old('category-group'))

                                        @endif;

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Ad title</label>
                                            <div class="col-md-8">
                                                <input id="Adtitle" name="Adtitle" value="{{old('Adtitle')}}" maxlength="35" placeholder="Ad title"
                                                class="form-control input-md" required="" type="text">
                                                @if ($errors->has('Adtitle'))
                                                    <span class="help-block" style="color:#a94442;">
                                                        <strong>{{ $errors->first('Adtitle') }}</strong>
                                                    </span>
                                                @else                                               
                                                    <span class="help-block">A great title needs at least 5 words.s</span>
                                                @endif                                            
                                            </div>
                                        </div>


                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Describe ad </label>

                                            <div class="col-md-8">
                                                <textarea class="form-control" id="textarea" name="textarea" placeholder="Describe
                                                    what makes your ad unique"></textarea>
                                                     @if ($errors->has('textarea'))
                                                <span class="help-block" style="color:#a94442;">
                                                    <strong>{{ $errors->first('textarea') }}.</strong>
                                                </span>
                                            @endif
                                            </div>
                                            
                                        </div>


                                        <!-- Prepended text-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Price">Price</label>

                                            <div class="col-md-4">
                                                <div class="input-group"><span class="input-group-addon">R</span>
                                                    <input id="Price" name="Price" class="form-control"
                                                           placeholder="price" required="" type="text" value="{{old('Price')}}">
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
                                                <p class="help-block">Add up to 6 photos. Use a real image of your
                                                    product, not catalogs.</p>
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
                                                    required type="text" value='{{ Auth::user()->name }}' disabled="disabled">
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
                                                       required type="text" value="{{Auth::user()->phonenumber}}" @if(Auth::user()->phonenumber) 
                                                            {{"disabled"}}
                                                       @endif >

                                                        @if ($errors->has('phonenumber'))
                                                        <span class="help-block" style="color:#a94442;">
                                                            <strong>{{ $errors->first('phonenumber') }}.</strong>
                                                        </span>
                                                        @endif

                                            </div>
                                        </div>
                                        <div class="well" style="height:auto;">
                                            <h3><i class=" icon-certificate icon-color-1"></i> Sell quickly (optional)
                                            </h3>

                                            <p>
                                            With this option your product or service will reach thousands of people in a matter minutes.<a href="help.html">Learn
                                                    more</a></p>

                                            <div class="form-group" style="margin-bottom:0px height:auto;padding-right:2px">
                                                <div class="" style="margin-bottom:0px;">
                                                    <div class="col-md-12">
                                                        <div class="radio">
                                                                <label style="padding-left:0px;">
                                                                    <input type="checkbox" name="optionsRadios"
                                                                           id="All-plans" value="Sponsored">
                                                                    <strong>Gallery, Public Display & Social Media Affiliation</strong> ( have your ad seen by hundreds of people on our gallery, ads featured on gallery will be displayed in public areas like malls, universities, and in trains. Your ad will also be shared on
                                                                    our affiliate's facebook timeslines )
                                                                </label>
                                                        </div>
                                                      
                                                        <div class="pull-right" style="margin-right:2px;"><p>R95.00</p></div>
                                                        
                                                    </div>
                                                        <div class="">
                                                                <div class="col-xm-12 col-md-8">
                                                                    <select class="form-control" name="Method"
                                                                            id="PaymentMethod">
                                                                        <option value="2">Select Payment Method</option>
                                                                        <option value="3">E-Wllet</option>
                                                                         <option value="5">Capitec Mobile Banking</option>
                                                                         <option value="5">Shoprite money markets</option>                                                                        
                                                                        <option value="5">Paypal</option>
                                                                    </select>
                                                                </div>
                                                                 <div class="col-xm-12 col-md-7 col-md-4" style="margin-top:5px">
                                                                     <p id="amount-payable"><strong>Payable Amount : R00.00</strong></p>
                                                                 </div>

                                                             
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
                                                    Remember above contact information. </label>
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

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        <div class="col-sm-6 no-padding">
                            <select class="form-control selecter  " id="suburb-or-township" name="region-state">

                                <option value="Townships">Townships / amaKasi</option>
                                <option value="Suburbs">Suburbs</option>                                                    
                            </select>
                        </div>
                        <div style="clear:both"></div>

                        <hr class="hr-thin">
                    </div>
                     <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                    <div class="col-md-12  col-xs-12"  id = "location-link">
                        <div class = "col-md-4 col-xs-6 column1">
                            <ul>


                            </ul>  
                        </div>
                        <div class = "col-md-4 col-xs-5 column2">
                            <ul>


                            </ul>  
                        </div>
                        <div class = "col-md-4 col-xs-6 column3">
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
<script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/BootstrapTypeahead/bootstrap3-typeahead.js')}}"></script>




<script type="text/javascript">
    var path = "{{ route('autoComplete') }}";

    var path2 = "{{ route('autoCompleteTownship') }}";
    
   
    // $('.surbub').focus(function(){
    //   $.ajax({
    //         url: path,
    //         type: 'GET',
    //         data: {township:township},
    //         success:function(data){
                  
   
    //         }
    //     });
        
    // });

    $('.surbub').typeahead({
        source:  function (query, process) {
            var province = $('.province').val();
        return $.get(path, { query: query,province:province }, function (data) {
            

               
               
                return process(data);
            });
        }
    });

    $('.township').typeahead({
        source:  function (query, process) {
            var province = $('.province').val();
        return $.get(path2, { query: query,province:province }, function (data) {
            

               
               
                return process(data);
            });
        }
    });

    $('#All-plans').click(function(){
        if ( $('#All-plans').is(':checked') ) {

            $('#agent-ad').attr('checked', false); // Unchecks it
            $('#sponsored-ads-gallery').attr('checked', false); // Unchecks it
            $('#bagain').attr('checked', false); // Unchecks it

            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R95.00</strong>");
        } 
        else{
            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R00.00</strong>");
        }
    });

   
     $('#sponsored-ads-gallery').click(function(){
        if ($(this).is(':checked') ) {
            $('#All-plans').attr('checked', false); // Unchecks it
            $('#bagain').attr('checked', false); // Unchecks it
            $('#agent-ad').attr('checked', false); // Unchecks it

            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R78.00</strong>");
        }
        else{
            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R00.00</strong>");
        }

    });

 
    $('#bagain').click(function(){
        if ($(this).is(':checked') ) {

            $('#All-plans').attr('checked', false); // Unchecks it
            $('#sponsored-ads-gallery').attr('checked', false); // Unchecks it
            $('#agent-ad').attr('checked', false); // Unchecks it
            $('#amount-payable').empty();          
            $('#amount-payable').append("<strong>Payable Amount : R48.00</strong>");
        }
        else{
            $('#amount-payable').empty();          
            $('#amount-payable').append("<strong>Payable Amount : R00.00</strong>");
        }

    });
    
    

     $('#agent-ad').click(function(){
         if ($(this).is(':checked') ){
            $('#All-plans').attr('checked', false); // Unchecks it
            $('#sponsored-ads-gallery').attr('checked', false); // Unchecks it
            $('#bagain').attr('checked', false); // Unchecks it
            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R66.00</strong>");
        }else{
            $('#amount-payable').empty();
            $('#amount-payable').append("<strong>Payable Amount : R00.00</strong>");
        }
    });

    $('.province').on('change',function(){

        province = $('.province').val();
        $('#region-province').val(province);

        $('.township').val('');

        $('#popular-cities').empty();
        $("#location-link ul").empty();
        $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');

        displayTownships(province);

    });

    function displayTownships(province){


      // $("#location-link li").empty();
        path = "{{ url('locations') }}"+"/"+province;
        $.ajax({
            url: path,
            type: 'GET',           
            success:function(data){
                $('#loading-provinces').hide();
                var i = 0;
                var screenZise = $(window).width();

                var data = jQuery.parseJSON(data);
                $.each(data, function(key, item) 
                {

                  if(screenZise > 500){
                            if(i<=11){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            //console.log(item.surbub+"-"+i);
                            
                            }else if(i>11 && i<=23){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            //console.log(item.surbub+"-"+i);                           

                            }else if(i>23){
                             $("#location-link .column3 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                          //  console.log(item.surbub+"-"+i);
                            }
                        }else{
                             if(i<=18){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                           // console.log(item.surbub+"-"+i);
                            
                            }else if(i>18){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                           // console.log(item.surbub+"-"+i);                           

                            }
                        }
                        i++; 
                });               
           }
        });
    }
   
   
    $(document).ready(function(){

        province = $('.province').val();
        $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');
        $("select option[value='"+province+"']").attr("selected","selected");
        $("#location-link ul").empty(); 

        displayTownships(province);  
    })        
        
        function displaySuburbs(province){
            path = "{{ url('get-suburbs-by-prov') }}"+"/"+province;
            $.ajax({
                url: path,
                type: 'GET',
                //data: {province:province},
                success:function(data){
                     $('#loading-provinces').hide();
                    var data = jQuery.parseJSON(data);
                    var i = 0;
                    var screenZise = $(window).width();
                  //  alert(screenZise);
                    $.each(data, function(key, item) 
                    {

                        if(screenZise > 500){
                            if(i<=11){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            
                            }else if(i>11 && i<=23){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);                           

                            }else if(i>26){
                             $("#location-link .column3 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            }
                        }else{
                             if(i<=18){
                            $("#location-link .column1 ul").append("<li class='location-li' style = 'padding-bottom: 6px;'><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);
                            
                            }else if(i>18){
                            $("#location-link .column2 ul").append("<li class='location-li' style = 'padding-bottom: 6px;' ><a style ='color: #4e575d;font-size: 11.70pt;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"+item.location+"'>"+item.location.charAt(0).bold()+item.location.slice(1)+"</a></li>");
                            console.log(item.location+"-"+i);                           

                            }
                        }
                        i++;
                                           
                    });                    
               }
            });
        }

        $('#suburb-or-township').on('change',function(){

            $('#loading-provinces').show();
            province = $('.province').val();
            var suburbOrProvince = $(this).val();

           // $('#category-group').val(province);
            $(".location-li").remove(); 

            $('#popular-cities').empty();
            $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');
            $("select option[value='"+province+"']").attr("selected","selected"); 

            if(suburbOrProvince === "Townships"){               
                displayTownships(province);
            }else{
               
               displaySuburbs(province);
            }          
            
            

        });
           
        
        $( "#location-link" ).delegate( "a", "click", function() {
            // loc = generateSlug($(this).attr('title'));

            $('.modal-backdrop').hide();
            $('.modal').hide();
            $('.township').val($(this).attr('title'));
            $(".township").attr("readonly", "readonly");
            $('body').css('overflow-y', 'scroll')
        });

        $( "#location-link" ).delegate( ".new-location", "click", function() {
            // loc = generateSlug($(this).attr('title'));

            $('.modal-backdrop').hide();
            $('.modal').hide();
            $(".township").removeAttr("readonly");
            $('.township').focus();
            $('.township').val('');
            alert("hello stranger!");

        });
          
    
    
</script>


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
<script src="{{ asset('assets/js/script.js') }}"></script>
@endsection
