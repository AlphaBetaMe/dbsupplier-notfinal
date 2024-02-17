<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Alert;

class CartController extends Controller
{
    public function addProdCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
    
        if (Auth::check()) {
            $productCheck = Product::where('id', $product_id)->first();
    
            if ($productCheck) {
                if (Cart::where('prod_id', $product_id)->where('user_id', '=', Auth::id())->exists()) {
                    return response()->json(['status' => $productCheck->name . " Already Added to cart", 'icon' => 'info',]);
                } else {
                    $carts = new Cart();
                    $carts->prod_id = $product_id;
                    $carts->user_id = Auth::user()->id;
                    $carts->prod_qty = 1;
                    $carts->save();
    
                    // Add SweetAlert with success icon
                    return response()->json([
                        'status' => $productCheck->name . " Added to cart",
                        'icon' => 'success', // Specify the success icon
                    ]);
                }
            }
        } else {
            // Add SweetAlert with login prompt
            return response()->json([
                'status' => "Login to Continue",
                'icon' => 'error', // You can change this to a warning or info icon as needed
            ]);
        }
    }
    
    public function addProdCart2(Request $request)
    {
        $product_id = $request->Input('product_id');
        $product_qty = $request->Input('product_qty');
       

        if(Auth::check())
        {   
            $productCheck = Product::where('id', $product_id)->first();

            if($productCheck)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id', '=', Auth::id())->exists())
                {
                    return response()->json(['status'=> $productCheck->name." Already Added to cart"]);
                }
                else
                {
                    $carts = new Cart();
                    $carts->prod_id = $product_id;
                    $carts->user_id = Auth::user()->id;
                    $carts->prod_qty = 1;

                    $carts->save();
                    return response()->json(['status' => $productCheck->name." Added to cart"]);
                }   
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function viewCart()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('carts'));
    }

    // public function removeProduct(Request $request, $id, $prod_id)
    // {
       
    //     $cart=Cart::findOrFail($id);

    //     if ($cart->prod_id == $prod_id) {
    //         $cart->delete();

    //         return response()->json([
    //             'message' => 'Product deleted from cart successfully',
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'message' => 'Failed to delete product from cart',
    //         ], 500);
    //     }
    // }

    public function removeProduct($id, $prod_id)
    {
        try {
            $cart = Cart::findOrFail($id);
    
            if ($cart->prod_id == $prod_id) {
                $cart->delete();
    
                return redirect()->route('cart')->with('success', 'Product deleted from cart successfully');
            } else {
                return redirect()->route('cart')->with('error', 'Failed to delete product from cart');
            }
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function updateCart(Request $request)
    {
        $prod_id=$request->input('prod_id');
        $product_qty=$request->input('prod_qty');

        if(Auth::check())
        {
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();

                return response()->json(['status' => 'Quantity updated']);
            }
        }
    }

    public function checkedCart(Request $request)
    {
        $prodId = $request->input('prodId');
        $isChecked = $request->input('isChecked');

        Cart::where('prod_id', $prodId)->update(['selected' => $isChecked]);

        // Update the database based on $prodId and $isChecked
        // Example: YourCartModel::where('prod_id', $prodId)->update(['selected' => $isChecked]);

        return response()->json(['message' => 'Cart updated successfully']);
    }
}
