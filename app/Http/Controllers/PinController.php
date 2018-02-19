<?php

namespace App\Http\Controllers;

use Auth;
use App\Location;
use App\Match;
use App\Pin;
use Illuminate\Http\Request;

class PinController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
    	$user = Auth::user();
    	$match = Match::matchedTodayFor($user);
    	$location = Location::find($match->location_id);
    	$pins = Pin::showAllPinsFor($location);

		return view('pinwall', compact('location','pins'));
    }
    public function store()
    {
    	$user = Auth::user();
    	$match = Match::matchedTodayFor($user);
    	$location = Location::find($match->location_id);

    	$pin = new Pin; 
    	$pin->location_id = $location->id;
    	$pin->user_id = $user->id;
    	$pin->text = request()->text;
    	$pin->save();
    	return redirect()->to('/pinwall'); 
    }
}
