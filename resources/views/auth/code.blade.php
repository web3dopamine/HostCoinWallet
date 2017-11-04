@extends('layouts.app')

@section('content')

 <body class="bg-dark">
    <img src="{{ url('public/includes/img/logo.jpg') }}" width="30" height="30" class="credsLogo"/>
    <div class="container">
        @if(!empty($verify_error))
        <div class="alert alert-danger">
          <strong>Alert!</strong> Enter the previous 6-digit code when new code gets generated after 30 seconds
        </div>
        @endif
      <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">
            <a class="removeLink" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" target="_blank">
            <img src="{{ url('public/includes/img/2fa.png') }}" width="50" height="50"/>&nbsp;
            Two-factor Google Authentication
            </a>
        </div>
        <div class="card-body">
           <form method="POST" action="{{url('verifyCode')}}">
            {!! csrf_field() !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group has-feedback">
                <input type="text" name="secret" class="form-control" placeholder="Enter 6-digit Authentication Code">
                <input type="hidden" name="key" class="form-control" value="{{ $key }}">
                    
                <p class="glyphicon glyphicon-envelope form-control-feedback text-center"  style="color: #a94442;">{{ $verify_error }}</p>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Verify Token</button>
                </div><!-- /.col -->
            </div>
        </form>
          
        </div>
      </div>
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
    
  </body>
@endsection

