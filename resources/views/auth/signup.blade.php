@extends('layouts.master')
@section('content')

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2"><i class="icon-user-add"></i> Create your account, Its free </h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('createuser') }}">
                                     {{ csrf_field() }}
                                    <fieldset>
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">You are a <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1"
                                                               value="option1" checked>
                                                        Professional </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2"
                                                               value="option2">
                                                        Individual </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Name <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="first_name" placeholder="First Name" class="form-control input-md"
                                                       required="" type="text">
                                                       @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                    @endif
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Phone Number <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="phonenumber" placeholder="Phone Number"
                                                       class="form-control input-md" type="text">
                                                       @if ($errors->has('phonenumber'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phonenumber') }}</strong>
                                            </span>
                                    @endif

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="">
                                                        <small> Hide the phone number on the published ads.</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Multiple Radios -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Gender</label>

                                            <div class="col-md-6">
                                                <div class="radio">
                                                    <label for="Gender-0">
                                                        <input name="gender" id="Gender-0" value="1" checked="checked"
                                                               type="radio">
                                                        Male </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="Gender-1">
                                                        <input name="gender" id="Gender-1" value="2" type="radio">
                                                        Female </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="textarea">About Yourself</label>

                                            <div class="col-md-6">
                                                <textarea class="form-control" name ="about" id="textarea" name="textarea">About
                                                    Yourself</textarea>
                                                    @if ($errors->has('about'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('about') }}</strong>
                                            </span>
                                    @endif

                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="inputEmail3" class="col-md-4 control-label">Email
                                                <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input type="email" name ="email"class="form-control" id="inputEmail3"
                                                       placeholder="Email">
                                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="inputPassword3" class="col-md-4 control-label">Password </label>

                                            <div class="col-md-6">
                                                <input type="password" name ="password"class="form-control" id="inputPassword3"
                                                       placeholder="Password">

                                                <p class="help-block">At least 5 characters
                                                    <!--Example block-level help text here.--></p>
                                                     @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                          </div>
                                            
                                        </div>
                                        <div class="form-group required">
                                            <label for="inputPassword3" class="col-md-4 control-label">Re-enter Password</label>

                                            <div class="col-md-6">
                                                <input type="password" name ="password2"class="form-control" id="inputPassword3"
                                                       placeholder="Password">

                                                <p class="help-block">At least 5 characters
                                                    <!--Example block-level help text here.--></p>
                                                     @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>

                                            <div class="col-md-8">
                                                <div class="termbox mb10">
                                                    <label class="checkbox-inline" for="checkboxes-1">
                                                        <input name="checkboxes" id="checkboxes-1" value="1"
                                                               type="checkbox">
                                                        I have read and agree to the <a href="terms-conditions.html">Terms
                                                        & Conditions</a> </label>
                                                </div>
                                                <div style="clear:both"></div>
                                                <button type = "submit" class="btn btn-primary">Register</button></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-4 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>
                        <div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>

                            <h3><strong>Create and Manage Items</strong></h3>

                            <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                                Praesent tristique elit pharetra magna efficitur laoreet.</p>
                        </div>
                        <div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>

                            <h3><strong>Create your Favorite ads list.</strong></h3>

                            <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                                Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->

 @endsection

 @section('scripts')
<!-- /.wrapper --> <!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery/jquery-latest.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- include equal height plugin  -->
<script src="assets/js/jquery.matchHeight-min.js"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="assets/js/hideMaxListItem.js"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
@endsection