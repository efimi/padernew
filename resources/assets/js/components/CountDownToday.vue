<template>
	<div class="countdown">
		<h2>Noch </h2>
		<Countdown :deadline="deadline"></Countdown>
		<h2> bis es los geht!</h2>
	</div>
</template>

<script>
	import Countdown from 'vuejs-countdown'
	import moment from 'moment'
	export default {
		components: { Countdown},
		data(){
			return {
				deadline: moment().startOf('day').add(20,'hours'),
			}
		}
	}
</script>

<style>
.countdown{
	display: inline-flex;
	align-items: center;
}
	
</style>