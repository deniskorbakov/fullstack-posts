<script setup>
  import PostItem from "./Post/PostItem/PostItem.vue";
  import {usePostListStore} from "../../stores/postListStore.js";
  import {onMounted, ref} from "vue";
  import {storeToRefs} from "pinia";

  const store = usePostListStore()
  const {posts, nextLink, infoForLastPosts} = storeToRefs(store)
  const {getPosts, nextPost} = store

  const observers = ref(null)

  onMounted(() => {
    getPosts()

    const options = {
      rootMargin: "0px",
      threshold: 1.0,
    };

    const callback = (entries) => {
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

  <div ref="observers" class="observer h-10 w-full"></div>

  <div class="text-white text-center mb-32 h-32">
    <p class="text-2xl">
      {{infoForLastPosts}}
    </p>
  </div>
</template>

<style scoped>

</style>