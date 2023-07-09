<script setup>
  import PostView from "./PostView.vue";

  import {onMounted} from "vue"
  import {usePostIdStore} from "../../../stores/postIdStore.js";
  import {storeToRefs} from "pinia";

  const store = usePostIdStore()

  const {post} = storeToRefs(store)

  const {getPosts} = store

  onMounted(getPosts)
</script>

<template>
  <PostView v-for="item in post.value" :data="item"></PostView>
</template>

<style scoped>

</style>