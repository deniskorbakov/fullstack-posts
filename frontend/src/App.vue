<script setup>

import {ref} from "vue";
import Header from "./components/Header.vue";
import SideBar from "./components/Main/SideBar.vue";

const showSideBar = ref(true)

function getSideBar() {
  showSideBar.value = !showSideBar.value;
}
</script>


<template>
  <div id="app">
    <Header :show="showSideBar" :toggle="getSideBar"></Header>

    <div id="main" class="flex bg-gray-800 text-white h-screen">
      <SideBar v-show="showSideBar"></SideBar>
      <div class="bg-gray-900 w-full text-black">
        <div class="w-2/5 h-screen mx-auto overflow-auto">
          <router-view/>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
