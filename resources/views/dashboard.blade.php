    @extends('layouts.sample')
    @section('title', 'Dashboard')
    @section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                  {{-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> --}}
                </div>
              </div>
            </div>
          </div>
      
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-info text-light">
                <div class="card-body">
                  <p class="card-title text-light">Total Customer</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <p class="card-text"><h2>{{$customers}}</h2></p>
                    </div>
                    <div>
                      <h1 class="d-inline"><i class="fa fa-users menu-icon"></i></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
            <!-- Additional Card 1 -->
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-warning text-light">
                <div class="card-body">
                  <p class="card-title text-light">Total Bookings</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <p class="card-text"><h2>{{$bookings}}</h2></p>
                    </div>
                    <div>
                      <h1 class="d-inline"><i class="fa fa-calendar menu-icon"></i></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
            <!-- Additional Card 2 -->
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-success text-light">
                <div class="card-body">
                  <p class="card-title text-light">Total Commssion</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <p class="card-text"><h2>Php {{number_format($commisions, 2)}}</h2></p>
                    </div>
                    <div>
                      <h1 class="d-inline"><i class="fa fa-money menu-icon"></i></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
                <div class="card shadow-sm">
                    <div style="width: 80%; margin: auto;">
                        <!-- Display your chart using JavaScript library (e.g., Chart.js) -->
                        <canvas id="supplierPaymentChart"></canvas>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
      <!-- main-panel ends -->
      
        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.2/chart.min.js" integrity="sha512-fYE9wAJg2PYbpJPxyGcuzDSiMuWJiw58rKa9MWQICkAqEO+xeJ5hg5qPihF8kqa7tbgJxsmgY0Yp51+IMrSEVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get data from the controller
            var dataChartLabel = @json($dataChartLabel);
            var dataChartValue = @json($dataChartValue);

            // Create a chart using Chart.js
            var ctx = document.getElementById('supplierPaymentChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dataChartLabel,
                    datasets: [{
                        label: 'Supplier Payments',
                        data: dataChartValue,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    @endsection
