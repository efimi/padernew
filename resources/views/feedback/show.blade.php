@extends('layout.masterNoLoad')

@section('main')
	@include('layout.components.avatarAndLog')
	<div class="logo box">
		<a href="#"><img src="img/logo.png" alt=""></a>	
	</div>
	
	<h1 class="item">Gebe uns ein Feeback 😁</h1>
	@include('feedback.form')
	
	<div class="feedbacks">
		@foreach($feedbacks as $feedback)
		
		@include('feedback.instance')
		
		@endforeach	
	</div>
	
	
@endsection