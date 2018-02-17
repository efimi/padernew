@extends('layout.master')
@section('loading')
	
@endsection

@section('main')
		<div class="logo box">
	  		<h1>Willkommen bei</h2>
			<a href="#"><img src="img/logo.png" alt=""></a>
		</div>
		<div class="logo box">
			<span>- der neunen Treffapp für Paderborn -</span>
		</div>
		<div class="intro">
			<span>Klicke auf den Button und erfahre wo es für dich hingeht!</span>
		</div>
		<div class="button-area">
			<a href="/result" class="btn-middle shadow">		
					<span>Hier klicken!</span>
			</a>
		</div>
		<div class="space-sm"></div>
		<div class="split-row">
			<div class="left">
				<a href="#"><img class="avatar shadow" src="{{auth()->user()->avatar()}}" alt=""></a>
				<a href="#"><span>{{ auth()->user()->name}}</span></a>
			</div>
			<div class="right">
				<a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                             class="btn-login shadow">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
			</div>
		</div>
@endsection