<?php

namespace App\Http\Controllers\Api\Frontend;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\PaymentQr;
use DB;


class CheckoutController extends Controller
{

    

    public function index()
    {
        $qrs = PaymentQr::all();

        $oldcarts = Cart::where('user_id', Auth::user()->id)->get();
        foreach($oldcarts as $cart)
        {
            if(!Product::where('id', $cart->prod_id)->where('quantity', '>=', $cart->prod_qty)->exists())
            {
                // $removecart = Cart::where('user_id', Auth::id())->where('prod_id', $cart->prod_id)->first();
                // $removecart->delete();
            }
        }
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('carts', 'qrs'));
        
    }

    public function placeOrder(Request $request)
    {
        

         $order = new Order();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/paymentimage/', $filename);
            $order->image = $filename;
        }

        $order->user_id=$request->Input('user_id');
        $order->fname=$request->Input('fname');
        $order->lname=$request->Input('lname');
        $order->email=$request->Input('email');
        $order->phone=$request->Input('phone');
        $order->address1=$request->Input('address1');
        $order->address2=$request->Input('address2');
        $order->city=$request->Input('city');
        $order->state=$request->Input('state');
        $order->country=$request->Input('country');
        $order->pincode=$request->Input('pincode');
        $order->status=$request->Input('status');
        $order->terms=$request->Input('terms')== TRUE ? '1':'0';
        $order->total_price=$request->Input('total_price');
        $order->trackingNumber= 'WHEY'.rand(1111,9999);
        $order->payment_method=$request->Input('payment_method');
        $order->save();


        $carts = Cart::where('user_id', Auth::id())->get();
        foreach($carts as $cart)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$cart->prod_id,
                'prod_qty'=>$cart->prod_qty,
                'price'=>$cart->products->selling_price,
            ]);

            $prod = Product::where('id', $cart->prod_id)->first();
            $prod->quantity = $prod->quantity - $cart->prod_qty;
            $prod->update();

        }

        $carts = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($carts);

        return response()->json([
            'message' => 'Order placed successfully',
        ], 200);
    }
    
 
    public function razorPay(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;

        foreach($carts as $cart)
        {
            $total_price += $cart->products->selling_price * $cart->prod_qty;
        }

            $fname=$request->input('fname');
            $lname=$request->input('lname');
            $email=$request->input('email');
            $pnumber=$request->input('pnumber');
            $add1=$request->input('add1');
            $add2=$request->input('add2');
            $city=$request->input('city');
            $state=$request->input('state');
            $country=$request->input('country');
            $code=$request->input('code');

            return response()->json([

                'fname'=> $fname,
                'lname'=> $lname,
                'email'=> $email,
                'pnumber'=> $pnumber,
                'add1'=> $add1,
                'add2'=> $add2,
                'city'=> $city,
                'state'=> $state,
                'country'=> $country,
                'code'=> $code,
                'total_price'=>$total_price,

            ]);

    }

    // public function gcashPay(Request $request)
    // {
    //     $carts = Cart::where('user_id', Auth::id())->get();
    //     $total_price = 0;

    //     foreach($carts as $cart)
    //     {
    //         $total_price += $cart->products->selling_price * $cart->prod_qty;
    //     }

    //         $fname=$request->input('fname');
    //         $lname=$request->input('lname');
    //         $email=$request->input('email');
    //         $pnumber=$request->input('pnumber');
    //         $add1=$request->input('add1');
    //         $add2=$request->input('add2');
    //         $city=$request->input('city');
    //         $state=$request->input('state');
    //         $country=$request->input('country');
    //         $code=$request->input('code');

    //         return response()->json([

    //             'fname'=> $fname,
    //             'lname'=> $lname,
    //             'email'=> $email,
    //             'pnumber'=> $pnumber,
    //             'add1'=> $add1,
    //             'add2'=> $add2,
    //             'city'=> $city,
    //             'state'=> $state,
    //             'country'=> $country,
    //             'code'=> $code,
    //             'total_price'=>$total_price,

    //         ]);

    // }
}
