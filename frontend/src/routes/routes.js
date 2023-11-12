import Home from "../components/Main/Home.vue";
import Registration from "../components/Main/Registration/Registration.vue";
import Auth from "../components/Main/Auth/Auth.vue";
import PostCreate from "../components/Main/Post/PostCreate/PostCreate.vue";
import PostId from "../components/Main/Post/PostId.vue";
import Me from "../components/Main/Me/Me.vue";
import NotFound from "../components/Main/NotFound.vue";
import {authGuard} from "../guards/authGuard.js";
import {postCreateGuard} from "../guards/postCreateGuard.js";
import {meGuard} from "../guards/meGuard.js";
import {regGuard} from "../guards/regGuard.js";

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
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound
    },
    {
        path: '/me',
        name: 'me',
        component: Me,
        beforeEnter: meGuard,
    }
]