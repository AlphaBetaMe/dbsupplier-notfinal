<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PosCart;
use App\Models\PosOrderDetail;
use App\Models\OrderItem;
use App\Models\TransactionPos;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'products';
    
    protected $fillable =[

            'cate_id',
            'name',
            'slug',
            'description',
            'orig_price',
            'selling_price',
            'discount',
            'image',
            'quantity',
            'tax',
            'status',
            'trending',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'exp_date'
            
    ];

    public function toSearchableArray()
    {
        return[
            'name' =>$this->name,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'meta_title'=>$this->meta_title,
            'meta_keywords'=>$this->meta_keywords,
            'meta_description'=>$this->meta_description,
            ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function PosCart()
    {
        return $this->hasMany(PosCart::class,'prod_code', 'id');
    }

    public function orderdetails(){
        return $this->hasMany(PosOrderDetail::class);
    }
    public function orderitemt()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function transactionPos()
    {
        return $this->hasMany(TransactionPos::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
