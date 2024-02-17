<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PosCart;
use App\Models\Product;
use App\Models\Cart;
use App\Models\PaymentQr;
use Illuminate\Support\Facades\Auth;


class Orders extends Component
{
   

    public $orders, $products = [], $prod_code, $message='', $productIncart, $qrs;

    public $payment= '0', $change='0'; 

    public function mount()
    {
        $this->products = Product::all();
        $this->productIncart = PosCart::all();
        $this->qrs = PaymentQr::all();
    }
    public function InsertProd()
    {
        $countProd = Product::where('prod_code', $this->prod_code)->first();
        if(!$countProd){
            return session()->flash('success','Product Not Found');
        }
        
        $countCartProd = PosCart::where('prod_code', $this->prod_code)->count();
        if($countCartProd > 0){
            return session()->flash('success', 'Product'.$countProd->name.' already exist please add quantity');
        }

        $add_to_cart = new PosCart;
        $add_to_cart->prod_code = $countProd->id;
        $add_to_cart->prod_qty = 1;                     // $countProd->quantity
            $total = 0;
            $total += $countProd->selling_price/100 *$countProd->discount ;
         
            $subtotal = 0;
            $subtotal += $countProd->selling_price-$total;

        
        $add_to_cart->product_price = $subtotal;
        $add_to_cart->user_id = Auth::user()->id;
        $add_to_cart->save();

        $this->productIncart->prepend($add_to_cart);

        $this->prod_code = '';

        return session()->flash('success','Product Added Successfully');

    }

    public function addQuantity($cartId)
    {
        $carts = PosCart::find($cartId);
        $carts->increment('prod_qty', 1);
        
        $total=0;
        $total += $carts->product->selling_price/100 *$carts->product->discount;
        
        $subtotal = 0;
        $subtotal += $carts->product->selling_price-$total;
        
        $updatePrice = $carts->prod_qty * $subtotal;
        
        $carts->update(['product_price' => $updatePrice]);
        $this->mount();
    }

    public function subQuantity($cartId)
    {
        $carts = PosCart::find($cartId);

        if($carts->prod_qty==1){
            return session()->flash('info', 'Product' .$carts->product->name. ' Quantity canot be less than 1 add quantity or remove product.');
        }   
        $carts->decrement('prod_qty', 1);
        
        $total=0;
        $total += $carts->product->selling_price/100 *$carts->product->discount;
        
        $subtotal = 0;
        $subtotal += $carts->product->selling_price-$total;
     
        $updatePrice = $carts->prod_qty * $subtotal;

        $carts->update(['product_price' => $updatePrice]);
        $this->mount();
    }

    

    public function removeProd($cartId)
    {
        $removeCart = PosCart::find($cartId);

        $removeCart->delete();

        return session()->flash('success','Product removed from the list');

        $this->productIncart = $this->productIncart->except($cartId);
    }

    // public function inputQty($cartId)
    // {
    //     $carts = PosCart::find($cartId);

    //     if($carts->prod_qty==1){
    //         return session()->flash('info', 'Product' .$carts->product->name. ' Quantity canot be less than 1 add quantity or remove product.');
    //     }   
    //     $carts->decrement('prod_qty', 1);
        
    //     $total=0;
    //     $total += $carts->product->selling_price/100 *$carts->product->discount;
        
    //     $subtotal = 0;
    //     $subtotal += $carts->product->selling_price-$total;
     
    //     $updatePrice = $carts->prod_qty * $subtotal;

    //     $carts->update(['product_price' => $updatePrice]);
    //     $this->mount();

    // }

    public function render()
    {
        if($this->payment >= '0')
        {
            $totalAmount = $this->payment - $this->productIncart->sum('product_price');
            $this->change = $totalAmount;
            
        }
       return view('livewire.orders');
        
    }

}


