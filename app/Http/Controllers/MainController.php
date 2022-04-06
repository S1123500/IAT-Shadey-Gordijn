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
        $isOutOfHome = Variable::where('name', 'isOutOfHome')->first();
        $isOutOfHome = $isOutOfHome->value;
        $Error = Variable::where('name', 'Error')->first();
        $Error = $Error->value;
        $curtains = Curtain::all();
        $lightsensors = Lightsensor::all();
        $locations = Location::all();
        $schedules = Schedule::all();
        return view('home',[
            'isOutOfHome'=> $isOutOfHome,
            'Error'=> $Error,
            'curtains' => $curtains,
            'lightsensors' => $lightsensors,
            'locations' => $locations,
            'schedules' => $schedules,
        ]);
    }
}
