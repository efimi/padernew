<?php

namespace App\Observers;

use App\Match;

class MatchObserver
{
	public function created(Match $match)
	{

		$this->handleUserEvent('created', $match);
		if ($match->location->allUsedMatchesForLocationToday()->count() === $match->location->maxPlacesToday()) {
			$this->handleLocationEvent('filledUp', $match);
		}
	}
	protected function handleUserEvent($event, Match $match)
	{

		$class = config("match.events.{$event}", null);

		if ($class === null) {
			return;
		}
		event(new $class($match->user));
	}

	protected function handleLocationEvent($event, Match $match)
	{

		$class = config("match.events.{$event}", null);

		if ($class === null) {
			return;
		}
		event(new $class($match->location));
	}
	

}