<?php

use Illuminate\Http\Request;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(['middleware' => ['auth:api']], function () {
	
});

Route::resource('pacientes', 'Api\V1\PacienteController', ['except'=>['edit','create'] ]);

//Route::resource('pacientes', 'Api\V1\PacienteController',['except'=>['edit','create'] ]);

Route::resource('actividads', 'ActividadController',['except'=>['edit','create'] ]);

Route::resource('conceptos', 'ConceptoController',['except'=>['edit','create'] ]);

Route::get('/pacientes/show_by_fecha_atencion/{startDate}/{endDate}', 'Api\V1\PacienteController@show_by_fecha_atencion')->name('pacientes.show_by_fecha_atencion');

Route::post('/pacientes/show_by_filters', 'Api\V1\PacienteController@show_by_filters')->name('pacientes.show_by_filters');

Route::post('/actividads/show_by_filters', 'ActividadController@show_by_filters')->name('actividads.show_by_filters');

Route::post('/conceptos/show_by_filters', 'ConceptoController@show_by_filters')->name('conceptos.show_by_filters');
