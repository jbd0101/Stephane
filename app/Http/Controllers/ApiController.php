<?php

namespace App\Http\Controllers;
use App\Data;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class ApiController extends Controller
{
    function home(){

		 $response = Curl::to('http://192.168.1.99')
		 ->asJson()
         ->get();
         $v = $response -> variables;
         $data = new Data;
         $data->humiditeSol = $v ->capteur_humidite_sol;
         $data->humidite_air = $v->capteur_humidite_air > 250 ? 0 : $v->capteur_humidite_air;
         $data->humidite_air_b = $v->capteur_humidite_air_b;
         $data->temperature = $v->capteur_temperature > 100 ? 0 : $v->capteur_temperature;

         $data->temperature_b = $v->capteur_temperature_b;
         $data->pluie = $v->capteur_pluie==1 ? false : true ;
         $data->arrosage = $v->arrosage_en_cours==0 ? false : true ;
         $data->save();

		return "data saved";
    }
}
