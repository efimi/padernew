@extends('layout.master')
@section('loading')
	@include('layout.components.svg.markerSVG', ['text'=> "Hi ". auth()->user()->name ." !"])
@endsection

@section('main')

		<div class="logo box">
	  		<h1>Willkommen bei</h2>
			<a href="#"><img src="img/logo.png" alt=""></a>
		</div>

		<div class="logo box">
			<span>- der neunen Treffapp für Paderborn -</span>
		</div>
		<div class="intro">
			<span>Klicke auf den Button und erfahre wo es für dich hingeht!😀</span>
		</div>
		<div class="button-area">
			<a href="/result" class="btn-middle shadow">		
					<span>Hier klicken!</span>
			</a>
		</div>
		<div class="space-sm"></div>

		@include('layout.components.avatarAndLog')

@endsection