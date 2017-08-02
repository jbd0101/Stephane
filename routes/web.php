<?php

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
        return Twitter::postTweet(array('status' => 'Twitter API', 'format' => 'json'));
});
Route::get("/","DashboardController@index");
Route::get("/arrose","DashboardController@arrose");


Route::get("/LoadDatas","ApiController@home");