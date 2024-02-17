
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--style-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!--Alertify JS-->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!---->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            @media print {
        .dontPrint{
        display:none;
        }
        }

        
        </style>
</head>
<div class="container-fluid mt-2 py-2 ">
<div class="btn-group">
<button onclick="window.print();" class="dontPrint btn btn-info">
  Download
</button>
<a href="{{ url()->previous() }}" class="dontPrint btn btn-danger">Back</a>
</div>

<body>
</div>
<div class="container-fluid py-2">
    <div class="row">
        <center>
        <!-- <img src="{{asset('public/assets/Logo1.jpg')}} "style="width:200px;"> -->
    <h2>Whey Factory PH</h2>
        </center>
    
    <center>
        <p><h4>Sales Report</h4></p>
        as of {{date('Y-m-d')}}
    </center>
    </div>
</div>
<div class="py-12 m-4">
        <div class="row">
            <div class ="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        TOTAL ECOMMERCE SALES
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2>Php{{number_format($ecomOrder,2)}}</h2></p>
                        
                        
                    </div>
                    <!-- <div class="card-footer">
                    </div> -->
                </div>
            </div>
            <div class ="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        TOTAL POS SALES
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2>Php {{number_format($posdetails,2)}}</h2></p>
                        
                        
                    </div>
                    <!-- <div class="card-footer">
                    </div> -->
                </div>
            </div>
            <div class ="col">
            @php $total = 0; @endphp
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        TOTAL SALES
                    </div>
                    @php $total = $ecomOrder + $posdetails ; @endphp
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><code><h2>Php {{number_format($total,2)}}</h2></code></p>
                    </div>
                    <!-- <div class="card-footer">
                    <a href="#" class="btn btn-primary font-italic ">Go somewhere</a>
                    </div> -->
                </div>
            </div>
           
            <div class ="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        TOTAL NUMBER OF USER
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2>{{$users}}</h2></p>
                        
                    </div>
                    <!-- <div class="card-footer">
                    <a href="#" class="btn btn-primary font-italic">view details</a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class ="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        Ecommerce CHART
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <canvas id="myChart" width="100%" height="40"></canvas>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>                                                                                                                                  
            </div>
           
        </div>  
        <div class="row">
            <div class ="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                       POS CHART MONTHLY
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <canvas id="myChart_pos" width="50%" height="40px"></canvas>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>                                                                                                                                  
            </div>
            <div class="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                       POS CHART Weekly
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <canvas id="weeklySalesChart"></canvas>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div> 
            </div>
            <div class="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                       POS CHART Daily
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <canvas id="dailySalesChart"></canvas>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div> 
            </div>
        </div>
        <div>
            <label>Reported: {{Auth::user()->name}} {{Auth::user()->lname}}</label><br>
            <label>Date and Time: {{date('Y-m-d, H:i:s')}}</label>
        </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.2/chart.min.js" integrity="sha512-fYE9wAJg2PYbpJPxyGcuzDSiMuWJiw58rKa9MWQICkAqEO+xeJ5hg5qPihF8kqa7tbgJxsmgY0Yp51+IMrSEVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript"> 

        var labels =  {{ Js::from($dataChartlabel) }};
        var dataVal=  {{ Js::from($dataChartVal) }};
        var barColors = [
            'rgba(0, 99, 132, 0.6)',
    'rgba(30, 99, 132, 0.6)',
    'rgba(60, 99, 132, 0.6)',
    'rgba(90, 99, 132, 0.6)',
    'rgba(120, 99, 132, 0.6)',
    'rgba(150, 99, 132, 0.6)',
    'rgba(180, 99, 132, 0.6)',
    'rgba(210, 99, 132, 0.6)',
    'rgba(240, 99, 132, 0.6)'
        ]
        
        const data = {
        labels: labels,
        datasets: [{
            label: '',
            backgroundColor: barColors,
            borderColor: barColors,
            data: dataVal,
        }]
        };
    
        const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            animation: {
                            duration: 1,
                          onComplete: function() {
                            var chart = this;
                            var ctx = chart.ctx;
 
                            ctx.font = Chart.helpers.fontString(Chart.defaults.font.size, Chart.defaults.font.style, Chart.defaults.font.family);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
 
                            this.data.datasets.forEach(function(dataset, i) {
                              var meta = chart.getDatasetMeta(i);
                              meta.data.forEach(function(bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar.x, bar.y - 5);
                              });
                            });
                          }
                        },
            
        }
        };
    
        const myChart = new Chart(
        document.getElementById('myChart'),
        config
        );
</script>

<script type="text/javascript"> 

        var labels_pos=  {{ Js::from($posChartlabel) }};
        var dataVal_pos=  {{ Js::from($posChartVal) }};
        var barColors = [
            'rgba(0, 99, 132, 0.6)',
    'rgba(30, 99, 132, 0.6)',
    'rgba(60, 99, 132, 0.6)',
    'rgba(90, 99, 132, 0.6)',
    'rgba(120, 99, 132, 0.6)',
    'rgba(150, 99, 132, 0.6)',
    'rgba(180, 99, 132, 0.6)',
    'rgba(210, 99, 132, 0.6)',
    'rgba(240, 99, 132, 0.6)'
        ]
        
        const data_pos = {
        labels: labels_pos,
        datasets: [{
            label: '',
            backgroundColor: barColors,
            borderColor: barColors,
            data: dataVal_pos,
        }]
        };
    
        const config_pos = {
        type: 'line',
        data: data_pos,
        options: {
            responsive: true,
            animation: {
                duration: 1,
              onComplete: function() {
                var chart = this;
                var ctx = chart.ctx;

                ctx.font = Chart.helpers.fontString(Chart.defaults.font.size, Chart.defaults.font.style, Chart.defaults.font.family);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function(dataset, i) {
                  var meta = chart.getDatasetMeta(i);
                  meta.data.forEach(function(bar, index) {
                    var data = dataset.data[index];
                    ctx.fillText(data, bar.x, bar.y - 5);
                  });
                });
              }
            },
            
        }
        };
    
        const myChart_pos = new Chart(
        document.getElementById('myChart_pos'),
        config_pos
        );
</script>
<script>
// Weekly Sales Chart
    var weeklySalesLabels = {!! json_encode($weeklySalesLabels) !!};
    var weeklySalesValues = {!! json_encode($weeklySalesValues) !!};

    var weeklySalesChartCtx = document.getElementById('weeklySalesChart').getContext('2d');
    new Chart(weeklySalesChartCtx, {
        type: 'bar',
        data: {
            labels: weeklySalesLabels,
            datasets: [{
                label: 'Weekly Sales',
                data: weeklySalesValues,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        }
    });
</script>
<script>
    // Daily Sales Chart
    var dailySalesLabels = {!! json_encode($dailySalesLabels) !!};
    var dailySalesValues = {!! json_encode($dailySalesValues) !!};

    var dailySalesChartCtx = document.getElementById('dailySalesChart').getContext('2d');
    new Chart(dailySalesChartCtx, {
        type: 'line',
        data: {
            labels: dailySalesLabels,
            datasets: [{
                label: 'Daily Sales',
                data: dailySalesValues,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        }
    });

</html>

