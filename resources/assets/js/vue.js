import Vue from 'vue';
import axios from 'axios';

// Vue.use(VueCarousel);

new Vue({
    el: '#app',
    data:{
    	data: [],
    	buttonText: 'Finde deine Location!',
    	checked: true,
    	confirmed: false,
    	confirmationText: ''
    },
    methods:{
    	getlocation(){
    		this.data = []
    		axios.get('/api/getlocation/' + (this.checked? 2 : 1)).then(response => this.data = response.data)
    	},
    	confirmLocation(){
    		axios.get('/api/confirmThatICome/' + (this.data.id)).then(resonse =>this.confirmationText)
    	}
    }
});