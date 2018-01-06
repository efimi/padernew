<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Match;
use App\User;

class LocationsController extends Controller
{
    //
    public function getLocation()
    {
    	$location = Location::inRandomOrder()->first();
    	// match user to location
    	$user = User::find(1);
    	$amount =1;
    	Match::makeMatch($user, $location, $amount);
    	return view('getLocation', compact('location'));
    }

}
