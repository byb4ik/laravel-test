require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import articleIndex from "./components/article/articleIndex";
import articleCreate from './components/article/articleCreate';
import articleEdit from './components/article/articleEdit';
import articleView from './components/article/articleView';

Vue.use(VueRouter);
Vue.component('article-index', articleIndex);
Vue.component('article-create', articleCreate);
Vue.component('article-edit', articleEdit);
Vue.component('article-view', articleView);


const routes = [
    {
        path: '/',
        components: {
            articleIndex: articleIndex
        }
    },
    {path: '/article/store', component: articleCreate, name: 'articleCreate'},
    {path: '/article/edit/:id', component: articleEdit, name: 'articleEdit'},
    {path: '/article/:id', component: articleView, name: 'articleView'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
