<script setup>
import {useCommentStore} from "../../../../stores/commentStore.js";
import {storeToRefs} from "pinia";


const props = defineProps({
  data: {
    type: Object,
    required: true,
    default: () => {}
  }
})

const store = useCommentStore();
const {comment} = storeToRefs(store);
const {createComment} = store;

</script>

<template>
  <div class="mt-5">
    <textarea v-model="comment" class="bg-gray-900 text-white px-4 py-4 rounded-lg w-full h-32 resize-y outline-none" placeholder="Написать комментарий"></textarea>
  </div>

  <div class="mt-5 text-right">
    <button class="bg-cyan-500 rounded-lg px-4 py-2 hover:bg-cyan-600" @click="createComment(props.data['id'])">Создать Коммент</button>
  </div>
</template>

<style scoped>

</style>