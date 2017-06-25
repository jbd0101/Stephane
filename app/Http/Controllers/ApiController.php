<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    function home(){
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => '192.168.1.99',
		CURLOPT_USERAGENT => 'Curl'
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		return $exp;
    }
}
