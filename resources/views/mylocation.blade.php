@extends('layout.master')

@section('loading')
	@include('layout.components.svg.markerSVG', ['text' => \App\Match::totalMatchesToday()])
@endsection

@section('main')
	
		@include('layout.components.avatarAndLog')

	
	<div class="logo box">
		<a href="#"><img src="img/logo.png" alt=""></a>	
	</div>
	{{-- LasLocation für Ffedback berterte {{$user->lastLocation()}} --}}
	
	<div class="intro item">
		{{-- nur wenn der user nochmal die Seite beuscht und schon zugteilt wurde. --}}
			<span>Hallo <a href="/dashboard">{{auth()->user()->name}}</a>!</span>
	</div>

	<div class="news">
		@include('layout.components.usedplaces', $location)
	</div>
	<div class="info">
		<small> Schau dir mal die Pinnwand 👇 von {{$location->name}} an 😯</small>	
	</div>
	
	<div class="button-area box item">
		<a href="/pinwall" class="btn-middle arrow">📌 Die Pinnwand 📋</a>
	</div>
	
	<a href="#" alt="für weitere infos hier clicken" class="result shadow card-round  box item">
		<div class="card-result">
			<div class="map-left ">
				 @include('layout.components.map', $location)
			</div>
			<div class="right-box">
				<h1>{{ $location->name}}</h1>
				<p>
					{{ $location->address}}
				</p>
			</div>
		</div>
	</a>

	<small class="box item">Für weitere Infos zu {{$location->name}} clicke <a href="{{$location->website}}">hier</a>
	 <br> Für alle weiteren Fragen besuche doch einfach unser <a href="/faq">FAQ</a>🤓
	
	</small>
@endsection