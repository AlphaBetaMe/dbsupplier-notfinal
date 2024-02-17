<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductReturn extends Model
{
    use HasFactory;
    use Searchable;

    protected $table='product_returns';

    protected $fillable=[
        'product_id',
        'clientName',
        'quantity',
        'reason',
        'price',
        'totalPrice'
    ];

    public function toSearchableArray()
    {
        return[
            'clientName' =>$this->clientName,
            'reason'=>$this->reason,
            'description'=>$this->description,
            'price'=>$this->price,
            'totalPrice'=>$this->totalPrice,
            ];
    }


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
