@extends('layouts.app')
@extends('layouts.menu')

@section('content')
    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Settings</a>
          </li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
        @if($success == 1)
        <div class="alert alert-success">
          <strong>Success!</strong> Password changed SuccessFully...!!
        </div>    
        @endif
        @if($success == 2)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> Something went wrong please try again
        </div>    
        @endif
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-key" aria-hidden="true"></i>
                Change Password
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <form  data-toggle="validator" role="form" method="post" action="{{ url('change_password') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    
                    <label for="inputPassword" class="control-label"><b>Current Password</b></label>
                    <div class="form-group row">
                      <div class="form-group col-sm-8">
                        <input type="password" data-minlength="6" class="form-control" name="current_password" id="" placeholder="Password" required>
                        <div class="help-block" style="color: #a94442;"></div>
                      </div>
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputPassword" class="control-label"><b>New Password</b></label>
                    <div class="form-group row">
                      <div class="form-group col-sm-8">
                        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="new_password" placeholder="Password" required>
                        <div class="help-block with-errors" style="color: #a94442;"></div>
                      </div>
                      <div class="form-group col-sm-8">
                        <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword"  name="confirm_password" data-match-error="Whoops, these don't match" placeholder="Confirm Password" required>
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

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
    <script type="text/javascript">
      $('#change_password').addClass('active');
      $("#settings").attr("aria-expanded","true");
      $("#settings").removeClass("collapsed");
      $('#collapseComponents1').addClass('show');
    </script>
@stop
