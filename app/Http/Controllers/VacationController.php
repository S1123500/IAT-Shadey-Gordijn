<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacationController extends Controller
{
    public function vacationmaker() {
        // return redirect()->back();
        $isOutOfHome = "<script>document.writeln(isOutOfHome);</script>";

        if ($isOutOfHome == true){
            $randomOpen = rand(6,10);
            $randomClose = rand(20,23);
            if (strlen($randomOpen) == 1){
                $randomOpen = '0'.$randomOpen;
            };
            $random = $randomOpen . " " . $randomClose;
            return $random;
        }
    }
}
