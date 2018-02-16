@extends('master')

@section('content')
        <h1 class="p2 txt--center"> Willkommen bei <span style="font-family: 'paderchunky'; font-size: 1em; color: #a6c0fe">Pader</span><br><span style="font-family: 'paderchunky'; font-size: 1.5em; color: #a6c0fe">MEet</span></h1>
        <div class="brdr--mid-gray p2 txt--center">
        	<h2>Die neue App für die Stadt 
        		Paderborn!</h2>
        </div>
        <h3 class="txt--center">Drücke auf den Button und finde heraus wo es für dich hingeht!</h2>
		
		<div class="txt--center">
			
		<form method="POST" action="{{route('location.random')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="" style="">
				<input  type="checkbox" name="comeTogether" value="0" id="comeTogether" style="width: 50px; height: 50px; color: #a6c0fe">
				<label class="p1" for="comeTogehter" style="font-family: 'paderchunky'; font-size: 2em; color: #a6c0fe;">Wir kommen zu zweit</label>				
			</div>
			<input id="start-button" type="submit" value="Los Geht's!!!" class="start-button animated swing" style="font-family: 'paderchunky';font-size: 2em; letter-spacing: 0.9em;">
		</form>
		</div>
		<script>
			
			// var moveStartButton = anime ({
			// 	targets: '#start-button',
			// 	rotate: {
			// 	    value: [0, 0],
			// 	    duration: 500,
			// 	    easing: 'easeInCubic',
			// 	    delay: 2000,
			// 	  },
			//     elasticity: 600,
			// 	// loop: true, 
			// 	complete: function(){
			// 		anime ({
			// 			targets: '#start-button',
			// 			rotate: {
			// 				    value: [10, -10],
			// 				    duration: 500,
			// 				    easing: 'easeInCubic',
			// 				    delay: 2000,
			// 			  },
			// 			elasticity: 600,

			// 		});
			// 	},
				

			// });
			// document.querySelector ('#start-button').onmouseover = moveStartButton.restart;
		</script>
		
@endsection