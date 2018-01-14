<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Match;
use App\User;
use App\History;

class LocationsController extends Controller
{
    //
    public function startApp()
    {
        $user = User::find(1);
        if(empty($user)){
            User::makeTestUser();
            $user = User::find(1);
        }
        if($user->hasLocationAlready() ){
            $location = $user->matchedLocation();
            return view('hasLocationAlready', compact('location'));
        }
        else {
            if ($user->isAllowedToClick()) {
                return view('buttonclick');
            }
            else {
                return view('waitATime', compact('user'));
            }
            
        }
    }
    public function getLocation(Request $request)
    {	
    	// match user to location
    	$user = User::find(1);
    	// $amount = $this->getAmount($request);
        $amount = $request->comeTogether == '0' ? 2 : 1;
        $location = Location::getLocationWithSpaceFor($amount);
    	// save in DB
    	History::makeNewEntry($user, $location, $amount);
    	return view('getLocation', compact('location'));
    }

    public function confirmThatIcome()
    {
    	$user = User::find(1);
        $lastEntry = History::lastUserEntry($user);
        $amount = $lastEntry->amount;
        $location = $lastEntry->location;
        Match::makeMatch($user, $location, $amount);
    	$lastEntry->confirmed = 1;
        $lastEntry->save();
        $location = $user->matchedLocation();
    	return redirect()->to('/');
    }

    public function showLocationsToday()
    {
        $locations =self::allUsedToday();
        return view('locationsToday', compact('locations'));
    }
    public function getLocationInfo($id)
    {
        $location = self::find($id);
        return view('locationOverview', compact('location'));
    }

}
