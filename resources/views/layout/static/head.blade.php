<title>PaderMeet</title>
<meta name="description" content="PaderMeet die Treffapp für Paderborn - Lerne neue Leute kennen!" />
<meta name="keywords" content="meetup treffen neue leute" />
<meta name="author" content="Reinhold Lehnhardt" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">



<!-- Sharing Site -->
<meta property="og:site_name" content="PaderMeet"/>
<meta property="og:title" content="PaderMeet - Die neue Treffapp für Paderborn!"/>
<meta property="og:description" content="Mit PaderMeet lernst du ganz leicht neue Leute kennen! Ein Button, ein Klick"/>
<meta property="og:image" content="{{url('/')}}/img/apple-touch-icon-180x180.png">
<meta property="og:url" content="http://www.padermeet.de/share">
<meta property="og:type" content="website"/>


<meta name="viewport" content="width=device-width">

<link rel="shortcut icon" href="{{url('/')}}//favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{url('/')}}/img/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="{{url('/')}}/img/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/img/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/img/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/img/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="{{url('/')}}/img/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="{{url('/')}}/img/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="{{url('/')}}/img/apple-touch-icon-152x152.png" />
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/img/apple-touch-icon-180x180.png" />

<link rel="stylesheet" href="{{url('/')}}/css/s.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<!--  Ajax Scripts-->
<script>
	window.Laravel = {!! json_encode([
		'csrfToken' => csrf_Token(),
		'user' => [
			'authenticated' => auth()->check(),
			'id' => auth()->check() ? auth()->user()->id : null,
			'name' => auth()->check() ? auth()->user()->name : null,
			'matchedLocationId' => auth()->check() ? auth()->user()->matchedLocationId() : null,
		], 
		'keys' => [
			'pusher' => config('broadcasting.connections.pusher.key')
		]
	]) !!};
</script>


<!--  OneSignal Scripts-->
{{-- <link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "2e680437-eebb-4b16-b97b-ee10e8fbcf1b",
      autoRegister: false,
      notifyButton: {
        enable: true,
      },
    });
  });
</script> --}}