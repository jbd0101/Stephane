<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
    	$data = Data::all();
    	return view("dashboard",["data"=>$data]);
    }
}
