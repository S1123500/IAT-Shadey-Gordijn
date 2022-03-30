<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curtain;
use App\Models\Schedule;

class CurtainUpdateController extends Controller
{
    public function updateSlider($name, $value) {

        //establish connection with our database
        $servername = "localhost";
        $username = "ipmedt5_user";
        $password = "12345";
        $dbname = "ipmedt5";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $name = $name;
        $value = $value;
        $location = Curtain::where('name', $name)->first()->location;
        $schedules = Curtain::where('name', $name)->first()->allSchedules;
        $pairingcode = Curtain::where('name', $name)->first()->pairingcode;


        // remove timer from curtain
        foreach ($schedules as $schedule) {
            $schedule->delete();
        }
        //remove curtain itself
        Curtain::where('name', $name)->delete();

        //remake curtain with new percentage
        $stmt = $conn->prepare("INSERT INTO curtain (name, location, percentage, pairingcode) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $location, $value, $pairingcode);
        $stmt->execute();

        

        $stmt1 = $conn->prepare("INSERT INTO schedule (curtainName, whichDay, timeOpen, timeClose, vacation) VALUES (?, ?, ?, ?, ?)");
        $stmt1->bind_param("ssssi", $name, $radio, $opentime, $closetime, $vacation);

        //loop door schedules
        foreach ($schedules as $schedule) {
            $radio = $schedule->whichDay;
            $opentime = $schedule->timeOpen;
            $closetime = $schedule->timeClose;
            $vacation = $schedule->vacation;
            $stmt1->execute();
        }

        //redirect
        return redirect()->back();
    }
}
