@extends('master')

@section('content')
	
	@include('feedback.form')

	<hr>

	@foreach($feedbacks as $feedback)
		
		@include('feedback.instance')
		
	@endforeach
	
@endsection