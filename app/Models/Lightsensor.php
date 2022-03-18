<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lightsensor extends Model
{
    protected $table ="lightsensor";

    public function lightsensorLocation(){
        return $this->belongsTo('\App\Models\Location',"location","name");
    }
}
