<?php
 if (Auth::guest()){
    echo "<script>
        window.location = '/login?p-ad=1';
    </script>";
}


 ?>
  @extends('layouts.master')
  @section('content')

  <?php
    $province = $adid = $township = $category = $title = $description = $price = "";
    foreach($adDetails as $detail){
         $adid = $detail->adid;
         $province = $detail->province;
         $location = $detail->location;
         $category = $detail->catagory;
         $title  = $detail->title;
         $description = $detail->description;
         $price = $detail->price;
    }

  ?>



    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Edit your Ad
                       </strong></h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action ="/edit-ad/{{$adid}}" method="post"  enctype="multipart/form-data" files='true'>
                                  {{ csrf_field() }}
                                    <fieldset>
                                         <!-- Select Basic -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Province</label>

                                            <div class="col-md-8">
                                                <select name="province" id="category-group" class="form-control province">

                                                    
                                                    <option value="Western Cape" <?php if($province == "Western Cape"){echo "selected";}  ?>>Western Cape</option>
                                                    <option value="Eastern Cape" <?php if($province == "Eastern Cape"){echo "selected";}  ?>>Eastern Cape</option>
                                                    <option value="Gauteng" <?php if($province == "Gauteng"){echo "selected";} ?>>
                                                        Gauteng
                                                    </option>
                                                    <option value="North West"  <?php if($province == "North West"){echo "selected";} ?>> North West</option>
                                                    <option value="Northern Cape"  <?php if($province == "Northern Cape"){echo "selected";}  ?>>Northern Cape</option>
                                                     <option value="Mpumalanga" <?php if($province == "Mpumalanga"){echo "selected";}  ?>>Mpumalanga</option>
                                                    <option value="Free State">Free State</option>
                                                    <option value="Limpopo" <?php if($province == "Limpopo"){echo "selected";} ?>>Limpopo</option>
                                                    <option value="Kwazulu-Natal" <?php if($province == "Kwazulu-Natal"){echo "selected";}  ?>> Kwazulu-Natal</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Select Basic -->

                                         <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Township</label>

                                            <div class="col-md-8">
                                                <a href="#selectRegion" id="dropdownMenu1" data-toggle="modal"><input id="Adtitle" name="township" placeholder="Townhship"
                                                       class="form-control input-md township" data-toggle="modal" required="" type="text" autocomplete="off" readonly="readonly" value= "{{$location}}"style="background-color: #fff"></a>
                                            </div>                                   
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Category</label>

                                            <div class="col-md-8">
                                                <select name="category-group" id="category-group" class="form-control">
                                                    <option value="{{$category}}" selected="selected"> {{ $category }} </option>
                                                    @foreach($categories as $cat)

                                

                             <option value="{{$cat->category}}" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled">
                            - {{$cat->category}} -
                            </option>

                             @foreach($subCategories as $subCat)                            
                                
                                    @if($subCat->category_id == $cat->cat_id)
                                      <option value="{{$subCat->subcategory_name}}">{{$subCat->subcategory_name}}</option>
                                    @endif                               
                                $i++;
                             @endforeach
                         
                        @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Ad title</label>

                                            <div class="col-md-8">
                                                <input id="Adtitle" name="Adtitle" placeholder="Ad title"
                                                       class="form-control input-md" required="" type="text"  value = "{{$title}}">
                                                <span class="help-block">A great title needs at least 5 words. </span>
                                            </div>                                    
                                        </div>

                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Describe ad </label>

                                            <div class="col-md-8">
                                                <textarea class="form-control" id="textarea" name="textarea" placeholder="Describe
                                                    what makes your ad unique">{{$description}}</textarea>
                                            </div>
                                        </div>

                                        <!-- Prepended text-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Price">Price</label>

                                            <div class="col-md-4">
                                                <div class="input-group"><span class="input-group-addon">R</span>
                                                    <input id="Price" name="Price" class="form-control"
                                                           placeholder="price" required="" type="text" value = "{{$price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Negotiable </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- photo -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea"> Images </label>

                                            <div class="col-md-8">
                                            <?php $i = 0; ?>
                                            @foreach($images as $image)

                                                <?php $i++; ?>
                                                <div class="mb10">
                                                    <span class="file-input" id ="<?php echo $image->id;?>" ><div class="file-preview ">
   <div class="close fileinput-remove text-right" data-token="{{ csrf_token() }}"  id ="<?php echo $image->id; ?>">×</div>
   <div class="file-preview-thumbnails">
<div class="file-preview-frame" id="preview-1486926684866-0">
   <img src="<?php echo asset('images/user_images')?><?php echo "/".$image->name1; ?>" class="file-preview-image" title="IMG_00000074.jpg" alt="IMG_00000074.jpg" style="width:auto;height:160px;">
</div>
</div>
   <div class="clearfix"></div>   <div class="file-preview-status text-center text-success"></div>
   <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
</div>
<div class="input-group ">
   <div tabindex="-1" class="form-cossntrol fildde-caption  kv-fiddleinput-caption">
   
</div>
  
