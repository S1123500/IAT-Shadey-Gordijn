<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variable;

class ChoosRedirectionController extends Controller
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
        
        $isOutOfHome = Variable::first();
        $isOutOfHomeValue = $isOutOfHome->value;
        
        $stmt1 = $conn->prepare("INSERT INTO variable (name, value) VALUES(?,?)");
        $stmt1->bind_param("ss",$name, $isOutOfHomeValue);
        $name = 'isOutOfHome';

        if ($isOutOfHomeValue == 'true') {
            //database veranderen naar false
            $isOutOfHome->delete();
            $isOutOfHomeValue = 'false';
            $stmt1->execute();
            return redirect('/vacationyeeter');  
        } else {
            // database veranderen naar true
            $isOutOfHome->delete();
            $isOutOfHomeValue = 'true';
            $stmt1->execute();
            return redirect('/vacationmaker');   
        }
    }
}
