<!DOCTYPE html>
<html>
<head>
    <title>PaderMeet</title>
    <meta name="description" content="PaderMeet die Treffapp für Paderborn - Lerne neue Leute kennen!" />
		<meta name="keywords" content="meetup treffen neue leute" />
		<meta name="author" content="Reinhold Lehnhardt" />

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="/img/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="/img/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/img/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="/img/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/img/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="/img/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="/img/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="/img/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon-180x180.png" />
    {{-- Only for locations --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> --}}
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js"></script> --}}
	<link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
	<script src="/js/anijs-min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/buttonclick.css') }}">
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/furtive/2.3.0/furtive.css"> --}}
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	{{-- Preloading Effekt --}}
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/effect1.css" />
	<script src="js/modernizr.custom.js"></script>

</head>
<body>
	<div id="app">
		<div class="">
			<section class="">
				@include('nav')
				@yield('content')   
			</section>   
	    </div>	
	</div>

<!-- vue and stuff -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>