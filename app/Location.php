<?php

namespace App;

use App\Match;
use App\OpeningHours;
use App\Pin;
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
    public function pins()
    {
    	return $this->hasMany(Pin::class);
    }
    public function openinghours(){
    	return $this->hasMany(OpeningHours::class);
    }
    /**
     * HilfsMethode für um die bisherigen Bentuzen Plätze zu errechnen
     * @return [Match] [Gibt alle Matches zurück, welche heute erstellt wurden]
     */
	public function allUsedMatchesForLocationToday()
	{
		return Match::where('location_id', $this->id)->whereDate('created_at',today())->get();
	}
	/**
	 * Gibt die Anzahl an schon benutzten Plätzen derjenigen Location zurück. Die 'amount' Spalte wird dabei aufsummiert.
	 * @return [Int] [description]
	 */
	public function usedPlaces()
	{	
		$matchesForLocation = $this->allUsedMatchesForLocationToday();
		return $matchesForLocation->sum('amount');
	}
	
	/**
	 * Zukünftiges Addon:
	 * Fragt ab wie viele Plätze heute von der Location zur verfügung gestellt werden. Standartmäßig auf 5 gesetzt.
	 * @return [int] [Anzahl der heute maximal zu belegenenden Plätze]
	 */
	public function maxPlacesToday()
	{
		today();
		//whereDate()
		return 5;
	}
	
	/**
	 * Findet eine Location mit $amount viel paltz. Versucht zunächst Locatioins die bentutzt werden aufzufüllen. Falls das nicht möglich ist, wird eine Location geuscht die befüllbar ist. 
	 * @param  [int] $amount Anzahl der Leute die Platzfinden sollen
	 * @return [Location]         [Gibt eine Location zurück die noch Platz für $amount Leute hat.]
	 */
	public static function getLocationWithSpaceFor($amount)
	{
		// try to find in Location with space avaliable
		$location = self::spaceAvaliable($amount);

        if (empty($location)) {
        	// get a random location that is not used so far
			$location = self::getRandomUnusedLocationToday();
        	}
        return $location;
	}
	/**
	 * Liefert eine Location die bisher noch nicht bentutzt wurde und heute zur Uhrzeit $time offen ist. 
	 * @param  [integer] $time [Zeit zu der die Locatoin offen ist]
	 * @return [Location]       [nicht benutzt bisher]
	 */
	public static function getRandomUnusedLocationToday($time = 2000)
	{
		$usedLocations = self::allUsedToday();
		$allOpen = self::getOpenToday($time);
		$unusedLocations = $allOpen->diff($usedLocations);
		return $unusedLocations->shuffle()->first();
	}
	/**
	 * Gibt alle Locations zurück, welche heute um $time offen sind.
	 * @param  [integer]  $time [zwischen 0000 und 2359]
	 * @return [Collection Location]       [Gibt Locations zurück]
	 */
	public static function getOpenToday($time)
	{
		return OpeningHours::getOpenLocationsAt($time);
	}
	/**
	 * Liefert alle heute schon verwendeten Locations zurück
	 * @return [Collection Location] [Eine Collection von Locations]
	 */
	public static function allUsedToday()
	{
		$allMatch = Match::whereDate('created_at', today())->get();
		$locations = collect([]);
		foreach ($allMatch AS $m){
			$locations->push($m->location()->get());
		}
		return $locations = $locations->unique()->collapse();
	}
	/**
	 * Gibt die erste Location zurück, welche noch $amount viel Plaz frei hat. Falls es keine Location mit freiem Platz gib, wird null zurückgegeben
	 * @param  [int] $amount [Anzahl der Leute]
	 * @return [Location]         [Location die aufgefüllt werden kann]
	 */
	public static function spaceAvaliable($amount){
		$allUsed = self::allUsedToday();
		foreach ($allUsed as $location) {
			if ($location->hasFreeSpace($amount)) {
					return $location;
				}	
		}
		return null;
	}
	/**
	 * Teste ob gegebene Location noch freie Plätze für $amount viele Leute hat.
	 * @param  [int]  $amount  [Anzhal der Leute]
	 * @return boolean         [description]
	 */
	public function hasFreeSpace($amount)
	{
		return $this->usedPlaces() + $amount <= $this->maxPlacesToday();
	}
	public function closesTodayAt()
	{	
		// $thisDay = today()->dayOfWeek + 1;
		$thisDay = 3;
		$time = Location::find(81)->openinghours()->where('day_id', $thisDay)->where('closed','!=', "")->get();

		if ($time->first()->closed < 2000 ) {
			$thisDay = 4;
		}
		// wenn zwei öffnungszeiten dann nimm die zeweite
		// wenn eine öffnungzeit, dann vergleiche
		// nimm nächste öffnungszeit
		if ($time < 2000) {
			$thisDay = today()->addDay(1)->dayOfWeek +1;
			$time = $this->openinghours()->where('day_id', $thisDay)->where('opened','!=',"")->first()->opened;
		}
		if ($time === "0000") {
			# code...
		}
		$time = str_split($time,2);
		$time = implode(":", $time);
		return $time;
	}
}
