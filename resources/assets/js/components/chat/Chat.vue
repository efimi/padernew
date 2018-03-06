<template>
	<div class="chat">
		<chat-messages></chat-messages>
		<form action="#">
			<textarea 
			id="body"
			cols="30"
			rows="3"
			class="chat__form-input"
			v-model="body"
			@keydown="handleMessageInput"
			></textarea>
			<span class="chat__form-helptext">
				Drücke Enter um zu senden, oder Shift + Enter für eine neue Zeile!
			</span>
		</form>
	</div>
</template>

<script>
	import Bus from '../../bus'
	import moment from 'moment'
	export default {
		data(){
			return {
				body: null,
				bodyBackedUp: null
			}
		},
		methods:{
			handleMessageInput(e) {
				this.bodyBackedUp = this.body

				if (e.keyCode === 13 && !e.shiftKey) {
					e.preventDefault();
					this.send();
					this.body = null;

				}
			},
			buildTempMessage(){
				let tempId = Date.now();

				return {
					id: tempId,
					body: this.body, 
					created_at: moment().zone('+0100').utc().format('YYYY-MM-DD HH:mm:ss'),
					selfOwned: true,
					pinwallId: Laravel.user.matchedLocationId, 
					user: {
						name: Laravel.user.name,
					}
				}
			},
			send(){
				if(!this.body || this.body.trim === ''){
					return
				}

				let tempMessage = this.buildTempMessage();

				Bus.$emit('message.added', tempMessage)

				axios.post('/chat/messages', {
					body: this.body.trim(),
					locationId: Laravel.user.matchedLocationId
				}).catch(() => {
					this.body = this.bodyBackedUp
					Bus.$emit('message.removed', tempMessage)
				})
			}
		}
	}
</script>

<style lang="scss">
	$paderblue: #00A6FF;

	.chat{
		background-color: #fff;
		border: 1px solid $paderblue;
		border-radius: 25px;
		overflow: hidden;

		&__form{
			border-top: 1px solid $paderblue;
			padding: 10px;

			&-input{
				width: 100%;
				paading: 5px 10px;
				border: 1px solid $paderblue;
				outline: none;
			}

			&-helpertext{
				color: #aaa;
			}
		}
	}
	
</style>