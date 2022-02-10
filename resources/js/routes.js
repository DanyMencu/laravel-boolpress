//Dependeces
import Vue from 'vue';
import VueRouter from 'vue-router';

//Components for route
import Home from './pages/Home';
import Books from './pages/Books';
import BookDetails from './pages/BookDetails';

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
            //Books
            path: '/books',
            name: 'books',
            component: Books,
        },
        {
            //Book Details
            path: '/books/:slug',
            name: 'book-details',
            component: BookDetails,
        },
    ],
});

//Export routes
export default router;