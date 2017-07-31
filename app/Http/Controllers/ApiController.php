<?php

namespace App\Http\Controllers;
use App\Data;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class ApiController extends Controller
{
    function home(request $v){

         // $response = Curl::to('http://192.168.1.99')
         // ->asJson()
         // ->get();
    
         $data = new Data;
         $data->humiditeSol = $v ->humiditemoyenne;
         $data->humidite_air = $v->humidite_air;
         $data->humidite_air_b = $v->humidite_air_b;
         $data->temperature = $v->temperature;
         
         $data->temperature_b = $v->temperature_b;
         $data->pluie = false ;
         $data->arrosage = false ;
         $data->save();

		return "data saved";
    }
}
