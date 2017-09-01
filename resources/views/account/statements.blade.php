@extends('layouts.master')
@section('content')
<div class="main-container">
        <div class="container">
            <div class="row">
                 @include('account/account-sidebar')
                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="icon-money"></i> View Transactions </h2>

                        <div style="clear:both"></div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><span> ID</span></th>
                                    <th>Description</th>
                                    <th><strong>Payment Method</strong></th>
                                    <th> Value</th>
                                    <th> Date</th>
                                    <th> Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#01PA</td>
                                    <td> Ad Fees - Pay for a single ad <br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days
                                    </td>
                                    <td>Paid by Mastercard <br> MasterCard. 52008282XXXX


                                    </td>

                                    <td>$40</td>
                                    <td>02/21/2016 08:56</td>
                                    <td><span class="label label-success">Done</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#02PA</td>
                                    <td><p>Ad Fees - Pay for a single ad<br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days</p>
                                    </td>
                                    <td>Paid by Mastercard <br> MasterCard. 52008282XXXX


                                    </td>
                                    <td>$40</td>
                                    <td>02/21/2016 08:56</td>
                                    <td><span class="label label-success">Done</span>
                                    </td>
                                </tr>


                                <tr>
                                    <td>#03PA</td>
                                    <td><p>Ad Fees - Pay for a single ad<br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days</p>
                                    </td>
                                    <td> Pending payments


                                    </td>
                                    <td>$40</td>
                                    <td>03/31/2016 11:25</td>
                                    <td><span class="label label-info">Pending </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#01PA</td>
                                    <td>Ad Fees - Pay for a single ad <br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days
                                    </td>
                                    <td>Paid by Mastercard <br> MasterCard. 52008282XXXX


                                    </td>

                                    <td>$40</td>
                                    <td>03/31/2016 11:25</td>
                                    <td><span class="label label-success">Done</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#02PA</td>
                                    <td><p>Ad Fees - Pay for a single ad<br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days</p>
                                    </td>
                                    <td>Paid by Mastercard <br> MasterCard. 52008282XXXX


                                    </td>
                                    <td>$40</td>
                                    <td>03/29/2016 11:39</td>
                                    <td><span class="label label-success">Done</span>
                                    </td>
                                </tr>


                                <tr>
                                    <td>#03PA</td>
                                    <td><p>Ad Fees - Pay for a single ad<br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days</p>
                                    </td>
                                    <td> Pending payments


                                    </td>
                                    <td>$40</td>
                                    <td>03/20/2016 18:00</td>
                                    <td><span class="label label-info">Pending </span>
                                    </td>
                                </tr>


                                <tr>
                                    <td>#01PA</td>
                                    <td>Ad Fees - Pay for a single ad <br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days
                                    </td>
                                    <td>Paid by Mastercard <br> MasterCard. 52008282XXXX


                                    </td>

                                    <td>$40</td>
                                    <td>03/17/2016 10:17</td>
                                    <td><span class="label label-success">Done</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#02PA</td>
                                    <td><p>Ad Fees - Pay for a single ad<br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days</p>
                                    </td>
                                    <td>Paid by Mastercard <br> MasterCard. 52008282XXXX


                                    </td>
                                    <td>$40</td>
                                    <td>03/17/2016 10:17</td>
                                    <td><span class="label label-success">Done</span>
                                    </td>
                                </tr>


                                <tr>
                                    <td>#03PA</td>
                                    <td><p>Ad Fees - Pay for a single ad<br>
                                        <strong>Ads Type</strong> Premium <br>

                                        <strong>Ads Duration</strong> 30 Days</p>
                                    </td>
                                    <td> Pending payments


                                    </td>
                                    <td>$40</td>
                                    <td>03/15/2016 12:17</td>
                                    <td><span class="label label-info">Pending </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div style="clear:both"></div>

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
<script src="{{ url('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }} "></script>
<script type="text/javascript">
      $(document).ready(function(){
          // /  alert('hi');
            $('.payment-history').addClass('active');
            
         });
</script>
<script src="{{ asset('assets/js/script.js') }}"></script>
@endsection