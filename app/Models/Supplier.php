<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table='suppliers';

    protected $fillable = [
        'application',
        'buspermit',
        'dticert',
        'birpermit',
        'mpermit',
        'bcert',
        'valid',
        'pic',
        'user_id',
        'membership',
        'payment',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
