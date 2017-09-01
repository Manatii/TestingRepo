<div class="col-sm-3 page-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">
                                <div class="collapse-box">
                                    <h5 class="collapse-title no-border"> My Classified <a class="pull-right"
                                                                                           data-toggle="collapse"
                                                                                           href="#MyClassified"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div id="MyClassified" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li><a href="{{ url('/account') }}"><i class="icon-home"></i> Personal Home </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /.collapse-box  -->
                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Ads <a class="pull-right" data-toggle="collapse"
                                                                          href="#MyAds"><i class="fa fa-angle-down"></i></a>
                                    </h5>

                                    <div id="MyAds" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li class="my-ads ads"><a href="{{ url('/account-myads') }}"><i class="icon-docs"></i> My
                                                ads <span class="badge"><?php echo count($userAds); ?></span> </a></li>
                                            <li class = "my-ads favourate-ads"><a href="{{ url('/account-favourite-ads') }}"><i class="icon-heart"></i>
                                                Favourite ads <span class="badge"><?php echo count($fav_Ads); ?></span> </a></li>
                                           
                                            <li class="my-ads payment-history" ><a href="#"><i class="icon-folder-close"></i>
                                                Archived Ads <span class="badge">0</span></a></li>
                                            <li class="my-ads pending-approval"><a href="{{ url('/account-pending-approval-ads') }}"><i
                                                    class="icon-hourglass"></i> Pending approval <span
                                                    class="badge"><?php echo count($unApprovedAds) ?></span></a></li>

                                        </ul>
                                    </div>
                                </div>

                                <!-- /.collapse-box  -->
                                <div class="collapse-box">
                                    <h5 class="collapse-title"> Terminate Account <a class="pull-right"
                                                                                     data-toggle="collapse"
                                                                                     href="#TerminateAccount"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div id="TerminateAccount" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li><a href=""><i class="icon-cancel-circled "></i> Close
                                                account </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.collapse-box  -->
                            </div>
                        </div>
                        <!-- /.inner-box  -->

                    </aside>
                </div>
                <!--/.page-sidebar-->

<script type="text/javascript">
     
     $('#MyClassified li').click(function(){
            $('#MyClassified li').addClass('active');
            $('#MyAds li').removeClass('active');
     });

     $('.my-ads').click(function(){
          $('.my-ads').removeClass('active');
          $('#MyClassified li').removeClass('active');
          $(this).addClass('active');
     })
     
    
</script>