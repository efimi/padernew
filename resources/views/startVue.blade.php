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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/de.js"></script>
    <div id="app">
        <h1> Willkommen bei PaderMeet</h1>
        <h2> Drücke auf den Button und finde heraus wo es für dich hingeht!</h2>
        <invite-text></invite-text>
        <count-down-today time="16" v-show=></count-down-today>
        <location-box></location-box>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>