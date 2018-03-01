<!-- The Modal -->
	<div class="mask" v-show="flase" @click="toggleBasicModal()"></div>
	<div id="explainPaderMeet" class="modal" v-show="false">
	  <!-- Modal content -->
		<div class="modal-content shadow">
	    <div class="modal-header">
	      <span class="close" @click="toggleBasicModal()">&times;</span>
	    </div>
	    <div class="modal-body">
			<div class="explain">
				<h1>🎓😁Der PaderMeet Leute Treffen Guide </h1>
				<p class="box">
					✅ Bei Padermeet ist alles ganz simpel	<br> <br>
					Es gibt genau einen ☝️ Button, und der ist nur für <b>dich</b> <br> <br>
				</p>
				<p>
					Klicke drauf und finde heraus auf welche Location📍 du <i>gematcht</i> wurdes <br> <br>
					Bis zu 4 🙋 weitere Personen werden auf die selbe Location gematcht <br> <br>
				</p>
				<p>
					⚠️ Es gibt nur eine Regel: das Treffen findet um 20:00 🕗 Uhr statt. <br>
					<small>Das soll das Leben vereinfachern ⛱</small> <br>
				</p>
				<p>
					Viel Spass bei deinem Treffen, wünscht dir <br> <br>
					Dein PaderMeet-Team. <br> <br>
				</p>
				<h1>🎊😄🎉</h1> <br> <br>
				<span> <a @click="toggleLoginModal()">Logge dich ein</a> um fortzufahren!  </span>
			</div>
	    </div>
	</div>
	 