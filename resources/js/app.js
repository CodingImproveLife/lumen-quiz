require('./bootstrap')
import Vue from 'vue'
import VueRouter from "vue-router";
Vue.use(VueRouter);

import App from './components/App.vue'
import quizzes from './components/Quizzes.vue'
import quiz from './components/Quiz.vue'
import { BootstrapVue } from 'bootstrap-vue'
Vue.use(BootstrapVue)

const router = new VueRouter({
    mode:'history',
    routes: [
        {
            path: '/',
            component: quizzes,
            name: 'quizzes'
        },
        {
            path: '/quizzes/:id',
            component: quiz,
            name: 'quiz.show'
        }
    ]
});

Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components: { App },
    router
});
