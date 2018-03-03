<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Collective\Html\request;
// use Illuminate\Http\Request;

class PaderGuestController extends Controller
{
    //
    public function index()
    {
        if(!Auth::check()){
            $user = User::create([
                'name' => 'Gast', 
                'email' => 'info@padermeet.de'
            ]);
            Auth::login($user, true);
        }
    	return view('guest');
    }
    public function guestResult()
    {	

    	return view('guestResult', compact('location'));
    }
}
