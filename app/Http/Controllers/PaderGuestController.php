<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Collective\Html\request;
use Jenssegers\Agent\Agent;

class PaderGuestController extends Controller
{
    //
    public function index()
    {      

        if(!Auth::check()){
                $user = User::create([
                    'name' => 'Gast', 
                    'email' => 'guest@guest.de'
                ]);
                Auth::login($user, true);
            }
            return view('guest');
        // $agent = new Agent();
        // if($agent->isMobile() || $agent->isPhone()){
        //     if(!Auth::check()){
        //         $user = User::create([
        //             'name' => 'Gast', 
        //             'email' => 'guest@guest.de'
        //         ]);
        //         Auth::login($user, true);
        //     }
        // 	return view('guest');
        // } else {
        //     return redirect()->to('/');
        // }
    }
    public function registerUser(Request $request)
    {	
    	dd(session());

    }
}
