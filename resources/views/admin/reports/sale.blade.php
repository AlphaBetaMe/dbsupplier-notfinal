<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheyfactory</title>
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
        
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


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
<a href="{{ url('dashboard')}}" class="dontPrint btn btn-danger">Back</a>
</div>

<body>
<div class="container-fluid py-2">
    <div class="row">
        <center>
        <!-- <img src="{{asset('public/assets/Logo1.jpg')}} "style="width:200px;"> -->
    <h2>Whey Factory PH</h2>
        </center>
    
    <center>
        <p><h4>ECOMMERCE Sales Report</h4></p>
        as of {{date('Y-m-d')}}
    </center>
    </div>
</div>
<div class="container-fluid">
    <form action="{{ route('chart') }}" method="GET">
        <div class="row">
            <div class="col">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
            </div>
            <div class="col">
            <label for="end_date">End Date:</label>     
                <div class="input-group mb-3">
                    <input type="date" id="end_date" name="end_date" class="form-control">
                    <button type="submit" class="btn btn-warning">Generate Chart</button>   
                </div>
            </div>
        </div>
    </form>
    <canvas id="myChart"></canvas>
    <div>
        <label>Reported: {{Auth::user()->name}} {{Auth::user()->lname}}</label><br>
        <label>Date and Time: {{date('Y-m-d, H:i:s')}}</label>
    </div>
</div>

   


<script>
    var labels = @json($dataChartlabel);
    var values = @json($dataChartVal);
    var totalAmount = values.reduce((total, value) => total + value, 0);

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart;

    function generateChart() {
        if (myChart) {
            myChart.destroy(); // Destroy the previous chart if it exists
        }
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        formatter: function(value, context) {
                            if (context.dataset.label === 'Total') {
                                return 'Total: $' + totalAmount.toFixed(2); // Format the total amount
                            } else {
                                return '$' + value.toFixed(2); // Format the value of each bar
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Call the generateChart function initially
    generateChart();
</script>
</body>
</html>