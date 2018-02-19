@if( $location->usedplaces() > 1)
@else
	<div class="space item"></div>
	<div class="shadow card-round item">
		<div>
			<span>
			Hey kleiner Tipp 😉 - 
			</span>
		</div>
		<div class="">
			<span>
				Kein Bock 🐏 auf diese Location?🤔 
			</span>
		</div>
		<div>
			<span>
				Du bist der Erste 😄 - Jetzt sind noch alle Karten♣️♥️ offen
			</span>
		</div>

		{{-- <div class="item"> --}}
			<small> <a href="/result" class="item"> refreshe die Seite einfach nochmal</a></small>
		{{-- </div> --}}
	</div>
@endif