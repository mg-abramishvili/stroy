<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/types','App\Http\Controllers\ApiController@types');
Route::post('/types','App\Http\Controllers\ApiController@score');
