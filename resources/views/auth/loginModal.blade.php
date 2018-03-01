<!-- The Login Modal -->
	<div class="mask" v-show="false" @click="toggleLoginModal()"></div>
	<div id="loginModal" class="modal" v-show="false">
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