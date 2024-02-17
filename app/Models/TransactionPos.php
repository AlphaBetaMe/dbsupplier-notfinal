<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class TransactionPos extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'transaction_pos';
    protected $fillable = [
        'posOrder_id',
        'payment',
        'change',
        'transaction_date',
        'transaction_amount',
        'user_id',
        'paymentMethod'
    ];

    public function toSearchableArray()
    {
        return [
            'posOrder_id' => $this->posOrder_id,
            'payment' => $this->payment, // Assuming the relation is defined as 'product'
            'change' => $this->change,
            'transaction_date' => $this->transaction_date,
            'transaction_amount' => $this->transaction_amount,
            'paymentMethod' => $this->paymentMethod,
        ];
    }

}
