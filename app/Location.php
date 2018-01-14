<?php

namespace App;

use App\Match;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{	
	public function histories()
    {
        return $this->hasMany(History::class);
    }
    public function matches()
    {
        return $this->hasMany(Match::class);
    }

	public function allUsedMatchesForLocationToday()
	{
		return Match::where('location_id', $this->id)->whereDate('created_at',today())->get();
	}
	public function usedPlaces()
	{	
		$matchesForLocation = $this->allUsedMatchesForLocationToday();
		return $matchesForLocation->sum('amount');
	}
	// to implement 
	public function maxPlacesToday()
	{
		today();
		//whereDate()
		return 5;
	}
	
	public static function getLocationWithSpaceFor($amount)
	{
		// try to fit in LocationsUsed
		$location = self::fitInLocationsAndForgetKeysOrder($amount, true, 'desc');

        if (empty($location)) {
        	// Sort by used places take smallest sofar used
			$location = self::fitInLocationsAndForgetKeysOrder($amount, false, 'asc');
        	}
        return $location;
	}
	public static function fitInLocationsAndForgetKeysOrder($amount, $forgetKeys, $order)
	{
		$locations = self::isOpenToday();
		foreach ($locations AS $key => $location) {
            $locations[$key]['used_places'] = $location->usedPlaces();
        }
        if ($forgetKeys) {
        	$locations->each(function ($location, $key) use ($amount, $locations) {
	            if (($location['used_places'] + $amount) > $location->maxPlacesToday()) {
	                $locations->forget($key);
	            }
	        });
        }
        if ($order == 'desc') {
			return $locations = $locations->sortByDesc('used_places')->first();
        }
        else
        {
        	return $locations = $locations->sortBy('used_places')->first();
        }
	}
	//toimplement 
	public static function isOpenToday()
	{
		return Location::all();
	}
	public static function allUsedToday()
	{
		$allMatch = Match::whereDate('created_at', today())->get();
		$locations = collect([]);
		foreach ($allMatch AS $m){
			$locations->push($m->location()->get());
		}
		return $locations = $locations->unique()->collapse();
	}
}
