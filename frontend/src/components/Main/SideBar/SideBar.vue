<script setup>
  import TitleBar from "./TitleBar/TitleBar.vue";
  import ItemBar from "./ItemBar/ItemBar.vue";
</script>

<template>
  <Transition>
  <div class="flex-initial mt-5 w-1/6 overflow-auto">
    <div class="flex-col text-center space-y-2">
      <TitleBar>
        <i class="fa-solid fa-newspaper text-2xl text-cyan-500"></i>
        <p class="text-white">Посты</p>
      </TitleBar>

      <ItemBar>
        <i class="fa-solid fa-fire text-2xl text-red-500"></i>
        <p class="text-black">Популярное</p>
      </ItemBar>

      <ItemBar>
        <i class="fa-solid fa-clock text-2xl text-sky-500"></i>
        <p class="text-black">Свежее</p>
      </ItemBar>

      <ItemBar>
        <i class="fa-solid fa-thumbtack text-green-500 text-2xl"></i>
        <p class="text-black">Мои записи</p>
      </ItemBar>

      <ItemBar>
        <i class="fa-solid fa-users text-teal-500 text-2xl"></i>
        <p class="text-black">Подписки</p>
      </ItemBar>

      <TitleBar>
        <i class="fa-solid fa-list-ul text-2xl text-cyan-500"></i>
        <p class="text-white">Категории</p>
      </TitleBar>

      <ItemBar>
        <i class="fa-solid fa-circle-dot text-blue-500 text-2xl"></i>
        <p class="text-black">Спорт</p>
      </ItemBar>

      <ItemBar>
        <i class="fa-solid fa-circle-dot text-blue-500 text-2xl"></i>
        <p class="text-black">Жизнь</p>
      </ItemBar>

      <ItemBar>
        <i class="fa-solid fa-circle-dot text-blue-500 text-2xl"></i>
        <p class="text-black text-ellipsis">IT-Рынок</p>
      </ItemBar>

      <button>
        еще
      </button>

      <TitleBar>
        <i class="fa-solid fa-circle-question text-2xl text-cyan-500"></i>
        <p class="text-white">FAQ</p>
      </TitleBar>

      <ItemBar>
        <i class="fa-solid fa-question text-2xl text-black"></i>
        <p class="text-black">Контактые</p>
      </ItemBar>

      <ItemBar>
        <i class="fa-solid fa-question text-2xl text-black"></i>
        <p class="text-black">Местоположение</p>
      </ItemBar>

      <ItemBar>
        <i class="fa-solid fa-question text-2xl text-black"></i>
        <p class="text-black text-ellipsis">Вопросы</p>
      </ItemBar>
    </div>
  </div>
  </Transition>
</template>

<style scoped>

</style>