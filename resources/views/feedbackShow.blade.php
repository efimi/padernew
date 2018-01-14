@extends('master')

@section('content')
	
	@include('feedbackForm')

	<hr>

	@foreach($feedbacks as $feedback)
		
		@include('feedbackInstance')
		
	@endforeach
	
@endsection