<?php

namespace App\Chat;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = [
		'body', 'location_id'
	];

	protected $appends = [
		'selfOwned',
		'pinwallId'
	];

	public function getSelfOwnedAttribute()
	{
		return $this->user_id === auth()->user()->id;
	}
	public function getPinwallIdAttribute()
	{
	return $this->user->matchedLocation()->id;
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
