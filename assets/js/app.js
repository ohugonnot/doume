'use strict';

import $ from 'jquery';
global.$ = $;
import Popper from 'popper.js';
global.Popper = Popper;

import Vue from 'vue';
import Example from './components/Example'

import swal from 'sweetalert2';
import Routing from './Routing';

import 'bootstrap';
import '../css/app.scss';

new Vue({
    delimiters: ['[[', ']]'],
    el: '#app',
    components: {Example}
});