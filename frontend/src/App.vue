<script setup>

import {ref} from "vue";
import Header from "./components/Header.vue";
import Main from "./components/Main/Main.vue";

const showSideBar = ref(true)

function getSideBar() {
  showSideBar.value = !showSideBar.value;
}
</script>


<template>
  <div id="app">
    <Header :show="showSideBar" :toggle="getSideBar"></Header>
    <Main :show="showSideBar"></Main>
  </div>
</template>

<style scoped>

</style>
