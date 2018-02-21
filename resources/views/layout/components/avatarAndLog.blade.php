@auth
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
@endauth
@guest
	<div class="split-row">
		<div class="left">
			<img class="avatar shadow" src="img/avatar.png" alt="">
			<span>Name</span>
		</div>
		<div class="right">
			<a  @click="toggleLoginModal()" class="btn-login shadow">Login</a>
		</div>
	</div>
	<!-- The Login Modal -->
	<div class="mask" v-show="showLogin" @click="toggleLoginModal()"></div>
	<div id="loginModal" class="modal" v-show="showLogin">
	  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-header">
	      <div class="close" @click="toggleLoginModal()">&times;</div>
	    </div>
	    <div class="modal-body">
		     <h1>Logge dich ein und lege los!</h1>
		     <h1>🎉</h1>
		 	@include('layout.components.loginTemplate')	
	    </div>
	    <div class="modal-footer">
			
	    </div>
	  </div>
	</div>

	<script>
		var app = new Vue({
			el: '#app',
			data: {
				showLogin: false,
			},
			methods:{
				toggleLoginModal(){
					this.showLogin = !this.showLogin
				}
			}
		});
	</script>

@endguest