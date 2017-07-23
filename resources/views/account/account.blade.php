@extends('layouts.master')
@section('content')
   <div class="main-container">
        <div class="container">
            <div class="row">
                 @include('account-sidebar')
                <!--/.page-sidebar-->

                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <div class="row">
                            <div class="col-md-5 col-xs-4 col-xxs-12">
                                <h3 class="no-padding text-center-480 useradmin"><a href="">
                                <img class="userImg" src="{{Auth::user()->avator}}" alt="user" style="width:80px;height:75px;" onerror="this.src='{{ url('images/user.jpg')}}'"> {{Auth::user()->name}}</a></h3>
                            </div>
                            <div class="col-md-7 col-xs-8 col-xxs-12">
                                <div class="header-data text-center-xs">

                                    <!-- Traffic data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with red background -->
                                            <i class="fa fa-eye ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#">7000</a> <em>visits</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- revenue data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with green background -->
                                            <i class="icon-th-thumb ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#">12</a><em>Ads</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- revenue data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with blue background -->
                                            <i class="fa fa-user ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#">18</a> <em>Favorites </em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inner-box">
                        <div class="welcome-msg">
                            <h3 class="page-sub-header2 clearfix no-padding">Hello {{Auth::user()->name}} </h3>
                            <span class="page-sub-header-sub small">You last logged in at: 01-01-2014 12:40 AM [UK time (GMT + 6:00hrs)]</span>
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapseB1" data-toggle="collapse"> My
                                        details </a></h4>
                                </div>
                                <div class="panel-collapse collapse in" id="collapseB1">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Name</label>

                                                <div class="col-sm-9">
                                                    <input type="text" id = "username"class="form-control" value="{{Auth::user()->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9">
                                                    <input type="email" id = "user-email" class="form-control"
                                                           value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Phone" class="col-sm-3 control-label">Phone</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="Phone"
                                                           value="{{Auth::user()->phonenumber}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">About</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="...">
                                                </div>
                                            </div>

                                            <div class="form-group hide"> <!-- remove it if dont need this part -->
                                                <label class="col-sm-3 control-label">Facebook account map</label>

                                                <div class="col-sm-9">
                                                    <div class="form-control"><a class="link"
                                                                                 href="fb.com">Jhone.doe</a> <a
                                                            class=""> <i class="fa fa-minus-circle"></i></a></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <span id="update" class="btn btn-default">Update</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapseB2" data-toggle="collapse" > Settings </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseB2" style="display:none">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Comments are enabled on my ads </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">New Password</label>

                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Confirm Password</label>

                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-default">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapseB3" data-toggle="collapse">
                                        Preferences </a></h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseB3">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        I want to receive newsletter. </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        I want to receive advice on buying and selling. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->
@endsection

@section('scripts')
<script type="text/javascript">
     $('#update').click(function(){   
       
        var name = $('#username').val();
        var email = $('#user-email').val();
        var phonenumber = $('#Phone').val();

         
        path = "{{ url('update-user-details') }}"+"/"+name+"/"+email+"/"+phonenumber;
            $.ajax({
                url: path,
                type: 'GET',
                success:function(data){
                 
                  
                        console.log(data);
                     
                   
            }
        });        
    });
</script>

<script src="{{ url('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- include carousel slider plugin  -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- include equal height plugin  -->
<script src="{{ asset('assets/js/jquery.matchHeight-min.js')}}"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="{{ asset('assets/js/hideMaxListItem.js') }}"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="{{ asset('assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js') }}"></script>
<!-- include custom script for site  -->
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
@endsection
