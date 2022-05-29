window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Vue = require('vue');

import VueRouter from 'vue-router';
import App from './views/App';

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import Contact from './pages/Contact';
import Posts from './pages/Posts';
import NotFound from './pages/NotFound';


const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/posts',
            name: 'posts',
            component: Posts
        },
        {
            path: '/not-found',
            name: 'not-found',
            component: NotFound
        },

    ]
});
const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});

