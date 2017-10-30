@extends('layouts.app')

@section('content')
<body class="bg-dark">
    <img src="{{ url('public/includes/img/logo.jpg') }}" width="30" height="30" class="credsLogo"/>
 <div class="container">

      <div class="card card-register mx-auto mt-5">
        <div class="card-header text-center">
          Register an Account with HostCoin Wallet
        </div>
        <div class="card-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {{ csrf_field() }}
          
           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter full name"/>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong  style="color: #a94442;">{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}"  placeholder="Enter Email Address">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color: #a94442;">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Enter Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong style="color: #a94442;">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation" placeholder="Enter Confirm Password">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong style="color: #a94442;">{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
            </div>
            {!! Captcha::display($attributes=[]) !!}
            <br/>
            <button type="submit" class="btn btn-primary btn-block" href="login.html">Register</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="{{ url('login') }}">Login Page</a>
            <a class="d-block small" href="{{ url('/password/reset') }}">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>
        <footer class="bottom-footer">
      <div class="container">
        <div class="text-center">
          <small>HostCoin &copy; Copyright 2017</small>
        </div>
      </div>
    </footer>    
  </body>

</body>    
@endsection
