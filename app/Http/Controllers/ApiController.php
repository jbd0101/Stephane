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
         $data->humiditeSol = $v ->humidite_sol;
         $data->humidite_air = empty($v->humidite_serre) ? 0 : $v->humidite_serre;
         $data->humidite_air_b = $v->humidite_ambiante;
         $data->temperature = $v->temperature_serre;
         
         $data->temperature_b = $v->temperature_ambiante;
         $data->pluie = false ;
         $data->arrosage = false ;
         $data->save();

		return "data saved";
    }
}
