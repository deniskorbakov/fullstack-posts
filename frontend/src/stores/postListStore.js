import { defineStore } from 'pinia'
import {reactive} from "vue";
import axios from "axios";

export const usePostListStore = defineStore('postListStore', () => {
    const posts = reactive({})
     function getPosts() {
        axios.get('http://localhost:8876/api/v1/posts', {
            headers: {
                'Accept' : 'application/json'
            }
        })
            .then(response => {
                posts.value = response.data.data
            })
            .catch(error => {
                console.log(error);
            });
    }

    return {posts, getPosts}
})