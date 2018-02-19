@extends('layout.master')

@section('loading')
		@include('layout.components.svg.markerSVG')
@endsection

@section('main')
	
	@include('layout.components.avatarAndLog')
	
	<div class="logo box">
		<a href="#"><img src="img/logo.png" alt=""></a>	
	</div>
	
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
			
	<small class="box item">Du willst hier hin??? 😃</small>
	<small class="box item">Bestätige noch kurz 👇 dass du hin gehst!😘</small>
	<div class="button-area box item">
		<a href="/confirmThatICome" class="btn-middle shadow">		
				<span>Super, da geht ich hin!✌️</span>
		</a>
	</div>
	<small class="box item">Für weitere Infos zu {{$location->name}} clicke <a href="{{$location->website}}">hier</a>
	@include('layout.components.refreshTipp')

	 <br> Für alle weiteren Fragen besuche doch einfach unser <a href="/faq">FAQ</a>🤓
	
	</small>
@endsection