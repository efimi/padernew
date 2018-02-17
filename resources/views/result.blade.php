@extends('layout.master')

@section('loading')
@endsection

@section('main')
	
		<div class="split-row">
			<div class="left">
				<a href="#">
				<img class="avatar shadow" src="http://graph.facebook.com/{{auth()->user()->facebook_id()}}/picture?type=square" alt="">
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
	
	@isset ($message)
	{{-- nur wenn der user nochmal die Seite beuscht und schon zugteilt wurde. --}}
		<div class="intro">
			<span>Hallo {{auth()->user()->name}}!</span>
			<span>Du wurdest heute schon {{$location->name}} zugewiesen!</span>
		</div>
		@else
		<div class="intro">
			<span>Vergiß nicht: Heute um 20:00 Uhr!</span>
			@include('layout.components.usedplaces', $location)
		</div>
		<div class="intro">
			<span>Heute um 20:00 Uhr!</span>
		</div>
		<div class="intro">
			<span>Viel Spass mit bei deinem Treffen!</span>
		</div>
	@endisset

	<div class="button-area box">
		<a href="#" class="btn-middle shadow">		
				<span>Super!</span>
		</a>
	</div>

	<a href="#" alt="für weitere infos hier clicken" class="result shadow card-result box">
		<div class="">
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
	<small class="box">Für weitere Infos zu {{$location->name}} clicke <a href="{{$location->webiste}}">hier</a></small>
	<div class="split-row">
		<div class="right">
			<a href="/faq#wie-funktioniert-padermeet" class="btn-login arrow shadow">und was mache ich jetzt?</a>
		</div>
	</div>
@endsection