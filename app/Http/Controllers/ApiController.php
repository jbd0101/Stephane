<?php

namespace App\Http\Controllers;
use App\Data;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Thujohn\Twitter\Facades\Twitter;

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
         $data->luminosite = $v->luminosite_ambiante;
         $data->pluie = false ;
         $data->arrosage = false ;
         $data->save();
         if ((int)$v->temperature_ambiante > 30 ){
            $tmp = $v->temperature_ambiante;

            Twitter::postTweet(array('status' => "Il fait vraiment chaud aujourd\hui , il fait ".$tmp."°C, n'oubliez pas de boir !!! ", 'format' => 'json'));
         }
        if ((int)$v->temperature_serre > 30 ){
            $tmp = $v->temperature_serre;

            Twitter::postTweet(array('status' => "Il fait trop chaud dans cette serre, merci de l' ouvir  (".($tmp)."°C) ", 'format' => 'json'));
         }
         if((int)$v->humidite_sol <40){
            $tmp = (string)$v->humidite_sol;

            $txt = "Je meurs de soif , il n y a que (".$tmp."%) d'humidité dans le sol... ";
            Twitter::postTweet(array('status' => $txt , 'format' => 'json'));
         }
        if((int)$v->luminosite_ambiante >85){
            $tmp = (string)$v->luminosite_ambiante;

            $txt = "Waww je suis à la côte d'Azur, la luminosite est de  ".$tmp."%";
            Twitter::postTweet(array('status' => $txt , 'format' => 'json'));
         }

		  return "data saved";
    }
}
