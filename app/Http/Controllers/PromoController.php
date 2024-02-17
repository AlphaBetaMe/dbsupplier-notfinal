<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promo::all();

        return view('admin.promos.index', compact('promos'));
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
        $promos= new Promo();

        $promos->code= 'PRO'.rand(1111,9999);
        $promos->value=$request->Input('value');
        $promos->percent_off=$request->Input('percent_off');
        $promos->save();
        return redirect()->route('promos.index')
        ->with('success','Promo Added Successfully');


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
        $promos = Promo::find($id);

        return view('admin.promos.edit', compact('promos'));
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
        $promos= Promo::find($id);

        $promos->value=$request->Input('value');
        $promos->save();
        return redirect()->route('promos.index')
        ->with('success','Promo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promo::find($id)->delete();
        return redirect()->route('promos.index')
                        ->with('success','Coupon deleted successfully');
    }
}
