import './bootstrap';

import * as bootstrap from 'bootstrap'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import.meta.glob([
    '../images/**',
    //'../fonts/**',
]);

try {
    window.bootstrap = bootstrap;
} catch (e) {}

import Choices from 'choices.js';
import '/node_modules/choices.js/public/assets/styles/choices.css'
window.Choices = Choices;
