import Vue from 'vue';
import axios from 'axios';
import VueCarousel from 'vue-carousel';
import ToggleButton from 'vue-js-toggle-button'
import ResultModal from './components/ResultModal.vue';

Vue.use(ToggleButton, VueCarousel);
new Vue({
    el: '#app',
    components:{
    	'modal' : ResultModal,
    },
    data:{
    	user: [],
    	active: false,
    	checked: false,
    	confirmed: false,
    	confirmationText: ''
    },
    mounted(){
        this.getUser()
    },
    methods:{
    	open(){
    		this.active = true
    	},
    	close(){
    		this.active = false
    	}
    },
});