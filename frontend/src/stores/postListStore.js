import { defineStore } from 'pinia'
import {ref} from "vue";
import axios from "axios";

export const usePostListStore = defineStore('postListStore', () => {
    const posts = ref({})

    const nextLink = ref(null)

    const infoForLastPosts = ref('')
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

    function checkOnLastPagePosts(currentPage, lastPage) {
        if (currentPage === lastPage) {
            infoForLastPosts.value = 'Посты закончились, обновите страницу';
        }
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

                checkOnLastPagePosts(response.data.meta['current_page'], response.data.meta['last_page']);
            })
            .catch(error => {
                console.log(error);
            });

    }

    return {posts, nextLink, infoForLastPosts, getPosts, nextPost}
})