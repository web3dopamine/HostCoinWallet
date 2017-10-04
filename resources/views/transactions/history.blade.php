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
          <li class="breadcrumb-item active">Transaction History</li>
        </ol>

         <ul class="nav nav-tabs history-tabs">
    <li class="active"><a data-toggle="tab" href="#home">All</a></li>
    <li><a data-toggle="tab" href="#menu1">Received</a></li>
    <li><a data-toggle="tab" href="#menu2">Sent</a></li>
    <!--<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active show">
      <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            All transactions
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTableAll" cellspacing="0">
                <thead>
                  <tr>
                    <th></th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Amount</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($allTranxs as $a)
                  <tr>
                    @if($a->address_from == $address)
                    <td class="sent"><i class="fa fa-arrow-up" aria-hidden="true"></i> SENT</td>
                    @else
                    <td class="recieved"><i class="fa fa-arrow-down" aria-hidden="true"></i> RECIEVED</td>
                    @endif
                    <td></td>
                    <td>{{ $a->description }}</td>
                    @if($a->address_from == $address)
                    <td><button class="btn btn-danger">{{ $a->amount }} HC</button></td>
                    @else
                    <td><button class="btn btn-success">{{ $a->amount }} HC</button></td>
                    @endif
                  </tr>
                  @endforeach
              </tbody>
              </table>
              <!--<table class="table table-bordered" width="100%" id="dataTableAll" cellspacing="0">-->
              <!--  <tbody>-->
              <!--    <tr>-->
              <!--      <td>4826769</td>-->
              <!--      <td>2 Hours ago</td>-->
              <!--      <td>2412</td>-->
              <!--      <td></td>-->
              <!--      <td>998524</td>-->
              <!--    </tr>-->
              <!--  </tbody>-->
              <!--</table>-->
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>
      
    </div>
    <div id="menu1" class="tab-pane fade">
       <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Received Transactions
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTableReceived" cellspacing="0">
                <thead>
                  <tr>
                    <th></th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Amount <img src="public/includes/img/hclogo.png" width="40"/></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Amount</th>
                  </tr>
                </tfoot>
                <tbody>
                   @foreach($receive as $r)
                  <tr>
                    <td class="recieved"><i class="fa fa-arrow-down" aria-hidden="true"></i> RECIEVED</td>
                    <td>2 Hours ago</td>
                    <td>{{ $r->description }}</td>
                    <td><button class="btn btn-success">{{ $r->amount }} HC</button></td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>
      
    </div>
    <div id="menu2" class="tab-pane fade">
       <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Sent Transactions
          </div>
          <div class="card-body">
            <div class="table-responsive">
                   <table class="table table-bordered" width="100%" id="dataTableSent" cellspacing="0">
                <thead>
                  <tr>
                    <th></th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Amount <img src="public/includes/img/hclogo.png" width="40"/></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Amount</th>
                  </tr>
                </tfoot>
                <tbody>
                   @foreach($sent as $s)
                  <tr>
                    <td class="sent"><i class="fa fa-arrow-up" aria-hidden="true"></i> SENT</td>
                    <td>2 Hours ago</td>
                    <td>{{ $s->description }}</td>
                    <td><button class="btn btn-danger">{{ $s->amount }} HC</button></td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
         
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>
      
    </div>
    <!--<div id="menu3" class="tab-pane fade">-->
    <!--  <h3>Menu 3</h3>-->
    <!--  <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>-->
    <!--</div>-->
  </div>
          </div>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

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
    <script type="text/javascript">
      $('#transac-history').addClass('active');
      $("#wallet").attr("aria-expanded","true");
    $("#wallet").removeClass("collapsed");
    $('#collapseComponents').addClass('show');
    </script>
@stop
