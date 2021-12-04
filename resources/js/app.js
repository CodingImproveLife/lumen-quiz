require('./bootstrap')
import Vue from 'vue'
import VueRouter from "vue-router";
Vue.use(VueRouter);

import App from './components/App.vue'
import quizzes from './components/Quizzes.vue'

const router = new VueRouter({
    mode:'history',
    routes: [
        {
            path: '/',
            component: quizzes
        }
    ]
});

Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components: { App },
    router
});
