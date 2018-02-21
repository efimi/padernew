@component('mail::message')
# Hallo {{$user->name}} !!!😀

PaderMeet wurde mit Facebook verbunden!

@component('mail::button', ['url' => 'www.padermeet.de/result'])
zurück zu PaderMeet
@endcomponent

Dein PaderMeet-Team!
@endcomponent