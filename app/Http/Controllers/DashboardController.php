<?php

namespace App\Http\Controllers;

use App\Data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class DashboardController extends Controller
{
    function index(){
        Data::where('created_at', '<=', Carbon::now()->subDay(6))->delete();

    	$data = Data::where('created_at', '>=', Carbon::today())->get()->toArray();
        $data_divise = [];
        foreach ($data as $d) {
            if($d["id"]%2 ==0){
                array_push($data_divise, $d);
            }
        }
    	$derniere_pluie = Data::where('pluie',true)->where("arrosage",false)->limit(1)->get()->toArray();
    	return view("dashboard",["data"=>$data_divise,"derniere_pluie" => $derniere_pluie]);
    }
    function arrose(){
    	$response = Curl::to('http://192.168.1.99/arrose')
         ->get();
         return "Arrosage Terminé";
    }
}
