<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table='comments';

    protected $fillable = [
        'user_id',
        'timeline_id',
        'comments',

    ];

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }

    // Define the relationship with User if you want to associate comments with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
