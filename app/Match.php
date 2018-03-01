<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\User;

class Match extends Model
{
    //
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    /**
     * Gibt den Matcheintrag zurück mit der User id, Locaiton id...
     */
    public static function matchedTodayFor($user)
    {
    	return Match::where('user_id', $user->id)->whereDate('created_at', today())->first();
    }
    /**
     * Gitb wieder wie viele heute schon gematcht wurden
     * @return [type] [description]
     */
    public static function totalMatchesToday()
    {
        return Match::whereDate('created_at', today())->get()->count();
    }
    /**
     * Liefert alle Matchingeinträge eines users 
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public static function allMatchesEver($user)
    {
        return Match::where('user_id', $user->id)->get();
    }
    /**
     * Liefert alle zu in Realtion zu einem Matchingeintrag.
     * @return [type] [description]
     */
    public function participants()
    {   
        // $date = explode(" ", $this->created_at)[0];
        $date = $this->created_at;
        $matches = Match::whereDate('created_at', $date )
                ->where('location_id', $this->location_id)->get();
        $participants = collect([]);
        foreach ($matches as $m) {
           $participants->push($m->user);
        }
        return $participants;
    }
    /**
     * Tragt ein Match in die Datenbank ein.
     * @param  [type] $user     [description]
     * @param  [type] $location [description]
     * @param  [type] $amount   [description]
     * @return [type]           [description]
     */
    public static function makeMatch($user, $location, $amount)
    {
    	if(empty(Match::matchedTodayFor($user))){
	    	$match = new Match;
	    	$match->user_id = $user->id;
	    	$match->location_id = $location->id;
	    	$match->amount = $amount;
	    	$match->save();    		
    	}
    	else {
    	}
    }

    public static function unmatchToday($user)
    {
        Match::whereDate('created_at', today())->where('user_id', $user->id)->delete();
    }
    public static function setQrTestMadeFor($user)
    {
        $match = Match::matchedTodayFor($user);
        $match->qr_test_made = true;
        $match->save();
    }
    public static function setQrTestApprovedFor($user)
    {
        $match = Match::matchedTodayFor($user);
        $match->qr_test_approved = true;
        $match->save();
    }
}
