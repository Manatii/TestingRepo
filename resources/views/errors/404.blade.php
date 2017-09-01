@extends('layouts.master')
@section('pagetitle')
  <title>KASOCULAR - Page not found!!</title>
@endsection
@section('content')
<div class="intro-inner">
        <div class="about-intro" style="
    background:url({{ asset('images/capetown4.jpg') }}); no-repeat center;
	background-size:cover;">
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title animated fadeInDown"> Page not Found!!! </h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/.about-intro -->

    </div>
    <!-- /.intro-inner -->

    <div class="main-container inner-page">
        <div class="container" style="height:100px;">
                <div class="col-lg-12">
                    <div class="white-box text-center">
                        <h1 style="color:#8c8c8c;"> Sorry, but the page you're looking for could not be found, please click <a href="/">here</a> to go to the home page.</h1>
                    </div>
                </div>                
        </div>
    </div>
    <!-- /.main-container -->
    @endsection

@section('scripts')

<!-- Le javascript
================================================== -->

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
@endsection