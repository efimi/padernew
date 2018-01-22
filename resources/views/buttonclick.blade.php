@extends('master')

@section('content')
        <h1> Willkommen bei PaderMeet</h1>
        <h2> Drücke auf den Button und finde heraus wo es für dich hingeht!</h2>

        {{ Form::open(['route' => 'location.random'])}}
	        {{ Form::label('comeTogether', 'Wir kommen zu zweit') }}
	        {{ Form::checkbox('comeTogether', 0) }}
			{{ Form::submit('Suche eine Location!',  ['class' => 'c-button c-button--rounded c-button--ghost-info'] )}}       
		{{ Form::close() }}
		<example-component></example-component>
		
@endsection