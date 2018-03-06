<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Match;

class QRCodeController extends Controller
{
    public function show()
    {
    	$user = Auth::user();
    	return view('QRCodeShow', compact('user'));
    }
    public function test(User $user)
    {
    	$location = $user->matchedLocation();
    	Match::setQrTestMadeFor($user);
    	if(empty($location)) {
    		return view('QRCodeFailed', compact('user'));
    	}
    	else{
    		Match::setQrTestApprovedFor($user);
    		return view('QRCodeShowLocation', compact('location'));
    	} 
    }
}
