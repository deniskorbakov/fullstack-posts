<script setup>
const props = defineProps({
    toggle: {
      type: Function,
      required: true
    },

    show: {
      type: Boolean,
      required: true
    },

    user: {
      type: Boolean,
      required: true,
    }
  })


</script>

<template>
  <header class="bg-sky-800 flex h-16 text-white p-4">
    <div class="flex-initial w-1/4">
      <button class="flex space-x-4" @click="props.toggle">
        <i v-if="props.show" class="fa-solid fa-bars-staggered text-2xl"></i>
        <i v-else class="fa-solid fa-bars text-2xl"></i>
      </button>

    </div>

    <div class="flex-initial w-1/2">
      <button>
        <router-link to="/" class="text-2xl uppercase">Your Posts</router-link>
      </button>
    </div>

    <div class="flex-initial w-full space-x-20">
      <input type="text" class="w-64 bg-cyan-950 rounded-lg px-4 py-2" placeholder="Поиск" style="outline:none;">

      <button class="bg-white rounded-lg px-4 py-2 text-black">
       <router-link to="/create">создать</router-link>
      </button>
    </div>

    <div class="flex-initial w-1/8 p-2 pr-10">
      <button class="flex space-x-4">
        <i class="fa-solid fa-bell text-2xl"></i>
      </button>
    </div>
    <div class="flex-initial w-1/6 p-2">
      <button class="flex space-x-4">
        <i class="fa-solid fa-circle-user text-2xl"></i>
        <router-link v-if="props.user"  :to="{ name: 'me' }">Мой аккаунт</router-link>
        <router-link v-else :to="{ name: 'auth' }">войти</router-link>
      </button>
    </div>
  </header>
</template>

<style scoped>

</style>