import Vue from 'vue'
import VueRouter from 'vue-router'

import AppointmentHome from './views/appointment/index.vue'
import ProficiencyHome from './views/proficiency/index.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [

        { path: '/', component: AppointmentHome},
        

    ]
})

const routertest = new VueRouter({
    routes: [

        { path: '/', component: ProficiencyHome},
        

    ]
})


export default router