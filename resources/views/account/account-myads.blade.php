@extends('layouts.master')
@section('content')
<div class="main-container">
        <div class="container">
            <div class="row">
                
                 @include('account-sidebar')
                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="icon-docs"></i> My Ads </h2>

                        <div class="table-responsive">
                            <div class="table-action">
                                <label for="checkAll">
                                    <input type="checkbox" id="checkAll">
                                    Select: All | <a href="#" class="btn btn-xs btn-danger">Delete <i
                                        class="glyphicon glyphicon-remove "></i></a> </label>

                                <div class="table-search pull-right col-xs-7">
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label text-right">Search <br>
                                            <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                        </label>

                                        <div class="col-xs-7 searchpan">
                                            <input type="text" class="form-control" id="filter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="addManageTable"
                                   class="table table-striped table-bordered add-manage-table table demo"
                                   data-filter="#filter" data-filter-text-only="true">
                                <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true"></th>
                                    <th> Photo</th>
                                    <th data-sort-ignore="true"> Adds Details</th>
                                    <th data-type="numeric"> Price</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userAds as $userAd)
                                <tr>
                                    <td style="width:2%" class="add-img-selector">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td style="width:14%" class="add-img-td"><a href="<?php echo asset('/ad-details/');?><?php echo "/".$userAd->adid; ?> "><img
                                            class="thumbnail  img-responsive"
                                            src="<?php echo asset('assets/thumbnail.php?adid=')?><?php echo $userAd->adid;?>"
                                            alt="Image not found" onerror="this.src='{{ url('images/no_image.jpg')}}'"></a></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="<?php echo asset('/ad-details/');?><?php echo "/".$userAd->adid; ?>" title="{{ $userAd->title }}">{{ $userAd->title }}</a> </strong></p>

                                            <p><strong> Posted On </strong>:
                                               {{ $userAd->created_at }} </p>

                                            <p><strong>Visitors </strong>: 221 <strong>Located In:</strong>  {{ $userAd->township}}
                                            </p>
                                        </div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong>R{{$userAd->price }}</strong></div>
                                    </td>
                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <p><a href="/edit-ad/{{$userAd->adid}}" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Edit </a>
                                            </p>

                                            <p><a class="btn btn-info btn-xs"> <i class="fa fa-mail-forward"></i> Share
                                            </a></p>

                                            <p><a class="btn btn-danger btn-xs delete" id="{{ $userAd->adid}}"> <i class=" fa fa-trash"></i> Delete
                                            </a></p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                              
                                </tbody>
                            </table>
                        </div>
                        <!--/.row-box End-->

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

<!-- include checkRadio plugin //Custom check & Radio  -->
<script type="{{ asset('text/javascript" src="assets/js/icheck.min.js') }}"></script>


<!-- include carousel slider plugin  -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- include equal height plugin  -->
<script src="{{ asset('assets/js/jquery.matchHeight-min.js') }}"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="{{ asset('assets/js/hideMaxListItem.js') }}"></script>

<!-- include footable   -->

<script src="{{ asset( 'assets/js/footable.js?v=2-0-1" type="text/javascript') }}"></script>
<script src="{{ asset('assets/js/footable.filter.js?v=2-0-1" type="text/javascript') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#addManageTable').footable().bind('footable_filtering', function (e) {
            var selected = $('.filter-status').find(':selected').text();
            if (selected && selected.length > 0) {
                e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                e.clear = !e.filter;
            }
        });

        $('.clear-filter').click(function (e) {
            e.preventDefault();
            $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
        });

    });

    $('.delete').click(function(){
        var r = confirm("Are you sure you want to delete this ad?");
        var id = $(this).attr('id') 

          if (r == true) {
            path = "{{ url('deletead') }}"+"/"+id;
             $.ajax({
                url: path,
                type: 'GET',
                data: {id:id},
                success:function(data){
                       location.reload();
                  
                        console.log(data);
                     
                   
               }
            });
        }

      

    });
</script>
<!-- include custom script for ads table [select all checkbox]  -->
<script>

    function checkAll(bx) {
        var chkinput = document.getElementsByTagName('input');
        for (var i = 0; i < chkinput.length; i++) {
            if (chkinput[i].type == 'checkbox') {
                chkinput[i].checked = bx.checked;
            }
        }
    }

</script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="{{ asset('assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js') }}"></script>
<!-- include custom script for site  -->
<script src="{{ asset('assets/js/script.js') }}"></script>
@endsection