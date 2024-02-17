<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        if($request->has('search')){
            $stocks = Stock::search($request->search)
            // ->with('products')
            ->paginate(5);
            
        }else{
            $stocks = Stock::with('products') // Load the related product
            ->paginate(5);
        }
        $products = Product::all();

        return view('admin.stocks.index', compact('stocks','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'remarks' => 'required',
            'quantity' => 'required',
        ]);
        $stocks = new Stock();

        $stocks->user_id=Auth::id();
        $stocks->product_id = $request->Input('product_id');
        $stocks->quantity = $request->Input('quantity');
        $stocks->remarks = $request->Input('remarks');
        $stocks->save();

        $prod = Product::where('slug', $stocks->product_id)->first();
        $prod->quantity = $prod->quantity + $stocks->quantity;
        $prod->update();

        return redirect()->route('stocks.index')
        ->with('success','Stock Updated successfully');


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
        $stocks = Stock::findOrFail($id);
        $stocks->delete();
        return redirect()->route('stocks.index')
        ->with('success','Transaction deleted successfully');
    }
}
