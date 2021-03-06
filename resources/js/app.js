import articleIndex from "./components/article/articleIndex";

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import ArticleIndex from './components/article/articleIndex.vue';
import ArticleCreate from './components/article/articleCreate.vue';
import ArticleEdit from './components/article/articleEdit.vue';
import ArticleView from './components/article/articleView.vue';

Vue.use(VueRouter);
Vue.component('article-index', ArticleIndex);
Vue.component('article-create', ArticleCreate);
Vue.component('article-edit', ArticleEdit);
Vue.component('article-view', ArticleView);


const routes = [
    {
        path: '/',
        components: {
            articleIndex: articleIndex
        }
    },
    {path: '/article/create', component: ArticleCreate, name: 'articleCreate'},
    {path: '/article/edit/:id', component: ArticleEdit, name: 'articleEdit'},
    {path: '/article/:id', component: ArticleEdit, name: 'articleView'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
