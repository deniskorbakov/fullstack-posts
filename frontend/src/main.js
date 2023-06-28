import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import {createRouter, createWebHistory} from "vue-router";
import Content from "./components/Main/Content.vue";
import Registration from "./components/Main/Registration.vue";
import Auth from "./components/Main/Auth.vue";

const router = createRouter({
    routes: [
        {
            path: '/',
            component: Content
        },

        {
            path: '/registration',
            component: Registration
        },

        {
            path: '/auth',
            component: Auth
        },
    ],

    history: createWebHistory()
})

const app = createApp(App)
app.use(router)
app.mount('#app')


