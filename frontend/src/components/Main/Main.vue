<script setup>
import SideBar from "./SideBar.vue";
import Content from "./Content.vue";

const props = defineProps({
  show: {
    type: Boolean,
    required: true
  }
})

</script>

<template>
  <main id="main" class="flex bg-gray-800 text-white h-screen">
    <SideBar v-show="props.show"></SideBar>
    <Content></Content>
  </main>
</template>

<style scoped>

</style>