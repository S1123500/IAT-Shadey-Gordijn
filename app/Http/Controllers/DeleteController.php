<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Curtain;


use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteSchedule($name, $day) {
        $name = $name;
        $day = $day;
        //get the schedule from the curtain which details page we are currently in, and which day we select
        $schedule = Curtain::where('name', $name)->first()->allSchedules->where('whichDay', $day)->first();
        //delete that schedule
        $schedule ->delete();
        //go back to the details page
        return redirect()->back();
    }

    public function deleteCurtain($name) {
        $name = $name;
        //get the curtain which detail page you are in, and all its schedules
        $curtain = Curtain::where('name', $name);
        $schedules = Curtain::where('name', $name)->first()->allSchedules;
        //delete all schedules one by one
        foreach ($schedules as $schedule) {
            $schedule ->delete();
        };
        //delete the curtain itself
        $curtain ->delete();
        //go back to the main page
        return redirect('/');
    }
}
