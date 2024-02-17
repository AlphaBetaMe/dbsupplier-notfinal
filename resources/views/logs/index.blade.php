@extends('layouts.sample')

@section('content')
<style>
       .table-striped tbody tr:nth-of-type(odd) {
        background-color: #D2E0FB;
    }
    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    a.btn-primary,
    a.btn-primary:hover,
    a.btn-primary:active,
    a.btn-primary:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }

    .btn-danger,
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger:focus,
    .a.btn-danger,
    .a.btn-danger:hover,
    .a.btn-danger:active,
    .a.btn-danger:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    
     .btn-success,
    .btn-success:hover,
    .btn-success:active,
    .btn-success:focus,
    .a.btn-success,
    .a.btn-success:hover,
    .a.btn-success:active,
    .a.btn-success:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    
    .btn-info,
    .btn-info:hover,
    .btn-info:active,
    .btn-info:focus,
    .a.btn-info,
    .a.btn-info:hover,
    .a.btn-info:active,
    .a.btn-info:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-danger,
.btn-danger:hover,
.btn-danger:active,
.btn-danger:focus {
    background-color: #000000;
        border-color: #0000000;
        color: #fff; 
}
</style>

<div class ="py-12 m-4">
    <div class ="card">
        <div class ="card-header">
            <h5>User Activity</h5>
        </div>

        <div class="card-body">
            <div class ="py-15 col-md-4">
                <form action="" method="get">
                    <div class ="form-group">
                        <div class ="row">
                            <div class ="col">
                                <input type ="search" name ="search" class="form-control" placeholder="Search Here ...">
                            </div>

                            <div class ="col">
                                <button type ="submit" class="btn btn-primary"><span class="bi bi-search"></span></button>
                                <a href = "#" ><button type = "" class="btn btn-danger"><span class="bi bi-arrow-repeat"></span></button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class ="table table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Name </th>
                            <th scope="col" width="15%">Date</th>
                            <th scope="col" width="50%">Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($audit_trails as $audit)
                            <tr>
                                    
                                <td>{{++$i}}</td>              
                                <td scope="row">{{ $audit->name}}</td>
                                <td scope="row">{{ $audit->created_at}}</td>
                                <td scope="row">{{ $audit->activity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $audit_trails->render() !!}
            </div>
        </div>
    </div>
</div>


@endsection