<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;


class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'prod_id',
        'prod_qty',
        'price',
        'dateofevent',
        'timeofevent',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
    
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id', 'id');
    }
}
