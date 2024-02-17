<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Alert;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->view('admin.suppliers.index', compact('suppliers'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::findOrFail($id);

        return response()->view('admin.suppliers.edit', compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suppliers = Supplier::find($id);
        $suppliers->status = $request->input('status');
        $suppliers->save();
        
        return redirect()->back(); 

        
        // if($request->hasFile('application'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->application;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('application');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->application=$filename;
        // }

        // if($request->hasFile('buspermit'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->buspermit;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('buspermit');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->buspermit=$filename;
        // }

        
        // if($request->hasFile('dticert'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->dticert;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('dticert');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->dticert=$filename;
        // }

        // if($request->hasFile('birpermit'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->birpermit;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('birpermit');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->birpermit=$filename;
        // }

        // if($request->hasFile('mpermit'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->mpermit;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('mpermit');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->mpermit=$filename;
        // }

        // if($request->hasFile('bcert'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->bcert;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('bcert');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->bcert=$filename;
        // }


        // if($request->hasFile('valid'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->valid;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('valid');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->valid=$filename;
        // }

        // if($request->hasFile('pic'))
        // {
        //     $path = 'assets/uploads/suppliers/'.$suppliers->pic;
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        //     $file = $request->file('pic');
        //     $ext = $file->getClientOriginalName();;
        //     $filename = time().'.'.$ext;
        //     $file->move('assets/uploads/suppliers',$filename);
        //     $suppliers->pic=$filename;
        // }

      
        // $suppliers->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
