@if( $location->usedplaces() > 1)
	<p>
		Derzeit {{ $location->usedplaces() == 2 ? 'kommt' : 'kommen'}} 
		noch {{$location->usedplaces()}} 
		{{ $location->usedplaces() == 2 ? 'Person' : 'Personen'}}
	</p>
@else
	
@endif