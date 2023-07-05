<script setup>
  import PostItem from "./Post/PostItem/PostItem.vue";
  import {usePostListStore} from "../../stores/postListStore.js";
  import {storeToRefs} from "pinia";
  import {onMounted} from "vue";

  const store = usePostListStore()

  const {getPosts} = store
  const {posts} = storeToRefs(store)

 onMounted(getPosts)
</script>

<template>
  <div>
   <PostItem v-for="item in posts.value" :data="item"></PostItem>
  </div>
</template>

<style scoped>

</style>