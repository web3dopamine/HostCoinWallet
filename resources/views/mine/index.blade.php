@extends('layouts.app')
@extends('layouts.menu')

@section('content')
    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Mining</a>
          </li>
          <li class="breadcrumb-item active">HostCoin Mining</li>
        </ol>
        
          <div class="text-center">
              <img src="{{ url('public/includes/img/mine.png') }}"/><br>
              <img src="{{ url('public/includes/img/coming_soon.png') }}"/>
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
      $('#mining').addClass('active');
    </script>
@stop
