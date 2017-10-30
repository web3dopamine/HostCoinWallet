<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HOSTC</title>

    
    <!-- Styles -->
    <link href="{{ secure_url('public/includes/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Dosis:400,600' rel='stylesheet' type='text/css'>

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />

    <!-- Plugin CSS -->
    <link href="{{ secure_url('public/includes/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    
    <link href="{{ secure_url('public/includes/css/sb-admin.css') }}" rel="stylesheet">
    
    <link href="{{ secure_url('public/includes/css/style.css') }}" rel="stylesheet">
    
    
    
    <link href="{{ secure_url('public/includes/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="{{ secure_url('public/includes/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <script> window.intergramId = "-262345979" </script>
    <script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>
    <link href="{{ secure_url('public/includes/css/jquery-te-1.4.0.css') }}" rel="stylesheet">        
</head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
       <!--<img src="{{ url('public/includes/img/logo.jpg') }}" width="50" height="50"/>-->
    @yield('menu')   
    @yield('content')
    
    
    <!-- JavaScripts -->
    
    <script type="text/javascript" src="{{ secure_url('public/includes/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ secure_url('public/includes/js/bootstrap.min.js') }}"></script>
    
    
    <script type="text/javascript" src="{{ secure_url('public/includes/js/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ secure_url('public/includes/js/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ secure_url('public/includes/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ secure_url('public/includes/js/dataTables.bootstrap4.js') }}"></script>
    
    <script type="text/javascript" src="{{ secure_url('public/includes/js/sb-admin.min.js') }}"></script>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js'></script>
    
    <!--Validator-->
    <script type="text/javascript" src="{{ secure_url('public/includes/js/validator.js') }}"></script>
    
    <script type="text/javascript" src="{{ secure_url('public/includes/js/jquery-te-1.4.0.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    
    <script type="text/javascript" src="{{ secure_url('public/includes/js/jsfileinput/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ secure_url('public/includes/js/script.js') }}"></script>
    
   </body>            
</html>
