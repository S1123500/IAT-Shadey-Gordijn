<?php

namespace App\Http\Controllers;

use App\Models\Curtain;
use App\Models\Lightsensor;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Variable;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
        public function details($name) {
        $name = $name;
        $curtain = Curtain::where('name', $name)->first();
        $lightsensors = Curtain::where('name', $name)->first()->curtainLocation->allLightSensors->first();
        $location = $curtain->curtainLocation;
        $schedules = $curtain->allSchedules;
        return view('details',[
            'curtain' => $curtain,
            'lightsensors' => $lightsensors,
            'location' => $location,
            'schedules' => $schedules,
            'name' => $name
        ]);
    }
}
