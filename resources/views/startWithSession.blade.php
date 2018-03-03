@extends('layout.masterNoLoad')

@section('main')

	{{-- @include('layout.components.logo') --}}
	<logo></logo>
	@if (condition)
		{{-- expr --}}
	@endif
		<form action="POST" action="">
		{{ csrf_field() }}	
			<input type="checkbox" name="twoPersons">
		<button type="submit" class="btn-middle">Clicke Hier</button>
			
		</form>
		

	

@endsection