//Dependeces
import Vue from 'vue';
import VueRouter from 'vue-router';

//Components for route
import Home from './pages/Home';
import Books from './pages/Books';
import BookDetails from './pages/BookDetails';
import LanguagesList from './pages/LanguagesList';
import Contact from './pages/Contact';
import NotFound from './pages/NotFound';

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
        {
            //Languages list
            path: '/languages',
            name: 'languages-list',
            component: LanguagesList,
        },
        {
            //Contatc us
            path: '/contact',
            name: 'contact',
            component: Contact,
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFound,
        },
    ],
});

//Export routes
export default router;