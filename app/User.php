<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\History;
use App\Match;
use App\Feedback;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function history()
    {
        return $this->hasMany(History::class);
    }
    public function match()
    {
        return $this->hasMany(Match::class);
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function social()
    {
        return $this->hasMany(UserSocial::class);
    }

    /**
     * Social Facebook id 
     // * for avatar http://graph.facebook.com/ /picture?type=square
     */
    public function facebook_id()
    {

        $social = $this->social->where('service', 'facebook')->first();
        if (empty($social)) {
            return null;
        }
        return $social->social_id;
    }
    /**
     * liefert den Pfad des Avatars.
     * @return [type] [description]
     */
    public function avatar()
    {   
        if(!empty($this->facebook_id())){
            return "http://graph.facebook.com/" . $this->facebook_id() ."/picture?type=square";
        }
        else {
            return "img/avatar.png";
        }
    }
    /**
     * For Social Login
     */
    public function hasSocialLinked($service)
     {
         return (bool) $this->social->where('service', $service)->count();
     } 
    /**
     * Tells wheter Entry in MatchesTable is notEmpty
     * @return boolean
     */
    public function hasLocationAlready()
    {
        return !empty(Match::matchedTodayFor($this));
    }
    /**
     * Returns matchedLocaiton
     * @return Location 
     */
    public function matchedLocation()
    {   
        $match = Match::matchedTodayFor($this);
        return empty($match) ? null : Location::find($match->location_id);
    }
    /**
     * Tells how many minutes needed till pressing is allowed
     * @param  integer
     * @return int
     */
    public function minutesTillPressAllowed($minutes = 1)
    {
        $lastHistoryEntry = History::lastUserEntry($this);
        if(!empty($lastHistoryEntry)) {
            $last_click = Carbon::parse($lastHistoryEntry->created_at);
            $deadline = Carbon::now();
            return $deadline->diffInMinutes($last_click->addMinutes($minutes), false);
        }
        else {
            return 0;
        }
    }
    public function isAllowedToClick()
    {
        $noMatchExsitsToday = empty(Match::matchedTodayFor($this));
        return ($this->minutesTillPressAllowed() <= 0) AND $noMatchExsitsToday;
    }
    public static function makeTestUser()
    {
        $user = new User;
        $user->name = 'rein';
        $user->email = 'test@test.de';
        $user->password = 'rein';
        $user->save();
    }
}
