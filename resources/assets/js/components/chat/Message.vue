<template>
	<div class="chat__message" :class="{'chat__message--own': message.selfOwned}">
		<div class="chat__message-user">
			<img  class="chat__message-user-avatar" src="{{ message.user.avatar }}" alt="">
		</div>
		<span class="chat__message-timestamp">{{ message.created_at }}</span>
		<p class="chat__message-body">{{ message.body }}</p>
	</div>
</template>

<script>
	export default {
		props: ['message']
	}
</script>

<style lang="scss">
	.chat{
		&__message{
			padding: 15px;
			border-bottom: 1px solid #eee;

			&--own{
				background-color: #f0f0f0;
			}

			&-user{
				font-weight: 800;
				&-avatar{
					border-radius: 50%;
					margin: 0 5px;
				}
			}

			&-timestamp{
				color: #aaa;
			}

			&-body{
				margin-bottom: 0;
				white-space: pre-wrap; 
			}
		}
	}
</style>