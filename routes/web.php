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

/*Route::get('/', function () {
    return view('welcome');
});*/
/*PAGES*/
Route::get('/','WelcomeController@welcome')->name('welcome');
Route::get('/about','WelcomeController@about');
Route::get('/contact','WelcomeController@contact');
Route::get('/loan','WelcomeController@loan');
Route::get('/people','WelcomeController@people');
Route::get('/service','WelcomeController@service');
Route::post('/contactUs','WelcomeController@contactUsrequest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('/users', 'userController');
Route::get('/user_suggestions','userController@getSuggestion');
Route::get( '/sms_management', 'userController@sms_management');
Route::resource('/Loans_management', 'LoanController');



Route::get('/loan_Ajira','WelcomeController@loanAjira');
Route::get('/loan_Biashara','WelcomeController@loanBiashara');
Route::get('/loan_Excutive','WelcomeController@loanExcutive');
Route::get('/loan_Makazi','WelcomeController@loanMakazi');