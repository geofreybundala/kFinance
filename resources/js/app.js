import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';
import { VueSpinners } from '@saeris/vue-spinners';
import VueCountdown from '@xkeshi/vue-countdown';
import VueCountdownTimer from 'vuejs-countdown-timer'
import VueMoment from 'vue-moment';


Vue.component(VueCountdown.name, VueCountdown);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('vue-phone-number-input', VuePhoneNumberInput);



// const moment = require('moment')
// require('moment/locale/es')

// Vue.use(require('vue-moment'), {
//     moment
// })

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueSpinners);
Vue.use(VueSweetalert2);
Vue.use(VueCountdownTimer);
Vue.use(VueMoment);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('loan-component', require('./components/manageLoanComponent.vue'));
Vue.component('sms-component', require('./components/smsManagementComponent.vue'));
Vue.component('dashboard-component', require('./components/DashboardComponent.vue'));


// Vue.filter('two_digits', (value) => {
//     if (value < 0) {
//         return '00';
//     }
//     if (value.toString().length <= 1) {
//         return `0${value}`;
//     }
//     return value;
// });

const app = new Vue({
    el: '#app'
});
