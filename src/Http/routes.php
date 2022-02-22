<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'JetXPro\Property\Http\Controllers'], function(){

    Route::get('/adminpanel/index', 'AdminPanelController@index');

});