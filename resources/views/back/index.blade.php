@extends('back.layouts.app')
@section('title','Dashboard')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <div class="d-flex flex-column flex-md-row">
                  <p class="lead">
                    <span class="font-weight-bold">Hello, {{ Auth::user()->name }}</span>
                  </p>

                </div>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- .section-block -->
                <div class="section-block">
                  <!-- metric row -->
                  <div class="metric-row">
                    <div class="col-lg-12">
                      <div class="metric-row metric-flush">
                        <!-- metric column -->
                          @php 
                            $customer = \App\User::where('role',2)->count();
                            $product = \App\Product::count();
                            $delivery=\App\Models\Delivery::count();
                            $orders=\App\Models\ServiceOrder::count();
                            $seekers=\App\Models\JobSeekers::count();
                            $provider=\App\Models\JobProvider::count();
                            // $blog = \App\Blog::count();
                            // $subs = \App\Newsletter::count();
                          @endphp
                        <div class="col-md-3 p-0 ">
                          <!-- .metric -->
                          <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label">All Customers </h2>
                            <p class="metric-value h3">
                             <sub><i class="oi oi-people"></i></sub> <span class="value">{{ $customer }}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                        <!-- metric column -->
                      
                        <!-- metric column -->
                        <div class="col-md-3 p-0 ">
                          <!-- .metric -->
                          <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label">All Product Items </h2>
                            <p class="metric-value h3">
                             <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ $product }}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                       <!-- metric column -->
                        <div class="col-md-3 p-0 ">
                          <!-- .metric -->
                          <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label">Deliver List </h2>
                            <p class="metric-value h3">
                            <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ $delivery }}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                        <!-- metric column -->
                        <div class="col-md-3 p-0 ">
                          <!-- .metric -->
                          <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label">Orders </h2>
                            <p class="metric-value h3">
                             <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ $orders }}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                        <div class="col-md-3 p-0 ">
                          <!-- .metric -->
                          <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label">Vacancies  </h2>
                            <p class="metric-value h3">
                             <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ $provider }}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                        <div class="col-md-3 p-0 ">
                          <!-- .metric -->
                          <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label">Job Applications  </h2>
                            <p class="metric-value h3">
                             <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ $seekers }}</span>
                            </p>
                          </a> <!-- /.metric -->
                        </div><!-- /metric column -->
                      </div>
                    </div><!-- metric column -->

                  </div><!-- /metric row -->
                </div><!-- /.section-block -->
                <!-- grid row -->

                @include('back.message.small')
              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div><!-- .app-footer -->
        <footer class="app-footer">

          <div class="copyright"> Copyright © 2020. All right reserved. </div>
        </footer><!-- /.app-footer -->
        <!-- /.wrapper -->
</main><!-- /.app-main -->


@endsection
