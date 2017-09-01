@extends('layouts.master')
@section('pagetitle')
  <title>KASOCULAR - About</title>
@endsection
@section('content')
    <div class="intro-inner">
        <div class="about-intro" style="
    background:url(images/bg2.jpg) no-repeat center;
	background-size:cover;">
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title animated fadeInDown"> Building a customer focus </h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/.about-intro -->

    </div>
    <!-- /.intro-inner -->

    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <h1 class="text-center title-1"> What Makes Us Special </h1>
                    <hr class="center-block small text-hr">
                    <div class="col-sm-6">
                        <div class="text-content has-lead-para text-left">
                            <p class="lead">Wcocular is a classifieds site particularly designed Western Cape, Here you can sell a house, a car, accessories or anything you wish to sell.</p>

                            <h3>How it works</h3>

                            <p class="lead"> Simply search for what you're looking for, and directly contact the seller. To sell an item, click Post Free ad, provide details for your item and hit the POST button. It's FREE fast and easy.</p> 

                            <p>You can choose to sell your item faster by choosing one our promotion plans. With our promotion plans  your item will be seen by THOUSANDS of poeple in a matter of minutes. Why go around looking for buyers when you can sell your item online and have it seen by thousands of people in no time ? </p>

                            <h3>Points to keep in mind: </h3>

                        <ul style="list-style-type:circle; list-style-position:outside; margin-left:6%">
                        <li>It is the user's resposibility to make sure that they meet the seller at a safe place</li>
                        <li>This is not a plattform to sell stolen stuff</li>
                        <li>This is not a plattform to buy stolen stuff</li>
                        <li>If you lose an item/get robbed, please contact us as soon as possible. We will inform you, should someone post something suspicious</li>
                        <li>The creator of this site will take no resposibility what so ever for what happens between buyers and sellers who use this site</li>
                     </ul>
                        </div>
                    </div>
                    <div class="col-sm-6"><img src="images/info.png" alt="imfo" class="img-responsive"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->
    <div class="parallaxbox about-parallax-bottom">
        <div class="container">
            <div class="row text-center featuredbox">
                <div class="col-sm-4 xs-gap">
                    <div class="inner">
                        <div class="icon-box-wrap"><i class="icon-book-open ln-shadow-box shape-3"></i></div>
                        <h3 class="title-4">Customer service</h3>

                        <p>Ein herausragendes Beispiel für Story-Telling im modernen Webdesign. et suscipit sapien
                            posuere quis. Maecenas ut iaculis nunc, eget efficitur ipsum. Nam vitae hendrerit
                            tortor.</p>
                    </div>
                </div>
                <div class="col-sm-4 xs-gap">
                    <div class="inner">
                        <div class="icon-box-wrap"><i class=" icon-lightbulb ln-shadow-box shape-6"></i></div>
                        <h3 class="title-4">Seller satisfaction</h3>

                        <p>Ein herausragendes Beispiel für Story-Telling im modernen Webdesign. et suscipit sapien
                            posuere quis. Maecenas ut iaculis nunc, eget efficitur ipsum. Nam vitae hendrerit tortor.
                            .</p>
                    </div>
                </div>
                <div class="col-sm-4 xs-gap">
                    <div class="inner">
                        <div class="icon-box-wrap"><i class="icon-megaphone ln-shadow-box shape-5"></i></div>
                        <h3 class="title-4">Best Offers </h3>

                        <p>Ein herausragendes Beispiel für Story-Telling im modernen Webdesign. et suscipit sapien
                            posuere quis. Maecenas ut iaculis nunc, eget efficitur ipsum. Nam vitae hendrerit
                            tortor. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