</div></span>





                                                    <span style="display:none;" class ="<?php echo $image->id; ?>""><input name = "image".$i; id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text" > </span>
                                                </div>
                                              
                                                @endforeach
                                                 @if($i == 0)
                                                    <div class="mb10">
                                                   <input name = "image2" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image3" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image4" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image5" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                     <div class="mb10">
                                                     <input name = "image5" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                @elseif($i == 1)
                                                    <div class="mb10">
                                                   <input name = "image2" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image3" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image4" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image5" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                    
                                                 @elseif($i == 2)
                                                   <div class="mb10">
                                                 <input name = "image3" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image4" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image5" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                @elseif($i == 3)
                                                  <div class="mb10">
                                                    <input name = "image4" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                      <div class="mb10">
                                                     <input name = "image5" id="input-upload-img1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                    </div>
                                                @elseif($i == 4)
                                                  <div class="mb10">
                                                     <input name = "image5" id="input-upload-img1" type="file" class="file"
                                                               data-preview-file-type="text">
                                                        </div>
                                                @endif
                                                   

                                                     

                                                
                                                <p class="help-block">Add up to 5 photos. Use a real image of your
                                                    product, not catalogs.</p>
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
                                                       required="" type="text" value='{{ Auth::user()->name }}' disabled="disabled"">
                                            </div>
                                        </div>

                                        <!-- Appended checkbox -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="seller-email"> Seller
                                                Email</label>

                                            <div class="col-md-8">
                                                <input id="seller-email" name="email" class="form-control"
                                                       placeholder="Email" required type="text" value="{{ Auth::user()->email }}" @if(Auth::user()->email) 
                                                            {{"disabled"}}
                                                       @endif >

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="">
                                                        <small> Hide the phone number on this ads.</small>
                                                    </label>
                                                </div>
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
                                            </div>
                                        </div>
                                         <div class="well" style="height:auto;">
                                            <h3><i class=" icon-certificate icon-color-1"></i> Sell quickly (optional)
                                            </h3>

                                            <p>
                                            With this option your product or service will reach thousands of people in a matter minutes.<a href="help.html">Learn
                                                    more</a></p>

                                            <div class="form-group" style="margin-bottom:0px height:auto">
                                                <table class="table table-hover checkboxtable" style="margin-bottom:0px;">
                                                    <tr>
                                                        <td>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="checkbox" name="optionsRadios"
                                                                           id="sponsored-ads-gallery" value="Sponsored Ads Gallery">
                                                                    <strong>Sponsored Ads Gallery</strong> (have your ad seen by everyone who visits this site. Your ad will be visible on our gallery for a month)</label>
                                                            </div>
                                                        </td>
                                                        <td><p>R78.00</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="checkbox" name="optionsRadios"
                                                                           id="All-plans" value="Business Marketing">
                                                                    <strong>Online marketing</strong> (We will help you reach thousands of people through social media marketing. Your ad will also be visible on our gallery for a month - great option for small-bisiness owners)
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><p>R126.00</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="Method"
                                                                            id="PaymentMethod">
                                                                        <option value="2">Select Payment Method</option>
                                                                        <option value="3">E-Wllet</option>
                                                                         <option value="5">Capitec Mobile Banking</option>
                                                                         <option value="5">Shoprite money markets</option>                                                                        
                                                                        <option value="5">Paypal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><p id="amount-payable"><strong>Payable Amount : R00.00</strong></p></td>
                                                    </tr>
                                                </table>

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

                                            <div class="col-md-8"><input type="submit"  value = "UPDATE"id="button1id"
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
                            <select class="form-control selecter  " id="region-province" name="region-state">
                                <option value="Western Cape">Western Cape</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="Mpumalanga">Mpumalanga</option>
                                <option value="North West">North West</option>
                                <option value="Northern Cape">Northern Cape</option>
                                <option value="Kwazulu-Natal">Kwazulu-Natal</option>
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
            $('#amount-payable').append("<strong>Payable Amount : R126.00</strong>");
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

    function displayLocations(province){
        path = "{{ url('locations') }}"+"/"+province;
        $.ajax({
            url: path,
            type: 'GET',
            data: {province:province},
            success:function(data){

                var data = jQuery.parseJSON(data);
                $.each(data, function(key, item) 
                {

                  $("#location-link ul").append("<li class='location-li' ><a style ='color: #4e575d;font-size: 12px;font-style: normal;line-height: normal;padding: 3px 0;transition: all 0.1s ease 0s;'class='info_link col-md-4' href='#' title='"+item.township+"'>"+item.township.charAt(0).bold()+item.township.slice(1)+"</a></li>");
                        console.log(item.township);  
                });

                $("#location-link ul").append("<li  class='location-li' ><a style ='margin-top:10px; float:right; font-size: 12px;font-style: normal;line-height: normal;padding: 3px 0;transition: all 0.1s ease 0s;'class='new-location col-md-4' href='#' title='New Location'>New Townhship</a></li>");  
           }
        });
    }
   

    $(document).ready(function(){

        province = $('.province').val();
        $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');
        $("select option[value='"+province+"']").attr("selected","selected");
        $("#location-link ul").empty(); 

        displayLocations(province);  
    })

        
            $('.province').on('change',function(){

                province = $('.province').val();
                $('#region-province').val(province);

                $('.township').val('');

                $('#popular-cities').empty();
                $("#location-link ul").empty();
                $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');

                displayLocations(province);

            });


            $('#region-province').on('change',function(){

                province = $('#region-province').val();
                $('#category-group').val(province);


                $(".location-li").remove(); 

                $('#popular-cities').empty();
                $('#popular-cities').append('Popular townships in <strong>'+province+'</strong>');
                $("select option[value='"+province+"']").attr("selected","selected");            
                
                displayLocations(province);

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

       $('.close').click(function(){
            var id = $(this).attr('id');
            path = "{{ url('delete-image') }}"+"/"+id;

            var r = confirm("Are you sure you want to delete this image?");

            if(r== true){
                $('.'+id).css('display','inline');
                //$('#'+id).css('display','none');

                 var token = "{{ csrf_token() }}";
                

                $.ajax({
                    url: path,
                    type: 'post',
                    data: {id:id, _token:token},
                    success:function(data){

                           location.reload();
                      
                            console.log(data);
                         
                       
                    }
                });
            }           

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
