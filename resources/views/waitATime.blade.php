@extends('master')

@section('content')
	<h1>{{$user->name}}, du musst noch einen Augenblick warten</h1>
	<h2>Um genau zu sein noch {{ $user->minutesTillPressAllowed() }} {{ $user->minutesTillPressAllowed() == 1? 'Minute' : ' Minuten' }} </h2>

	<p>Klicke dann einfach nocheinmal auf den Button und confirme die Auswahl</p>
	<br>
	<a href="/">Refreshe die Seite!</a>
@endsection