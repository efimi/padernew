@if( $location->usedplaces() > 1)
	<p>😄</p>
	<p>
		Derzeit kommen noch {{$location->usedplaces()}} weitere Personen!🙋
	</p>
@else
	<p>Woooooooowwww!!</p>
	<p> Du hast die Location {{ $location->name}} neu eröffnet! </p>
	<p>🎊🎉🎈👏👏👏</p>
	<small> Sage schnell deinen Freunden bescheid - dann könntet ihr auf die selbe Location gematcht werden!</small>
@endif