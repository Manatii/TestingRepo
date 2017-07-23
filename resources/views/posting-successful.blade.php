@extends('layouts.master')
@section('pagetitle')
  <title>KASOCULAR - Posting Sucessful</title>
@endsection
@section('content')

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <div class="inner-box category-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success pgray  alert-lg" role="alert">
                                    <h2 class="no-margin no-padding">&#10004; Congratulations! Your ad will be available
                                        soon.</h2>

                                    @if(isset($pin)) 
                                      
                                                                     
                                    <div id="payment-message" style="margin-top:4px; margin-bottom:16px;">
                                       <p>You have chosen to sell your product quicker, please make your payment through one the following platfoms. Use <b>{{$pin}} AS YOUR PIN</b>. We will help you reach thousands of people in minutes. Please note that we will only promote your ad once you make the payment</p>
                                    </div>
        <div class="payment-methods">
        

        <div class="numberlist">    

 <ol>

  <li><a href="#"><b>Capitec Mobile Banking</b> - send your payment to 0833968710</a> </li>
  
  <li><a href="#"><b>FNB E-Wallet</b> - send your payment to the above cellnumber</a></li>

  <li><a href="#"><b>Shoprite Money Market </b> - send Money transfer number via SMS or via our contact form</a></li>

  <li><a href="#"><b>PayPal</b> - use your credit card to make your payment online</a></li>

 </ol>

 </div>


</div>
<p style="margin-bottom:13px;">Thank you for choosing to sell your product with us</p>
@else
<p>Thank you for choosing to sell your product with us</p>
@endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.page-content -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
    </div>
    <!-- /.main-container -->
@endsection
@section('scripts')
<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ URL::asset('assets/js/jquery/jquery-latest.js')}}"></script>





<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- include jquery file upload plugin  -->
<script src="assets/js/fileinput.min.js" type="text/javascript"></script>
<script>
    // initialize with defaults
    $("#input-upload-img1").fileinput();
    $("#input-upload-img2").fileinput();
    $("#input-upload-img3").fileinput();
    $("#input-upload-img4").fileinput();
    $("#input-upload-img5").fileinput();


</script>

<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>


<!-- include jquery list shorting plugin plugin  -->
<script src="assets/js/hideMaxListItem.js"></script>

<!-- include equal height plugin  -->
<script src="assets/js/jquery.matchHeight-min.js"></script>


<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
@endsection
