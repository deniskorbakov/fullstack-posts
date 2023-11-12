import {defineStore} from 'pinia'
import {ref} from "vue";
import axios from "axios";
import {usePopUpStore} from "./popUpStore.js";
import {usePostIdStore} from "./postIdStore.js";

export const useCommentStore = defineStore('commentStore', () => {
    const comment = ref('');
    const userToken = localStorage.getItem('token');

    function createComment(idPost) {
        const popUpStore = usePopUpStore();
        const {isShowPopUpWindow} = popUpStore;

        const store = usePostIdStore()
        const {getPosts} = store

        axios.post(import.meta.env.VITE_URL_API + '/posts/' + idPost + '/comments', {
                text: comment.value
            },
            {
                headers: {
                    'Accept' : 'application/json',
                    'Authorization' : `Bearer ${userToken}`
                }})
            .then( () => {
                getPosts();
                comment.value = '';
            })
            .catch(error => {
                isShowPopUpWindow(error.response.data['message']);
            });
    }

    return {comment, createComment}
})