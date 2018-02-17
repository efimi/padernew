@extends('master')

@section('content')
	@include('locationInfo', $location)
	
	<a href="{{ route('location.confirm') }}" class="c-button c-button--rounded c-button--ghost-info">Confirm!</a>
@endsection
