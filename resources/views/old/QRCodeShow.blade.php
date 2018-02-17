@extends('master')

@section('content')
	<div class="qrcode">
	    {!! QrCode::size(300)->generate(Request::url() . '/test/' . $user->id); !!}
	    <p>{{Request::url() . '/test/' . $user->id}}</p>
		<a href="{{Request::url() . '/test/' . $user->id}}">{{Request::url() . '/test/' . $user->id}}</a>	
	</div>
@endsection