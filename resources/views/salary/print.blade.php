<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>

      <!-- Fonts -->
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
        <style>
               @media print {
        .dontPrint{
        display:none;
        }
        }
        </style>
</head>
<body>
<div class="container-fluid mt-2 py-2 ">
<div class="btn-group">
<button onclick="window.print();" class="dontPrint btn btn-info">
Print
</button>
<a href="{{ url()->previous() }}" class="dontPrint btn btn-danger">Back</a>
</div>

    <div class="container text-center mt-4">
        <img src="{{asset('public/asset/whey.png')}}" width="150px" class="text-center">
        <h4>ATTENDANCE REPORT</h4>
        as of: <label>{{date('Y-m-d')}}</label>
    </div>
    <div class="container-fluid mt-3">
      <div class="card">
        <div class="card-body">
          <div class="table table-responsive mt-3">
              <table class="table table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>User</th>
                          <th>Time In</th>
                          <th>Time Out</th>
                          <th>Duration</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($attendanceLogs as $attendance)
                          <tr>
                              <td>{{ $attendance->user->name }} {{ $attendance->user->lname }}</td>
                              <td>{{ \Carbon\Carbon::parse($attendance->time_in)->format('F d, Y h:i A') }}</td>
                              <td>
                                  @if ($attendance->time_out)
                                      {{ \Carbon\Carbon::parse($attendance->time_out)->format('F d, Y h:i A') }}
                                  @else
                                      -
                                  @endif
                              </td>
                              <td>
                                  @if ($attendance->time_out)
                                  {{ \Carbon\Carbon::parse($attendance->time_out)->diff(\Carbon\Carbon::parse($attendance->time_in))->format('%h hours %i minutes')}}
                                  @else
                                      -
                                  @endif
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              {{$attendanceLogs->render()}}
          </div>          
        </div>
      </div>
    </div>
</body>
</html>