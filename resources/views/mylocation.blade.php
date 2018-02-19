@extends('layout.master')

@section('loading')
@endsection

@section('main')
	
	<div class="split-row">
		<div class="left">
			<a href="#">
			<img class="avatar shadow" src="{{auth()->user()->avatar()}}" alt="">
			<span>{{ auth()->user()->name}}</span>
			</a>
		</div>
		<div class="right">
			<a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                         class="btn-login shadow">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
		</div>
	</div>
	
	<div class="logo box">
		<a href="#"><img src="img/logo.png" alt=""></a>	
	</div>
	{{-- LasLocation für Ffedback berterte {{$user->lastLocation()}} --}}
	
	<div class="intro item">
		{{-- nur wenn der user nochmal die Seite beuscht und schon zugteilt wurde. --}}
			<span>Hallo {{auth()->user()->name}}!</span>
	</div>

	<div class="news">
		@include('layout.components.usedplaces', $location)
	</div>
	<div class="info">
		<small> Schau dir mal die Pinnwand von👇 {{$location->name}} an 😯</small>	
	</div>
	
	<div class="button-area box item">
		<a href="/pinwall" class="btn-middle arrow">Die Pinnwand </a>
	</div>
	
	<a href="#" alt="für weitere infos hier clicken" class="result shadow card-rounded  box item">
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