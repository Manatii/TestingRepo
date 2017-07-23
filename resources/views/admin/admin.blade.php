@extends('layouts.master')
@section('pagetitle')
    <title>KASOCULAR - Admin</title>
@endsection
@section('content')
 <div class="intro-inner">
    <div class="about-intro" style="
    background:url(images/bg2.jpg) no-repeat center;
	background-size:cover;">
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title animated fadeInDown"> Manage Ads </h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/.about-intro -->

    </div>
    <!-- /.intro-inner -->

    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix" id ="myrow">
                <h1 class="text-center title-1"> Manage Ads </h1>
                <hr class="center-block small text-hr">
                <div class="col-lg-12 text-center">
                    <div>                     
                         <a href ="{{ url('/ksclr-admin') }}">
                            <button type="button"  id ="ads" class="btn btn-success"> Ads</button>
                        </a>                    
                        <a href ="{{ url('/users') }}">
                            <button type="button" class="btn btn-primary"> Users</button>
                        </a>  
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"> Main Categories <span class="caret"></span></button> 
                            <ul class="dropdown-menu" role="menu"> 
                               <li>
                                    <a href="{{ url('view-categories') }}">View All</a>
                                </li> 
                                <li>
                                     <a href="#selectRegion"  id="dropdownMenu1"  data-toggle="modal">Add Category</a>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> Sub-categories <span class="caret"></span></button> 
                            <ul class="dropdown-menu" role="menu"> 
                                <li>
                                    <a href="{{ url ('view-all-sub-categories') }}">View All</a>
                                </li> 
                                <li id = "add-sub-category">
                                    <a href="#selectRegion" data-toggle="modal">Add Sub-Category</a>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Locations <span class="caret"></span></button> 
                            <ul class="dropdown-menu" role="menu"> 
                                <li>
                                    <a href="{{ url('townships') }}">Townships</a>
                                </li>
                                <li>
                                    <a href="{{ url('suburbs') }}">Suburbs</a>
                                </li>  
                                <li id = "add-township">
                                    <a href="#add-township-modal" data-toggle="modal">Add Township</a>
                                </li>
                                <li id = "add-township">
                                    <a href="#add-suburb-modal" data-toggle="modal">Add Suburb</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="clear:both">
                    <hr>
                </div>
                <div class="col-lg-12">
                    <form role="form" action = "{{ url('/admin-search-ad') }}">   
                        <div class="col-lg-12">
                        <div class = "row">
                            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-6"> 
                            <input type="text" name = "searchItem" class="form-control" placeholder="Search">                    
                            </div> 
                             <button type="sumbit" class="btn btn-default dropdown-toggle">GO</button>
                        </div>
                    </form>
                    <div class="white-box text-center">
                        <div class="table-responsive ">
                            <table class="table table-hover"> 
                                <thead> 
                                    <tr> 
                                        <th>Id</th> 
                                        <th>Title</th> 
                                        <th>Category</th> 
                                        <th>Main category</th> 
                                        <th>Price</th> 
                                        <th>Township</th> 
                                        <th>Province</th>
                                        <th>Promotion Plan</th> 
                                        <th>Status</th>                                  
                                    </tr> 
                                </thead> 
                                <tbody> 
                                  
                                    @foreach($ads as $ad)

                                         <?php  
                                            $promtionPlan = $ad->featured;
                                            $status = $ad->approved;
                                            $class = "";
                                         ?>                      
                                       

                                        @if($promtionPlan != "None" && $status == "Approved")
                                             <?php $class = "success" ?>
                                        @endif

                                        @if($status == "Pending")
                                             <?php $class = "warning" ?>
                                        @endif
                                        <tr class = "{{$class}}"> 
                                            <td>{{ $ad->adid }}</td> 
                                            <td>{{ $ad->title }}</td>
                                            <td>{{ $ad->catagory }}</td> 
                                            <td>{{ $ad->main_catagory }}</td>
                                            <td>{{ $ad->price }}</td> 
                                            <td>{{ $ad->location }}</td> 
                                            <td>{{ $ad->province }}</td> 
                                            <td>{{ $promtionPlan }}</td> 
                                            <td>{{ $status }}</td>  
                                        </tr> 
                                    @endforeach                      
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>           
        </div>
         <div class="pagination-bar text-center">{{ $ads->links() }} </div> 
    </div>
    <!-- /.main-container -->
     

    @endsection
    @section('scripts')
    <script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript">
         

        $("#ads").hover(function(){
            //alert('dsfdsf');
            $('#ads-menu').show();
         });

         $("#ads-menu").mouseleave(function(){
         
            $('#ads-menu').hide();
            
         });

         $('body').click(function(){
            $('#ads-menu').hide();
         });     

        
        </script>
    @endsection


