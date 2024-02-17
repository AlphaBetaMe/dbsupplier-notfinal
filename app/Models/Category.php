<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'categories';

    protected $fillable = [
            'name',
            'slug',
            'description',
            'status',
            'popular',
    ];

    public function toSearchableArray()
    {
        return[
            'name' =>$this->name,
            'slug'=>$this->slug,
            'description'=>$this->description,
            ];
    }
}
