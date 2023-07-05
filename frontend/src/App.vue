<script setup>
import Header from "./components/Header/Header.vue";
import SideBar from "./components/Main/SideBar/SideBar.vue";
import {useSidebarStore} from "./stores/sidebarStore.js";
import {storeToRefs} from "pinia";

const store = useSidebarStore()

const {getSidebar} = store
const {show} = storeToRefs(store)
</script>


<template>
  <div id="app">
    <Header :show="show" :toggle="getSidebar"></Header>
    <div id="main" class="flex bg-gray-800 text-white h-screen">
      <SideBar v-show="show"></SideBar>
      <div class="bg-gray-900 w-full text-black">
        <div class="w-1/2 h-screen mx-auto overflow-auto">
          <RouterView/>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
h2 {
  @apply text-2xl
}

h3 {
  @apply text-xl
}
</style>
