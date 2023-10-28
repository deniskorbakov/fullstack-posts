import { createApp } from 'vue'
import App from './App.vue'
import Registration from "./components/Main/Registration/Registration.vue";
import Auth from "./components/Main/Auth/Auth.vue";
import PostCreate from "./components/Main/Post/PostCreate/PostCreate.vue";
import Home from "./components/Main/Home.vue";
import PostId from "./components/Main/Post/PostId.vue";
import Me from "./components/Main/Me/Me.vue";
import {createPinia} from "pinia";
import {createRouter, createWebHistory} from "vue-router";
import {postCreateGuard} from "./guards/postCreateGuard.js";
import {authGuard} from "./guards/authGuard.js";
import {regGuard} from "./guards/regGuard.js";
import {meGuard} from "./guards/meGuard.js";
import './style.css'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/registration',
        name: 'reg',
        component: Registration,
        beforeEnter: regGuard,
    },
    {
        path: '/auth',
        name: 'auth',
        component: Auth,
        beforeEnter: authGuard,
    },
    {
        path: '/create',
        name: 'create',
        component: PostCreate,
        beforeEnter: postCreateGuard,
    },
    {
        path: '/post/:id',
        name: 'postId',
        component: PostId,
    },
    {
        path: '/me',
        name: 'me',
        component: Me,
        beforeEnter: meGuard,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const app = createApp(App)

app.use(createPinia());
app.use(router);

app.mount('#app');


