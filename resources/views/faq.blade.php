@extends('layout.master')

@section('loading')
	@include('layout.components.svg.clockSVG')
@endsection

@section('main')
	<div class="intro">Frequent Asked Qustions</div>
	<div class="box card">
		<h3>Wie funktioniert PaderMeet?</h3>
      <p class="text-left">Klicke auf den Button und erfahre wo du heute um 20:00 Uhr hingehst</p>
		<h3 id="was-mitbringen">Was muss man für PaderMeet mitbringen?</h3>
		<p>Neben Spass und Abenteuerlust, kannst du auch deinen besten Freund oder deine beste Freundin 🙋 mitnehmen!</p>
      <h3>Was ist PaderMeet?</h3>
      <p class="text-left">PaderMeet ist eine Treffapp, welche Leute zusammen bringen soll, die Lust haben sich spontan in einem Café, Bar oder Restaurant zu treffen und sich so kennen zu lernen.</p>
      <h3>🕗 20:00 Uhr passt mir nicht, was kann ich tun?</h3>
      <p class="text-left">Wenn du nicht um 20:00 Uhr kannst, dann komm einfach um 20:15, wenn es sonst nicht geht, dann komm einfach später. Sonst beleibt dir einfach noch die <a href="/pinwall"> Pinwand</a> übrig - da kannst du ganz einfach den anderen mitteilen, wann du kommst.

      <h3>Was passiert wenn ich nicht hin gehe?</h3>
      <p class="text-left">Dann wirst du wohl zuhause sitzen und dir könnte ein cooler Abend vergehen 😉. Ansonsten passiert natürlich nichts.😊</p>
      <h3>📍Mir gefällt die Location nicht, was kann ich tun?</h3>
      <p class="text-left">Im Prinzip bist du nicht ander Location gebunden. Sprich: Ihr könnt euch zunächst dort treffen und dann später spontan weiter ziehen. Oder du gehst auf dein <a href="/dashboard">Dashboard</a> und <i>unmatcht</i> dich von der Location.</p>
      <h3>🕗Warum kann man keine Uhrzeit einstellen?</h3>
      <p class="text-left">Die Philosophie von PaderMeet ist: So einfach wie möglich. Deswegen haben wir auf dieses Feauture verzichtet. Feste Uhrzeit und nur ein Button mehr nicht.</p>
      <h3>🕗Kann ich für einen Bestimmten Tag schon "reservieren"?</h3>
      <p class="text-left">Reservieren ist nicht möglich, aber auch nicht nötig 😉 Du Klickst einfach am morgen, mittag oder kurz vor 20:00 Uhr auf den Button</p>
      <h3>🕗 Was passiert wenn man nach 20:00 Uhr auf den Button klickt?😱</h3>
      <p>Dann gibt es wohl eine Explosion und der Server crasht zusammen💥!!!!</p>
      <p>Nein, kleiner Scherz am Rande. Du wirst weiterhin gemacht, allerdings kannst du keine neue Location eröffnen.</p>
      <h3>🕵Woran erkenne ich die anderen?</h3>
      <p>Dazu gehört schon ein wenig Menschen Kenntniss - entweder, werdet ihr euch auf der <a href="/pinwall">Pinnwand</a> absprechen oder ihr geht einfach hin📍 und bemerkt den ein oder anderen, der einfach nur davor steht und auf etwas wartet.😗</p>
      <h3>🙋 Was soll ich anziehen?</h3>
      <p>Das was bequem ist und womit du dich wohlfühlst.</p>
      <h1 id="english">FAQ</h1>
      <h3>How to use PaderMeet?</h3>
	</div>
@endsection