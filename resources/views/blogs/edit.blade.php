@extends('layouts.app')
@extends('blogs.menu')

<style type="text/css">
    .fileinput-upload-button {
        display: none!important;
    }
    .fileinput-cancel-button {
        display: none!important;
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
          <li class="breadcrumb-item active">Edit Blog</li>
        </ol>
        
        <!--Container-->
       <div class="container">
           <div class="col-lg-12">
                <form id="" class="form-horizontal" action="{{ URL::to('blog/' . $blog->id ) }}" data-toggle="validator" method="post" role="form" enctype="multipart/form-data">                
                {{ method_field('PUT') }}      
                {{ csrf_field() }}
                     <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                        <label class="col-lg-2 control-label">Title :</label>
                        <div class="col-lg-10">
                            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" id="title" data-error="Please fill out this field." placeholder="Title" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        
                    </div>
          					<div class="form-group">
                        
                          <label class="col-lg-12 control-label pull-left">Description :</label>
                          <div class="col-lg-10">
          				  			<input name="description" type="text" class="jqte-test" value="{{ $blog->description }}">
          				  		
          					  	</div>
          					</div>	
          					
          					<div class="form-group">
                        <label class="col-lg-2 control-label">Photo :</label>
                        <div class="col-lg-10" >
                        <input id="file-0a" class="file" name="image" value="public/includes/img/'.{{ $blog->image }}.'" type="file" size="" multiple data-min-file-count="0" data-error="Please fill out this field.">
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tags :</label>
                        <div class="col-lg-10">
                        <input type="text" name="tags" data-role="tagsinput" class="form-control" id="" data-error="Please fill out this field." value="{{ $blog->tags }}" placeholder="Tags" required/>
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><br></label>
                        <div class="col-lg-10">
                        <button type="submit" id="submit_btn" name="submit" class="btn btn-success pull-left ladda-button" style="width:100px" data-style="expand-left">Edit</button>
                    </div>  
                </form>
            <!-- Validator -->
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
    $('#my-wallet').addClass('active');
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
