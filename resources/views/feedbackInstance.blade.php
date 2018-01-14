<h2>{{$feedback->title}}</h2>
	@if(1 == $feedback->user_id)
		<div class="user-edit" style="padding-left: 30vw; color: darkblue;">
			<a href="/feedback/edit/{{$feedback->id}}" style="text-decoration: none;">bearbeiten</a>
			<a href="/feedback/destroy/{{$feedback->id}}" style="text-decoration: none;">&#x1F5D1</a>
		</div>

	@endif
<small> {{ $feedback->created_at->diffForHumans() }}</small>
<div class="stars-inline">
	@for( $i = 0; $i < $feedback->stars; $i++)
	{{-- unicode + &#x statt U+ --}}
	&#x2B50
	@endfor
</div>
<p>{{$feedback->body}}</p>
<hr>

