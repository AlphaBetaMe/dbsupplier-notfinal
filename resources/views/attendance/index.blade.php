@extends('layouts.sample')

@section('content')
    <div class="container-fluid mt-3">
        <h3>Attendance</h3>
        <div class="row">
            <div class="col">
                <form action="{{ route('attendance.monthly') }}">
                    <div class="form-group">
                        <label for="month">Month</label>
                        <select name="month" id="month" class="form-select">
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}" {{ date('m') == $month ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-select">
                        @foreach (range(date('Y') - 23, date('Y') + 100) as $year)
                            <option value="{{ $year }}" {{ date('Y') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
             <button type="submit" class="btn btn-primary">View Time Logs</button>
            </div>
        </div>
        </form>   
        <hr>
        
        <div class="button">
            <div class="row">
                <div class="col">
                    <form action="{{ route('time-in') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Time In</button>
                    </form>
                </div>
                <div class="col">
                    @foreach ($attendanceLogs as $attendance)
                        @if (!$attendance->time_out)
                            <form action="{{ route('time-out', $attendance->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Time Out</button>
                            </form>
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    <div class="table mt-3">
        <table class="table">
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
                        <td>{{ $attendance->user->name }}</td>
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
                                {{ \Carbon\Carbon::parse($attendance->time_out)->diff(\Carbon\Carbon::parse($attendance->time_in))->format('%h hours %i minutes') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>                
</div>
@endsection