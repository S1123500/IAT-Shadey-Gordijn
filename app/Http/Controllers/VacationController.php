<?php

namespace App\Http\Controllers;

use App\Models\Curtain;
use App\Models\Schedule;

use Illuminate\Http\Request;

class VacationController extends Controller
{
    public function vacationmaker() {
        // return redirect()->back();
        $isOutOfHome = "<script>document.writeln(isOutOfHome);</script>";

        $allCurtain = Curtain::all();

        $servername = "localhost";
        $username = "ipmedt5_user";
        $password = "12345";
        $dbname = "ipmedt5";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }

        $stmt = $conn->prepare("INSERT INTO schedule (curtainName, whichDay, timeOpen, timeClose, vacation) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $whichCurtain, $day, $randomOpen, $randomClose, $vacation);

        $vacation = 1;



        // return $allCurtain;

        if ($isOutOfHome == true){
            
            foreach ($allCurtain as $curtain) {
                $whichCurtain = $curtain->name;
                echo $whichCurtain;
                echo "<br>";
                $daysInAWeek = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
                $daysAlreadyExist = array();
                
                $scheduleDays = Curtain::where('name', $curtain->name)->first()->allSchedules;
                
                // Lijst maken van welke dagen al bestaan
                foreach ($scheduleDays as $schedule) {
                    $day = $schedule->whichDay;
                    if (in_array($day, $daysInAWeek)){
                        array_push($daysAlreadyExist, $day);
                    } 
                }

                foreach($daysInAWeek as $day){
                    if (!in_array($day, $daysAlreadyExist)){
                        $randomOpen = rand(6,10);
                        $randomClose = rand(20,23);
                        if (strlen($randomOpen) == 1){
                            $randomOpen = '0'.$randomOpen;
                        };
                        $randomOpen = $randomOpen.":00";
                        $randomClose = $randomClose.":00";
                        $random = $randomOpen . " " . $randomClose;
                        echo $day;
                        echo " ";
                        echo $random;
                        echo "<br>";
                        $stmt->execute();
                        
                    }
                };
            }
            return redirect('/');
        }

        elseif ($isOutOfHome == false){        
            $schedules = Schedule::where('vacation', 1)->all();


            foreach($schedules as $schedule) {
                $schedule ->delete();
            }
            // return redirect()->back();
            
        }
    }
}
