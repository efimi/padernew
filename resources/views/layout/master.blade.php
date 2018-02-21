<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout.static.head')
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/normalize.css" />
	<link rel="stylesheet" href="{{url('/')}}/css/effect.css">
	<script src="{{url('/')}}/js/modernizr.custom.js"></script>
	<script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
</head>
<body>
	<div id="preload-container" class="preload-container">
		<!-- initial header -->
		<header class="preload-header">
			<h1 class="preload-logo ">
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

				<footer class="item">
					<a href="/impressum" class="shadow">Impressum</a> | <a href="/faq" class="shadow">FAQ</a> | Copyright &copy; 2018 by PaderMeet
					<p>Made with ❤️</p>
				</footer>
		</div>
	</div><!-- /container -->
	@yield('vue')
	<script src="{{url('/')}}/js/classie.js"></script>
	<script src="{{url('/')}}/js/pathLoader.js"></script>
	<script src="{{url('/')}}/js/main.js"></script>
</body>
</html>