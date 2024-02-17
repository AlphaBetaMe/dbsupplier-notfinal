<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $cart=Cart::where('user_id',Auth::user()->id)->count(); 
            $cat=Category::where('popular','1')->take(10)->get();
        
            $fproducts = Product::where('trending','1')->take(10)->get();
            return view('frontend.index', compact('fproducts','cat','cart'));
        }
        else
        {
            $cart=Cart::where('user_id')->count(); 
            $cat=Category::where('popular','1')->take(10)->get();
        
            $fproducts = Product::where('trending','1')->take(10)->get();
            return view('frontend.index', compact('fproducts','cat','cart'));
        }
        
    }

    public function category()
    {
        $cartShop=Cart::where('user_id',Auth::user()->id)->count();
        $category=Category::where('status','0')->get();
        return view('frontend.category', compact('category','cartShop'));
    }

    public function viewcategory($slug)
    {
        
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status','0')->get();
            return view('frontend.products.index', compact('category','products'));
        }
        else{
            return redirect('/')->with('status',"Does'nt Exists");
        }
        // 
    }

    public function productview($cate_slug, $prod_slug)
    {
        
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $products=Product::where('slug', $prod_slug)->first();
                $reviews = Review::where('product_id', $products->id)->get();
                return view('frontend.products.view', compact('products','reviews'));
            }
            else{
                return redirect('/')->with('status', 'The link was broken');
            }
        }
        else{
            return redirect('/')->with('status','No such category found');
        }
    }
}
