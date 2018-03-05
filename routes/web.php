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

Route::get('/guest', 'PaderGuestController@index');
Route::get('/guestResult', 'PaderGuestController@guestResult');
Route::post('/registerUser', 'PaderGuestController@registerUser')->name('registerNewUser');


Route::get('/share', 'StatisticController@shared');
Route::get('/click', 'StatisticController@click');

Route::get('/unmatch', 'MatchesController@destroy');
Route::get('/geolocation', function(){
    return view('geolocation');
});
Route::get('/geolocation/api', function(){

    return request()->json();
});


Route::get('/yodel', 'Chat\ChatController@yodel');
Route::get('/chat', 'Chat\ChatController@index');
Route::get('/pinwall', 'Chat\ChatController@index');
Route::get('/chat/messages', 'Chat\ChatMessageController@index');
Route::post('/chat/messages', 'Chat\ChatMessageController@store');

Route::get('/dashboard','HomeController@index');
Route::post('/account/avatar', 'Account\AvatarController@store')->name('account.avatar.store');
Route::patch('/account', 'Account\AccountController@update')->name('account.update');

Route::get('/api/getlocation/{amount}', function($amount) {
			$user = \App\User::find(1);
            $location = \App\Location::getLocationWithSpaceFor($amount);
            $location['photos'] =  \App\Photo::getPhotosForLocation($location->id);
            $location['used'] = $location->usedPlaces();
        	\App\History::makeNewEntry($user, $location, $amount);
        	return $location;
        	// looks for location, returns photos, address, and currently used
});
Route::get('/api/getphotos/{id}', function($id){
			return \App\Photo::getPhotosForLocation($id);
});
Route::get('/api/confirmThatICome/{id}', function($id){
		$user = \Auth::user();
        $lastEntry = \App\History::lastUserEntry($user);
        $amount = $lastEntry->amount;
        $location = $lastEntry->location;
        \App\Match::makeMatch($user, $location, $amount);
    	$lastEntry->confirmed = 1;
        $lastEntry->save();
        return "Super das du dabei bist!";
});
Route::get('/api/getuser', function(){
    $user = \App\User::auth();
    return $user;
});

Route::get('/', 'LocationsController@startApp')->name('home');
Route::post('/', 'LocationsController@getLocation')->name('location.random');
Route::get('/result', 'LocationsController@getLocation');
Route::get('/confirmThatICome', 'LocationsController@confirmThatICome')->name('location.confirm');

Route::get('/faq', function(){
    return view('faq');
});
Route::get('/impressum', function(){
    return view('impressum');
});

Route::get('/test', function(){
    return view('auth.loginNoLoad');
});



Route::get('/locations', 'LocationsController@showLocationsToday');
Route::get('/locations/{id}', 'LocationsController@getLocationInfo');

Route::get('/wait', function(){
	$user = \App\Auth::user();
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

// Route::get('/home', 'HomeController@index');

Route::get('login/{service}', 'Auth\SocialLoginController@redirect')->name('facebook_login');
Route::get('login/{service}/callback', 'Auth\SocialLoginController@callback');

Route::get('/alert', function(){
	return view('alert');
});
Route::get('/notify', function(){
	notify()->flash('Alles ok hier!', 'success');
	return redirect()->to('alert');
});

