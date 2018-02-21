<?php 

return [

	'events' => [
		'created' => \App\Events\Match\UserWasMatchedToLocation::class,
		'filledUp' => \App\Events\Match\LocationWasFilled::class,
	],
];