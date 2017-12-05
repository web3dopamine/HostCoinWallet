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
            <div class="form-group{{ $errors->has('ethereum_address') ? ' has-error' : '' }}">
                <label for="ethereum_address">Ethereum Address</label>
                <input id="ethereum_address" type="text" class="form-control{{ $errors->has('ethereum_address') ? ' has-error' : '' }}" name="ethereum_address" value="{{ old('ethereum_address') }}"  placeholder="Enter Email Address">
                <span id="eth_notice">
                    <div class="alert alert-danger">
                      <strong>Alert!</strong> &nbsp;Please Enter the Ethereum address from which you have bought Hostcoin Token. If you haven't bought then you can enter any ethereum erc20 address
                    </div>
                </span>
                    @if ($errors->has('ethereum_address'))
                        <span class="help-block">
                            <strong style="color: #a94442;">{{ $errors->first('ethereum_address') }}</strong>
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
            <div class="form-group{{ $errors->has('checkbox') ? ' has-error' : '' }}">
                <div class="form-control" id="comment" style="height:115px; overflow-x:hidden">
                                <h3>Legal disclaimer</h3>
                                <b>1. Information published on hostcoinwallet.com</b><br>
                                The Website/Wallet https://hostcoinwallet.com (hereinafter, referred to as the "Website/Wallet") provides information and material of a general nature. You are not authorized and nor should you rely on the this Website/Wallet for legal advice, business advice, or advice of any kind. You act at your own risk in reliance on the use of the Website/Wallet. Should you make a decision to act or not act you should contact a licensed attorney in the relevant jurisdiction in which you want or need help. In no way are the owners of, or contributors to, the Website/Wallet responsible for any software problems of the Website/Wallet, for any losses, damages, hacks, security problems, technical failures in Hostcoins hardware or your own.<br>
                                <b>2. Risks related to the use of Hostcoin, Ethereum, Multichain Bitcoin, or any cryptocurrency</b><br>
                                The Website/Wallet will not be responsible for any losses, damages or claims arising from events falling within the scope of the following five categories:<br>
                                (1) Mistakes made by the user of any Hostcoin, Ethereum, Multichain Bitcoin, or any cryptocurrency-related software or service, e.g., forgotten passwords, payments sent to wrong Bitcoin addresses, and accidental deletion of wallets.<br>
                                (2) Software problems of the Website/Wallet and/or any Hostcoin, Ethereum, Multichain Bitcoin, or any cryptocurrency-related software or service, e.g., corrupted wallet file, incorrectly constructed transactions, unsafe cryptographic libraries, malware affecting the Website and/or any Bitcoin-related software or service.<br>
                                (3) Technical failures in the hardware of the user of any Hostcoin, Ethereum, Multichain Bitcoin, or any cryptocurrency-related software or service, e.g., data loss due to a faulty or damaged storage device.<br>
                                (4) Security problems experienced by the user of any Hostcoin, Ethereum, Multichain Bitcoin, or any cryptocurrency-related software or service, e.g., unauthorized access to users' wallets and/or accounts.<br>
                                (5) Actions or inactions of third parties and/or events experienced by third parties, e.g., bankruptcy of service providers, information security attacks on service providers, and fraud conducted by third parties.<br>
                                <b>3. Translations</b></br>
                                he Website/Wallet may contain translations of the English version of the content available on the Website/Wallet. These translations are provided only as a convenience. In the event of any conflict between the English language version and the translated version, the English language version shall take precedence. If you notice any inconsistency, please report them on GitHub<br>
                                <b>4. Risk of loss</b></br>
                                The use of title in Hostcoin or any other digital currency occurs within a decentralized Ethereum, Multichain, Bitcoin or any other blockchain network can lead to loss of money over short or even long periods. The use of Hostcoin or any cryptocurrency Ethereum, Multichain, Bitcoin or any other blockchain network, should expect prices to have large range fluctuations.<br>
                                <b>5. Compliance with tax obligations</b></br>
                                The users of the Website are solely responsible to determinate what, if any, taxes apply to their cryptocurrency transactions of title in Hostcoin or any other digital currency occurs within a decentralized Ethereum, Multichain, Bitcoin or any other blockchain network, and not on the Website/Wallet.
                                The owners of, or contributors to, the Website/Wallet are NOT responsible for determining the taxes that apply to Hostcoin, Ethereum, Multichain Bitcoin, or any cryptocurrency-related transactions.</br>
                                <b>6. The Website does not store, send, or receive Hostcoin, Ethereum, Multichain Bitcoin, or any cryptocurrency-related</b></br>
                                The Website does not store, send or receive Hostcoin. This is because bitcoins exist only by virtue of the ownership record maintained in the blockchain. Any transfer of title in Hostcoin or any other digital currency occurs within a decentralized Ethereum, Multichain, Bitcoin or any other blockchain network, and not on the Website/Wallet.<br>
                                <b>7. No warranties</b><br>
                                The Website/Wallet is provided on an "as is" basis without any warranties of any kind regarding the Website/Wallet and/or any content, data, materials and/or services provided on the Website/Wallet.<br>
                                <b>8. Limitation of liability</b><br>
                                Unless otherwise required by law, in no event shall the owners of, or contributors to, the Website/Wallet be liable for any damages of any kind, including, but not limited to, loss of use, loss of profits, or loss of data arising out of or in any way connected with the use of the Website/Wallet.<br>
                                 
                                <b>9. Arbitration</b><br>
                                The user of the Website/Wallet agrees to arbitrate any dispute arising from or in connection with the Website or this disclaimer, except for disputes related to copyrights, logos, trademarks, trade names, trade secrets or patents.<br>
                                <b>10. Last amendment</b></br>
                                This disclaimer was amended for the last time on November 20th 2017<br>

                            </div>
                            <div class="checkbox">
                                <br>
                              <label><input type="checkbox" value="checkbox" name="checkbox" style="width:20px;height:20px" required>&nbsp;&nbsp;I agree with Terms & Conditions and i have read the disclaimer</label>
                            </div>
                
                    @if ($errors->has('checkbox'))
                        <span class="help-block">
                            <strong style="color: #a94442;">{{ $errors->first('checkbox') }}</strong>
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
    <script type="text/javascript">
        
        $( "#ethereum_address" ).focus(function() {
         $( this ).next( "#eth_notice" ).css( {"display": "inline",
                                                "color":"#a94442",
                                                "font-weight":"900"} );
            // $("#myModal").modal("show");
        });
        

    </script>
</body>    
@endsection
