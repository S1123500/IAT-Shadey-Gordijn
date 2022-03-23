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

    public function details($name) {
        $name = $name;
        $curtain = Curtain::where('name', $name)->first();
        $lightsensors = Curtain::where('name', $name)->first()->curtainLocation->allLightsensors;
        $location = Curtain::where('name', $name)->first()->curtainLocation;
        $schedules = Curtain::where('name', $name)->first()->allSchedules;
        return view('details',[
            'curtain' => $curtain,
            'lightsensors' => $lightsensors,
            'location' => $location,
            'schedules' => $schedules,
            'name' => $name
        ]);
    }


}
