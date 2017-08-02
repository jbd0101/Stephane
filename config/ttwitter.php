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

	'CONSUMER_KEY'        => "JCMm5nRH7wZv7uoVTI1DMqv4W",
	'CONSUMER_SECRET'     => "9YHdkOb5WTtkIXGgg36LTkciDT4h23UeY7qUndT8a7GB69brup",
	'ACCESS_TOKEN'        => "892809021840863236-sqXYIHIaS94nBNI09vwrfgcCfhwOaFL",
	'ACCESS_TOKEN_SECRET' => "qFD17sDLAhpaljYs3iMUVESFjLP7GEvOFTozytHEwKIcF",
];
