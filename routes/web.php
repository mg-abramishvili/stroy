<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

Route::get('/admin', 'App\Http\Controllers\AdminController@index');

Route::get('/types/create', 'App\Http\Controllers\AdminController@type_create');
Route::get('/types/{id}/edit', 'App\Http\Controllers\AdminController@type_edit');
Route::post('/types', 'App\Http\Controllers\AdminController@type_store');
Route::post('types/file/{method}','App\Http\Controllers\AdminController@file');

Route::get('/roofs/create', 'App\Http\Controllers\AdminController@roof_create');
Route::get('/roofs/{id}/edit', 'App\Http\Controllers\AdminController@roof_edit');
Route::post('/roofs', 'App\Http\Controllers\AdminController@roof_store');
Route::post('roofs/file/{method}','App\Http\Controllers\AdminController@file');

Route::get('/{vue?}', function () {
    return view('layouts.front');
})->where('vue', '[\/\w\.-]*');