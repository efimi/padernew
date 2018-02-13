<div class="navigation">
	@guest
	<a href="" @click="showModal">Login</a>
	@else
	<a href="{{ Auth::logout() }}">Logout</a>
	@endguest
</div>