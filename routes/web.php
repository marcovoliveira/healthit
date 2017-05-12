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

/*Paginas inicias helpdesk e medico*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/help/home', 'HelpController@index')->name('help');


/*Registar Medico*/
Route::get('/help/register', 'HelpController@register');
Route::post('/help/home/register', 'HelpController@store');

/*Registar consulta*/
Route::get('/help/appointment/register', 'AppointmentController@create');
Route::post('/help/home/appointment', 'AppointmentController@store');
