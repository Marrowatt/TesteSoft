require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('createmodal', require('./components/CreateModal.vue').default);;
Vue.component('seemodal', require('./components/SeeModal.vue').default);;
Vue.component('editmodal', require('./components/EditModal.vue').default);;
Vue.component('deletemodal', require('./components/DeleteModal.vue').default);;

import thecomponent from './components/Index.vue';

const routes = [
    { path: '/', component: thecomponent}
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    el: '#app',
    router: router,
});
