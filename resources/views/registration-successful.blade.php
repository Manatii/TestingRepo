@extends('layouts.master')
@section('pagetitle')
  <title>KASOCULAR - Registration Sucessful</title>
@endsections
@section('content')

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <div class="inner-box category-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success pgray  alert-lg" role="alert">
                                    <h2 class="no-margin no-padding">&#10004; Congratulations! You have successful registered.</h2>                                    
<p>You can now post ads</p>


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
