<script setup>
import {useEditorStore} from "../../stores/editorStore.js";
import {storeToRefs} from "pinia";
import {onMounted} from "vue";
import {useCategoryStore} from "../../stores/categoryStore.js";

const editorStore = useEditorStore();

const {title, body, selectedCategories} = storeToRefs(editorStore);
const {save, myEditor} = editorStore;

const categoryStore = useCategoryStore();

const {categories} = storeToRefs(categoryStore);
const {getCategory} = categoryStore;

onMounted(myEditor)

getCategory()
</script>

<template>
  <input class="text-3xl min-w-full" style="outline: none" v-model.trim.capitalize="title" maxlength="50" placeholder="Заголовок">

  <div id="editorjs" class="mt-5"></div>

  <div class="flex space-x-5">
    <button @click="save" class="rounded-lg bg-sky-500 text-white px-4 py-2 hover:bg-sky-400">Опубликовать</button>

    <button class="px-4 py-2 border-2 border-gray-900 rounded-lg hover:shadow-lg">
      <i class="fa-solid fa-eye text-2xl text-gray-900"></i>
    </button>
  </div>

  <div class="w-full mt-5 text-center">
    <span class="text-xl">Выберите категории</span>

    <select v-model="selectedCategories" class="block w-full px-4 py-3 border-2 border-gray-300 rounded-lg scrollbar-hide h-32" multiple>
      <option  v-for="item in categories"  v-bind:value="item.id" :key="item.id">
        {{ item.name }}
      </option>
    </select>
  </div>
</template>



