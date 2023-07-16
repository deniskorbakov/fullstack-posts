<script setup>
import Header from "./components/Header/Header.vue";
import SideBar from "./components/Main/SideBar/SideBar.vue";
import {useSidebarStore} from "./stores/sidebarStore.js";
import {storeToRefs} from "pinia";

import {onMounted} from "vue";
import {useAuthStore} from "./stores/authStore.js";

const store = useSidebarStore()

const {getSidebar} = store
const {show} = storeToRefs(store)

const storeAuth = useAuthStore()

const {isAuth} = storeAuth
const {user} = storeToRefs(storeAuth)


onMounted(isAuth)

</script>


<template>
  <div id="app">
    <Header :show="show" :toggle="getSidebar" :user="user"></Header>
    <div id="main" class="flex bg-gray-800 text-white h-screen">
      <Transition>
        <SideBar v-show="show"></SideBar>
      </Transition>
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

.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>
