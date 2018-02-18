@extends('layout.masterNoLoad')

@section('main')
	<div class="logo box">
			<h1>Willkommen bei</h2>
		<a href="#"><img src="img/logo.png" alt=""></a>
	</div>
	<div class="logo box">
		<span>- der neunen Treffapp für Paderborn -</span>
	</div>
	<a @click="toggleBasicModal()" class="btn-login intro shadow box">Was ist PaderMeet?</a>

	<!-- The Modal -->
	<div class="mask" v-show="showModal" @click="toggleBasicModal()"></div>
	<div id="explainPaderMeet" class="modal" v-show="showModal">
	  <!-- Modal content -->
		<div class="modal-content shadow">
	    <div class="modal-header">
	      <span class="close" @click="toggleBasicModal()">&times;</span>
	    </div>
	    <div class="modal-body">
			<div class="explain">
				<p class="box">
					Bei Padermeet ist alles ganz simpel	 <br> <br>
					Es gibt genau einen Button, und der ist nur für dich <br> <br>
				</p>
				<p>
					Klicke drauf und finde heraus auf welche Location du <i>gematch</i> wurdes <br> <br>
					Bis zu 5 weitere Personen werden auf die selbe Location gematch <br> <br>
				</p>
				Es gibt nur eine Regel: das Treffen findet um 20:00 Uhr statt. <br> <br>
				Viel Spass bei deinem Treffen, wünscht dir <br> <br>
				Dein PaderMeet-Team. <br> <br>
				🎊 😃 🎉 <br> <br>
			</div>
	    </div>
	    </div>
	 
	</div>

	<div class="button-area">
		<span> Logge dich ein um fortzufahren! </span>
	</div>
	<div class="space-sm"></div>
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
			<small>Ich möchte mich per <a href="/register">Email registrieren</a>.</small>
	    </div>
	  </div>
	</div>
@endsection

@section('vue')
<script>
		var app = new Vue({
			el: '#app',
			data: {
				showModal: false,
				showLogin: false,
			},
			methods:{
				toggleBasicModal(){
					this.showModal = !this.showModal
				},
				toggleLoginModal(){
					this.showLogin = !this.showLogin
				}
			}
		});
</script>

@endsection		
