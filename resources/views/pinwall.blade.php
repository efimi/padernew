@extends('layout.masterNoLoad')

@section('main')
	<small>immer mal wieder <a href="/pinwall">refreshen ✌️</a></small>
	@include('layout.components.pinwall', [ $location, $pins])
		<a href="/pinwall" class="btn-login item">💈refresh💈</a> 
		<a href="/" class="btn-login item">zurück zur Übersicht</a>


	
@endsection

@section('vue')
@endsection