<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $table='carts';

    protected $fillable = [
        'user_id', 'prod_id', 'prod_qty','selected',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
