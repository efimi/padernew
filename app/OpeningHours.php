<?php

namespace App;
use App\Location;
use Illuminate\Database\Eloquent\Model;

class OpeningHours extends Model
{
    public function location(){
    	return $this->belongsTo('App\Location','location_id');
    }
    /**
     * Gibt alle Reihen der Öffnungszeiten wieder, die heute um $time Uhr auf haben.
     * Daraus lassen sich später die zugehörigen locations finden.
     * @param  integer $time [description]
     * @return [type]        [description]
     */
    public static function getOpenAt($time = 2000)
    {
    	$thisDay = today()->dayOfWeek + 1;
        $nextDay = today()->addDay(1)->dayOfWeek + 1;
    	$open = OpeningHours::where('day_id', $thisDay)->where('opened','<', $time)->where('closed','>', $time)
                            ->orWhere('day_id', $thisDay)->where('opened','<', $time)->where('closed', "")
    						->orWhere('day_id', $nextDay)->where('opened',"")->where('closed', '<', $time)
    						->get();
    	return $open;
    }
    public static function getOpenLocationsAt($time = 2000)
    {	
    	$instances = self::getOpenAt($time);
    	// make a new collection
    	$locations = collect([]);
    	// fill collection, exclude same
    	foreach ($instances as $instace) {
    		$locations->push($instace->location);
    	}
    	return $locations;
    }
}
