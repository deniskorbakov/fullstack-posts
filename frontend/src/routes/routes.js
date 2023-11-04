import Home from "../components/Main/Home.vue";
import Registration from "../components/Main/Registration/Registration.vue";
import {regGuard} from "../guards/regGuard.js";
import Auth from "../components/Main/Auth/Auth.vue";
import {authGuard} from "../guards/authGuard.js";
import PostCreate from "../components/Main/Post/PostCreate/PostCreate.vue";
import {postCreateGuard} from "../guards/postCreateGuard.js";
import PostId from "../components/Main/Post/PostId.vue";
import Me from "../components/Main/Me/Me.vue";
import {meGuard} from "../guards/meGuard.js";

export const routes = [
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