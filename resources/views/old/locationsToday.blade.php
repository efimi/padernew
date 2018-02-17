@extends('master')

@section('content')
	
	@include('locationsTodayMap', $locations)

	<h2>Tabelle von Heute!</h2>
	<table class="table">
		<thead>
			<th>Name</th>
			{{-- <th>Addresse</th> --}}
			<th>Teilnehmer</th>
			<th>Info</th>
		</thead>
	
	<tbody>
		@foreach($locations as $location)
			<tr>
				<td>{{ $location->name }}</td>
				{{-- <td>{{ $location->address }}</td> --}}
				<td>{{ $location->usedPlaces() }}</td>
				<td><a href="/lcoation/{{ $location->id }}">Infos zu {{ $location->name }}</a></td>
			</tr>
		@endforeach
	</tbody>
	</table>
@endsection