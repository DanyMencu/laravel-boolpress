//Dependeces
import Vue from 'vue';
import VueRouter from 'vue-router';

//Components for route
import Home from './pages/Home';
import Books from './pages/Books';

//Active router in Vue
Vue.use(VueRouter);

//Definition of routes
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            //Homepage
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            //books
            path: '/books',
            name: 'books',
            component: Books,
        },
    ],
});

//Export routes
export default router;