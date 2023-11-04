import {defineStore, storeToRefs} from 'pinia'
import { useVuelidate } from '@vuelidate/core'
import { required, email, minLength,} from '@vuelidate/validators'
import {reactive, computed} from "vue";
import {useRouter} from "vue-router";
import axios from "axios";
import {useAuthStore} from "./authStore.js";

export const useLoginStore = defineStore('loginStore', () => {
    const formData = reactive({
        email: "",
        password: "",
    })

    const rules = computed(() => {
        return {
            email: {required, email},
            password: {required, minLength: minLength(8)},
        }
    })

    const v$ = useVuelidate(rules, formData);

    const auth = reactive({})
    const errorAuth = reactive({})
    const router = useRouter()

    const storeAuth = useAuthStore();

    const {isAuth} = storeAuth;

    const submitForm = async () => {
        const result = await v$.value.$validate();

        if (result) {
            axios.post(import.meta.env.VITE_URL_API + '/login', {
                headers: {
                    'Accept' : 'application/json',
                },

                email: formData.email,
                password: formData.password,
            })
                .then(response => {
                    auth.value = response.data

                    localStorage.setItem('token', auth.value.token)
                    isAuth();
                    router.push({name: 'me'})
                })
                .catch(error => {
                    errorAuth.value = error.response.data
                });
        }
    }

    return{formData, errorAuth, v$, submitForm}

})