// window.Vue = require('vue');
//
// import VueRouter from 'vue-router';
//
// window.Vue.use(VueRouter);
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import ArticleIndex from './components/article/articleIndex.vue';
import ArticleCreate from './components/article/articleCreate.vue';
import ArticleEdit from './components/article/articleEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            articleIndex: ArticleIndex
        }
    },
    {path: '/article/create', component: ArticleCreate, name: 'createArticle'},
    {path: '/article/edit/:id', component: ArticleEdit, name: 'editArticle'},
]

const router = new VueRouter({routes})

const app = new Vue({router}).$mount('#app')
