<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout.static.head')
</head>
<body>
	<div id="preload-container" class="preload-container">
		<!-- initial header -->
		<header class="preload-header">
			<h1 class="preload-logo">
				<svg class="preload-inner" width="100%" height="100%" viewBox="0 0 300 160" preserveAspectRatio="xMidYMin meet" aria-labelledby="logo_title">
					<title id="logo_title">PaderMeet - die Neue Treffapp für die Stadt Paderborn</title>
					@yield('loading')
				</svg>
			</h1>
			<div class="preload-loader">
				<svg class="preload-inner" width="60px" height="60px" viewBox="0 0 80 80">
					<path class="preload-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
					<path id="preload-loader-circle" class="preload-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
				</svg>
			</div>
		</header>
		<div class="preload-main">
			<div id="app" class="flex loadin">
				
				@yield('main')

				<footer>
					<a href="#" class="shadow">Impressum</a> | <a href="#" class="shadow">Faq</a> | Copyright &copy; 2018 by PaderMeet
					<p>Made with ❤️</p>
				</footer>
		</div>
	</div><!-- /container -->
	<script>
		var app = new Vue({
			el: '#app',
			data: {
				showModal: false,
			},
		});
	</script>
	<script src="js/classie.js"></script>
	<script src="js/pathLoader.js"></script>
	<script src="js/main.js"></script>
</body>
</html>