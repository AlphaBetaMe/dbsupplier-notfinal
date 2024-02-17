<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Review;
use App\Models\Timeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class FrontendController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $cart=Cart::where('user_id',Auth::user()->id)->count(); 
            $cat=Category::where('popular','1')->take(10)->get();

            $fproducts = Product::where('trending','1')->take(10)->get();

            $promos = Product::where('cate_id', '3')->take(10)->get();
            
            return view('frontend.index', compact('fproducts','cat','cart','promos'));
        }
        else
        {
            $cart=Cart::where('user_id')->count(); 
            $cat=Category::where('popular','1')->take(10)->get();
        
            $fproducts = Product::where('trending','1')->take(10)->get();

            $promos = Product::where('cate_id', '3')->take(10)->get();
            return view('frontend.index', compact('fproducts','cat','cart','promos'));
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

    public function supplier(Request $request, $id)
    {
        
        
        $supplier = User::findOrFail($id);
        
        $category=Category::where('status','0')->get();
        $timelines = Timeline::where('user_id', $supplier->id)->get();

        $products = $supplier->products; 

        $promos = Product::where('user_id', $supplier->id)->where('cate_id', 3)->get();

        if (Auth::check()) {
            $cartShop = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $cartShop = 0; 
        }

        return view('frontend.supplier', compact('timelines', 'supplier', 'products', 'promos','category','cartShop'));
    }

    public function supplierList()
    {
        $suppliers = User::role('Supplier')->get();
        $category=Category::where('status','0')->get();
        if (Auth::check()) {
            $cartShop = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $cartShop = 0; 
        }
        return view('frontend.supplierList', compact('suppliers','category','cartShop'));
    }

   public function contact() {
        return view("frontend.contact");
   }

   public function about() {
    return view("frontend.about");
}

    public function filterSuppliers(Request $request)
    {
        $suppliers = User::role('Supplier');

                if ($request->has('city')) {
                    $location = $request->input('city');
                    $suppliers->where('city', 'like', "%$location%");
                }

                $suppliers = $suppliers->get();

                return view('frontend.supplierList', compact('suppliers'));
    }

    public function registerSupplier()
    {
       return view('frontend.registersupplier');
    }

    public function registerSupplierStore(Request $request)
    {
        try{
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:8',

        ]);
    
        $hashedPassword = Hash::make($request->input('password'));

        $users = new User();    
        $users->name=$request->Input('name');
        $users->email=$request->Input('email');
        $users->password = $hashedPassword;
        $users->save();

        $userId= $users->id;
        $suppliers = new Supplier();
        $suppliers->user_id = $userId;
        if($request->hasFile('application'))
        {
            $file = $request->file('application');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->application = $filename;
        }
        if($request->hasFile('buspermit'))
        {
            $file = $request->file('buspermit');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->buspermit = $filename;
        }
        if($request->hasFile('dticert'))
        {
            $file = $request->file('dticert');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->dticert = $filename;
        }
        
        if($request->hasFile('birpermit'))
        {
            $file = $request->file('birpermit');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->birpermit = $filename;
        }

        if($request->hasFile('mpermit'))
        {
            $file = $request->file('mpermit');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->mpermit = $filename;
        }
        if($request->hasFile('bcert'))
        {
            $file = $request->file('bcert');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->bcert = $filename;
        }

        if($request->hasFile('valid'))
        {
            $file = $request->file('valid');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->valid = $filename;
        }

        if($request->hasFile('pic'))
        {
            $file = $request->file('pic');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->pic = $filename;
        }

        if($request->hasFile('membership'))
        {
            $file = $request->file('membership');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/suppliers/', $filename);
            $suppliers->membership = $filename;
        }
        
        $suppliers->payment = '100';
        $suppliers->status = 'for verification';
        $suppliers->save();

        return redirect()->route('frontend.registersupplier')
                        ->with('success','Registered Successfully');
        }
        catch (ValidationException $e) {
        // Redirect back with errors
        return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.')->withInput();
        }
        
    }
}

