<?php

namespace App\Http\Controllers;

use App\Data;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
    	$data = Data::where('created_at', '>=', Carbon::now()->subDay(2))->get()->toArray();
    	$derniere_pluie = Data::where('pluie',true)->where("arrosage",false)->limit(1)->get()->toArray();
    	return view("dashboard",["data"=>$data,"derniere_pluie" => $derniere_pluie]);
    }
}
