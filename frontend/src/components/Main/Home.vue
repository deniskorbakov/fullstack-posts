<script setup>
  import PostItem from "./Post/PostItem/PostItem.vue";

  import {usePostListStore} from "../../stores/postListStore.js";
  import {onMounted} from "vue";
  import {storeToRefs} from "pinia";

  const store = usePostListStore()
  const {posts} = storeToRefs(store)
  const {getPosts} = store

  onMounted(getPosts)
</script>

<template>
  <div>
   <PostItem v-for="item in posts.value" :data="item"></PostItem>
  </div>
</template>

<style scoped>

</style>