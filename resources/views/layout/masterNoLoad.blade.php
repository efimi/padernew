<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout.static.head')
</head>
<body>
		<div id="app" class="flex loadin">
				@yield('main')

				<footer>
					<a href="#" class="shadow">Impressum</a> | <a href="#" class="shadow">FAQ</a> | Copyright &copy; 2018 by PaderMeet
					<p>Made with ❤️</p>
				</footer>
		</div>
	<!-- vue and stuff -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>