@extends('master')

@section('content')
	<h1>Dieser Nutzer hat heute PaderMeet anscheinden nicht bentutz!</h1>
	<p>Bei Komplikationen scannen sie einfach diesen QrCode und beschreiben sie den Fall.</p>
	<div class="qrcode">
	    {!! QrCode::size(300)->email('info@padermeet.de', 'Nutzer Nr.'. $user->id .' wurde nicht eingetragen', null); !!}
	</div>
@endsection