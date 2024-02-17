<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Laravel\Scout\Searchable;

class PosOrderDetail extends Model
{
    use HasFactory;
    use Searchable;

    protected $table='pos_order_details';

    protected $fillable=[
        'posOrder_id',
        'prod_id',
        'posQuantity',
        'posPrice',
        'posDiscount',
        'product_name',
        'posTotal_amount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public function order()
    {
        return $this->belongsTo('App\Models\PosOder','posOrder_id');
        
    }
    public function toSearchableArray()
    {
        $searchableArray = [
            'posOrder_id' => $this->posOrder_id,
            'posQuantity' => $this->posQuantity,
            'product_name' => $this->product_name,
            'posPrice' => $this->posPrice,
            'posDiscount' => $this->posDiscount,
            'posTotal_amount' => $this->posTotal_amount,
        ];
    
        if ($this->product && $this->product->name) {
            $searchableArray['product_id'] = $this->product->name;
        }
    
        return $searchableArray;
    }

   
}
