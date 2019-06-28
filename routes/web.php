<?php

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

Route::name('clientes')->group(function () {
    Route::get('clients/index', 'ClientsController@index');
    Route::post('clients/insert', 'ClientsController@store');
    Route::post('clients/update/{id}', 'ClientsController@update');
    Route::get('clients/destroy/{id}', 'ClientsController@destroy');
});

Route::name('equipamentos')->group(function () {
    Route::get('equips/index', 'EquipsController@index');
    Route::post('equips/insert', 'EquipsController@store');
    Route::post('equips/update/{id}', 'EquipsController@update');
    Route::get('equips/destroy/{id}', 'EquipsController@destroy');
});

Route::name('veiculos')->group(function () {
    Route::get('vehicles/index', 'VehiclesController@index');
    Route::post('vehicles/insert', 'VehiclesController@store');
    Route::post('vehicles/update/{id}', 'VehiclesController@update');
    Route::get('vehicles/destroy/{id}', 'VehiclesController@destroy');
});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/clientes', function () {
    return view('clientes');
})->middleware('auth');
Route::get('/equipamentos', function () {
    return view('equipamentos');
})->middleware('auth');

Route::get('/veiculos', function () {
    return view('veiculos');
})->middleware('auth');
