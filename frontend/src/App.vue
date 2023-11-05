<script setup>
import Header from "./components/Header/Header.vue";
import SideBar from "./components/Main/SideBar/SideBar.vue";
import PopUp from "./components/PopUp/PopUp.vue";
import {useSidebarStore} from "./stores/sidebarStore.js";
import {useAuthStore} from "./stores/authStore.js";
import {usePopUpStore} from "./stores/popUpStore.js";
import {storeToRefs} from "pinia";
import {onMounted} from "vue";

const store = useSidebarStore();
const {show} = storeToRefs(store);
const {getSidebar} = store;

const storeAuth = useAuthStore();
const {user} = storeToRefs(storeAuth);
const {isAuth} = storeAuth;

const popUpStore = usePopUpStore();
const {isShow, message} = storeToRefs(popUpStore);

onMounted(isAuth)
</script>


<template>
  <div id="app">
    <Header :show="show" :toggle="getSidebar" :user="user"></Header>
    <div id="main" class="flex bg-gray-800 text-white h-screen">
        <SideBar v-show="show"></SideBar>
      <div class="bg-gray-900 w-full text-black example">
        <div class="w-1/2 h-screen mx-auto overflow-scroll scrollbar-hide">
          <RouterView/>
          <PopUp v-show="isShow">{{message}}</PopUp>
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
