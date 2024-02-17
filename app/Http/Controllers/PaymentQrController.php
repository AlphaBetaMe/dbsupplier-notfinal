<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentQr;
use Illuminate\Support\Facades\Auth;


class PaymentQrController extends Controller
{
    public function index()
    {
        $qrs=PaymentQr::all();
        
        return view('paymentQR.index', compact('qrs'));
    }

    public function create()
    {
        return view('paymentQR.create');
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'payment_type' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
           
        ], [
            'image.required' => 'Add QR Code image',
            'name.required' => 'Card Holder Number is required',
            'number.required' =>'Card Number is required',
            'payment_type.required' =>'Payment Type is required',
    
        ]);
        $user = Auth::user();
        $qrs = new PaymentQr;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/payments/', $filename);
            $qrs->image = $filename;
        }

        $qrs->name=$request->Input('name');
        $qrs->number=$request->Input('number');
        $qrs->payment_type=$request->Input('payment_type');
        $qrs->save();
        $user->log("Added a new payment method");

        return redirect()->route('paymentQR.index')
                        ->with('success','New Payment Method Added Successfully');
    }

    public function edit($id)
    {
        $qrs = PaymentQr::find($id);

        return view('paymentQR.edit', compact('qrs'));

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'payment_type' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
           
        ], [
            'image.required' => 'Add QR Code image',
            'name.required' => 'Card Holder Number is required',
            'number.required' =>'Card Number is required',
            'payment_type.required' =>'Payment Type is required',
    
        ]);
        $qrs = PaymentQr::find($id);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/payments/', $filename);
            $qrs->image = $filename;
        }

        $qrs->name=$request->Input('name');
        $qrs->number=$request->Input('number');
        $qrs->payment_type=$request->Input('payment_type');
        $qrs->update();

        return redirect()->route('paymentQR.index')
                        ->with('success','QR Code updated Successfully');
        
    }

    public function destroy($id)
    {
        $qrs = PaymentQr::find($id);
        $qrs->delete();
        return redirect()->route('paymentQR.index')
                        ->with('success','QR Code deleted Successfully');;
    }
}
