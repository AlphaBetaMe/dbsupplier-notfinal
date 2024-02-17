<?php

namespace App\Http\Controllers\Frontend;
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
use App\Models\Promo;
use DB;
use Alert;


class CheckoutController extends Controller
{

    

    // public function index()
    // {
    //     $qrs = PaymentQr::all();

    //     $oldcarts = Cart::where('user_id', Auth::user()->id)->where('selected', 'true')->get();
    //     foreach($oldcarts as $cart)
    //     {
    //         if(!Product::where('id', $cart->prod_id)->where('quantity', '>=', $cart->prod_qty)->exists())
    //         {
    //             $removecart = Cart::where('user_id', Auth::id())->where('prod_id', $cart->prod_id)->first();
    //             $removecart->delete();
    //         }
    //     }
    //     $carts = Cart::where('user_id', Auth::id())->where('selected', 'true')->get();
    //     return view('frontend.checkout', compact('carts', 'qrs'));
        
    // }
    
    public function index()
    {
        $qrs = PaymentQr::all();
    
        $oldcarts = Cart::where('user_id', Auth::user()->id)->where('selected', 'true')->get();
    
        // Check if the user has selected any services
        if ($oldcarts->isNotEmpty()) {
            foreach ($oldcarts as $cart) {
                if (!Product::where('id', $cart->prod_id)->exists()) {
                    $removecart = Cart::where('user_id', Auth::id())->where('prod_id', $cart->prod_id)->first();
                    $removecart->delete();
                    
                }
            }
    
            $carts = Cart::where('user_id', Auth::id())->where('selected', 'true')->get();
            return view('frontend.checkout', compact('carts', 'qrs'));
        } else {
             return back()->with('error','Please select a service before proceeding');
        }
    }

    public function placeOrder(Request $request)
    {
        $user = Auth::user();

        $couponCode = $request->input('code');
        
        if($couponCode != NULL)
        {
            $coupon = Promo::where('code', $couponCode)->where('status','Available')->first();

            if ($coupon) {
                // Calculate the discount amount
                $discountAmount = $coupon->value;
    
                // Apply the discount to the subtotal
                $totalAmount = $request->total_price - $discountAmount;

                $coupon->status='unavailable';
                $coupon->save();
            }
                else
                {
                    
                    return redirect()->back()
                    ->with('error', 'Invalid coupon')
                    ->with('alert-type', 'error');
                }                                                                                                                                                                                                                                                                                                                                                                                                                                                   
            }
            else
            {
                $totalAmount = $request->total_price;
            }

        

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000|dimensions:min_width=100,min_height=100,max_width=457000,max_height=2000',
            'payment_method'=> 'required',
        ], [
            'image.required' => 'Please upload your payment screenshot',
            'payment_method' => 'Please choose payment method.',
        ]);

        
        $order = new Order();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/paymentimage/', $filename);
            $order->image = $filename;
        }

        $order->user_id = Auth::id();
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
        $order->total_price=$totalAmount;
        $order->code=$request->Input('code');
        $order->dateofevent=$request->Input('dateofevent');
        $order->timeofevent=$request->Input('timeofevent');
        $order->typeofevent=$request->Input('typeofevent');
        $order->trackingNumber= 'ALIVE'.rand(1111,9999);
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
                'dateofevent'=>  $order->dateofevent,
                'timeofevent'=>  $order->timeofevent,
            ]);

            $prod = Product::where('id', $cart->prod_id)->first();
            $prod->quantity = $prod->quantity - $cart->prod_qty;
            $prod->update();

        }

        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name=$request->Input('fname');
            $user->lname=$request->Input('lname');
            $user->phone=$request->Input('phone');
            $user->address1=$request->Input('address1');
            $user->address2=$request->Input('address2');
            $user->city=$request->Input('city');
            $user->state=$request->Input('state');
            $user->pincode=$request->Input('pincode');
            $user->update();
        }

        $carts = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($carts);
       
        $user->log("successfully ordered!");
        if($request->input('payment_method') == "BPI" || $request->input('payment_method') == "GCASH")
        {
            Alert::success('Booked Placed','You Successfully booked an event!')->persistent(true, false);
            return redirect('/myOrders')->with('success', "Booking placed Successfully");
        }
        Alert::success('Booked Placed','You Successfully booked an event!')->persistent(true, false);
        return redirect('/myOrders')->with('success', "Booking placed Successfully");
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
    
    
    public function cancelOrder(Request $request)
    {
        $carts = Cart::where('user_id', Auth::user()->id)
                    ->where('selected','=' , 'true') // Assuming 'status' is the field indicating the order status
                    ->get();

        foreach ($carts as $cart) {
            $cart->update(['selected' => false]);
        }
           return redirect()->route('cart')->with('success', 'Order canceled successfully.');
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
