@extends('layouts.app')
@extends('layouts.menu')

@section('content')
    <div class="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Wallet</a>
          </li>
          <li class="breadcrumb-item active">My Wallet</li>
        </ol>
        
        @if($balanceError == 1)
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Oops!</strong> Transaction Could not be completed due to Insufficient Balance...
          </div>
        @endif  
        
         
        <!--Container-->
       <div class="container">
           <div class="col-lg-12 text-center">
               <img src="public/includes/img/hclogo.png" width="150">
               
               <div id="container">
                <!--<svg xmlns="http://www.w3.org/2000/svg" id="logo" viewBox="0 -60 1250 100" style="width:500px;height:100px">-->
                <!--  <path fill="none" />-->
                <!--</svg>-->
                <span style="font-size:60px;">
                <?php
                foreach($address as $a){
                  $balanceAddress = $a->address;
                }
                
                $response = Curl::to('http://multichainrpc:CYeoxgR14cyptsTavbvcPXnLtcJULfRBaCj4DChfDEf8@localhost:6808')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "getaddressbalances", "params": ["'.$balanceAddress.'",0] }')
                 ->post();
               $arr = json_decode($response, true);
               $balance = $arr['result'];
               
               
               if(empty($balance)){
                 echo number_format(0, 8);
               } else {
                 $balance = $arr['result'][0]['qty'];
                  echo number_format($balance, 8);
               }
                ?>
                </span>
                  
                <!-- me -->
                <div class="currency">HOSTC</div>
                
                </div>
                <div class="text-center transacBtns">
                   <button class="btn btn-warning btn-lg" style="padding:15px 75px;" data-toggle="modal" data-target="#sendModal">Send <span class="fa fa-arrow-up"></span></button>
                   <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#receiveModal">Receive <span class="fa fa-arrow-down"></span></button>
               </div>
             </div>    
           </div>
       
              <!--Send Modal -->
              <div id="sendModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-body">
                      <h4 class="modal-title">Send<button type="button" class="close pull-right" data-dismiss="modal">&times;</button></h4>
                      <p><span style="font-size:10px">Send HOSTC to any HOSTC address</span></p>
                      <!--<div class="progress">-->
                      <!--  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">-->
                    	 <!--   Step 1 of 2-->
                      <!--  </div>-->
                      <!--</div>-->
                      <hr/>
                      <form data-toggle="validator" id="tranxForm" role="form" method="post" action="{{ url('transactions') }}">
                          {{ csrf_field() }}
                        <div class="form-group">
                          <label for="inputName" class="control-label">From</label>
                          <select class="form-control" name="address_from" id="fromAdd" required>
                              @foreach($address as $a)
                              <option value="{{ $a->address }}">{{ $a->address }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group has-feedback"> 
                          <label for="inputTwitter" class="control-label">To</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="sentToAdd" name="address_to" placeholder="Enter Receiver Address" required>
                          </div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                          <label for="input" class="control-label">Amount</label>
                          <div class="input-group">
                            <span class="input-group-addon">HOSTC</span>
                            <input type="text" class="form-control" name="amount" data-error="Please fill Amount" id="sendAdd" placeholder="Amount" required>
                            
                          </div>
                          <div class="help-block with-errors" id="balanceError"></div>
                        </div>
                        <div class="form-group">
                          <label for="input" class="control-label">Description</label>
                          <textarea class="form-control" rows="5" name="description" placeholder="(Optional)" id="comment"></textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                          <button type="button" id="sendBtn" class="btn btn-primary" data-target="#submitModal" data-toggle="modal">Go</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                    
                </div>
              </div>
              <!--Receive Modal-->
              <div id="receiveModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      <h4 class="modal-title">Receive</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="text-center">
                        <img src="https://dodgs5cg09x7z.cloudfront.net/images/example-qr.png" height="250" width="250"></img>
                        
                        <p id="hoverInfo">
                          <span class="address">Your HostCoin Address</span>
                          <span class="info">Copy This Address</span>
                          <span class="info">Print This Address</span>
                          <span class="info">Email This Address</span>
                          <span class="info">View on Blockchain</span>
                        </p>

                        @foreach($address as $a)
                              <p id="yourAddress"><b>{{ $a->address }}</b></p>
                        @endforeach
                        <span class="p-30 copyInfo" onclick="copyToClipboard('#yourAddress')"><i class="fa fa-files-o fa-3x" aria-hidden="true"></i></span>
                        <span class="p-30 printInfo" onclick='printDiv();'><i class="fa fa-print fa-3x" aria-hidden="true"></i></span>
                        <a style="color:black" href="mailto:someone@example.com?Subject=My%20Address" target="_top"></a><span class="p-30 emailInfo"><i class="fa fa-envelope-o fa-3x" aria-hidden="true"></i></span></a>
                        <span class="p-30 blockInfo"><i class="fa fa-link fa-3x" aria-hidden="true"></i></span>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
                <!--Balance Modal -->
                <div id="balanceModal" class="modal fade" role="dialog">
                  
                </div>

               <!-- Submit Modal -->
								<div class="modal fade" id="submitModal" class="" role="dialog">
										<div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                               <p>Are you Sure you want to Do this Transaction ?</p>
                            </div>
                            <div class="modal-footer text-center">
                                <div class="col-lg-12">
                                    <button type="submit" style="cursor:pointer" name="submit" id="yes_btn" class="btn btn-success yes_btn">Yes</button>
                                    <button type="button" id="no_btn" class="btn btn-danger" data-dismiss="modal">No</button>
                                </div>
                            </div>    
                        </div>
                    </div>
								</div>
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
  <script>
    $('#my-wallet').addClass('active');
    $("#wallet").attr("aria-expanded","true");
    $("#wallet").removeClass("collapsed");
    $('#collapseComponents').addClass('show');
    
    //copy to clipboard function
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
    
    function printDiv() 
{

  var divToPrint=document.getElementById('yourAddress');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}

$( "#yes_btn" ).click(function() {
  $( "#tranxForm" ).submit();
});

$('#sendAdd').keyup(function(){
  var amt = $('#sendAdd').val();
  var addr = $('#fromAdd').val();
  //alert(123);
  var data = "amt="+amt+"&addr="+addr;
  $.ajax({
    method:'get',
    data : data,
    url : 'check_balance'
  }).done(function(info){
    console.log(info);
    $('#balanceError').html(info);
  })
})
  </script>      
@stop
