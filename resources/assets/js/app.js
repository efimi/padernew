import Vue from 'vue';
import Moment from 'moment';
import InviteText from './components/InviteText.vue';
import CountDownToday from './components/CountDownToday.vue';
import LocationBox from './components/LocationBox.vue';

new Vue({
	el:'#app',
	components: {InviteText, CountDownToday, LocationBox},
});