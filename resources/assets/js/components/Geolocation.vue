<template>
	<div>
		<p>Click the button to get your coordinates.</p>
		<button @click="getLocation">Try It</button>
		<p id="demo" v-text="" >}</p>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				text: ''
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