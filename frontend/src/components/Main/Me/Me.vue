<script setup>
  import {useMeStore} from "../../../stores/meStore.js";
  import {storeToRefs} from "pinia";

  const store = useMeStore()
  const {auth} = storeToRefs(store)
  const {logout} = store
</script>

<template>
<div class="text-center text-2xl text-white">
  <p>вы успешно авторизировались</p>
</div>

<div class="mt-10 text-white text-left space-y-5 text-xl">
  <p>Имя пользователя: {{auth.userData['name']}}</p>
  <p>Почта: {{auth.userData['email']}}</p>
  <p>Кол-во постов:{{auth.userData['posts']}}</p>
  <p>Дата создания аккаунта: {{auth.userData['createdAccount']}}</p>
</div>

<div class="text-center mt-10">
  <button @click="logout" class="rounded-lg px-4 py-2 bg-red-500 text-white">Выйти</button>
</div>
</template>

<style scoped>

</style>