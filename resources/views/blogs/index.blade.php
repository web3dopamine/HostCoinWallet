@extends('layouts.app')
@extends('blogs.menu')

<style type="text/css">
  
.main-box.no-header {
    padding-top: 20px;
}
.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.table a.table-link.danger {
    color: #e74c3c;
}
.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}
.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}
.user-list tbody td .user-link {
    display: block;
    font-size: 1.25em;
    padding-top: 3px;
    margin-left: 60px;
}
a {
    color: #3498db;
    outline: none!important;
}
.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}
.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}
.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}
.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}
</style>
@section('content')

    <div class="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Blog</a>
          </li>
          <li class="breadcrumb-item active">Blogs list</li>
        </ol>
        
        <!--Container-->
       
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Sr No.</span></th>
                                <th><span>Title</span></th>
                                <th><span>Created</span></th>
                                <th class="text-center"><span>Status</span></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              @foreach($blogs as $b)
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <img src="public/includes/img/{{ $b->image }}" alt="">
                                        <a href="#" class="user-link">{{ $b->title }}</a>
                                        <span class="user-subhead">Admin</span>
                                    </td>
                                    <td>{{ $b->time }}</td>
                                    <td class="text-center">
                                        <span class="label label-default">pending</span>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="#" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="{{ url('blog/'.$b->id.'/edit') }}" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="#" class="table-link danger" data-toggle="modal" data-target="#deleteModal-{{ $b->id }}">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $b->id }}" class="" role="dialog">
                                    	<div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                   <p>Are you Sure you want to Delete ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-lg-12 text-center">
                                                    	<form method="get" action="{{ url('delete_blog') }}">
                                                    	<input type="hidden" name="id" value="{{ $b->id }}">
                                                        <button type="submit" name="submit" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                                        </form>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
               
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>HostCoin &copy; Copyright 2017</small>
        </div>
      </div>
    </footer>


    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  <script>
    $('#transac-history').addClass('active');
    $("#wallet").attr("aria-expanded","true");
    $("#wallet").removeClass("collapsed");
    $('#collapseComponents').addClass('show');
    
			$(document).ready(function() {

        $('.jqte-test').jqte();
      	
      	// settings of status
      	var jqteStatus = true;
      	$(".status").click(function()
      	{
      		jqteStatus = jqteStatus ? false : true;
      		$('.jqte-test').jqte({"status" : jqteStatus})
      	});

				
				$(".bootstrap-tagsinput").addClass("col-lg-10");
			});

      
  </script>      
@stop
