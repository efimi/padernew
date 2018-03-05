@extends('layout.masterNoLoad')

@section('loading')
	@include('layout.components.svg.markerSVG', ['text' => \App\Match::totalMatchesToday() ])
@endsection

@section('main')
		@include('layout.components.avatarAndLog')
		
		<h1>Dashboard</h1>
		@if (auth()->user()->hasLocationAlready())
				<h3>Du wurdest heute auf {{auth()->user()->matchedLocation()->name}} gematcht</h3>
				<a href="/unmatch" class="btn-login">⚠️Löse deinen Match auf!💔</a>
			@else
				<a href="/result" class="btn-middle item"> Finde Jetzt eine Neue Location!</a>
			@endif

	<div class="dashboard">

		<div class="dleft">
			<div class="logo">
				<a href="#"><img src="img/logo.png" alt=""></a>
			</div>
			
				<a href="/feedback" class="btn-login item"> Ich würde gern mal Feedback geben 📙</a>
		</div>
		<div class="dright">

			<div class="settings">
				<form action="{{ route('account.update') }}" method="post" class="card">
		            {{ csrf_field() }}
		            {{ method_field('PATCH') }}
	            <div class="form-group">
					 <avatar-upload endpoint="{{ route('account.avatar.store') }}" send-as="image" current-avatar="{{ Auth::user()->avatarPath() }}"></avatar-upload>
	            </div>
		        <div class="form-group">
	              <label for="name">Name</label>
	              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? Auth::user()->name }}">
	            </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-login">übernehmen</button>
	            </div>
	          </form>

	          
			</div>
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
										<img class="avatar shadow" src="{{$user->avatarPath()}}" alt="">
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

@section('vue')
@endsection