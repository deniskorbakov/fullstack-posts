import {defineStore} from "pinia";
import {reactive} from "vue";
import {useRoute} from "vue-router";
import axios from "axios";

export const usePostIdStore = defineStore('postIdStore', () => {

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

    return{post, getPosts}
})