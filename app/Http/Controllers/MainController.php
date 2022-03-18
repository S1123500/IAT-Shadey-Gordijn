<?php

namespace App\Http\Controllers;

use App\Models\Curtain;
use App\Models\Lightsensor;
use App\Models\Location;
use App\Models\Schedule;

use Illuminate\Http\Request;

class CurtainController extends Controller
{
    public function show() {
        $curtains = Curtain::all();
        $lightsensors = Lightsensor::all();
        $locations = Location::all();
        $schedules = Schedule::all();
        return view('Testy',[
            'curtains' => $curtains,
            'lightsensors' => $lightsensors,
            'locations' => $locations,
            'schedules' => $schedules,
        ]);
    }
}
