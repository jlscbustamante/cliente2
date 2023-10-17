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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pacientes/create', 'HomeController@create')->name('pacientes.create');
Route::get('/pacientes/edit/{id}', 'HomeController@edit')->name('pacientes.edit');
Route::get('/pacientes/delete/{id}', 'HomeController@delete')->name('pacientes.delete');
