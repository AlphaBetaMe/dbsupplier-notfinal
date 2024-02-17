<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReturn;
use App\Models\Product;

class ProductReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = ProductReturn::orderBy('id', 'desc')->paginate(10);
        $products = Product::all();

        return view('returns.index', compact('returns','products'));
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
        $this->validate($request, [
            'product_id' => 'required',
            'clientName' => 'required',
            'quantity' => 'required',
            'reason' => 'required',
            'price' => 'required',
            'totalPrice' => 'required',
        ]);
        
        $returns = new ProductReturn();

        $returns->product_id=$request->Input('product_id');
        $returns->clientName=$request->Input('clientName');
        $returns->quantity=$request->Input('quantity');
        $returns->reason=$request->Input('reason');
        $returns->price=$request->Input('price');
        $returns->totalPrice=$request->Input('totalPrice');
        $returns->save();

        return redirect()->route('returns.index')
        ->with('success','Returns added successfully');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $returns = ProductReturn::findOrFail($id);
        $returns->delete();

        return redirect()->route('returns.index')
        ->with('success','Transaction deleted successfully');
    }
}
