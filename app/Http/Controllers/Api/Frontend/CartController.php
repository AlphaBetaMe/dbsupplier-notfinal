<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProdCart(Request $request)
    {
        $userId = $request->input('user_id');
        $productId = $request->input('prod_id');
        $quantity = $request->input('quantity', 1);
    
        $cart = Cart::where('user_id', $userId)->where('prod_id', $productId)->first();
    
        if ($cart) {
            $cart->prod_qty += $quantity;
            $cart->save();
        } else {
            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->prod_id = $productId;
            $cart->prod_qty = $quantity;
            $cart->save();
        }
    
        if ($cart) {
            return response()->json([
                'data' => $cart,
                'message' => 'Product added to cart successfully',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed to add product to cart',
            ], 500);
        }
    }

    public function viewCart()
    {
        $carts = Cart::all();
            // where('user_id', Auth::id())->get();
        return response()->json([
            'data' => $carts,
            'message' => 'Products in cart retrieved successfully',
        ], 200);

    }
    public function show()
    {
        // $carts = Cart::where('user_id', Auth::id())->get();
        // return view('frontend.cart', compact('carts'));
        $users = Cart::whereHas('user', function($query) {
        $query->where('prod_qty', '>', 0);
        })->get();

        return $users->toJson();
    }

    public function removeProduct(Request $request, $user_id, $prod_id)
    {

        $cartItem = Cart::where('user_id', $user_id)->where('prod_id', $prod_id)->first();

        if ($cartItem) {
            $cartItem->delete();

            return response()->json([
                'message' => 'Item removed from cart successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to remove item from cart',
            ], 500);
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
}
