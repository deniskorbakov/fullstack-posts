import { defineStore } from 'pinia'
import {reactive} from "vue";
import axios from "axios";
import {useRoute} from "vue-router";

export const usePostStore = defineStore('postListStore', () => {
    const post = reactive({})

    const route = useRoute();
    function getPosts() {
        const postId = route.params.id;
         axios.get(`http://localhost:8876/api/v1/posts/${postId}`, {
            headers: {
                'Accept' : 'application/json'
            }
        })
            .then(response => {
                post.value = response.data
            })
            .catch(error => {
                console.log(error);
            });
    }

    return {post, getPosts}
})