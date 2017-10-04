@extends('layouts.app')

@section('content')
 <body class="bg-dark">

    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">
          HostCoin Wallet
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Email address</label>
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">
               @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: #a94442;">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="exampleInputPassword1">Password</label>
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Password">
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong style="color: #a94442;">{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  Remember Password
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register">Register an Account</a>
            <a class="d-block small" href="{{ url('/password/reset') }}">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <script src="public/includes/js/popper.min.js"></script>
    
  </body>
@endsection
