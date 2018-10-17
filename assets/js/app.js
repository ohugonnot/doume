'use strict';

/**  Les imports des libs **/
// bootstrap
import 'bootstrap';
import $ from 'jquery';
global.$ = global.jQuery = $;
import Popper from 'popper.js';
global.Popper = Popper;

// vuejs
import Vue from 'vue';
import Vuex from 'vuex';
import Vuelidate from 'vuelidate';
import 'es6-promise/auto';
import Example from './components/Example';

// others js lib
import swal from 'sweetalert2';
import Routing from './Routing';
import 'select2';
import 'select2/dist/js/i18n/fr';
import moment from 'moment';
import 'moment/locale/fr';
global.moment = moment;

// le css
import '../css/app.scss';

Vue.use(Vuex);
Vue.use(Vuelidate);

new Vue({
    delimiters: ['[[', ']]'],
    el: '#app',
    components: {Example}
});