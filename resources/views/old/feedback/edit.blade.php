@extends('master')

@section('content')
	
	<form method="POST" action="/feedback/edit/{{$feedback->id}}">
		{{ csrf_field() }}
		<div><label for="title">Titel</label><input name="title" type="text" value="{{$feedback->title}}"></div>
		<div><label for="stars">Sterne</label>
			<select name="stars">
				<option value="1" {{ $feedback->stars == 1? 'selected' : ''}}>1</option>
				<option value="2" {{ $feedback->stars == 2? 'selected' : ''}}>2</option>
				<option value="3" {{ $feedback->stars == 3? 'selected' : ''}}>3</option>
				<option value="4" {{ $feedback->stars == 4? 'selected' : ''}}>4</option>
				<option value="5" {{ $feedback->stars == 5? 'selected' : ''}}>5</option>
			</select>
		</div>
		<div><label for="body">Text</label><textarea name="body" cols="30" rows="10">{{$feedback->body}}</textarea></div>
		<input type="text" name="user_id" hidden="true" value="{{$feedback->user_id}}">
		<div><button type="submit">Ändere dein Feedback!</button></div>
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
	
@endsection