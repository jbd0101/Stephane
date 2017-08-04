<?php

use App\Data;
use Thujohn\Twitter\Facades\Twitter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/tweet', function()
{		
		$data = Data::orderBy('id', 'desc')->first()->toArray();
        Twitter::postTweet(array('status' => "Voici la dernière donnée : humidité sol: ".$data["humiditeSol"].", humidite air serre: ".$data["humidite_air"], 'format' => 'json'));
        Twitter::postTweet(array('status' => "temperature serre: ".$data["temperature"].", humidite aire ambiant: ".$data["humidite_air_b"], 'format' => 'json'));
        Twitter::postTweet(array('status' => "temperature ambiant: ".$data["temperature_b"].", pluie: ".$data["pluie"], 'format' => 'json'));
        Twitter::postTweet(array('status' => " luminosite ambiant: ".$data["luminosite"].", luminosite ombre: ".$data["luminositeOmbre"], 'format' => 'json'));
        Twitter::postTweet(array('status' =>"C est tout mais c'est déjà beaucoup !! :-) ", 'format' => 'json'));
        return "yes";
});
Route::get("/","DashboardController@index");
Route::get("/arrose","DashboardController@arrose");


Route::get("/LoadDatas","ApiController@home");