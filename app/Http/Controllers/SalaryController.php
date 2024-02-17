<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AttendanceLog;
use Carbon\Carbon;


class SalaryController extends Controller
{
    
    public function index(Request $request)
    {
        $employees= User::role('Employee')->get();
        $attendanceLogs = AttendanceLog::query()->paginate(10);
    
        return view('salary.index', compact('attendanceLogs','employees'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
    public function calculateSalary(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        $employees = User::findOrFail($employeeId);

        $timeLogs = AttendanceLog::where('user_id', $employees)
            ->whereBetween('time_in', [$startDate, $endDate])
            ->whereNotNull('time_out')
            ->get();
        $totalHours = 0;
        foreach ($timeLogs as $timeLog) {
            $timeIn = Carbon::parse($timeLog->time_in / 60);
            $timeOut = Carbon::parse($timeLog->time_out / 60);

            $totalHours += $timeOut->diffInHours($timeIn);
        }

        $salary = $totalHours * $employees->hourly_rate;

        return view('salary.viewSalary', compact('salary','employees'));
    }

    public function userviewByMonth(Request $request)
    {
        $user = $request->Input('id');
        $month = $request->input('month');
        $year = $request->input('year');
        $timeLogs = AttendanceLog::where('user_id', '=', $user)
            ->whereYear('time_in', $year)
            ->whereMonth('time_in', $month)
            ->get();
        
        return view('salary.monthly', compact('timeLogs'));
    }

    public function print(Request $request)
    {
        $employees= User::role('Employee')->get();
        $attendanceLogs = AttendanceLog::query()->paginate(10);
    
        return view('salary.print', compact('attendanceLogs','employees'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
