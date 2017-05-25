import Vue from 'vue'
import App from './App.vue'
import router from './router'


const app = new Vue({
    el: '#root',
    components: { App },
    template: '<app></app>',
    router
})

const test = new Vue({
    el: '#test',
    components: { App },
    template: '<app></app>',
    router
})




