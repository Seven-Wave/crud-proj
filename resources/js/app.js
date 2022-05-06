require('./bootstrap');

window.Vue = require('vue').default;

import Swal from 'sweetalert2'

global.Swal = Swal;

Vue.component('user-item-component', require('./components/UserItemComponent.vue').default);
Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('user-form', require('./views/UserFormComponent').default);
Vue.component('user-payments', require('./components/UserPaymentsComponent').default);


const app = new Vue({
    el: '#app',
});
