@extends('master')

@section('content')
        <h1> Willkommen bei PaderMeet</h1>
        <h2> Wie Cool das du heute dabei Bist!</h2>

        <small>Nochmal zur Erinnerung</small>
		<p>
			<h3> Schau einfach um 20:00 Uhr vorbei und treffe andere Menschen!</h3>
			<br>
			Zeige dem Personal deinen <a href="{{url('/qrcode')}}">QR-Code</a> und genieße einen Bonus bei deiner Bestellung!
		</p>
        <h2> Locations Infos</h2>
        <p>
        	@include('locationInfo', $location)
        </p>
        
@endsection