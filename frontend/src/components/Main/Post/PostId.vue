<script setup>
  import {onMounted, reactive} from "vue";
  import {useRoute} from "vue-router";
  import axios from "axios";
  import PostView from "./PostView.vue";

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

  onMounted(getPosts)
</script>

<template>
  <PostView v-for="item in post.value" :data="item"></PostView>
</template>

<style scoped>

</style>