@if( $location->usedplaces() > 2)
	<p>😄</p>
	<p>
		Derzeit kommen noch {{$location->usedplaces() - 1}} weitere Personen!🙋
	</p>
@else
	<p>Woooooooowwww!! Du hast die Location {{ $location->name}} neu zum matchen eröffnet! </p>
	<p>🎊🎉🎈👏👏👏</p>
	{{-- <small> Sage schnell deinen Freunden bescheid - dann könntet ihr auf die selbe Location gematcht werden!</small> --}}
@endif

@if( $location->usedplaces() === 2)
	<p>😄</p>
	<p>
		Derzeit kommen noch eine weitere Person!🙋
	</p>
@endif