<?php

namespace App\Http\Controllers;

use App\Models\Curtain;
use App\Models\Location;

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
        
        $stmt1 = $conn->prepare("INSERT INTO location (name) VALUES (?)");
        $stmt1->bind_param("s", $newlocation);
        
        
        $name = $request->input('name');
        $location = $request->input('locations');
        $newlocation = $request->input('location');
        
        $locations = Location::all();
        
        if (gettype($newlocation) == 'string'){
            $alreadyExistLocations = array();
            foreach ($locations as $location) {
                array_push($alreadyExistLocations, $location);
            };
            if (!in_array($newlocation, $alreadyExistLocations)){
                $stmt1->execute();
                $location = $newlocation;
            };

        }

        $stmt->execute();
        return redirect()->back();
    }
}
