	<form method="POST" action="/feedback">
		{{ csrf_field() }}
		<div><label for="title">Titel</label><input name="title" type="text" ></div>
		<div><label for="stars">Sterne</label>
			<select name="stars">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4" selected="selected">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div><label for="body">Text</label><textarea name="body" cols="30" rows="10" placeholder="Schreibe hier dein Feedback rein." ></textarea></div>
		<div><button type="submit">Sende uns dein Feedback!</button></div>
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