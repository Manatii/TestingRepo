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
                                        <th>Sub-Category Name</th> 
                                        <th>Category Id</th>                                                                            
                                    </tr> 
                                </thead> 
                                <tbody>
                                    @foreach($subCategories as $subCategory)

                                        <tr class = ""> 
                                            <td>{{ $subCategory->id }}</td>
                                            <td>{{ $subCategory->subcategory_name }}</td> 
                                            <td>{{ $subCategory->category_id }}</td>                                          
                                            <td class ="edit-sub-category">
                                                <a href="#edit-category-modal" data-toggle="modal" class = "{{  $subCategory->id }}">edit</a>
                                            </td> 
                                            <td class = "delete-sub-category">
                                                <a id = "{{ $subCategory->id }}" class = href="#"> delete </a>
                                            </td>                                                                                                                                                                        
                                        </tr> 
                                    @endforeach                                  
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
             <div class="pagination-bar text-center">{{ $subCategories->links() }} </div> 
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
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Add Sub-Category </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        
                        <div style="clear:both"></div>
                        <form action ="{{ url('/add-sub-category') }}" method="get" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="subcategory">Main Category</label>
                                <select id = "" class = "form-control catagories-select-box" name = "category_id">                                 
                                       
                                </select>
                                <label for="name">Category Name</label>
                                <input name ="category-name" required type="text" id ="category-name" class="form-control"> 
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
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Edit Sub-category </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        
                        <div style="clear:both"></div>

                        <form action ="{{ url('/update-sub-category') }}" method="post" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="subcategory">Main Category</label>

                                <input type = "text" class = "hidden form-control sub-category-id"  name="sub-category-id">
                                <select id = "" class = "form-control catagories-select-box" name = "new-sub-category_id">                                 
                                       
                                </select>
                                <label for="name">Category Name</label>
                                <input name ="new-sub-category-name" type="text" required id ="new-sub-category-name" class="form-control"> 
                            </div> 
                            <button type="submit" class="btn btn-success">Update</button> 
                            </div>
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
               
            $('.edit-sub-category').on('click',function(){

                var password = prompt("Enter Admin password:");
                id  = $(this).find('a').attr('class'); 
                alert(id);     
                $('.sub-category-id').val(id)

                path = "{{ url('get-sub-category-by-id') }}"+"/"+id+"/"+password;
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
                                
                                $('#new-sub-category-name').val(item.subcategory_name);
                                console.log(item);                         
                            });
                        }
                    }
                });

            });

            $('.delete-sub-category').click(function(){
            var password = prompt("Enter Admin password:");
            var id = $(this).find('a').attr('id'); 
            
            path = "{{ url('delete-sub-category') }}"+"/"+id+"/"+password;
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


             $(document).ready(function(){

                   
                //very important...without this statement...
                //jquery will add categories on below the list of categories 
                //every time the admin clicks ad-sub-category
                $("#catagories-select-box").empty();

                path = "{{ url('populate-category-selectbox') }}";
                 $.ajax({
                    url: path,
                    type: 'get',                   
                    success:function(data){
                        var data = jQuery.parseJSON(data);                                               
                        $.each(data, function(key, item){
                             console.log(item); 
                            $(".catagories-select-box").append("<option value='"+item.cat_id+"'>"+item.category+"</option>");                      
                                                   
                        });
                    }
                });

                $("#catagories-select-box").empty();
            
            });
           
           
    


        </script>
    @endsection
