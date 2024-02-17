<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Stock extends Model
{
    use HasFactory;
    use Searchable;

    protected $table='stocks';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'remarks'
    ];

  
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id, // Assuming the relation is defined as 'product'
            'remarks' => $this->remarks,
        ];
    }
}
