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
            <div class="row clearfix">
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
                                     <a href="#selectRegion1"  id="dropdownMenu1"  data-toggle="modal">Add Category</a>
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
                                    <a href="#selectRegion1" data-toggle="modal">Add Sub-Category</a>
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
                                        <th>Title</th> 
                                        <th>Category</th> 
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
                                            <td>{{ $ad->title }}</td>
                                            <td>{{ $ad->catagory }}</td> 
                                            <td>R{{ $ad->price }}</td> 
                                            <td>{{ $ad->township }}</td> 
                                            <td>{{ $ad->province }}</td> 
                                            <td>{{ $promtionPlan }}</td> 
                                            <td>{{ $status }}</td>                                                                                     
                                            <td class = "edit">
                                                <a href="#selectRegion1"  id="dropdownMenu1" class = "{{ $ad->adid }}" data-toggle="modal">edit</a>
                                            </td>                                     
                                            <td class = "delete">
                                                 <a id = "{{ $ad->adid }}" herf ="#"> {{ "delete" }} </a>
                                            </td>
                                            @if(strtolower($status) == "pending")
                                                 <td id = "approve">
                                                    <a id = "{{ $ad->adid }}" herf ="#"> {{ "approve" }} </a>
                                                 </td> 
                                            @endif    
                                        </tr> 
                                    @endforeach                      
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
             <div class="pagination-bar text-center">{{ $ads->links() }} </div> 
        </div>
    </div>
    <!-- /.main-container -->

    <!-- Modal Change City -->

<div class="modal fade locations-modal" id="selectRegion1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Edit an Ad </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        
                        <div style="clear:both"></div>

                        <form action ="{{ url('/admin-update-ad') }}" method="get" role="form"> 
                            <div class="form-group">
                                 <input name ="ad-id" type="text" id ="adid" required = "" class="form-control hidden"> 
                                 <label for="name">Title</label> 
                                 <input name ="title" type="text" id ="title" class="form-control" placeholder="Category">
                                 <label for="name">Main Category</label> 
                                 <select name ="main-category" id ="main-category" class="form-control">
                                    @foreach($mainCategories as $category)
                                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                                    @endforeach
                                 </select>
                                 <label  for="name">Category</label>                                
                                 <select name ="category" id ="category" class="form-control">
                                    @foreach($subcategories as $subCategory)
                                        <option value="{{ $subCategory->subcategory_name }}">{{ $subCategory->subcategory_name }}</option>
                                    @endforeach
                                 </select>
                                 <label  for="name">Price</label> 
                                 <input name ="price" type="text" id ="price" class="form-control" required = "" placeholder="Price">                             
                                 <label  for="name">Township</label> 
                                 <input name ="township" type="text"  id = "township" required = "" class="form-control" placeholder="Township">                             
                                 <label  for="province">Province</label> 
                                 <input name ="province" type="text" id ="province" class="form-control" required = "" placeholder="Province">                             
                                 <label  for="name">Promotion Plan</label> 
                                 <input name ="promotion-plan" type="text" id ="promotion-plan" class="form-control" placeholder="Promotion Plan">                             
                                 <label for="name">Status</label> 
                                 <input name ="status" type="text" id = "status" class="form-control" required = "" placeholder="Status">
                            </div> 
                            <button type="submit" class="btn btn-success">Update</button>                       
                        </form>
                       
                    </div>
                     <div  id="loading-provinces" style="margin-top:13px; display:none;"><img src="{{ asset('images/loading.gif') }}" style="margin-left:120px;"></div>
                    <div class="col-md-12 "  id = "location-link">
                     <ul class='col-md-12'>
                     </ul>                        
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.modal -->
    @endsection

    @section('scripts')

  <script src="{{ asset('assets/js/jquery/jquery-latest.js') }}"></script>
<script src="{{ asset('selectorassets/js/vendors.min.js') }}"></script>

<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery-nicescroll.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.min.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.iframehelper.js') }}"></script>
<script src="{{ url('selectorassets/plugins/jquery-nicescroll/jquery.nicescroll.min.js') }}"></script>

        <script type ="text/javascript">
            $('#approve').on('click', function(){
                var id  = $(this).find('a').attr('id');
                   alert(id);

                path = "{{ url('admin-approve-ad') }}"+"/"+id;
                 $.ajax({
                    url: path,
                    type: 'get',
                    data: {id:id},
                    success:function(data){
                        alert('Ad Approved');
                       location.reload();      
                    }
                });

        });


        
            $('.edit').on('click',function(){

                var password = prompt("Enter Admin password:");
                id  = $(this).find('a').attr('class');         

                 path = "{{ url('admin-populateModalBox') }}"+"/"+id+"/"+password;
                 $.ajax({
                    url: path,
                    type: 'get',
                    //data: {id:id},
                    success:function(data){

                        if($.trim(data) === "Incorect password!!"){                           
                           
                           alert(data);
                           location.reload();
                         
                        }
                        else{
                            var data = jQuery.parseJSON(data);                                               
                            $.each(data, function(key, item){                                                 
                                
                                $('#adid').val(item.adid);
                                $('#title').val(item.title);
                                $('#main-category').val(item.main_catagory);
                                $('#category').val(item.catagory);
                                $('#price').val(item.price);
                                $('#township').val(item.township);
                                $('#province').val(item.province);
                                $('#promotion-plan').val(item.featured);
                                $('#status').val(item.approved);

                                console.log(item);                         
                            });                                
                        }

                       
                    }
                });
            
            });

        $('.delete').click(function(){
        var password = prompt("Enter Admin password:");
        var id = $(this).find('a').attr('id')    
    
        path = "{{ url('admin-delete-ad') }}"+"/"+id+"/"+password;
        $.ajax({
            url: path,
            type: 'GET',
            success:function(data){
               
                var message = $.trim(data);

                if(message === "Incorect password!!"){
                    alert(data);
                }  
                else{
                    alert(data); 
                    location.reload();
                }        
              
            }
        });     
        });
           
           
    


        </script>
        

<script src="{{ asset('selectorassets/js/script.js') }}"></script>
    @endsection
