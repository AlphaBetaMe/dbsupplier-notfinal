@extends('layouts.sample')

@section('content')

    <div class="container mt-3">
        <h3>Time Logs</h3>
        @php $total = 0; @endphp
        <table class="table data-table" id="data-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours Worked</th>
                    <th>Partial Salary</th>
                </tr>
            </thead>
            @if(!empty($timeLogs->time_in))
            <tbody>
                    <tr>
                        No records found.
                    </tr>
            </tbody>
            @else
            <tbody>
                @foreach ($timeLogs as $timeLog)
                    <tr>
                        <td>{{ date('d F Y', strtotime($timeLog->time_in)) }}</td>
                        <td>{{ date('h:i A', strtotime($timeLog->time_in)) }}</td>
                        <td>{{ date('h:i A', strtotime($timeLog->time_out)) }}</td>
                        <td> {{ \Carbon\Carbon::parse($timeLog->time_out)->diff(\Carbon\Carbon::parse($timeLog->time_in))->format('%h hours %i minutes') }} hours</td>
                        <td>Php{{ \Carbon\Carbon::parse($timeLog->time_out)->diff(\Carbon\Carbon::parse($timeLog->time_in))->format('%h hours %i minutes') / 60 * 62.5}}</td>
                    </tr>
                    @php $total += \Carbon\Carbon::parse($timeLog->time_out)->diff(\Carbon\Carbon::parse($timeLog->time_in))->format('%h hours %i minutes') / 60 * 62.5 ; @endphp
                @endforeach
               
            </tbody>
            @endif
        </table>
            <label>Total Monthly Income:</label>
            <strong>
                Php <span id="totalprice"> {{number_format($total,2)}}</span>
            </strong>
    </div>
@endsection
<script>
let sum = 0;
const prices = [...document.querySelectorAll('#data-table .sum')]
  .map(td => isNaN(td.value) ? 0 : +td.value); // an array of numbers
if (prices.length) sum = prices.reduce((a, b) => a + b);   // reduced to a sum
document.getElementById('totalprice').innerHTML += "PHP" + sum.toFixed(2);
</script>