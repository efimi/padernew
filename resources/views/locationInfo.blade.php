
<h2 class="padertext p2 txt--center"> {{ $location->name }}</h1>
	<div class="txt--center">
		@include('map', $location)	
	</div>
	
	<div id="address--info" class="txt--center p2">
		<table>
			<tbody>
				<tr>
					<td class="txt--right">Name</td>
					<td></td>
					<td class="txt--left">{{ $location->name}}</td>
				</tr>
				<tr>
					<td class="txt--right">Adresse</td>
					<td></td>
					<td class="txt--left">{{$location->address}}</td>
				</tr>
				<tr>
					<td class="txt--right">Telephonnummer</td>
					<td></td>
					<td class="txt--left"><a href="tel:{{$location->phone or '' }}">{{$location->phone or '' }}</a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<small>Slogan:</small>
	<br>
	<h2>Cooler als im {{$location->name }} kann es kaum sein!</h2>
		@if( $location->usedplaces() > 1)
			<h2>Du bist nicht alleine!!</h2>
				Derzeit {{ $location->usedplaces() == 2 ? 'kommt' : 'kommen'}} 
				noch {{$location->usedplaces()}} 
				{{ $location->usedplaces() == 2 ? 'Person' : 'Personen'}}
		@else
			
		@endif