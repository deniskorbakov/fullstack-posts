import {defineStore} from "pinia";
import {useAuthStore} from "./authStore.js";
import axios from "axios";
import {useRouter} from "vue-router";

export const useMeStore = defineStore('meStore', () => {


    const router = useRouter()
    const auth = useAuthStore()

    auth.isAuth()

    function logout(){
        axios.options(import.meta.env.VITE_URL_API + '/logout', {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
        })
        .then( () => {
            localStorage.removeItem('token')
            auth.isAuth()
            router.push({name: 'auth'})
        })
    }

    return{auth, logout}
})