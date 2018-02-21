@component('mail::message')
# Hallo{{$user->name}}!!!😀

Du wurdest auf {{$location->name}} gematcht!!

Gehe auf die Pinnwand um zu sehen wer alles  heute dabei ist!
@component('mail::button', ['url' => 'http://www.padermeet.de/pinwall'])
Pinnwand
@endcomponent

Dein PaderMeet-Team!
@endcomponent