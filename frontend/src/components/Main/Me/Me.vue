<script setup>
import axios from "axios";
import {useRouter} from "vue-router";
import {useAuthStore} from "../../../stores/authStore.js";

const router = useRouter()
const store = useAuthStore()

store.isAuth()

function logout(){
  axios.options('http://localhost:8876/api/v1/logout', {
    headers: {
      Authorization: `Bearer ${localStorage.getItem('token')}`,
    },
  })

      .then( () => {
        localStorage.removeItem('token')
        store.isAuth()
        router.push({name: 'auth'})
      })
}


</script>

<template>
<div class="text-center text-2xl text-white">
  <p>вы успешно авторизировались</p>
</div>

<div class="mt-10 text-white text-left space-y-5 text-xl">
  <p>Имя пользователя: {{store.userData.name}}</p>
  <p>Почта: {{store.userData.email}}</p>
  <p>Кол-во постов:{{store.userData.posts}}</p>
  <p>Дата создания аккаунта: {{store.userData.createdAccount}}</p>
</div>

<div class="text-center mt-10">
  <button @click="logout" class="rounded-lg px-4 py-2 bg-red-500 text-white">Выйти</button>
</div>
</template>

<style scoped>

</style>