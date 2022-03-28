<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCurtainController extends Controller
{
    public function addCurtain(Request $request) {


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
        $stmt = $conn->prepare("INSERT INTO curtain (name, location) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $location);

        $name = $request->input('name');
        $location = $request->input('location');

        $stmt->execute();

        return redirect()->back();
    }
}
