<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOder extends Model
{
    use HasFactory;

    protected $table='pos_oders';

    protected $fillable = [
        
        'customerName',
        'customerContact',
       

    ];

    public function orderdetails(){
        return $this->hasMany('App\Models\PosOrderDetail');
    }

    
}
