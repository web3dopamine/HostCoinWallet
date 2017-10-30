@extends('layouts.app')

@section('content')
 <body class="bg-dark">

    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">
          Admin Panel
        </div>
        <div class="card-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/blog') }}">
                        {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Username</label>
              <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' has-error' : '' }}" name="username" value="{{ old('email') }}" placeholder="Username">
               @if ($errors->has('username'))
                    <span class="help-block">
                        <strong style="color: #a94442;">{{ $errors->first('username') }}</strong>
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
        </div>
      </div>
    </div>

    <script src="public/includes/js/popper.min.js"></script>
        
  </body>
@endsection
