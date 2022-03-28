<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCurtainTimerController extends Controller
{
    public function addCurtainTimer(Request $request, $name) {


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

        //prepare the insert into statement with variables that we can change
        $stmt = $conn->prepare("INSERT INTO schedule (curtainName, whichDay, timeOpen, timeClose) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $radio, $opentime, $closetime);

        $radio = $request->input('radios');
        $opentime = $request->input('open-time');
        $closetime = $request->input("close-time");
        $name = $name;

        $stmt->execute();

        return redirect()->back();
    }
}
