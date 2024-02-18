<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        // if($request->has('search')){
        //     $orders = Order::search($request->search)->where('status', ['Book Placed', 'In Transit','Verified'])->paginate(10);
        // } else {
        //     $orders = Order::where('status', 'Book Placed')->orWhere('status','Verified')->orWhere('status','In Transit')->paginate(10);
        // }
        $orders = Order::search($request->search)->where('status', ['Book Placed', 'In Transit', 'Verified'])->paginate(10);
        // return view('admin.orders.index', compact('orders'));
        return view('admin.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        $products = Product::all();
        return view('admin.orders.view', compact('orders', 'products'));
    }

    public function search(Request $request)
    {
        $orderId = $request->input('orderId');
        $orders = OrderItem::where('order_id', $orderId)->get(); // Assuming 'id' is the primary key

        return View::make('admin.orders.search-results', compact('orders'));
    }

    public function updateOrder(Request $request, $id)
    {
        $user = Auth::user();
        $orders = Order::find($id);

        $orders->status = $request->input('status');
        $orders->update();
        $user->log("Update order");
        return redirect('orders')->with('success', "Order Updated Successfully");
    }

    public function orderHistory()
    {
        $orders = Order::where('status', 'Done')->orwhere('status', 'Cancelled')->get();
        return view('admin.orders.history', compact('orders'));
    }

    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect()->back()
            ->with('success', 'Order deleted successfully');
    }

    public function calendar()
    {
    }
}
