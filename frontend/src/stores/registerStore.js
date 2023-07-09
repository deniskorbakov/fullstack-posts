import { useVuelidate } from '@vuelidate/core'
import { required, email, minLength, sameAs} from '@vuelidate/validators'
import {reactive, computed, ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";
import {defineStore} from "pinia";

export const useRegisterStore = defineStore('registerStore', () => {

    const formData = reactive({
        username: "",
        email: "",
        password: "",
        passwordConfirm: "",
    })

    const rules = computed(() => {
        return {
            username: {required, minLength: minLength(3)},
            email: {required, email},
            password: {required, minLength: minLength(8)},
            passwordConfirm: {required, sameAs: sameAs(formData.password)},
        }
    })

    const v$ = useVuelidate(rules, formData);

    const register = reactive({})
    const errorReg = ref({})
    const router = useRouter()

    const submitForm = async () => {
        const result = await v$.value.$validate();

        if (result) {
            axios.post('http://localhost:8876/api/v1/register', {
                headers: {
                    'Accept' : 'application/json',
                },

                email: formData.email,
                name: formData.username,
                password: formData.password,
                password_confirmation: formData.passwordConfirm
            })
                .then(response => {
                    register.value = response.data.data

                    localStorage.setItem('token', register.value.token)

                    router.push({name: 'me'})
                })
                .catch(error => {
                    errorReg.value = error.response.data
                });
        }
    }

    return{formData, v$, register, errorReg, submitForm}

})