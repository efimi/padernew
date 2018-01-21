<?php 

return [

	'services' => [

		'github' => [
			'name' => 'GitHub',
		],

		'facebook' => [
			'name' => 'Facebook',
		],

		'instagram' => [
			'name' => 'Instagram',
		],
	],

	'events' => [
		'facebook' => [
			'created' => \App\Events\Social\FacebookAccountWasLinked::class,
		]
	]

];