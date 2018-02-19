<?php

namespace App;

use App\Location;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
    
    public static function showAllPinsFor($location)
    {	
    	$pins = Pin::whereDate('created_at', today())->where('location_id', $location->id)->get();
    	return $pins;
    }
    public static function isFrom($user)
    {
    	return ($this->user_id === $user->id);
    }
}
