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

        $daysInAWeek = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
        $daysAlreadyExist = array();
        $scheduleDays = Curtain::where('name', $name)->first()->allSchedules;
        $day = NUll;

        foreach ($scheduleDays as $schedule){
                $day = $schedule->whichDay;
                array_push($daysAlreadyExist, $day);
        };

        // $timeOpen = $schedules->timeOpen;
        // $timeClose = $schedules->timeClose;
        return view('details',[
            'curtain' => $curtain,
            'lightsensors' => $lightsensors,
            'location' => $location,
            'schedules' => $schedules,
            'name' => $name,
            'daysInAWeek' => $daysInAWeek,
            'daysAlreadyExist' => $daysAlreadyExist,
            'scheduleDays' => $scheduleDays,
            'day' => $day,
            // 'timeOpen' => $timeOpen,
            // 'timeClose' => $timeClose
        ]);
    }
}
