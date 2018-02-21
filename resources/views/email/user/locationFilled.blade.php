@component('mail::message')
# Tolle Neuigkeiten {{$user->name}}!!!😀

🎉 Die Location {{$location->name}} wurde heute komplett auf gefüllt!!

Gehe auf die Pinnwand um zu sehen wer alles heute dabei ist!
@component('mail::button', ['url' => 'http://www.padermeet.de/pinwall'])
Pinnwand 📌
@endcomponent
📋
Dein PaderMeet-Team!
@endcomponent