<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'pincode',
        'status',
        'total_price',
        'message',
        'dateofevent',
        'trackingNumber',
        'payment_method',
        'image',

    ];

    protected $hidden =
    [
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'pincode',
    ];

    protected $casts =
    [
        'email'=>'encrypted',
        'phone'=>'encrypted',
        'address1' =>'encrypted',
        'address2' =>'encrypted',
        'city' =>'encrypted',
        'state' =>'encrypted',
        'pincode' =>'encrypted',
    ];

   public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function toSearchableArray()
    {
        return [
            'trackingNumber' => $this->trackingNumber,
            'status' => $this->status, // Assuming the relation is defined as 'product'
            'total_price' => $this->total_price,
        ];
    }
}
