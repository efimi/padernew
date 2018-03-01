<template>
	<div>
		<p>Click the button to get your coordinates.</p>
		<button @click="getLocation">Try It</button>
		<p id="demo" v-text="text"></p>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				text: 'Hier wird deine Latitude und Longitude angezeigt.',
				lat: '',
				lng: ''
			}
		},
		methods: {
		  	getLocation() {
			    if (window.navigator.geolocation) {
			        window.navigator.geolocation.getCurrentPosition(this.showPosition);
			    } else { 
			        text = "Geolocation is not supported by this browser.";
			    }
			},
			showPosition(position) {
				this.lat = position.coords.latitude,
				this.lng = position.coords.longitude,
				this.text = "deine Location befindet sich in: Latitude:" + this.lat + " und Longitude: " + this.lng;
			} 

		}
	}
</script>

<style lang="scss">
</style>