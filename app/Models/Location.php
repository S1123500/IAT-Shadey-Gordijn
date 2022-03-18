<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table ="location";

    public function allCurtain(){
        return $this->hasMany('\App\Models\Curtain',"location","name");
    }
    
    public function allLightsensor(){
        return $this->hasMany('\App\Models\Lightsensor',"location","name");
    }
}
