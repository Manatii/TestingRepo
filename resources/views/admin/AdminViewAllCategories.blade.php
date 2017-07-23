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
                                        <th>Category Name</th> 
                                        <th>Category Image</th>                                     
                                    </tr> 
                                </thead> 
                                <tbody>
                                    @foreach($categories as $category)

                                        <tr class = ""> 
                                            <td>{{ $category->cat_id }}</td>
                                            <td>{{ $category->category }}</td>                                            
                                            <td>
                                                <img src ="images/category/{{ $category->category_image }}"  style="width:70px;height:60px;" onerror="this.src='{{ url('images/user.jpg')}}'" />
                                            </td>
                                            <td class ="edit-category">
                                                <a href="#edit-category-modal" data-toggle="modal" class = "{{ $category->cat_id }}">edit</a>
                                            </td> 
                                            <td class = "delete-category">
                                                <a id = "{{ $category->cat_id }}" class = href="#"> delete </a>
                                            </td>                                                                                                                                                                        
                                        </tr> 
                                    @endforeach                                  
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
             <div class="pagination-bar text-center">{{ $categories->links() }} </div> 
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
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Add Category </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        
                        <div style="clear:both"></div>

                        <form action ="{{ url('/add-category') }}" method="post" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name ="category-name" type="text" id ="category-name" class="form-control"> 
                                <label for="name">Image</label>                                
                                    <div class="mb10">
                                        <input name = "categoryImage" id="input-upload-img1" type="file" class="file"
                                                               data-preview-file-type="text">                                    
                                </div>
                            </div> 
                            <button type="submit" class="btn btn-success">Add</button>                       
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

<div class="modal fade" id="edit-category-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Edit Category </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        
                        <div style="clear:both"></div>

                        <form action ="{{ url('/update-category') }}" method="post" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name ="cat-id" type="text" id ="cat-id" class="form-control hidden"> 
                                <input name ="category-name" type="text" placeholder ="Category name" id ="cat-name" class="form-control"> 
                                <label for="name">Image</label>  
                                <input name ="category-image" type="text" id ="category-image" class="form-control hidden">                               
                                <div class="mb10">
                            <input name = "new-image" id="input-upload-img1" type="file" class="file"
                                                               data-preview-file-type="text">                                    
                                </div>
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
               
            $('.edit-category').on('click',function(){

                var password = prompt("Enter Admin password:");
                id  = $(this).find('a').attr('class');      
                alert(id);

                path = "{{ url('populateCategoryModalBox') }}"+"/"+id+"/"+password;
                $.ajax({
                    url: path,
                    type: 'get',                   
                    success:function(data){
                        var message = $.trim(data);
                        if(message === "Incorrect password!!"){
                            alert(data);
                            location.reload();
                        }else{
                            var data = jQuery.parseJSON(data);                                               
                            $.each(data, function(key, item){                       
                                $('#cat-id').val(item.cat_id);
                                $('#cat-name').val(item.category);   
                                $('#category-image').val(item.category_image); 
                                //location.reload();                    
                                console.log(item);                         
                            });  
                        }
                    }
                });
            
            });

            $('.delete-category').click(function(){
            var password = prompt("Enter Admin password:");
            var id = $(this).find('a').attr('id'); 

            path = "{{ url('delete-category') }}"+"/"+id+"/"+password;
             $.ajax({
                url: path,
                type: 'GET',
               success:function(data){

                    if($.trim(data) === "Deleted!!"){

                        location.reload();
                    }
                    else{
                        alert(data);
                    }                   
                    console.log(data);
                }
            });   
        });
           
           
    


        </script>
    @endsection
