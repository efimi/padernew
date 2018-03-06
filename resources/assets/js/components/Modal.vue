<template>
	<transition name="pop-out">
		<modal name="mymodal">
			<div class="mymodal">
				<div class="mymodal__closing"></div>
				<div class="mymodal__header">
					<slot name="header"></slot>
				</div>
				<div class="mymodal__body">
					<slot name="body">Default Body</slot>
				</div>
				<div class="mymdal__footer">
					<slot name="footer">Defualt footer</slot>
				</div>
			</div>
		</modal>
		<button @click="show">Click hier</button>
	</transition>
</template>

<script>

	export default {
		mounted(){
			this.show()
		},
		methods: {
		  show () {
		  },
		  hide () {
		  }
		}
	}
</script>

<style lang="scss">
$background_color: #404142;
$github_color: #DBA226;
$facebook_color: #3880FF;

.v-overlay{
	
}
.mymodal{
	display: flex;
	flex-direction:column;
	justify-content: center;
	align-items: center;
	height: 100%;
}


.pop-out-enter-active,
.pop-out-leave-active {
  transition: all 0.5s;
}
.pop-out-enter,
.pop-out-leave-active {
  opacity: 0;
  transform: translateY(24px);
}
</style>