<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curtain extends Model
{
    protected $table ="curtain";

    public function allSchedules(){
        return $this->hasMany('\App\Models\Schedule',"curtainName","name");
    }

    //model function for all locations
    public function curtainLocation(){
        return $this->belongsTo('\App\Models\Location',"location","name");
    }
}
