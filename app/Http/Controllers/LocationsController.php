<?php

namespace App\Http\Controllers;

use App\History;
use App\Location;
use App\Match;
use App\Pin;
use App\User;
use Auth;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function startApp()
    {
        $user = Auth::user();
        if(empty($user)){
            User::makeTestUser();
            $user = User::find(1);
        }
        if($user->hasLocationAlready() ){
            $location = $user->matchedLocation();
            // lastlocation für Feedback ->users
            $pins = Pin::showAllPinsFor($location);
            $message = "schon";
            return view('mylocation', compact('location','pins'));
        }
        else {
            return view('click');
        }
    }
    /**
     * Liefert eine Location zurück. Und Trägt in der History ein.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getLocation(Request $request)
    {   
        $amount = $request->comeTogether == '0' ? 2 : 1;
        $location = Location::getLocationWithSpaceFor($amount);
        // save in DB
        History::makeNewEntry(Auth::user(), $location, $amount);
        // Match::makeMatch(Auth::user(), $location, $amount);
        return view('result', compact('location'));
    }
    public function getLocationApi(Request $request)
        {	
        	// match user to location
        	$user = User::find(1);
        	// $amount = $this->getAmount($request);
            // $amount = $request->comeTogether == '0' ? 2 : 1;
            $amount =1;
            $location = Location::getLocationWithSpaceFor($amount);
        	// save in DB
        	History::makeNewEntry($user, $location, $amount);
        	return $location;
        }

    public function confirmThatIcome()
    {
        $user = Auth::user();
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
