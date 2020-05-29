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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('news', 'NewsAPIController');

Route::resource('daily_deaths', 'DailyDeathAPIController');

Route::resource('states', 'StateAPIController');

Route::resource('districts', 'DistrictAPIController');

Route::resource('tahsils', 'TahsilAPIController');

Route::resource('entry_points', 'EntryPointAPIController');

Route::resource('patients', 'PatientAPIController');

Route::resource('quarantine_addresses', 'QuarantineAddressAPIController');

Route::resource('quarantine_patients', 'QuarantinePatientAPIController');

Route::resource('symptoms', 'SymptomAPIController');

Route::resource('attendances', 'AttendanceAPIController');