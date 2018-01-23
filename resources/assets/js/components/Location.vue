<template>
	<h1>LocationName</h1>
	<map :lng="lng" :lat="lat" :name="LocationName"></map>
</template>

<script>
	import Map from 'Map.vue'

	export default {
		components: {Map},
		data() {
			return {

			}
		},
		mounted()
			{
			
    	},
    	methods(){
    		return {
    			getLocation: {
    				axios.get('/api/getlocation')
						.then((({data})) => this.location = data);
    			}
    		}
    	},
    }	
		
</script>

<style>

</style>