<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\User;

class Match extends Model
{
    //
    public static function makeMatch($user, $location, $amount)
    {
    	$match = new Match;
    	$match->user_id = $user->id;
    	$match->location_id = $location->id;
    	$match->amount = $amount;
    	$match->save();
    }
}
