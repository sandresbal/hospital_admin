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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** */

Route::get('/useradmin', 'UserController@index');

Auth::routes();

Route::get('/user','UserController@add');
Route::post('/user','UserController@create');

Route::get('/user/{user}','UserController@edit');
Route::post('/user/{user}','UserController@update');

Route::post('user/department/{dep}', [
    'as' => 'reasigndep', 'uses' => 'UserController@updatedepartment']);

/** */

Route::get('/departmentadmin', 'DepartmentController@index');

Auth::routes();

Route::get('/department','DepartmentController@add');
Route::post('/department','DepartmentController@create');

Route::get('/department/{department}','DepartmentController@edit');
Route::post('/department/{department}','DepartmentController@update');

/** */

Route::get('/historialadmin', 'HistorialController@index');

Auth::routes();

Route::get('/historial','HistorialController@add');
Route::post('/historial','HistorialController@create');

Route::get('/historial/{historial}','HistorialController@edit');
Route::post('/historial/{historial}','HistorialController@update');

/** */

Route::get('/appointmentadmin', 'AppointmentController@index');

Auth::routes();

Route::get('/appointment','AppointmentController@add');
Route::post('/appointment','AppointmentController@create');

Route::get('/appointment/{appointment}','AppointmentController@edit');
Route::post('/appointment/{appointment}','AppointmentController@update');

/** */

Route::get('/lineadmin', 'LineController@index');

Auth::routes();

Route::get('/line','LineController@add');
Route::post('/line','LineController@create');

Route::get('/line/{appointment}','LineController@edit');
Route::post('/line/{appointment}','LineController@update');

/** */

Route::get('/patientadmin', 'UserController@patientadmin');

Route::get('/patientassignationedit/{user}','UserController@editassignation');

//Route::post('/patientassignationedit/{user}','PatientController@delete');
Route::post('patientassignationedit/{user}/delete/{doctor}', [
    'as' => 'deleter', 'uses' => 'UserController@deleteassignation']);

Route::post('/patientassignationedit/{user}','UserController@deleteassignation');

Route::post ('/addDoctor', 'UserController@doctorfiltered' );


/*Route::get('/patientadmin', 'PatientController@index');

Auth::routes();

Route::get('/patient','PatientControler@add');
Route::post('/patient','PatientControler@create');

Route::get('/patient/{user}','PatientControler@edit');
Route::post('/patient/{user}','PatientControler@update');*/