<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table ="schedule";

    public function scheduleCurtain(){
        return $this->belongsTo('\App\Models\Curtain',"curtainName","name");
    }
}
