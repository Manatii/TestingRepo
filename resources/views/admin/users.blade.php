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
                        <a href ="{{ url('/admin') }}">
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
                                <li>
                                    <a href="#">Add Sub-category</a>
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
                                    <a href="#">Surbubs</a>
                                </li>  
                                <li>
                                    <a href="#">Add Location</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="clear:both">
                    <hr>
                </div>
               
                
                
                
                <div class="col-lg-12">
                   <form role="form" action = "{{ url('/search-users') }}">                       
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
                                        <th>Name</th> 
                                        <th>Email</th> 
                                        <th>Phone number</th> 
                                        <th>Avator</th>                                                                        
                                    </tr> 
                                </thead> 
                                <tbody> 
                                @if(isset($users))
                                    <?php 
                                        $userArray = $users;
                                    ?>
                                @else
                                    <?php 
                                        $userArray = $user;
                                    ?>
                                @endif
                                  
                                    @foreach($userArray as $user)

                                        <tr class = ""> 
                                            <td>{{ $user->id}}</td>
                                            <td>{{ $user->name }}</td> 
                                            <td>{{ $user->email }}</td> 
                                            <td>{{ $user->phonenumber }}</td> 
                                            <td>
                                                <img src ="{{ $user->avator }}"  style="width:70px;height:60px;" onerror="this.src='{{ url('images/user.jpg')}}'" />
                                            </td> 
                                            <td class  = "view-ads">
                                                <a id = "{{ $user->id}}" href = "<?php echo asset('/admin-search-user-ads/');?><?php echo "/".$user->id; ?> "> View user's ads </a>
                                            </td>                                                                                                                               
                                        </tr> 
                                    @endforeach                                  
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
             <div class="pagination-bar text-center">{{ $userArray->links() }} </div> 
        </div>
    </div>
    <!-- /.main-container -->

    <!-- Modal Change City -->

<div class="modal fade" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                 <input name ="ad-id" type="text" id ="adid" class="form-control hidden"> 
                                 <label for="name">Title</label> 
                                 <input name ="title" type="text" id ="title" class="form-control" placeholder="Category">
                                 <label for="name">Main Category</label> 
                                 <input name ="main-category" type="text" id ="main-category" class="form-control" placeholder="Category">  
                                 <label  for="name">Category</label> 
                                 <input name ="category" type="text" id ="category" class="form-control" placeholder="Category">                                
                                 <label  for="name">Price</label> 
                                 <input name ="price" type="text" id ="price" class="form-control" placeholder="Price">                             
                                 <label  for="name">Township</label> 
                                 <input name ="township" type="text"  id = "township" class="form-control" placeholder="Township">                             
                                 <label  for="province">Province</label> 
                                 <input name ="province" type="text" id ="province" class="form-control" placeholder="Province">                             
                                 <label  for="name">Promotion Plan</label> 
                                 <input name ="promotion-plan" type="text" id ="promotion-plan" class="form-control" placeholder="Promotion Plan">                             
                                 <label for="name">Status</label> 
                                 <input name ="status" type="text" id = "status" class="form-control" placeholder="Status">
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
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

        <script type ="text/javascript">
            $('#view-ads').on('click', function(){
                var id  = $(this).find('a').attr('id');
                   alert(id);

                path = "{{ url('admin-search-ads') }}"+"/"+id;
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

                id  = $(this).find('a').attr('class');      
                alert(id);

                 path = "{{ url('admin-populateModalBox') }}"+"/"+id;
                 $.ajax({
                    url: path,
                    type: 'get',
                    data: {id:id},
                    success:function(data){

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
                });
            
            });

        $('.delete').click(function(){
        var r = confirm("Are you sure you want to delete this ad?");
        var id = $(this).find('a').attr('id') 

        alert(id);

          if (r == true) {
            path = "{{ url('admin-delete-ad') }}"+"/"+id;
             $.ajax({
                url: path,
                type: 'GET',
                success:function(data){
                       location.reload();
                  
                        console.log(data);
                     
                   
               }
            });
        }

      

    });
           
           
    


        </script>
    @endsection
