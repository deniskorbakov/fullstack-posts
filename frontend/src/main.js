import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import {createRouter, createWebHistory} from "vue-router";
import Registration from "./components/Main/Registration/Registration.vue";
import Auth from "./components/Main/Auth/Auth.vue";
import PostCreate from "./components/Main/Post/PostCreate/PostCreate.vue";
import {createPinia} from "pinia";
import Home from "./components/Main/Home.vue";
import PostId from "./components/Main/Post/PostId.vue";
import Me from "./components/Main/Me/Me.vue";

const authGuard = (to, from, next) => {
    const isAuthenticated = localStorage.getItem('token')

    if (to.name === 'auth' || to.name === 'reg' && isAuthenticated) {
        next({ name: 'me' });
    } else if (to.name === 'auth' || to.name === 'reg' && !isAuthenticated) {
        next();
    } else if (to.name !== 'auth' || to.name !== 'reg' && !isAuthenticated) {
        next({ name: 'auth' });
    } else {
        next();
    }
};


const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/registration',
        name: 'reg',
        component: Registration,
        beforeEnter: authGuard,
    },
    {
        path: '/auth',
        name: 'auth',
        component: Auth,
        beforeEnter: authGuard,
    },
    {
        path: '/create',
        component: PostCreate
    },
    {
        path: '/post/:id',
        name: 'postId',
        component: PostId
    },
    {
        path: '/me',
        name: 'me',
        component: Me,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const app = createApp(App)
app.use(createPinia())
app.use(router)
app.mount('#app')


