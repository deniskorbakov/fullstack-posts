<script setup>
  import PostItem from "./Post/PostItem/PostItem.vue";

  import {usePostListStore} from "../../stores/postListStore.js";
  import {onMounted, ref} from "vue";
  import {storeToRefs} from "pinia";

  const store = usePostListStore()
  const {posts, nextLink} = storeToRefs(store)
  const {getPosts, nextPost} = store


  onMounted(getPosts)

  onMounted(() => {
    const options = {
      rootMargin: "0px",
      threshold: 1.0,
    };

    const callback = (entries, observer) => {
      if (entries[0].isIntersecting && nextLink.value != null) {
        nextPost()
      }
    };

    const observer = new IntersectionObserver(callback, options);
    observer.observe(observers.value)
  })
</script>

<template>

   <PostItem v-for="item in posts" :data="item" :key="item['id']"></PostItem>

  <div ref="observers" class="observer h-16 w-full"></div>

</template>

<style scoped>

</style>