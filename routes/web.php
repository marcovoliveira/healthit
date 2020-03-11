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

/** Welcome page */
Route::get('/', function () {
    return view('welcome');
});

/*Route::group(['prefix' => 'api/'], function() {
    Route::resource('proficiency', 'ProficiencyController');
    Route::resource('appointment', 'AppointmentController');
    

});*/

Auth::routes();

/* Incial page helpdesk and doctor*/
Route::get('/medic/home', 'HomeController@index')->name('home');
Route::get('/help/home', 'HelpController@index')->name('help');
Route::get('/help/users/edit', 'HelpController@edit');

/** Register a new doctor */
Route::get('/help/register', 'HelpController@register');
Route::post('/help/home/register', 'HelpController@store');

/** Show data */
/*Route::get('/help/appointment/home', function () {
    return view('help.appointment.home');
});*/

/** Appointments home */
Route::get('/medic/appointment/home', 'AppointmentDoctorController@index');

/** Edit and delete appointment */
Route::get('/medic/appointment/edit/{id}', 'AppointmentDoctorController@edit');
Route::post('medic/home/appointment/{id}', 'AppointmentDoctorController@update');

/** List appointments */
Route::get('/medic/home/appointment/show/{id}', 'AppointmentDoctorController@show');
//Route::get('/help/users/home', 'HelpController@listDoctors');

/////////////////////////////////////////////////////////////////////////////////////

/** List proficiencies */
Route::get('/help/proficiency/home', 'ProficiencyController@index');

/** Register proficiency */
Route::get('/help/proficiency/register', 'ProficiencyController@create');
Route::post('/help/home/proficiency', 'ProficiencyController@store');

/** Edit and delete proficiency */
Route::get('/help/proficiency/edit/{id}', 'ProficiencyController@edit');
Route::post('/help/home/proficiency/{id}', 'ProficiencyController@update');
Route::get('/help/home/proficiency/delete/{id}', 'ProficiencyController@destroy');

/** Attach proficiency */
Route::get('/help/proficiency/attach', 'ProficiencyController@showAttach');
Route::post('/help/home/proficiencyattach', 'ProficiencyController@attach');

/////////////////////////////////////////////////////////////////////////////////////

/** List appointments */
Route::get('/help/appointment/home', 'AppointmentController@index');

/** Register appointment */
Route::get('/help/appointment/register', 'AppointmentController@create');
Route::post('/help/home/appointment', 'AppointmentController@store');

/** Edit and delete appointment */
Route::get('/help/appointment/edit/{id}', 'AppointmentController@edit');
Route::post('/help/home/appointment/{id}', 'AppointmentController@update');
Route::get('/help/home/appointment/delete/{id}', 'AppointmentController@destroy');

/** Helper to find users date */
Route::get('/findUsersDate', 'HelpController@findUsersDate');
/*Route::get('/findEspecialidadeDate', 'HelpController@findEspecialidadeDate');*/