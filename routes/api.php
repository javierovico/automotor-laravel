<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
Route::group(['middleware' => 'auth:api'], function() { //los que estan autenticados
    Route::group(['middleware' => 'permiso:editar_rol_usuario'],function(){ //los que tienen permiso de
        Route::post('editar-rol','RolController@cambiarRol');
    });
});
Route::group(['middleware' => 'auth:api'], function() { //los que estan autenticados
    Route::group(['middleware' => 'permiso:registrar_venta'],function(){ //los que tienen permiso de realizar ventas
        Route::post('venta','VentaController@registrarVenta');
    });
});
