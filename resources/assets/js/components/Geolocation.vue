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
				text: 'Hier wird deine Latitude und Longitude angezeigt.'
			}
		},
		methods: {
		  	getLocation() {
			    if (navigator.geolocation) {
			        navigator.geolocation.getCurrentPosition(this.showPosition);
			    } else { 
			        text = "Geolocation is not supported by this browser.";
			    }
			},
			showPosition(position) {
			this.text = "Latitude: " + position.coords.latitude + 
			" | Longitude: " + position.coords.longitude;
			} 

		}
	}
</script>

<style lang="scss">
</style>