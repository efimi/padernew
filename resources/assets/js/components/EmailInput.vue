<template>
	<div>
		<button @click="openForm = true"> Email hinterlgen</button>
		<div v-if="openForm">
			<form @submit.prevent="submitForm" :action="enpoint" method="post">

				<input type="email" name="email">
				<button type="submit">Email hitnerlassen</button>
			</form>
		</div>

	</div>
</template>

<script>
	export default(){
	props: [

	],
    data() {
            return {
                csrf: "",
            } 
        },
    methods: {
        logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit()
        },
        submitForm() {

        }
    },
    mounted() {
        this.csrf = window.Laravel.csrfToken        
    }
}


</script>