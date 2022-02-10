//Dependeces
import Vue from 'vue';
import VueRouter from 'vue-router';

//Components for route
import Home from './pages/Home';
import About from './pages/About';

//Active router in Vue
Vue.use(VueRouter);

//Definition of routes
const router = new VueRouter({
    mode: 'history',
    /* linkExactActiveClass: 'active', */
    routes: [
        {
            //Homepage
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            //About
            path: '/about',
            name: 'about',
            component: About,
        },
    ],
});

//Export routes
export default router;