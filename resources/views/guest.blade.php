@extends('layout.masterNoLoad')

@section('main')

	{{-- <pre>{{dd(session()}} </pre> --}}
	<logo></logo>
	
	<a class="btn-middle" href="/result" >Clicke Hier</a>
	
	<form action="POST" method="{{ route('registerNewUser') }}">
		{{ csrf_field() }}
		<input class="btn-login" type="text" name="name" id="" placeholder="Name">
		<input class="btn-login" type="text" name="email" placeholder="email">
		<button class="btn-login" type="submit"> Submit</button>

	</form>
	

@endsection