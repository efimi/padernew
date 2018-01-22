<template>
	<p class="invitation">{{choosenText}}</p>
	
</template>

<script>
	export default {
		data() {
			return {
				randomTexts: ["Heute noch nichts vor? Clicke und schau was rauskommt!", "Na, was machst du heute? Clicke auf den Button und los geht's!", "Kein Bock alleine rumzuhocken? Buttonclick und ab geht's!"],
				choosenText: ''
			}
		},
		mounted()
			{
    		 this.choosenText = this.randomTexts[Math.floor(Math.random()*this.randomTexts.length)];
    	}
    }	
		
</script>

<style>
	.invitation{
		text-align: center;
		margin:1em 0 ;
	}
</style>