<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($request->has('search')) {
            $products = $user->products()
                ->search($request->search)
                ->paginate(5);
        } else {
            $products = $user->products()->paginate(5);
        }
    
        return view('admin.products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
         $userId = auth()->id(); // Get the authenticated user's ID

    $products = Product::where('user_id', $userId)
        ->where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })
        ->paginate(10);

            return View::make('admin.products.search-results', compact('products'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.products.create', compact('categories','products'));
    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $products = new Product();
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/services/', $filename);
            $products->image = $filename;
        }
        $products->user_id= Auth::id();
        $products->cate_id= $request->Input('cate_id');
        $products->name = $request->Input('name');
        $products->slug = $request->Input('slug');
        $products->description = $request->Input('description');
        $products->orig_price = $request->Input('orig_price');
        $products->selling_price = $request->Input('selling_price');
        $products->discount = $request->Input('discount');
        $products->exp_date = $request->Input('exp_date');
        $products->tax = $request->Input('tax');
        $products->quantity = $request->Input('quantity');
        $products->status = $request->Input('status')== TRUE ? '1':'0';
        $products->trending = $request->Input('trending') == TRUE ? '1':'0';

        $products->save();
        $user->log("Added new Services");
        return redirect()->route('products.index')
                        ->with('success','Services Added Successfully');

    }

    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('products', 'categories'));
    }

    public function update(Request $request,$id)
    {
        $user = Auth::user();
        $products = Product::find( $id);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/services/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();;
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/services',$filename);
            $products->image=$filename;
        }
        $products->user_id= Auth::id();
        $products->name = $request->Input('name');
        $products->slug = $request->Input('slug');
        $products->description = $request->Input('description');
        $products->orig_price = $request->Input('orig_price');
        $products->selling_price = $request->Input('selling_price');
        $products->discount = $request->Input('discount');
        $products->exp_date = $request->Input('exp_date');
        $products->tax = $request->Input('tax');
        $products->quantity = $request->Input('quantity');
        $products->status = $request->Input('status')== TRUE ? '1':'0';
        $products->trending = $request->Input('trending') == TRUE ? '1':'0';
        $user->log("Update a product");
        $products->update();

        return redirect()->route('products.index')
                        ->with('success','Services Updated Successfully');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $products = Product::find($id);
            $path = 'assets/uploads/services/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        
            $products->delete();
            $user->log("Deleted a product");
            return redirect()->route('products.index')
                        ->with('success','Products Deleted Successfully');

    }

    public function generateBarcode($id){
        // $id = $request->get('id');
        $products = Product::find($id);
        return view('admin.products.printBarcode')->with('products',$products);
    }

    public function myServices()
    {
        $services = Product::where('user_id', Auth::id())->get();

        return view('admin.products.myservices', compact('services'));
    }
}
