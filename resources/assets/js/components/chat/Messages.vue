<template>
	<div class="chat__messages" ref="messages">
		<chat-message v-for="message in messages" :key="message.id" :message="message"></chat-message>
	</div>
</template>

<script>
	import Bus from '../../bus'
	export default{
		data(){
			return {
				messages: []
			}
		},
		methods: {
			removeMessage(id) {
				this.messages = this.messages.filter((message) =>{
					return message.id !== id;
				})
			}
		},
		mounted(){
			axios.get('/chat/messages').then((response) => {
				this.messages = response.data
			});

			Bus.$on('message.added', (message) => {
				if(message.pinwallId === Laravel.user.matchedLocationId){
					this.messages.unshift(message);
				}

				if(message.selfOwned){
					// to the ref="messages"
					this.$refs.messages.scrollTop = 0 
				}
			})
			.$on('message.removed', (message) => {
				this.removeMessage(message.id)
			});
		}
	}
</script>

<style lang="scss">
	.chat{
		&__messages{
				height: 400px;
				max-height: 400px;
				overflow-y: scroll;
			}
	}
</style>