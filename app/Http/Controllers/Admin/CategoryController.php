<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use DB;

class CategoryController extends Controller
{
    // public function index(Request $request)
    // {
    //     if($request->has('search')){
    //         $categories = Category::search($request->search)
    //             ->paginate(5);
    //     }else{
    //         $categories = Category::paginate(5);
    //     }
    //     return view('admin.categories.index', compact('categories'));
    // }
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $categories = Category::search($request->search)->paginate(5);
        } else {
            $categories = Category::paginate(5);
        }
        return view('admin.categories.index', compact('categories'));
    }
    

     public function search(Request $request)
        {
            // Implement your live search logic here
            $searchTerm = $request->input('search');
            $categories = Category::where('name', 'like', '%' . $searchTerm . '%')->get();
    
            // Return the view or data as needed
          return View::make('admin.categories.search-results', compact('categories'));
        }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $category = new Category();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->name=$request->Input('name');
        $category->slug=$request->Input('slug');
        $category->description=$request->Input('description');
        $category->status=$request->Input('status') == TRUE ? '1':'0';
        $category->popular=$request->Input('popular') == TRUE ? '1':'0';
        $category->save();

        $user->log("Added new category");

        return redirect()->route('category.index')
                        ->with('success','Succesfully Added');
    }

    public function edit ($id)
    {
        $categories = Category::find($id);

        return view('admin.categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $input=$request->all();

        // // $category->update($input);
        // $request->validate([
        //     'name'=>'required',
        //     'slug'=>'required',
        //     'description'=>'required',
        //     'meta_title'=>'required',
        //     'meta_keywords'=>'required',
        //     'meta_description'=>'required',

        // ]);

        $user = Auth::user();

        $category = Category::find($id);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();;
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }

        $category->name=$request->Input('name');
        $category->slug=$request->Input('slug');
        $category->description=$request->Input('description');
        $category->status=$request->Input('status') == TRUE ? '1':'0';
        $category->popular=$request->Input('popular') == TRUE ? '1':'0';
        $category->update();

        $user->log("Added new category");
        return redirect()->route('category.index')
                         ->with('success','Catgory Succesfully Updated');
    }

    

    public function show($id)
    {
    }

        
    public function destroy(Category $category)
    {
        
        $category->delete();
         return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
