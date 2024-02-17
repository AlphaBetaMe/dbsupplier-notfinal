<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id',Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }
    
    public function cancelOrder(Request $request, $id)
    {
        // $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        // $orders->update(['status' => ('Cancelled')]);
        // $orders->update();
        
        //         $prods = OrderItem::where('id', Auth::id())->first();
       
        
        //     $prod = Product::where('id', $prods->prod_id)->get();
        //     $prod->quantity = $prod->quantity + $prods->prod_qty;
        //     $prod->update();


        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        $orders->status=$request->Input('status');
        $orders->update();
    
        return view('frontend.orders.view', compact('orders'))->with('success','Order Cancelled successfully');
         
    }
}
