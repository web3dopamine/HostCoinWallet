@extends('layouts.app')

@section('content')
<style type="text/css">


.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: hidden;
  
}

.modal-dialog {
  position: fixed;
  margin: 0;
  width: 100%;
  height: 100%;
  padding: 0;
}

.modal-content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border: 2px solid #3c7dcf;
  border-radius: 0;
  box-shadow: none;
}

.modal-header {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  height: 50px;
  padding: 10px;
  background: #6598d9;
  border: 0;
}

.modal-title {
  font-weight: 300;
  font-size: 2em;
  color: #fff;
  line-height: 30px;
}

.modal-body {
  position: absolute;
  top: 50px;
  bottom: 60px;
  width: 100%;
  font-weight: 300;
  overflow: auto;
}



h1,
h2,
h3 {
  color: #60cc69;
  line-height: 1.5;

  
  &:first-child {
    margin-top: 0;
  }
}

p {
  font-size: 1.4em;
  line-height: 1.5;
  color: lighten(#5f6377, 20%);

  &:last-child {
    margin-bottom: 0;
  }
}

::-webkit-scrollbar {
  -webkit-appearance: none;
  width: 10px;
  background: #f1f3f5;
  border-left: 1px solid darken(#f1f3f5, 10%);
}

::-webkit-scrollbar-thumb {
  background: darken(#f1f3f5, 20%);
}
@media (max-width: 500px){
	.modal-footer {
		position: absolute;
    	/* right: 0; */
    	bottom: 0;
	    left: 0;
	    height: 60px;
	    padding: 10px;
	    
	}
}
@media (min-width: 501px)	{
.modal-footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  height: 60px;
  padding: 10px;
  background: #f1f3f5;
}
}
</style>
 <body class="bg-dark">
    <img src="{{ url('public/includes/img/logo.jpg') }}" width="30" height="30" class="credsLogo"/>
    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">
          HostCoin Wallet - V 0.0.1
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
            <a class="d-block small mt-3" href="{{ url('register') }}">Register an Account</a>
            <a class="d-block small" href="{{ url('/password/reset') }}">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>
  <!-- modal -->
<div id="fsModal"
     class="modal animated bounceIn"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true">

  <!-- dialog -->
  <div class="modal-dialog">

    <!-- content -->
    <div class="modal-content">

      <!-- header -->
      <div class="modal-header">
        <h1 id="myModalLabel"
            class="modal-title">
          Important Notification...!!
        </h1>
      </div>
      <!-- header -->
      
      <!-- body -->
      <div class="modal-body">
        <h2>Welcome</h2>

        <p style="font-family:"> Welcome To HostCoin Wallet V 0.0.1. In this wallet you will be able to exchange and Mine HostCoin Tokens. We are still adding New Exiciting Features to the wallet. Version Release and Code will be shown on <a href="https://github.com/hostcoinwallet/development" target="_blank"> Github </a></p>
        
        <h2>Security Update</h2>

        <p> We have added Google Authentication for security reasons, those who have already registered will have to <b style="color: #a94442;">REGISTER AGAIN</b> and safegaurd the secret key provided. Your HostCoin tokens will be reflected within <b style="color: #a94442;">72 hours</b> of your registeration.</p>

        <h2>Tokenlot Buyers</h2>

        <p>Those who have bought from HostCoin Tokens tokelot.com, their tokens will be reflected on <b style="color: #a94442;"> 1st December 2017.</b></p>
      </div>
      <!-- body -->

      <!-- footer -->
      <div class="modal-footer">
        <button class="btn btn-primary mobileCss"
                data-dismiss="modal">
          CLOSE
        </button>
      </div>
      <!-- footer -->

    </div>
    <!-- content -->

  </div>
  <!-- dialog -->

</div>
<!-- modal -->
    <!-- Modal -->
<div id="welcomeModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><img src="{{ url('public/includes/img/logo.jpg') }}" width="30" height="30" class=""/> Welcome to HOSTCOIN WALLET - V 0.0.1</h4>
      </div>
      <div class="modal-body">
        <p style="">Note : We have added Google authentication for extra security hence you will have to register again,
        Your HostCoin Tokens will reflect within 72 hours of your Registeration.</p>
        <p style="color: #a94442;">Those who bought HostCoin Tokens from Tokenlot will be reflected on 1st December</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
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
    <script type="text/javascript">
      $(document).ready(function(){
        $("#fsModal").modal("show")
      })
    </script>
  </body>
@endsection
