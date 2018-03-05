<?php

namespace App;

use App\Chat\Message;
use App\Feedback;
use App\History;
use App\Location;
use App\Match;
use App\Pin;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Faker\Generator as Faker;

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
    public function matches()
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
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function todaysMatch()
    {
        return $this->matches()->whereDate('created_at', today())->first();
    }
    public function todaysGroupe()
    {
        return !empty($this->todaysMatch()) ? $this->todaysMatch()->participants() : null;
    }
    public function todaysMessages()
    {
        return $this->messages()->whereDate('created_at', today())->get();
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
     public function avatar()
    {
        return $this->hasOne(Image::class, 'id', 'avatar_id');
    }
    /**
     * liefert den Pfad des Avatars.
     * @return [type] [description]
     */
    public function avatarPath()
    {   
        if(!empty($this->facebook_id())){
            return "http://graph.facebook.com/" . $this->facebook_id() ."/picture?type=square";
        }
        if (!$this->avatar_id) {
            return"img/avatarDummy.png";
        }

        return $this->avatar->path();
       

            return ;
    }
    /**
     * Antwortet auf die Frage: Der wievielte in der Matchreihenfolge ist dieser User?
     * @return [type] [description]
     */
    public function matchedRangToday()
    {
        $location = $this->matchedLocation;
        $allmatches = $location->allUsedMatchesForLocationToday();
        $number = 0;
        for ($i=0; $i < $allmatches->count(); $i++) { 
            if ($allmatches->find($i)->user_id = $this->id) {
                $number = $i;
                break;
            }
        }
        return $number;

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
     * Returns matchedLocaitonId
     * @return Location 
     */
    public function matchedLocationId()
    {   
        $match = Match::matchedTodayFor($this);
        return empty($match) ? null : $match->location_id;
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
    public static function makeFakeUserAndMatch(){
        $faker = new Faker;
        $user = User::create([
            'name' => 'Pader'. $faker->firstName,
            'email' => 'paderkarl@padermeet.de',
            'remember_token' => str_random(10),
        ]);
        $location = Location::getLocationWithSpaceFor(1);
        // save in DB
        History::makeNewEntry($user, $location, 1);
        Match::makeMatch($user, $location, 1);
        return $location;
        
    }
}
