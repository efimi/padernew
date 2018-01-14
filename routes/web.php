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

Route::get('/', 'LocationsController@startApp');
Route::post('/', 'LocationsController@getLocation')->name('location.random');
Route::get('/getLocation', 'LocationsController@getLocation')->name('location.get');
Route::get('/confirmThatICome', 'LocationsController@confirmThatICome')->name('location.confirm');


Route::get('/locations', 'LocationsController@showLocationsToday');
Route::get('/locations/{id}', 'LocationsController@getLocationInfo');

Route::get('/wait', function(){
	$user = App\User::find(1);
	return view('waitATime', compact('user'));
});

Route::get('/feedback', 'FeedbackController@show');
Route::post('/feedback', 'FeedbackController@store');
Route::get('/feedback/edit/{feedback}', 'FeedbackController@edit');
Route::post('/feedback/edit/{feedback}', 'FeedbackController@update');
Route::get('/feedback/destroy/{feedback}', 'FeedbackController@destroy');

Route::get('/qrcode', 'QRCodeController@show');
Route::get('/qrcode/test/{user}', 'QRCodeController@test');
// Route::get('/confirmThatICome', '@')->name('qrcode');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/alert', function(){
	return view('alert');
});
Route::get('/notify', function(){
	notify()->flash('Alles ok hier!', 'success');
	return redirect()->to('alert');
});
