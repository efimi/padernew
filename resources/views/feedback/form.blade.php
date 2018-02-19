
	<form method="POST" action="/feedback" class="card">
		{{ csrf_field() }}
		
		<label for="title">Titel</label>
		<input class="btn-login" name="title" type="text" >
		
		<label for="stars">Sterne</label>
			<div>
				<select name="stars">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4" selected="selected">4</option>
					<option value="5">5</option>
				</select>
			</div>
		<div class="item"><label class="intro" for="body">Text</label>
		
		<input class="card" name="body" cols="30" rows="10" placeholder="Schreibe hier dein Feedback rein." ></input>	
		</div>
		<button class="btn-login" type="submit">Sende uns dein Feedback!</button>
	</form>

	@if(count($errors))
		<div class="errors">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif