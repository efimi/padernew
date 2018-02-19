@extends('layout.masterNoLoad')

@section('loading')
	@include('layout.components.svg.markerSVG')
@endsection

@section('main')
	<div class="split-row">
		<div class="left">
			<a href="/dashboard">
			<img class="avatar shadow" src="{{auth()->user()->avatar()}}" alt="">
			<span>{{ auth()->user()->name}}</span>
			</a>
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

		<h1>Dashboard</h1>
	<div class="dashboard">
		<div class="dleft">
			<div class="logo">
				<a href="#"><img src="img/logo.png" alt=""></a>
			</div>
		</div>
		<div class="dright">
			<div class="settings"></div>
			<div class="match-history">
				<div class="h-table">
					<div class="h-row">
						<div class="h-entry">
							Besuchte Orte
						</div> </div>
					<div class="h-row">
						<div class="h-entry hleft">Datum</div>
						<div class="h-entry hleft">Ort</div>
						<div class="h-entry hcenter">Teilnehmer</div>
					</div>
					
					@foreach($matches as $match)

						<div class="h-row">
							<div class="h-entry hleft">{{$match->created_at->format('d.m.Y')}}</div>
							<div class="h-entry hleft">{{$match->location->name}}</div>
							<div class="h-entry hcenter">
								@foreach($match->participants() as $user)
									<div class="left">
										<a href="#">
										<img class="avatar shadow" src="{{$user->avatar()}}" alt="">
										{{-- <span>{{$part->name}}</span> --}}
										</a>
									</div>
								@endforeach
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection