import {defineStore} from "pinia";
import {reactive} from "vue";
import {useRoute} from "vue-router";
import axios from "axios";

export const usePostIdStore = defineStore('postIdStore', () => {

    const post = reactive({})

    const route = useRoute();
    const postId = route.params.id;

    function getPosts() {

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