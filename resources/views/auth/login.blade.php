@extends('layout.master')

@section('loading')
	@include('layout.components.svg.markerSVG', ['text'=> 'Na, heute schon was vor?'])
@endsection

@section('main')
	
<div class="logo box">
	  		<h1>Willkommen bei</h2>
			<a href="#"><img src="img/logo.png" alt=""></a>
	</div>
	<div class="logo box">
		<span>- der neunen Treffapp für Paderborn -</span>
	</div>
	@include('layout.components.loginTemplate')	

@endsection
