require('./bootstrap')
import Vue from 'vue'

Vue.component('app', require('./components/App.vue').default);
Vue.component('quizzes', require('./components/Quizzes.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
});
