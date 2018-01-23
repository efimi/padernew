<template>
	
</template>

<script>
	export default {
		data() {
			return {
				location: {}
			}
		},
		mounted()
			{
				axios.get('/api/getlocation')
					.then((({data})) => this.location = data);

    	}
    }	
		
</script>

<style>

</style>