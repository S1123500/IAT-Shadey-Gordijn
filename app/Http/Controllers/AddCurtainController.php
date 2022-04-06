<?php

namespace App\Http\Controllers;

use App\Models\Curtain;
use App\Models\Location;
use App\Models\Variable;

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
        $stmt = $conn->prepare("INSERT INTO curtain (name, location, pairingcode) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $location, $pairingcode);
        
        $stmt1 = $conn->prepare("INSERT INTO location (name) VALUES (?)");
        $stmt1->bind_param("s", $newlocation);
        
        
        $name = $request->input('name');
        if ($name == strcasecmp($name, 'Putin')) {
            $name = "Loser";
        }
        $location = $request->input('locations');
        $newlocation = $request->input('location');
        $pairingcode = $request->input('pairCode');
        
        $locations = Location::all();

        if(Curtain::where('name', $name)->doesntExist()){
            if (gettype($newlocation) == 'string'){
                $alreadyExistLocations = array();
                foreach ($locations as $location) {
                    array_push($alreadyExistLocations, $location);
                };

                if (!in_array($newlocation, $alreadyExistLocations)){
                    $stmt1->execute();
                };
                $location = $newlocation;
            }

            $stmt->execute();
        } else {
            $Error = Variable::where('name', 'Error')->first();
            
            $stmt2 = $conn->prepare("INSERT INTO variable (name, value) VALUES(?,?)");
            $stmt2->bind_param("ss",$name, $ErrorValue);
            $name = 'Error';
    
            //change database variable to true
            $Error->delete();
            $ErrorValue = 'true';
            $stmt2->execute();
        }

        return redirect()->back();
    }
}
