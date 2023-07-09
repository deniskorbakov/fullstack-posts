<script setup>
import {useEditorStore} from "../../stores/editorStore.js";
import {storeToRefs} from "pinia";

const store = useEditorStore()

const {title, body} = storeToRefs(store)
const { save } = store
</script>

<template>
  <input class="text-3xl w-full" style="outline: none" v-model="title" placeholder="Заголовок">

  <div id="editorjs" class="truncate mt-5"></div>

  <div class="flex space-x-5">
    <button @click="save" class="rounded-lg bg-sky-500 text-white px-4 py-2 hover:bg-sky-400">Опубликовать</button>
    <button class="px-4 py-2 border-2 border-gray-900 rounded-lg hover:shadow-lg">
      <i class="fa-solid fa-eye text-2xl text-gray-900"></i>
    </button>
  </div>
</template>



