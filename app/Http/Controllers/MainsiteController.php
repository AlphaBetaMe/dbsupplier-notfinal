<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionVision;
use DB;

class MainsiteController extends Controller
{
    public function index(Request $request)
    {
        $data = DB::table('mission_visions')->get();
        return view('mainsite', compact('data'));
    }
}
