import {defineStore} from 'pinia'
import {ref} from "vue";
import axios from "axios";

export const useAuthStore = defineStore('authStore', () => {

    const user = ref(false)
    const userData = ref({})

   function isAuth(){
       axios.get(import.meta.env.VITE_URL_API + '/user', {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
        })

            .then(res => {
                user.value = true
                userData.value = res.data.data
            })
            .catch( () => {
                user.value = false
            });
    }

    return{user, isAuth, userData}

})