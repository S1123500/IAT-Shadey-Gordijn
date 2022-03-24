<?php

namespace App\Http\Controllers;

use App\Models\Curtain;
use App\Models\Schedule;
use App\Models\Variable;

use Illuminate\Http\Request;

class VacationController extends Controller
{
    public function makevacation() {
        //get all the curtain attributes
        $allCurtain = Curtain::all();

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

        //prepare the insert into statement with variables that we can change -> vacation is actually a constant
        $stmt = $conn->prepare("INSERT INTO schedule (curtainName, whichDay, timeOpen, timeClose, vacation) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $whichCurtain, $day, $randomOpen, $randomClose, $vacation);
        $vacation = '1';
        
        //for every curtain:
        foreach ($allCurtain as $curtain) {
            //get its name
            $whichCurtain = $curtain->name;
            $daysInAWeek = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
            $daysAlreadyExist = array();
            //get all the schedules for that curtain
            $scheduleDays = Curtain::where('name',$whichCurtain)->first()->allSchedules;
                
            //for every schedule
            foreach ($scheduleDays as $schedule) {
                //get its day
                $day = $schedule->whichDay;
                //push that day in an array to make an array with days for which a schedule exists
                array_push($daysAlreadyExist, $day);
            
            }

            //for each day in the week
            foreach($daysInAWeek as $day){
                //if this day does not have a schedule: 
                if (!in_array($day, $daysAlreadyExist)){
                    //get 2 random numbers to get random opening and closing times
                    $randomOpen = rand(6,10);
                    $randomClose = rand(20,23);
                    //make all single digits double diggits
                    if (strlen($randomOpen) == 1){
                        $randomOpen = '0'.$randomOpen;
                    };
                    //add the time configuration to the double random double digit numbers
                    $randomOpen = $randomOpen.":00";
                    $randomClose = $randomClose.":00";

                    //execute the insert command with for each schedule
                    $stmt->execute();
                    
                }
            };
        };
        //go back to the home page
        return redirect('/');
    }
    public function yeetvacation() {
        //get all schedules where vacation = 1, aka, the schedules we made purely for vacation mode
        $schedules = Schedule::all()->where("vacation","1");
        //delete all schedules one by one
        foreach($schedules as $schedule) {
            $schedule ->delete();
        }
        //go back to the home page
        return redirect('/');
    }
}
