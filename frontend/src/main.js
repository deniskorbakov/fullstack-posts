import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import {createRouter, createWebHistory} from "vue-router";
import Content from "./components/Main/PostItem/PostItem.vue";
import Registration from "./components/Main/Registration/Registration.vue";
import Auth from "./components/Main/Auth/Auth.vue";
import Post from "./components/Main/Post/Post.vue";
import PostCreate from "./components/Main/PostCreate/PostCreate.vue";

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

        {
            path: '/post',
            component: Post
        },

        {
            path: '/create',
            component: PostCreate
        },
    ],

    history: createWebHistory()
})

const app = createApp(App)
app.use(router)
app.mount('#app')


