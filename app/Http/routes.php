<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([], function () {
    Route::auth();
    Route::get('/admin', 'HomeController@index');

    /* Usuarios */
    Route::resource('usuario', 'UsuarioController');

    /* Unidades Organizacionales */
    Route::resource('unidad', 'UnidadOrganizacionalController');

    /* Puntos de Atención */
    Route::resource('punto_atencion', 'PuntoAtencionController');

    /* Fichas Diagnóstico */
    Route::resource('ficha_diagnostico', 'FichaDiagnosticoController');
    Route::get('ficha_diagnostico/pdf/{fichaDignostico}', 'FichaDiagnosticoController@pdf')->name('ficha_diagnostico.pdf');
    Route::get('ficha_diagnostico/excel/{fichaDignostico}', 'FichaDiagnosticoController@excel')->name('ficha_diagnostico.excel');
    Route::get('ficha_diagnostico/cambios/{fichaDignostico}', 'FichaDiagnosticoController@cambios')->name('ficha_diagnostico.cambios');
});
