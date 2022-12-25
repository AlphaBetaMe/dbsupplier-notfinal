<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Research extends Model
{
    use HasFactory, Searchable;

    const SEARCHABLE_FIELDS = [
        'researchTitle',
        'researchDescription',
        'author',
        'researchStatus',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];


    protected $table ='research';

    protected $fillable =[
        'researchTitle',
        'researchDescription',
        'author',
        'file',
        'researchStatus',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    public function toSearchableArray()
    {
        return[
        'researchTitle' =>$this->researchTitle,
        'researchDescription'=>$this->researchDescription,
        'author'=>$this->author,
        'researchStatus'=>$this->researchStatus,
        'meta_title'=>$this->meta_title,
        'meta_keywords'=>$this->meta_keywords,
        'meta_description'=>$this->meta_description,
        ];
    }
}
