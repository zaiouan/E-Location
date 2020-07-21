<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('biens','BienController');
Route::resource('locataires','LocataireController');
Route::resource('locations','LocationController');
Route::resource('finances','FinanceController');

Route::get('/login/locataire', 'Auth\LoginController@showLocataireLoginForm');
Route::get('/register/locataire', 'Auth\RegisterController@showLocataireRegisterForm');

Route::post('/login/locataire', 'Auth\LoginController@locataireLogin');
Route::post('/register/locataire', 'Auth\RegisterController@createLocataire');

#meessages
Route::view('/locataire', 'locataire')->name('locataire')->middleware('auth:locataire');
Route::get('/adminmessages','InboxController@indexpro')->middleware('auth')->name('messages.index');
Route::get('/massages','ClientController@index')->name('messages1.index');
Route::get('/adminmassages/create','InboxController@create1')->name('adminaj');
Route::get('/massages/create','ClientController@create2')->name('locaj');
Route::post('/massagesadmin','InboxController@store1')->name('adminstr');
Route::post('/massages','ClientController@store2')->name('locstr');


// {token} is a required parameter that will be exposed to us in the controller method
Route::get('registerinvit/{token}', 'InviteController@showRegistrationForm')->name('registerinvit');
Route::put('registerinvit/{id}', 'InviteController@updateLocataire')->name('updateLoc');
Route::post('reinvite/{id}', 'LocataireController@reinvite')->name('reinvite');
Route::post('invite/{id}', 'LocataireController@process')->name('invite');
Route::post('invite', 'LocataireController@store')->name('process');

Route::get('/clientprop','ClientController@indexprop')->name('prop');
Route::get('/clientloc','ClientController@indexloc')->name('loc');

Route::get('/interventions','ClientController@index1')->name('interventions.index');
Route::get('/interventions/create','ClientController@create1')->name('interventions.create');
Route::post('/interventions','ClientController@store1')->name('interventions.store');

Route::get('profile','HomeController@indexprofile')->name('profile');
Route::put('profile/{id}','HomeController@Updateprofile')->name('updateP');
Route::put('profile1/{id}','HomeController@UpdatePass')->name('updatePass');
Route::put('profileLocataire/{id}','ClientController@Updateprofile')->name('updateL');

Route::get('profileLocataire','ClientController@indexprofile')->name('profileL');

Route::get('show/{id}','InboxController@show')->name('show');
Route::post('repondre','InboxController@repondre')->name('repondre');
Route::get('showL/{id}','ClientController@showL')->name('showL');
Route::post('repondreL','ClientController@repondreL')->name('repondreL');
Route::get('show2/{id}','ClientController@showL2')->name('showL2');
Route::get('show3/{id}','InboxController@show3')->name('show3');
Route::get('financeL','ClientController@indexfin')->name('finances1.index');

Route::put('Updatstat/{id}','FinanceController@updatstat')->name('updatstat');
Route::get('/intervention','LocataireController@indexinter')->name('intervention.index');
Route::put('Updatstatus/{id}','LocataireController@updatstatus')->name('updatstatus');


Route::name ('notification.')->prefix('notification')->group(function () {
    Route::name ('update')->patch ('{notification}', 'HomeController@update');
});











