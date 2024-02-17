<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\PosOrderDetail;
use Illuminate\Support\Facades\Auth;
use DB;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::count();
        $users = User::count();
        $posdetails = PosOrderDetail::sum('posTotal_amount');
        $ecomOrder = Order::where('status','Delivered')->sum('total_price');

        // $chart = Order::select(DB::raw("Count(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))

        //         ->whereYear('created_at', date('Y'))
        //         ->groupBy(DB::raw("month_name"))
        //         ->pluck('count', 'month_name');

        $chart =Order::select(DB::raw("sum(total_price) as total"), DB::raw("DATE(created_at) as month_name"))
                ->orWhere('status','Delivered')
                ->whereYear('created_at', date('Y-d-m'))
            
                ->groupBy(DB::raw("month_name"))
                ->pluck('total', 'month_name');
                
        $dataChartlabel = $chart->keys();
        $dataChartVal = $chart->values();

        //monthly
        $poschart =PosOrderDetail::select(DB::raw("sum(posTotal_amount) as total_pos"), DB::raw("DATE(created_at) as month_name"))
            ->whereYear('created_at', date('Y-d-m'))
                ->groupBy(DB::raw("month_name"))
                ->pluck('total_pos', 'month_name');

        $posChartlabel = $poschart->keys();
        $posChartVal = $poschart->values();
        //daily
        $dailySalesChart = PosOrderDetail::select(DB::raw("sum(posTotal_amount) as total_pos"), DB::raw("DATE(created_at) as date"))
            ->whereDate('created_at', '>=', now()->subDays(30)) // Modify the number of days as needed
            ->groupBy('date')
            ->pluck('total_pos', 'date');

        $dailySalesLabels = $dailySalesChart->keys();
        $dailySalesValues = $dailySalesChart->values();
        //weekly
        $weeklySalesChart = PosOrderDetail::select(DB::raw("sum(posTotal_amount) as total_pos"), DB::raw("WEEK(created_at) as week"))
            ->whereYear('created_at', date('Y'))
            ->groupBy('week')
            ->pluck('total_pos', 'week');

        $weeklySalesLabels = $weeklySalesChart->keys();
        $weeklySalesValues = $weeklySalesChart->values();

        return view('admin.reports.index', compact('products', 'users','posdetails','ecomOrder','dataChartlabel', 'dataChartVal','posChartlabel', 'posChartVal','weeklySalesValues','weeklySalesLabels','dailySalesLabels','dailySalesValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateChart(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $chart = Order::select(DB::raw("sum(total_price) as total"), DB::raw("DATE(created_at) as month_name"))
            ->orWhere('status', 'Delivered')
            ->whereBetween(DB::raw("DATE(created_at)"), [$startDate, $endDate])
            ->groupBy(DB::raw("month_name"))
            ->pluck('total', 'month_name');

            $dataChartlabel = $chart->keys();
            $dataChartVal = $chart->values();

        return view('admin.reports.sale', compact('dataChartlabel', 'dataChartVal'));
    }
    public function generateChartPos(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $chart = PosOrderdetail::select(DB::raw("sum(posTotal_amount) as total"), DB::raw("DATE(created_at) as month_name"))
            ->whereBetween(DB::raw("DATE(created_at)"), [$startDate, $endDate])
            ->groupBy(DB::raw("month_name"))
            ->pluck('total', 'month_name');

            $dataChartlabel = $chart->keys();
            $dataChartVal = $chart->values();

        return view('admin.reports.salePos', compact('dataChartlabel', 'dataChartVal'));
    }
}
