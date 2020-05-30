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



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController');

Route::resource('dailyDeaths', 'DailyDeathController');

Route::resource('states', 'StateController');

Route::resource('districts', 'DistrictController');

Route::resource('tahsils', 'TahsilController');

Route::resource('entryPoints', 'EntryPointController');

Route::get('districts_of_state/{id}', 'PatientController@districts_of_state')->name('districts_of_state');
Route::get('tahsils_of_district/{id}', 'PatientController@tahsils_of_district')->name('tahsils_of_district');
Route::get('entryPoints_of_tahsils/{id}', 'PatientController@entryPoints_of_tahsils')->name('entryPoints_of_tahsils');

Route::resource('patients', 'PatientController');

Route::get('institutesQuarantineAddresses', 'QuarantineAddressController@institutes')
    ->name('quarantine_addresses.institutes');

Route::resource('quarantineAddresses', 'QuarantineAddressController');

Route::get('instituteQuarantinePatients', 'QuarantinePatientController@institute')
    ->name('quarantinePatients.institute');

Route::get('quarantinePatients/add_to_home_quarantine/{id}', 'QuarantinePatientController@home_quarantine')
    ->name('quarantinePatients.home_quarantine');

Route::get('quarantinePatients/add_to_institute_quarantine/{id}', 'QuarantinePatientController@institute_quarantine')
    ->name('quarantinePatients.institute_quarantine');

Route::post('quarantinePatients/store_institute_quarantine_patient', 'QuarantinePatientController@store_institute_quarantine_patient')
->name('quarantinePatients.store_institute_quarantine_patient');

Route::resource('quarantinePatients', 'QuarantinePatientController');

Route::resource('symptoms', 'SymptomController');

Route::get('attendances/add_attendance/{id}', 'AttendanceController@add_attendance')
    ->name('attendances.add_attendance');

Route::resource('attendances', 'AttendanceController');
