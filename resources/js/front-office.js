//Import dependencies
import Vue from 'vue';
import App from './views/App.vue';

//Init Vue instance
const root = new Vue({
    el: '#root',
    render: h => h(App),
});