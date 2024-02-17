<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if($product)
        {
            $product_id = $product->id;
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items','orders.id','order_items.order_id')
                ->where('order_items.prod_id', $product_id)->get(); //verification of user orders

            return view('frontend.reviews.index', compact('product','verified_purchase'));
        }
        else
        {
            return redirect()->back()->with('status','The limk you followed was broken');
        }
    }

    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status','0')->first();
        if($product)
        {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                    'user_id' =>Auth::id(),
                    'product_id'=>$product_id,
                    'user_review'=>$user_review
            ]);
            $category_slug = $product->category->slug;
            $prod_slug = $product->slug;
            if($new_review)
            {
                return redirect('category/'.$category_slug.'/'.$prod_slug)->with('status',"Thank you for writing a review");
            }
        }
        else
        {
            return redirect()->back()->with('status','The limk you followed was broken');
        }
        
    }
}
