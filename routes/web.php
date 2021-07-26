<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

Route::resource('/types', AdminController::class);
Route::post('types/file/{method}','App\Http\Controllers\AdminController@file');

Route::get('/{vue?}', function () {
    return view('layouts.front');
})->where('vue', '[\/\w\.-]*');