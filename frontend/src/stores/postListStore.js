import { defineStore } from 'pinia'
import {onMounted, ref} from "vue";
import axios from "axios";

export const usePostListStore = defineStore('postListStore', () => {
    const posts = ref({})

    const nextLink = ref(null)
     function getPosts() {
        axios.get(import.meta.env.VITE_URL_API + '/posts', {
            headers: {
                'Accept' : 'application/json'
            }
        })
            .then(response => {
                posts.value = response.data.data
                nextLink.value = response.data.links['next']

            })
            .catch(error => {
                console.log(error);
            });
    }

    function nextPost() {
        axios.get( nextLink.value, {
            headers: {
                'Accept' : 'application/json'
            }
        })
            .then(response => {
                nextLink.value = response.data.links['next']
                posts.value = [...posts.value, ...response.data.data]

            })
            .catch(error => {
                console.log(error);
            });

    }

    return {posts, getPosts, nextPost, nextLink, }
})