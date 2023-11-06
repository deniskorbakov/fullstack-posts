import axios from "axios";
import { defineStore } from 'pinia'
import { reactive, ref } from "vue";
import { useRouter } from "vue-router";
import {usePopUpStore} from "./popUpStore.js";
import {myEditor} from "../helpers/initializationEditorJs.js";

export const useEditorStore = defineStore('editorStore', () => {
    const title = ref('')
    const body = reactive({})
    const selectedCategories = ref({});
    const userToken = localStorage.getItem('token');

    const router = useRouter();

    function createPost(body) {
        const popUpStore = usePopUpStore();

        const {isShowPopUpWindow} = popUpStore;

        axios.post(import.meta.env.VITE_URL_API + '/posts', {
            body: JSON.stringify(body),
            title: title.value,
            categories: selectedCategories.value
        },
    {
        headers: {
            'Accept' : 'application/json',
            'Authorization' : `Bearer ${userToken}`
        }})
        .then( ()=> {
            title.value = '';

            router.push({name: 'home'});
        })
        .catch(error => {
            isShowPopUpWindow(error.response.data['message']);
        });
    }

    function save() {
        editor.save().then((outputData) => {
            body.value = outputData;

            createPost(outputData.blocks);
        });
    }

    return {title, body, selectedCategories, save, myEditor}
})