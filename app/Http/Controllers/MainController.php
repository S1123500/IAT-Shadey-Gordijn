<?php

namespace App\Http\Controllers;

use App\Models\Curtain;
use App\Models\Lightsensor;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Variable;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show() {
        $isOutOfHome = Variable::first();
        $isOutOfHome = $isOutOfHome->value;
        $curtains = Curtain::all();
        $lightsensors = Lightsensor::all();
        $locations = Location::all();
        $schedules = Schedule::all();
        return view('home',[
            'isOutOfHome'=> $isOutOfHome,
            'curtains' => $curtains,
            'lightsensors' => $lightsensors,
            'locations' => $locations,
            'schedules' => $schedules,
        ]);
    }
}
