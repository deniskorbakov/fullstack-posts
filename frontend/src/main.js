import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import {createRouter, createWebHistory} from "vue-router";
import Registration from "./components/Main/Registration/Registration.vue";
import Auth from "./components/Main/Auth/Auth.vue";;
import PostCreate from "./components/Main/Post/PostCreate/PostCreate.vue";
import {createPinia} from "pinia";
import Home from "./components/Main/Home.vue";
import PostId from "./components/Main/Post/PostId.vue";

const routes = [
    { path: '/', component: Home },
    { path: '/registration',  component: Registration },
    { path: '/auth', component: Auth },
    { path: '/create', component: PostCreate },
    { path: '/post/:id', name: 'postId', component: PostId },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const app = createApp(App)
app.use(createPinia())
app.use(router)
app.mount('#app')


