<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PosOrderDetail;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;


class AdminDashboardController extends Controller
{
    // public function index()
    // {
    //     $users = User::count();
    //     $commisions = Supplier::sum('payment');
    //     return view('admin.index', compact('commisions', 'users'));
    // }

    public function index(Request $request)
    {
        $products = Product::count();
        $users = User::count();
      
        $stocks = Product::where('quantity', '<=', 0)->count();
        $posdetails = PosOrderDetail::sum('posTotal_amount');
        $ecomOrder = Order::where('status','Delivered')->sum('total_price');

        // $chart = Order::select(DB::raw("Count(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))

        //         ->whereYear('created_at', date('Y'))
        //         ->groupBy(DB::raw("month_name"))
        //         ->pluck('count', 'month_name');

        
        $chartData = Supplier::select(
            DB::raw("SUM(payment) as total"),
            DB::raw("DATE(created_at) as month_name")
        )
        ->whereYear('created_at', date('Y-d-m'))
        ->groupBy(DB::raw("month_name"))
        ->pluck('total', 'month_name');

            $dataChartLabel = $chartData->keys();
            $dataChartValue = $chartData->values();

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
        
        $bookings = OrderItem::count();
        $customers = User::role('Customer')->count();
        $commisions = Supplier::sum('payment');
        
        return view('admin.index', compact('dataChartValue','dataChartLabel','commisions','customers','bookings','stocks','products', 'users','posdetails','ecomOrder','posChartlabel', 'posChartVal','dailySalesLabels','dailySalesValues','weeklySalesLabels','weeklySalesValues'));
    }

}
