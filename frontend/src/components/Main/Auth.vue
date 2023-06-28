<script setup>

</script>

<template>
  <div class="container text-center">
    <div class="text-left my-10">
      <p class="text-white text-5xl">Авторизация пользователя</p>
    </div>

    <div class="h-full bg-white rounded-lg space-y-10 p-10">
      <div class="flex space-x-20">
        <i class="fa-solid fa-square-envelope text-5xl text-gray-900"></i>
        <input class="rounded-lg bg-gray-900 px-10 py-4 text-white" type="email" placeholder="Введите почту" style="outline:none;">
      </div>

      <div class="flex space-x-20">
        <!--       <i class="fa-solid fa-lock text-5xl text-white text-gray-900"></i>-->
        <i class="fa-solid fa-unlock text-5xl text-gray-900"></i>
        <input class="rounded-lg bg-gray-900 px-10 py-4 text-white" type="password" placeholder="Введите пароль" style="outline:none;">
      </div>

      <div class="flex space-x-2">
        <p class="text-gray-900">нет аккаунта ?</p>
        <router-link to="/registration" class="text-sky-500">Зарегистрироваться</router-link>
      </div>

      <div class="rounded-lg bg-gray-900 text-white px-10 py-4">
        <button>Войти в аккаунт</button>
      </div>

      <div class="text-gray-900 text-sm uppercase">
        Войти с помощью
      </div>

      <div class="flex">
        <div class="flex-initial w-1/2">
          <i class="fa-brands fa-vk text-4xl text-gray-900"></i>
        </div>

        <div class="flex-initial w-1/2">
          <i class="fa-brands fa-linkedin text-4xl text-gray-900"></i>
        </div>

        <div class="flex-initial w-1/2">
          <i class="fa-brands fa-github text-4xl text-gray-900"></i>
        </div>

        <div class="flex-initial w-1/2">
          <i class="fa-brands fa-google text-4xl text-gray-900"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>