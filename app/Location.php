<?php

namespace App;

use App\Match;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public function allUsedMatchesForLocationToday()
	{
		return Match::where('location_id', $this->id)->whereDate('created_at',today())->get();
	}
	public function usedPlaces()
	{	
		$matchesForLocation = allUsedMatchesForLocationToday();
		return $matchesForLocation->sum('amount');
	}
	// to implement 
	public function maxPlaces($time)
	{
		//whereDate()
		return 5;
	}
	public function getAvaliableLocationsFor($amount = 1)
	{	
		$isClosed = false;

		//get locations that, are today used and have still avaliable palces
		// test wehter last Match has avaliable Places < 5 
		if ( !empty(stillFillableLocationsFor($amount))){
			return stillFillableLocationsFor($amount)->first();
		}
		else {
			// get Random Locaiton with no used palces so far.
			return noUsedSoFarAndOpen(); 
		}
        return Location::inRandomOrder()->first();
	}
	public function stillFillableLocationsFor($amount)
	{
		// search wheter last ones have space for $amount; 

	}
	public function getLocationWithSpaceFor($amount = 1)
	{
		$locations = isOpenToday();
		foreach ($locations AS $key => $location) {
            $locations[$key]['used_places'] = $location->usedPlaces();
        }
        $locations->each(function ($location, $key) use ($amount, $locations) {
            if (($location['used_places'] + $amount) > $location->maxPlaces(today()) {
                $locations->forget($key);
            }
        });
        $locations = $locations->sortByDesc('used_places')->suffle()->first();

        if (empty($locations))) {
        	return $this->isOpenToday()->inRandomOrder();
        }
        return $locations
	}
	public function noUsedSoFarAndOpen($amount)
	{
		return Location::isOpenToday()->getLocationWithSpaceFor($amount);
	}
	//toimplement 
	public function isOpenToday()
	{
		return Location::inRandomOrder()->get();
	}
}
