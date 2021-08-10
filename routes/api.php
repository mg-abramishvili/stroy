<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/types','App\Http\Controllers\ApiController@types');
Route::post('/types','App\Http\Controllers\ApiController@types_score');

Route::get('/roofs','App\Http\Controllers\ApiController@roofs');
Route::post('/roofs','App\Http\Controllers\ApiController@roofs_score');