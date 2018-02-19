@extends('layout.masterNoLoad')

@section('main')
	<small>immer mal wieder <a href="/pinwall">refreshen ✌️</a></small>
	@include('layout.components.pinwall', [ $location, $pins])
	<div class="info">	
		<a href="/pinwall" class="btn-login">💈refresh💈</a> 
		<a href="/" class="btn-login">zurück zur Übersicht</a>
	</div>

	
@endsection

@section('vue')
@endsection