<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mainsite;

class MissionVision extends Model
{
    use HasFactory;

    public function Mainsite()
    {
        return $this->belongsTo(Mainsite::class,'id', 'id');
    }
}
