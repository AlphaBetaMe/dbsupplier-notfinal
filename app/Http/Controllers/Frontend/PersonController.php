<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        // $orders = Order::where('user_id',Auth::id())->get();

        if($request->has('search')){
            $orders = Order::search($request->search)->where('user_id', Auth::id())->paginate(15);
        } else {
            $orders = Order::where('user_id', Auth::id())->get();
        }

        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();

        $links = Link::all();

        return view('frontend.orders.view', compact('orders', 'links'));
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
