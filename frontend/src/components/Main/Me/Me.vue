<script setup>
  import {useMeStore} from "../../../stores/meStore.js";
  import {storeToRefs} from "pinia";

  const store = useMeStore()
  const {auth} = storeToRefs(store)
  const {logout} = store
</script>

<template>
<div class="text-center text-2xl text-white bg-white rounded-b-lg">
  <div class="mx-auto text-center p-4">
    <buttom class="text-black border-2 border-black rounded-xl text-xl shadow-lg px-4 py-2 hover:shadow-inner">
      <i class="fa-solid fa-images"></i>
      Загрузить обложку
    </buttom>
  </div>
</div>

<div class="mt-10 text-left space-y-10 text-xl bg-white rounded-lg p-4">
  <div class="flex text-black">
    <div class="flex-initial w-1/2">
      <p class="text-4xl">{{auth.userData['name']}}</p>
    </div>
    <div class="flex-initial w-1/4 text-right">
      <button class="border border-black rounded-lg py-2 px-4"><i class="fa-solid fa-gear"></i></button>
    </div>
    <div class="flex-initial w-1/2 text-center text-white">
      <button class="rounded-lg py-2 px-4 bg-sky-500"><i class="fa-solid fa-comment-dots"></i> Написать Сообщение</button>
    </div>

    <div class="flex-initial w-1/4 text-center">
      <button @click="logout" class="rounded-lg px-4 py-2 bg-red-500 text-white">Выйти</button>
    </div>
  </div>

  <div class="space-y-4">
    <p class="text-sm text-sky-500">изменить описание</p>
    <p>На проекте с {{auth.userData['createdAccount']}}</p>
  </div>

  <div class="flex flex-row space-x-5 mt-10">
    <div>
      <button class="hover:text-sky-500 focus:border-b-2 focus:border-sky-500">Статьи</button>
    </div>
    <div>
      <button class="hover:text-sky-500 focus:border-b-2 focus:border-sky-500">Комментарии</button>
    </div>
    <div>
      <button class="hover:text-sky-500 focus:border-b-2 focus:border-sky-500">Черновики</button>
    </div>
    <div>
      <button class="hover:text-sky-500 focus:border-b-2 focus:border-sky-500">Донаты</button>
    </div>
    <div>
      <button class="hover:text-sky-500 focus:border-b-2 focus:border-sky-500">Подробнее</button>
    </div>
  </div>
</div>

<div class="flex space-x-5">
  <div class="flex-initial w-full mt-10 text-center space-y-10 text-xl bg-white rounded-lg p-10">
    <p>Вы не оставили ни одного комментария</p>
  </div>

  <div class="flex-initial w-1/2">
    <div class="mt-10 text-left space-y-10 text-xl bg-white rounded-lg p-4">
      <p>Кол-во постов: {{auth.userData['posts']}}</p>
    </div>

    <div class="mt-10 text-left space-y-10 text-xl bg-white rounded-lg p-4">
      <p>Подписчики: 0</p>
    </div>
  </div>
</div>
</template>

<style scoped>

</style>