<!DOCTYPE html>
<html>
<head>
    <title>PaderMeet</title>
    {{-- Only for locations --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/buttonclick.css') }}">

</head>
<body>
	<script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
	<div id="app">
		<div class="">
			@yield('content')       
	    </div>	
	</div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>