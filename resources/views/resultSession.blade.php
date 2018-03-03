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
				 @include('layout.components.map', session()->get('location', 'default'))
			</div>
			<div class="right-box">
				<h1>{{ session()->get('location', 'default')->name}}</h1>
				<p>
					{{ session()->get('location', 'default')->address}}
				</p>
				@include('layout.components.usedplaces', session()->get('location', 'default'))
			</div>
		</div>
	</a>		
@endsection