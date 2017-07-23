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
                                    <?php  $region = ""; ?>
                                     @foreach($locations as $location)
                                        <?php                                        
                                        $region = "";
                                            if(isset($location->region)){
                                                 $region = $location->region;
                                            }

                                        ?>
                                        @endforeach
                                    <tr> 
                                        <th>Id</th>
                                        @if($region != null)
                                        <th>Region</th>
                                        @endif
                                        <th>Location</th> 
                                        <th>Province</th>                                                                            
                                    </tr> 
                                </thead> 
                                <tbody>                            
                                    @foreach($locations as $location)
                                        <?php 
                                        $locatoin_name = "";
                                        $region = "";
                                            if(isset($location->township)){
                                                $locatoin_name = $location->township;
                                            }else{
                                                $locatoin_name = $location->surbub;
                                                $region = $location->region;
                                            }

                                        ?>
                                        <tr class = ""> 
                                            <td>{{ $location->id }}</td>
                                            @if(isset($location->region))
                                               <td>{{ $location->region }}</td>  
                                            @endif 
                                            <td>{{ $locatoin_name }}</td> 
                                            <td>{{ $location->province }}</td> 

                                            @if(isset($location->township))                                        
                                            <td class ="edit-township">
                                                <a href="#edit-township-modal" data-toggle="modal" class = "{{  $location->id }}">edit township</a>
                                            </td>
                                            @else
                                            <td class ="edit-suburb">
                                                <a href="#edit-suburb-modal" data-toggle="modal" class = "{{  $location->id }}">edit suburb</a>
                                            </td>
                                            @endif

                                             @if(isset($location->township))                                        
                                            <td class = "delete-township">
                                                <a class = "{{ $location->id }}" href="#"> delete township</a>
                                            </td>   
                                            @else
                                             <td class = "delete-surbub">
                                                <a class = "{{ $location->id }}" href="#"> delete surbub</a>
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
             <div class="pagination-bar text-center">{{ $locations->links() }} </div> 
        </div>
    </div>
    <!-- /.main-container -->

    <!-- Modal Change City -->

<div class="modal fade" id="add-township-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Add Township </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        
                        <div style="clear:both"></div>
                        <form action ="{{ url('/add-township') }}" method="post" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="subcategory">Province</label>
                                <select id = "" class = "form-control provinces-select-box" name = "provinces-select-box">                                 
                                       
                                </select>
                                <label for="name">Township</label>
                                <input name ="township-name" required type="text" id ="township-name" class="form-control"> 
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

<div class="modal fade" id="edit-township-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Edit Township </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <p id= 'popular-cities'>
                        </p>
                        <div style="clear:both"></div>                        
                        <div style="clear:both"></div>
                        <form action ="{{ url('/update-township') }}" method="post" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input name ="township-id" required type="text" class="form-control hidden township-id">
                                <label for="subcategory">Province</label>
                                <select id = "" class = "form-control provinces-select-box" name = "provinces-select-box">                                 
                                       
                                </select>
                                <label for="name">Township</label>
                                <input name ="township-name" required type="text"  class="form-control township-name"> 
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

<div class="modal fade" id="add-suburb-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Add Surbub </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>                        
                        <div style="clear:both"></div>
                        <form action ="{{ url('/add-suburb') }}" method="post" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">                               
                                <label for="subcategory">Province</label>
                                <select id = "" class = "form-control provinces-select-box" name = "provinces-select-box">                                 
                                       
                                </select>
                                <label for="name">Region</label>
                                <select id = "" class = "form-control regions-select-box" name = "regions-select-box">                                 
                                       
                                </select> 
                                <label for="name">Suburb</label>
                                <input name ="province-name" required type="text" id ="province-name" class="form-control"> 
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
<!-- /.modal -->

<div class="modal fade" id="edit-suburb-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Add Surbub </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <p id= 'popular-cities'>
                        </p>

                        <div style="clear:both"></div>
                        
                        <div style="clear:both"></div>

                        <form action ="{{ url('/update-surbub') }}" method="post" role="form" enctype="multipart/form-data" files='true'> 
                            {{ csrf_field() }}
                            <div class="form-group">
                            <input name ="suburb-id" required type="text" class="form-control hidden suburb-id">                               
                                <label for="subcategory">Province</label>
                                <select id = "" class = "form-control provinces-select-box" name = "provinces-select-box">                                 
                                       
                                </select>
                                <label for="name">Suburb</label>
                                <input name ="suburb-name" required type="text" class ="suburb-name form-control"> 
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
               
               $(document).ready(function(){

                    path = "{{ url('get-all-provinces') }}";
                    $.ajax({
                        url: path,
                        type: 'get',                   
                        success:function(data){

                            var data = jQuery.parseJSON(data);                                               
                            $.each(data, function(key, item){                       
                                
                                $('.provinces-select-box').append("<option>"+item.province+"</option>");                                                
                                console.log(item);                         
                            });
                        }
                    });

                    path = "{{ url('get-all-regions') }}";
                    $.ajax({
                        url: path,
                        type: 'get',                   
                        success:function(data){

                            var data = jQuery.parseJSON(data);                                               
                            $.each(data, function(key, item){                       
                                
                                $('.regions-select-box').append("<option>"+item.region+"</option>");                                                
                                console.log(item);                         
                            });
                        }
                    });
            
               });  

               $('.edit-township').on('click', function(){
                    id  = $(this).find('a').attr('class'); 

                    alert(id);

                     $('#township-id').val(id)

                path = "{{ url('get-township-by-id') }}"+"/"+id ;
                 $.ajax({
                    url: path,
                    type: 'get',                   
                    success:function(data){

                        var data = jQuery.parseJSON(data);                                               
                        $.each(data, function(key, item){           
                            
                            $('.township-id').val(item.id);
                            $('.township-name').val(item.township);
                            console.log(item.id); 

                        });
                    }
                });
               });

               $('.edit-suburb').on('click', function(){
                    id  = $(this).find('a').attr('class'); 

                    alert(id);

                     $('#township-id').val(id)

                path = "{{ url('get-suburb-by-id') }}"+"/"+id ;
                 $.ajax({
                    url: path,
                    type: 'get',                   
                    success:function(data){

                        var data = jQuery.parseJSON(data);                                               
                        $.each(data, function(key, item){           
                            
                            $('.suburb-id').val(item.id);
                            $('.provinces-select-box').val(item.province);
                            $('.suburb-name').val(item.surbub);
                            console.log(item.id); 

                        });
                    }
                });
               });


            $('.delete-township').click(function(){
                var id = $(this).find('a').attr('class');
                var r = confirm("Are you sure you want to delete this township?");
                alert(id);  

                if (r == true) {
                path = "{{ url('delete-township') }}"+"/"+id;
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

             $('.delete-surbub').click(function(){
                var id = $(this).find('a').attr('class');
                var r = confirm("Are you sure you want to delete this township?");
                alert(id);  

                if (r == true) {
                path = "{{ url('delete-suburb') }}"+"/"+id;
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
