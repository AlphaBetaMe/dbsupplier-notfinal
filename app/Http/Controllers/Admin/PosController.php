<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PosOder;
use App\Models\PosCart;
use App\Models\PosOrderDetail;
use App\Models\PaymentQr;
use App\Models\TransactionPos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $posOders = PosOder::all();
        $qrs = PaymentQr::all();

         //LastOrders
         $lastID = PosOrderDetail::max('posOrder_id');
         $posOrderReceipt = PosOrderDetail::where('posOrder_id',$lastID)->get();
        

         return view('admin.pos.index',
             ['products' =>$products,
             'posOders'=>$posOders,
             'posOrderReceipt'=>$posOrderReceipt, 'lastID'=>$lastID, 'qrs'=>$qrs]);
        
    }

    // public function search()
    // {
    //     return view('admin.pos.index');
    // }
    // public function receipt()
    // {
    //     $products = Product::all();
    //     $posOders = PosOder::all();

    //      //LastOrders
    //      $lastID = PosOrderDetail::max('posOrder_id');

    //      $posOrderReceipt = PosOrderDetail::where('posOrder_id',$lastID)->get();
    //         return view('admin.pos.receipt',
    //             ['products' =>$products,
    //             'posOders'=>$posOders,
    //             'posOrderReceipt'=>$posOrderReceipt]);

      
    // }

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
        $request->validate([
            'payment' => 'required|numeric|min:0|not_in:0',
            'change' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use($request){
            
           
        //POS model
            $posOders = new PosOder;

            $posOders->customerName = $request->customerName;
            $posOders->customerContact = $request->customerContact;
            $posOders->save();

                $posOder_id = $posOders->id;

        //POS Details
        for($product_id= 0; $product_id < count($request->product_id); $product_id++)
        {

            $posOderDetails = new PosOrderDetail;
            $posOderDetails->posOrder_id = $posOder_id;
            $posOderDetails->product_id = $request->product_id[$product_id];
            $posOderDetails->product_name = $request->product_name[$product_id];
            $posOderDetails->posQuantity = $request->posQuantity[$product_id];
            $posOderDetails->posPrice = $request->posPrice[$product_id];
            $posOderDetails->posDiscount = $request->posDiscount[$product_id];
            $posOderDetails->posTotal_amount = $request->posTotal_amount[$product_id];

            $posOderDetails->save();

            $prod = Product::where('id', $posOderDetails->product_id)->first();
            $prod->quantity = $prod->quantity - $posOderDetails->posQuantity;
            $prod->update();

            
        }
        $posOderDetails = $posOderDetails->id;

        //Transaction Model

       
        $posTrans = new TransactionPos;
        $posTrans->posOrder_id = $posOderDetails;
        $posTrans->user_id = Auth::user()->id;
        $posTrans->change = $request->change;
        $posTrans->payment = $request->payment;
        $posTrans->paymentMethod = $request->paymentMethod;
        $posTrans->transaction_amount=$request->transaction_amount;
        $posTrans->transaction_date =  date('Y-m-d');
        $posTrans->save();

        PosCart::where('user_id', auth()->user()->id)->delete();

       
        
        //Order History
        $products = Product::all();
        $posOderDetails = PosOrderDetail::where('posOrder_id', $posOder_id)->get();

        $posOrderBy = PosOder::where('id',$posOder_id)->get();


        return view('admin.pos.index', compact('products'))->with('message', 'Transaction Completed');
        

        });
            return back()->with("POS fails to continue the transaction!");
        

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
        $posTrans = PosOrderDetail::findOrFail($id);
        $posTrans->delete();
        
         return redirect()->back()
        ->with('success','Transaction deleted successfully');
        
    }

    public function posTransaction(Request $request)
    {

        if($request->has('search')){
            $posTrans = PosOrderDetail::search($request->search)->paginate(10);
        } else {
            $posTrans = PosOrderDetail::orderBy('posOrder_id', 'desc')->paginate(10); 
        }
        return view('admin.pos.transaction', compact('posTrans'));
    }
}
