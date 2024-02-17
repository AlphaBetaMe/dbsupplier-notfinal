<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MissionVision;

class Mainsite extends Model
{
    use HasFactory;

    public function MissionVision()
    {
        return $this->hasOne(MissionVision::class,'id', 'id');
    }
}
