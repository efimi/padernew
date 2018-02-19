<div class="feedback-entry card shadow">
	<div class="feedback-header">
		@if(Auth::user()->id == $feedback->user_id)
			<div>
				<a href="/feedback/edit/{{$feedback->id}}" style="text-decoration: none;">bearbeiten</a>
				<a href="/feedback/destroy/{{$feedback->id}}" style="text-decoration: none;">&#x1F5D1</a>
			</div>
		@endif
	</div>
	<div class="feedback-title">
		<h2>
			{{$feedback->title}}
		</h2>
		<small class=""> {{ $feedback->created_at->diffForHumans() }}</small>
	</div>
	<div class="stars-inline">
		@for( $i = 0; $i < $feedback->stars; $i++)
		{{-- unicode + &#x statt U+ --}}
		&#x2B50
		@endfor
	</div>
	<p>{{$feedback->body}}</p>
</div>


