//Import dependencies
import Vue from 'vue';
import App from './views/App.vue';

//App router
import router from './routes';

//Init Vue instance
const root = new Vue({
    el: '#root',
    router,
    render: h => h(App),
});