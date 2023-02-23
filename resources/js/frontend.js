import axios from 'axios';
window.axios = axios;

import {createApp} from 'vue'
import Menu from './components/Menu.vue';

createApp(Menu).mount('.vue-menu');

const ContactForm = {
    init: function() {
        this.form = document.getElementById('form-contact');
        this.sendButton = this.form.querySelector('input[type="submit"]');

        this.sendButton.setAttribute('value', this.sendButton.dataset.value);

        this.form.addEventListener('submit', event => {
            event.preventDefault();

            ContactForm.setSendingStatus(true);
            ContactForm.hideErrors();
            
            axios.post('/contact', {
                name: this.form.querySelector('[name="name"]').value,
                email: this.form.querySelector('[name="email"]').value,
                phone: this.form.querySelector('[name="phone"]').value,
                message: this.form.querySelector('[name="message"]').value,
            }, {
                headers: {
                    csrf: this.form.querySelector('input[name="_token"]').value
                }
            })
            .then(response => {
                ContactForm.setSendingStatus(false);
                if(response.data.success)
                {
                    ContactForm.hideErrors();
                    ContactForm.showSuccess();
                    ContactForm.cleanForm();
                }
                else
                {
                    ContactForm.showErrors(response.data.errors);
                    ContactForm.hideSuccess();
                }
            })
            .catch(error => {
                ContactForm.setSendingStatus(false);
                alert('Error: ' + error);
            });
        });
    },
    showErrors: function(errors) {
        this.form.querySelector('.alert-danger').classList.remove('hidden');

        for(let i in errors)
        {
            let input = this.form.querySelector('[name="' + i + '"]');
            let span = document.createElement('SPAN');
            span.innerHTML = errors[i];
            span.classList.add('error-message');
            input.parentNode.insertBefore(span, input.nextSibling);
            input.classList.add('error');
        }
    },
    hideErrors: function() {
        this.form.querySelector('.alert-danger').classList.add('hidden');
        this.form.querySelectorAll('input.error').forEach(element => {
            element.classList.remove('error');
        });
        this.form.querySelectorAll('span.error-message').forEach(element => {
            element.remove();
        });
    },
    showSuccess: function() {
        this.form.querySelector('.alert-success').classList.remove('hidden');
    },
    hideSuccess: function() {
        this.form.querySelector('.alert-success').classList.add('hidden');
    },
    cleanForm: function() {
        this.form.querySelectorAll('.form-control').forEach(element => {
            element.value = '';
        });
    },
    setSendingStatus(sending) {
        if(sending)
        {
            this.sendButton.value = this.sendButton.dataset.sendingValue;
            this.sendButton.setAttribute('disabled', 'disabled');
        }
        else
        {
            this.sendButton.value = this.sendButton.dataset.value;
            this.sendButton.removeAttribute('disabled');
        }
    },
}

const _initMap = function(lat, lng)
{
    // Creating map options
    var mapOptions = {
        center: [lat, lng],
        zoom: 14,
        scrollWheelZoom: false,
    }

    // Creating a map object
    var map = new L.map('my-map', mapOptions);

    // Creating a Layer object
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    // Adding layer to the map
    map.addLayer(layer);

    // Creating a marker
    var marker = new L.Marker([lat, lng]);

    // Adding marker to the map
    marker.addTo(map);
}

async function _fetchAddressItemsJSON() {
    const address = document.getElementById('my-map').dataset.address;
    const url = 'https://nominatim.openstreetmap.org/search?q=' + address + '&format=json&polygon=1&addressdetails=1';
    const response = await fetch(url);
    const items = await response.json();
    return items;
}

window.addEventListener('DOMContentLoaded', (event) => {
    // Load map
    _fetchAddressItemsJSON().then(items => {
        try
        {
            if(items.length)
                _initMap(items[0].lat, items[0].lon)
        }
        catch(err)
        {
            console.error('Error al obtener coordenadas: ' + err);
        }
    });

    // Contact form
    ContactForm.init();
});