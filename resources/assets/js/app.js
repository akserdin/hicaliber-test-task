require('./bootstrap');

window.Vue = require('vue');

const availableFilters = [
    {display: 'Bedrooms', name: 'bedrooms', min: 1, max: 5, value: null},
    {display: 'Bathrooms', name: 'bathrooms', min: 1, max: 3, value: null},
    {display: 'Storeys', name: 'storeys', min: 1, max: 2, value: null},
    {display: 'Garages', name: 'garages', min: 1, max: 2, value: null},
    {display: 'Price, min', name: 'price_min', min: 263604, max: 521951, value: null},
    {display: 'Price, max', name: 'price_max', min: 263604, max: 521951, value: null}
];

Vue.component('item', require('./components/Item'));

import Vue2Filters from 'vue2-filters';

Vue.use(Vue2Filters);

new Vue({
    el: '#app',

    data: {
        loading: false,
        results: [],

        search: '',
        availableFilters: []
    },

    mounted() {
        this.availableFilters = availableFilters;
    },

    methods: {
        showMessage(text) {
            alert(text);
        },

        getAppliedFilters() {
            let vm = this;
            let appliedFilters = {};

            vm.availableFilters.forEach(function(f) {
                if (f.value !== null) {
                    appliedFilters[f.name] = f.value;
                }
            });

            if (vm.search.length > 1) {
                appliedFilters.name = vm.search;
            }

            return appliedFilters;
        },

        request() {
            let vm = this;

            vm.loading = true;

            axios.get('/properties', {params: vm.getAppliedFilters()})
                .then(vm.handleResponse)
                .catch(function(err) {
                    console.log(err);
                });
        },

        handleResponse(res) {
            let vm = this;

            vm.results = res.data;

            if (vm.results.length === 0) {
                vm.showMessage('No properties found!');
            }

            vm.loading = false;
        }
    }
});
