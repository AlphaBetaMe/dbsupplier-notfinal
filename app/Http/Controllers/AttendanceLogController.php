<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceLogController extends Controller
{
    public function index(Request $request, $month = null)
    {
        $attendanceLogs = AttendanceLog::where('user_id', Auth::id())->get();
    
        return view('attendance.index', compact('attendanceLogs'));
    }

    public function timeIn()
    {
        $attendanceLog = new AttendanceLog();
        $attendanceLog->user_id = Auth::id();
        $attendanceLog->time_in = Carbon::now();
        $attendanceLog->save();

        return redirect()->back()->with('success', 'Time in recorded.');
    }

    public function timeOut(Request $request, AttendanceLog $attendanceLog, $id)
    {
    

        $attendance = AttendanceLog::findOrFail($id);
        $currentTime = Carbon::now();
        $hours = $currentTime->hour;
        $minutes = $currentTime->minute;
    
        // Check if it's after 5:00 PM
        if ($hours >= 17 && $minutes >= 0) {
            $attendance->time_out = Carbon::parse('17:00');
        } else {
            $attendance->time_out = $currentTime;
        }
    
        $attendance->update();
    
        return redirect()->back()->with('success', 'Time out recorded');
    }

    public function viewByMonth(Request $request)
    {
        $user = Auth::id();
        $month = $request->input('month');
        $year = $request->input('year');
        $timeLogs = AttendanceLog::where('user_id',  Auth::id())
            ->whereYear('time_in', $year)
            ->whereMonth('time_in', $month)
            ->get();
        
        return view('attendance.monthly', compact('timeLogs'));
    }
}
