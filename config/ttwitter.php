<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => "w7WYcNNIwL0c0jhktCfymLlOb",
	'CONSUMER_SECRET'     => "lewRfKEO4oWLruoVPoossE9tUr7HfkzJx0VaIYmeSq1GoL2hYr",
	'ACCESS_TOKEN'        => "893128457730879490-DppVmWceLMWX09wUn7KN1V47EukncsW",
	'ACCESS_TOKEN_SECRET' => "TMu2vvtumb38B3hayP6hSyac2RDb3NhXpT9Fp4zaCdsZF",
];
