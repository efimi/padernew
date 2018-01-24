<template>
	<p v-text="texts[Math.floor(Math.random()*texts.length)]"></p>
</template>

<script>
	export default {
		data() {
			return {
				texts: ['Was geht bei dir heute?','Na schon was vor?','Klasse Tag, wa?'],
			}
		},
		mounted()
			{

    	}
    }	
		
</script>

<style>

</style>