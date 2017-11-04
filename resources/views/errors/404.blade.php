@extends('layouts.app')

@section('content')
<style type="text/css">
    
    html { 
        background: url('public/includes/img/Error404.png') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
    }
</style>
 <body class="bg-dark">
    <img src="{{ url('public/includes/img/logo.jpg') }}" width="30" height="30" class="credsLogo"/>
    <div class="container">
        
    </div>

    <script src="public/includes/js/popper.min.js"></script>
      
    <footer class="bottom-footer">
      <div class="container">
        <div class="text-center">
          <small>HostCoin &copy; Copyright 2017</small>
        </div>
      </div>
    </footer>    
  </body>
@endsection
