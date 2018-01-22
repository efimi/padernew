<!DOCTYPE html>
<html>
<head>
    <title>PaderMeet</title>
    <link rel="stylesheet" href="https://unpkg.com/blaze">
    {{-- Only for locations --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
	<script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
	<div id="app">
		<div class="o-container o-container--small --center">
			@yield('content')       
	    </div>	
	</div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>