window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Vue = require('vue');

import VueRouter from 'vue-router';
import App from './views/App';
import VueObserveVisibility from 'vue-observe-visibility';
Vue.use(VueObserveVisibility);
Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import Contacts from './pages/Contacts';
import Posts from './pages/Posts';
import NotFound from './pages/NotFound';
import SinglePost from './pages/SinglePost';
import Categories from './pages/Categories';
import SingleCategories from './pages/SingleCategories';


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
            path: '/contacts',
            name: 'contacts',
            component: Contacts
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
        {
            path: '/categoria',
            name: 'categoria',
            component: Categories
        },
        {
            path: '/posts/:id',
            name: 'single-post',
            component: SinglePost
        },
        {
            path: '/categories/:id',
            name: 'single-categories',
            component: SingleCategories
        },


    ]
});
const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});

