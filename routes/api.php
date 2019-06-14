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


Route::resource('loan', 'API\LoanManagementController');
Route::resource('sms', 'API\SmsManageController');
Route::get('timer', 'API\SmsManageController@timer');

Route::put('sms_update', 'API\SmsManageController@update_SmsManage');
Route::post( 'add_load', 'API\LoanManagementController@save_record');
Route::put( 'loan_update', 'API\LoanManagementController@update_loan');


// sms
Route::post('sendsms', 'API\smsController@sendsms');

// DASHBOARD
Route::get('balance', 'API\DashboardController@balance');
Route::get('dashboard-timer', 'API\DashboardController@timer');
Route::get('dashboard-show-timer', 'API\DashboardController@show_timer');
Route::put('dashboard-update-timer', 'API\DashboardController@update_timer');