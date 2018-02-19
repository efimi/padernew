<div class="card shadow">
		<a href="#pinwall-form" class="btn-login"> Komm mal runter👇</a>
		<div class="pinwall">
			<h2>Pinwand von </h2>
			
				<h1 style="font-family: paderchunky" class="card-result shadow"> {{$location->name}}</h1>
			
			@foreach($pins as $pin)
				<div class="pinpost">
					<div class="avatarbox">
						<img class="avatar shadow" src="{{ $pin->user->avatar() }}" alt="">
						<small>{{$pin->created_at->diffForHumans()}}</small>
					</div> 
					<div class="pintext">
						<span>{{$pin->text}}</span>
					</div>
				</div>
			@endforeach
		</div>
	    <form id="pinwall-form" action="/pinwall" method="POST">
	        {{ csrf_field() }}
	        <input  class="btn-login" type="text" name="text" placeholder="schreibe was auf die Pinwand!" required>
	        <button type="submit" class="btn-login">abschicken 🚀</button>
	    </form>
	</div>