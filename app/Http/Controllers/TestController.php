<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testCollect(){
        $a = 2;
        $b = 4;
        $c = 6;
//        dd(collect($a,$b,$c));

        if(collect($a,$b)->contains($b)){
            dd("4");
        }


//        $cars = array("Volvo", "BMW", "Toyota");
//        if($cars->contains("Volvo")){
//            dd("Volvo");
//        }
    }
}
