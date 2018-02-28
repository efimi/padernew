@extends('layout.masterNoLoad')

@section('loading')
	@include('layout.components.svg.markerSVG', ['text'=> 'Na, heute schon was vor?'])
@endsection

@section('main')
	
	<mod></mod>

@endsection
