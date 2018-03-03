@extends('layout.master')

@section('main')
	<div class="intro item">
		<h1>🎊</h1>
		Schau mal was 📍 wir für dich gefunden haben
		<h1>🎉</h1>
	</div>


	<a href="#" alt="für weitere infos hier clicken" class="shadow box item card-round">
		<div class="card-result">
			<div class="map-left ">
				 @include('layout.components.map', $location)
			</div>
			<div class="right-box">
				<h1>{{ $location->name}}</h1>
				<p>
					{{ $location->address}}
				</p>
				@include('layout.components.usedplaces', $location)
			</div>
		</div>
	</a>		
@endsection