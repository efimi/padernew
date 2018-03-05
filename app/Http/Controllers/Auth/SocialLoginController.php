<?php
namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
// use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware(['social', 'guest']);
	}
    public function redirect($service, Request $request)
    {
    	return Socialite::driver($service)->redirect();
    }

    public function callback($service, Request $request)
    {
    	if (!$request->has('code') || $request->has('denied')) {
		    return redirect('/');
		}
		
    	$serviceUser = Socialite::driver($service)->user();

    	$user = $this->getExistingUser($serviceUser, $service);
    	if(!$user){
    		$name =  !$serviceUser->getName()? $serviceUser->getNickname() : $serviceUser->getName();
    		$user = User::create([
    			'name'  => $name,
    			'email' => $serviceUser->getEmail(),
    		]);
    	}
    	if($this->needsToCreateSocial($user, $service)){
    		$user->social()->create([
    			'social_id' => $serviceUser->getID(),
    			'service' => $service
    		]);
    	}

    	/**
    	 * login this user, remember true
    	 */
    	Auth::login($user, true);

    	return redirect()->intended();

    }

    protected function needsToCreateSocial(User $user, $service)
    {				
    	return !$user->hasSocialLinked($service);
    }

    protected function getExistingUser($serviceUser, $service)
    {
    	return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function($q) use ($serviceUser, $service){
    		$q->where('social_id', $serviceUser->getId())->where('service', $service);
    	})->first();
    }
}
