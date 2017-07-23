@extends('layouts.master')
@section('content')
 <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 login-box">
                    <div class="panel panel-default">
                        <div class="panel-intro text-center" >
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i
                                        class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>KAS<span>OCULAR</span>
                            </h2>
                        </div>
                        <div class="panel-body" style="margin-top:0px;">
                            <?php 
                            session_start();
                            $url = "/login";
                            
                            if(isset($_GET['p-ad'])){
                                $_SESSION['postfreead'] = "postfreead";
                            ?>
                               
                                <span id = 'p-login'> You need to login to post an ad, this helps you manage your ads more easily. You can login with facebook or login the traditional
                                way. Signup <a href = '{{ url('signup') }}'><b>here</b></a> if don't have an account with us</span>

                                <style type='text/css'>
                                    .panel-intro {
                                         padding: 40px 0 0px;
                                    }
                                </style>                                
                                <hr>
                          <?php  } ?>
                            <form action="{{ url('/login') }}" role="form" method="POST">
                                {{ csrf_field() }}
                                
                                <div class="form-group"  style ="font-size:15px;">
                                    <a href ="{{ url('redirect') }}"  class="btn btn-primary  btn-block btn-facebook" style="background-color:#3b5998">Login with Facebook</a>
                                </div>
                                <center>
                                    <label for="sender-email" class="control-label" style="color:#808080;">OR</label>
                                </center> 
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="sender-email" class="control-label">Username:</label>

                                    <div class="input-icon"><i class="icon-user fa"></i>
                                        <input id="sender-email" name = "email" type="email" placeholder="Username"
                                               class="form-control email">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="user-pass" class="control-label">Password:</label>

                                    <div class="input-icon"><i class="icon-lock fa"></i>
                                        <input type="password" name ="password" class="form-control" placeholder="Password"
                                               id="user-pass">
                                    </div>
                                     @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type ="submit" class="btn btn-primary  btn-block">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">

                            <div class="checkbox pull-left">
                                <label> <input type="checkbox" value="1" name="remember" id="remember"> Keep me logged
                                    in</label>
                            </div>


                            <p class="text-center pull-right"><a href="#"> Lost your password? </a>
                            </p>

                            <div style=" clear:both"></div>
                        </div>
                    </div>
                    <div class="login-box-btm text-center">
                        <p> Don't have an account? <br>
                            <a href="{{ url('signup') }}"><strong>Sign Up !</strong> </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->
    @endsection

<!-- Le javascript
================================================== -->
@section('scripts')

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- include form-validation plugin || add this script where you need validation   -->
<script src="assets/js/form-validation.js"></script>


<!-- include equal height plugin  -->
<script src="assets/js/jquery.matchHeight-min.js"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="assets/js/hideMaxListItem.js"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
</body>
</html>
@endsection

