
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat', require('./components/chat/Chat.vue'));
Vue.component('chat-messages', require('./components/chat/Messages.vue'));
Vue.component('chat-message', require('./components/chat/Message.vue'));
Vue.component('chat-users', require('./components/chat/Users.vue'));
Vue.component('mod', require('./components/Modal.vue'));
Vue.component('geo', require('./components/Geolocation.vue'));
Vue.component('logo', require('./components/Logo.vue'));
Vue.component('avatar-upload', require('./components/AvatarUpload.vue'));

const app = new Vue({
    el: '#app',
    // for loginin vue
    
 });
