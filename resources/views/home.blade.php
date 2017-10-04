@extends('layouts.app')
@extends('layouts.menu')

@section('content')
    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  26 New Messages!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  11 Transactions
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                  Orders!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Coming Soon</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-support"></i>
                </div>
                <div class="mr-5">
                  Tickets!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Coming Soon</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-area-chart"></i>
            HostCoin/US Dollar (HOSTC/USD) Price Chart
          </div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

        <div class="row">

          <div class="col-lg-8">

            <!-- Example Bar Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                HostCoin v/s AltCoins
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart" width="100" height="50"></canvas>
                  </div>
                  <div class="col-sm-4 text-center my-auto">
                    <div class="h4 mb-0 text-primary">324,693</div>
                    <div class="small text-muted">HOSTC Sold</div>
                    <hr>
                    <div class="h4 mb-0 text-warning">18,474</div>
                    <div class="small text-muted">HOSTC Mined</div>
                    <hr>
                    <div class="h4 mb-0 text-success">16,219</div>
                    <div class="small text-muted">HOSTC Available</div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            <!-- Card Columns Example Social Feed -->
            <div class="mb-0 mt-4">
              <i class="fa fa-newspaper-o"></i>
              News Feed</div>
            <hr class="mt-2">
            <div class="card-columns">

              <!-- Example Social Card -->
              <div class="card mb-3">
                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=610" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#">David Miller</a>
                  </h6>
                  <p class="card-text small">These waves are looking pretty good today!
                    <a href="#">#surfsup</a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-comment"></i>
                    Comment
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <hr class="my-0">
                <div class="card-body small bg-faded">
                  <div class="media">
                    <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <h6 class="mt-0 mb-1">
                        <a href="#">John Smith</a>
                      </h6>
                      Very nice! I wish I was there! That looks amazing!
                      <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                          <a href="#">Like</a>
                        </li>
                        <li class="list-inline-item">
                          ·
                        </li>
                        <li class="list-inline-item">
                          <a href="#">Reply</a>
                        </li>
                      </ul>
                      <div class="media mt-3">
                        <a class="d-flex pr-3" href="#">
                          <img src="http://placehold.it/45x45" alt="">
                        </a>
                        <div class="media-body">
                          <h6 class="mt-0 mb-1">
                            <a href="#">David Miller</a>
                          </h6>
                          Next time for sure!
                          <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                              <a href="#">Like</a>
                            </li>
                            <li class="list-inline-item">
                              ·
                            </li>
                            <li class="list-inline-item">
                              <a href="#">Reply</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer small text-muted">
                  Posted 32 mins ago
                </div>
              </div>

              <!-- Example Social Card -->
              <div class="card mb-3">
                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#">John Smith</a>
                  </h6>
                  <p class="card-text small">Another day at the office...
                    <a href="#">#workinghardorhardlyworking</a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-comment"></i>
                    Comment
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <hr class="my-0">
                <div class="card-body small bg-faded">
                  <div class="media">
                    <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <h6 class="mt-0 mb-1">
                        <a href="#">Jessy Lucas</a>
                      </h6>
                      Where did you get that camera?! I want one!
                      <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                          <a href="#">Like</a>
                        </li>
                        <li class="list-inline-item">
                          ·
                        </li>
                        <li class="list-inline-item">
                          <a href="#">Reply</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer small text-muted">
                  Posted 46 mins ago
                </div>
              </div>

              <!-- Example Social Card -->
              <div class="card mb-3">
                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#">Jeffery Wellings</a>
                  </h6>
                  <p class="card-text small">Nice shot from the skate park!
                    <a href="#">#kickflip</a>
                    <a href="#">#holdmybeer</a>
                    <a href="#">#igotthis</a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-comment"></i>
                    Comment
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <div class="card-footer small text-muted">
                  Posted 1 hr ago
                </div>
              </div>

              <!-- Example Social Card -->
              <div class="card mb-3">
                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#">David Miller</a>
                  </h6>
                  <p class="card-text small">It's hot, and I might be lost...
                    <a href="#">#desert</a>
                    <a href="#">#water</a>
                    <a href="#">#anyonehavesomewater</a>
                    <a href="#">#noreally</a>
                    <a href="#">#thirsty</a>
                    <a href="#">#dehydration</a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-comment"></i>
                    Comment
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <hr class="my-0">
                <div class="card-body small bg-faded">
                  <div class="media">
                    <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <h6 class="mt-0 mb-1">
                        <a href="#">John Smith</a>
                      </h6>
                      The oasis is a mile that way, or is that just a mirage?
                      <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                          <a href="#">Like</a>
                        </li>
                        <li class="list-inline-item">
                          ·
                        </li>
                        <li class="list-inline-item">
                          <a href="#">Reply</a>
                        </li>
                      </ul>
                      <div class="media mt-3">
                        <a class="d-flex pr-3" href="#">
                          <img src="http://placehold.it/45x45" alt="">
                        </a>
                        <div class="media-body">
                          <h6 class="mt-0 mb-1">
                            <a href="#">David Miller</a>
                          </h6>
                          <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789" alt="">
                          I'm saved, I found a cactus. How do I open this thing?
                          <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                              <a href="#">Like</a>
                            </li>
                            <li class="list-inline-item">
                              ·
                            </li>
                            <li class="list-inline-item">
                              <a href="#">Reply</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer small text-muted">
                  Posted yesterday
                </div>
              </div>

            </div>
            <!-- /Card Columns -->

          </div>

          <div class="col-lg-4">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                HostCoin Pie Chart
              </div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            <!-- Example Notifications Card -->
            <div class="card mb-3">
              <iframe src="https://tgwidget.com/widget/?id=59cb49bc83ba8879128b4567" frameborder="0" scrolling="no" horizontalscrolling="no" verticalscrolling="no" width="100%" height="540px" async></iframe>
            </div>
          </div>
        </div>

        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Recent Blocks
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Height</th>
                    <th>Age</th>
                    <th>Transactions</th>
                    <th>Mined By</th>
                    <th>Size</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Height</th>
                    <th>Age</th>
                    <th>Transactions</th>
                    <th>Mined By</th>
                    <th>Size</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
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
      $('#dashboard').addClass('active');
    </script>
@stop
