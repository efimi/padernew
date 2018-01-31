<template>
	<transition name="modal">
            <div class="modal__mask"  @click="close">
                <div class="modal__container" @click.stop>
                    <div class="login-modal">
                        <h2>Lege Los!</h2>
                        <div class="logo">
                            <img src="img/logo-small.png"  style="transform: scale(0.5, 0.5);;" alt="">
                        </div>
                        <h3>Logge dich ein:</h3>
                        
                       <div class="button-group">
                            <button class="facebook-login">Mit Facebook</button>
                            <button class="email-toggle">mit Email</button>
                       </div>
                    </div>
                </div>
            </div>
        </transition>
</template>

<script>
export default {
	name:'LoginModal',
	methods(){
		close(){
			this.$emit('close');
		},
	},
}
	
</script>

<style>
.login-modal{
	display: flex;
	flex-direction: column;
	align-items: center;
	max-width: inherit;
}
.button-group{
	display: flex;
	flex-direction: column;  
}

.facebook-login{
	width: 300px;
	margin-top: 1em;
	border-radius: 100px;
	background-color: skyblue;
	padding: 1em 2em;
	font-size: 16px;	
}
.email-toggle{
	width: 300px;
	margin-top: 1em;
	border-radius: 100px;
	background-color: skyblue;
	padding: 1em 2em;
	font-size: 16px;
}
	
</style>