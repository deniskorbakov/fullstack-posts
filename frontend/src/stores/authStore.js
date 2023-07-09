import {defineStore} from 'pinia'
import {ref} from "vue";
import axios from "axios";

export const useAuthStore = defineStore('authStore', () => {

    const user = ref(false)
    const userData = ref({})

   function isAuth(){
       axios.get('http://localhost:8876/api/v1/user', {
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