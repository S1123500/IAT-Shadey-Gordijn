<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Curtain;

use DB;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteSchedule($name, $day) {
        $name = $name;
        $day = $day;

        $schedule = Curtain::where('name', $name)->first()->allSchedules->where('whichDay', $day)->first();

        $schedule ->delete();

        return redirect()->back();
    }

    public function deleteCurtain($name) {
        $name = $name;

        $curtain = Curtain::where('name', $name);
        $schedules = Curtain::where('name', $name)->first()->allSchedules;


        foreach ($schedules as $schedule) {
            $schedule ->delete();
        };
        
        $curtain ->delete();

        return redirect('/');
    }
}
