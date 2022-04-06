<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variable;

class VariableController extends Controller
{
    public function chooser() {
        $servername = "localhost";
        $username = "ipmedt5_user";
        $password = "12345";
        $dbname = "ipmedt5";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        
        $isOutOfHome = Variable::where('name', 'isOutOfHome')->first();
        $isOutOfHomeValue = $isOutOfHome->value;
        
        $stmt1 = $conn->prepare("INSERT INTO variable (name, value) VALUES(?,?)");
        $stmt1->bind_param("ss",$name, $isOutOfHomeValue);
        $name = 'isOutOfHome';

        if ($isOutOfHomeValue == 'true') {
            //change database variable to false
            $isOutOfHome->delete();
            $isOutOfHomeValue = 'false';
            $stmt1->execute();
            return redirect('/vacationyeeter');  
        } else {
            //change database variable to true
            $isOutOfHome->delete();
            $isOutOfHomeValue = 'true';
            $stmt1->execute();
            return redirect('/vacationmaker');   
        }
    }

    public function errorClose(){
        $servername = "localhost";
        $username = "ipmedt5_user";
        $password = "12345";
        $dbname = "ipmedt5";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $Error = Variable::where('name', 'Error')->first();
        $ErrorValue = $Error->value;
        
        $stmt2 = $conn->prepare("INSERT INTO variable (name, value) VALUES(?,?)");
        $stmt2->bind_param("ss",$name, $ErrorValue);
        $name = 'Error';

        //change database variable to false
        $Error->delete();
        $ErrorValue = 'false';
        $stmt2->execute();

        return redirect()->back();
    }
}
