@extends('layouts.app')

<!-- Main Content -->
@section('content')
<body class="bg-dark">
    
    <div class="container">
     @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
     @endif
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Reset Password
        </div>
        <div class="card-body">
          <div class="text-center mt-4 mb-5">
            <h4>Forgot your password?</h4>
            <p>Enter your email address and we will send you instructions on how to reset your password.</p>
          </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
            <div class="form-group">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <a href="{{ url('login') }}" class="btn btn-primary btn-block">Reset Password</a>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="{{ secure_url('register') }}">Register an Account</a>
            <a class="d-block small" href="{{ url('login') }}">Login Page</a>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScripts -->
    <script type="text/javascript" src="../../../web/public/includes/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../web/public/includes/js/popper.min.js"></script>
    <script type="text/javascript" src="../../../web/public/includes/js/bootstrap.min.js"></script>
    
</body>
@endsection