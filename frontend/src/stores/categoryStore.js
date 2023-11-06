import {defineStore} from "pinia";
import axios from "axios";
import {ref} from "vue";

export const useCategoryStore = defineStore('categoryStore', () => {

    const categories = ref({});
    function getCategory(){
        axios.get(import.meta.env.VITE_URL_API + '/categories', {
            headers: {
                'Accept' : 'application/json'
            }
        })
        .then(response => {
            categories.value = response.data['data']
        })
        .catch(error => {
            console.log(error);
        });
    }

    return{categories, getCategory}
})