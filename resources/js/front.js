// const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');
window.Axios = require('axios');

import VueRouter from 'vue-router';
import App from './views/App.vue';
import Home from './views/pages/PageHome.vue';
import About from './views/pages/About.vue';
import Blog from './views/pages/Blog.vue';
import BlogPost from './views/pages/BlogPost.vue';
import Page404 from './views/pages/Page404.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/blog/:slug',
            name: 'blog-post',
            component: BlogPost,
            props: true
        },
        {
            path: '*',
            name: 'page404',
            component: Page404
        }
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
