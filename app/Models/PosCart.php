<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class PosCart extends Model
{
    use HasFactory;

    protected $table = "pos_carts";

    protected $fillable = [
        'prod_code',
        'prod_qty',
        'product_price',
        'user_id',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'prod_code', 'id');
    }
}
