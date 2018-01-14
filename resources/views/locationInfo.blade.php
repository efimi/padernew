<h1> {{ $location->name }}</h1>
	@include('map', $location)

	<small>Slogan:</small>
	<br>
	<h2>Cooler als im {{$location->name }} kann es kaum sein!</h2>
		@if( $location->usedplaces() > 1)
			<h2>Du bist nicht alleine!!</h2>
				Derzeit {{ $location->usedplaces() == 2 ? 'kommt' : 'kommen'}} 
				noch {{$location->usedplaces()}} 
				{{ $location->usedplaces() == 2 ? 'Person' : 'Personen'}}
		@else
			
		@endif