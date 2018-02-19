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