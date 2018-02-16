<template>
	<div>
		<h1>{{location}}</h1>
		
	</div>

</template>

<script>
	import axios from 'axios'

	export default {
		props:['together'],
		data() {
			return {
				location: {}
			}
		},
		mounted()
			{
				this.getLocation();
    	},
    	methods:{
    			getLocation() {
    				console.log(axios.get('/api/getlocation'));
    				axios.get('/api/getlocation')
						.then(response => this.location = response.data);
    			
    		}
    	},
    }	
		
</script>

<style>

</style>