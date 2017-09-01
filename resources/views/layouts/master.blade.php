<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png')}}">
    @yield('pagetitle')
    @yield('description')
    @yield('keywords')

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/loading/css/jquery.loadingModal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/plugins/simpleselect/jquery.simpleselect.min.css') }}" rel="stylesheet">


    <link href="{{ asset('selectorassets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet"/>
    <link href="{{ asset('selectorassets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
     <!--  photoswipe -->
     <!-- Core CSS file -->
     <link rel="stylesheet" href="{{ asset('assets/css/photoswipe/photoswipe.css') }}"> 
        <!-- Skin CSS file (styling of UI - buttons, caption, etc.)
             In the folder of skin CSS file there are also:
             - .png and .svg icons sprite, 
             - preloader.gif (for browsers that do not support CSS animations) -->
     <link rel="stylesheet" href="{{ asset('assets/css/photoswipe/default-skin.css') }}">       

     <link rel='stylesheet' href="{{ asset('assets/plugins/scrollbar/css/perfect-scrollbar.css') }}" />
<style>
  #options{
    position:absolute;
    top:40.4px;
    max-height: 260px; /* Or whatever you want (eg. 400px) */
  }

  #options2{
    position:absolute;
    top:40.4px;
    max-height: 260px; /* Or whatever you want (eg. 400px) */
  }
  #options3{
    position:absolute;
    top:36px;
    max-height: 78px; /* Or whatever you want (eg. 400px) */
  }
</style>

    <!-- styles needed for carousel slider -->
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.css') }}" rel="stylesheet">
    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- include pace script for automatic web page progress bar  -->
<script>
    paceOptions = {
        elements: true
    };        
</script>
<script src="{{ url('assets/js/pace.min.js') }} "></script>
<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
</script>

<!-- photoswipe -->
 <!-- Core JS file -->
<script src="{{ url('assets/js/photoswipe/photoswipe.min.js') }}"></script> 
<!-- UI JS file -->

<script src="{{ url('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="{{ asset('assets/Fancy_Box/source/jquery.fancybox.js?v=2.1.5') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Fancy_Box/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />
<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Fancy_Box/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}" />
<script type="text/javascript" src="{{ asset('assets/Fancy_Box/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>
<!-- bxSlider CSS file -->
<link href=" {{ asset('assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet"/>
<script type="text/javascript">
var j = jQuery.noConflict();
j(".fancybox-button").fancybox({
    prevEffect      : 'none',
    nextEffect      : 'none',
    closeBtn        : false,
    helpers     : {
        title   : { type : 'inside' },
        buttons : {}
    },

    afterLoad : function() {
        this.title = 'Image ' + (this.index) + ' of ' + (this.group.length-2);     
    }
});
</script>
<script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
<!-- include carousel slider plugin  -->
<script src="{{ url('assets/js/owl.carousel.min.js')}}"></script>

</head>
<body>
<div id="wrapper">
    <div class="header">
        <nav class="navbar   navbar-site navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <a href="http://localhost:8000" class="navbar-brand logo logo-title">
                        <!-- Original Logo will be placed here  -->
                       <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
                        wc<span id ='better'>ocular <img src="{{url('images/splash_beta_lightgreen.png')}}" style="margin-bottom:8px; width:44px;height:44px;"></span> </a></div>
                <div class="navbar-collapse collapse">                                                           
                     @if (Auth::guest())
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{ asset('/ads') }}"><i class="icon-th-thumb"></i> All Ads</a>
                            </li>
                            <li><a href="/login">Login</a></li>
                            <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger"
                                                   href="{{asset('/login?p-ad=1')}}">Post Free Add</a>
                            </li>
                        </ul>
                     @else
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ asset('/ads') }}"><i class="icon-th-thumb"></i> All Ads</a></li>                              
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span> {{ Auth::user()->name }} </span> <i class="icon-user fa"></i> 
                                <i class=" icon-down-open-big fa"></i></a>
                                <ul class="dropdown-menu user-menu">
                                    <li class="active">
                                        <a href="{{ url('/account') }}"><i class="icon-home"></i> Personal Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/account-myads') }}"><i class="icon-th-thumb"></i> My ads </a></li>
                                    <li>
                                        <a href="{{ url('/account-favourite-ads') }}"><i class="icon-heart"></i> Favourite ads </a>
                                    </li>
                                    <li>
                                        <a href=""><i class="icon-folder-close"></i> Archived ads</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="icon-hourglass"></i> Pending approval </a>
                                    </li>
                                    <li>
                                        <a href=""  onclick="event.preventDefault(); document.getElementById('logout-form').submit(); logoutFacebook()">
                                            <i class=" icon-logout "></i> Log out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="postadd">
                                <a class="btn btn-block   btn-border btn-post btn-danger" href="{{asset('/postfreead')}}">Post Free Add</a>
                            </li>
                            <form id="logout-form" action="{{ url('/logout?out') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                            </form>
                    </ul>
                   @endif
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- /.header -->
     @yield('content')
     <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-left navbar-link footer-nav">
                <li><a href="/home"> Home </a> <a href="/about"> About us </a> <a href=""> Terms and
                    Conditions </a> <a href="#"> Privacy Policy </a> <a href="/contact"> Contact us </a> <a
                        href="/faq"> FAQ </a>
            </ul>
            <ul class=" pull-right navbar-link footer-nav">
                <li> &copy; 2017 kasocular</li>
            </ul>
        </div>


    </div>
    <!-- /.footer -->
</div>
<!-- /.wrapper -->

 @yield('scripts')

</body>
@yield('modals')
