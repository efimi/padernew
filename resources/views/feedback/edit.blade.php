@extends('layout.masterNoLoad')

@section('main')
	@include('layout.components.avatarAndLog')
	<div class="logo box">
		<a href="#"><img src="img/logo.png" alt=""></a>	
	</div>
	<h1 class="item">Bearbeite dein Feedback📝</h1>
	<form  method="POST" action="/feedback/edit/{{$feedback->id}}" class="card" ref="changeFeedback">
		{{ csrf_field() }}
		<label for="title">Titel</label>
		<input class="btn-login" name="title" type="text" value="{{$feedback->title}}">
		<label for="stars">Sterne</label>
			<div>
				<select name="stars">
					<option value="1" {{ $feedback->stars == 1? 'selected' : ''}}>1</option>
					<option value="2" {{ $feedback->stars == 2? 'selected' : ''}}>2</option>
					<option value="3" {{ $feedback->stars == 3? 'selected' : ''}}>3</option>
					<option value="4" {{ $feedback->stars == 4? 'selected' : ''}}>4</option>
					<option value="5" {{ $feedback->stars == 5? 'selected' : ''}}>5</option>
				</select>
			</div>
			<div>
			<label class="intro" for="body">Text</label>
			<input class="card" name="body" cols="30" rows="10" v-on:keyup.13="submitIt" value="{{$feedback->body}}"></input>
			</div>
		
		<input type="text" name="user_id" hidden="true" value="{{$feedback->user_id}}">
		<button class="btn-login item" type="submit" >Ändere dein Feedback!</button>
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

@section('vue')
<script>
	var app = new Vue({
		el: '#app',
		methods: {
			submitIt(){
				this.$refs.changeFeedback.submit()
			}
		}
	});
</script>
@endsection