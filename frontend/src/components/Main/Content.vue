<script setup>

</script>

<template>
  <div class="bg-gray-900 w-full text-black">
    <div class="w-2/5 h-screen mx-auto overflow-auto">
      <div class="container bg-white h-max mt-10 rounded-lg p-5">
        <div class="flex h-10 p-2 text-center">
          <div class="flex-initial w-1/6">
            <img class="rounded-full w-14 h-14" src="data:image/jpeg;base64,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">
          </div>

          <div class="flex-initial w-1/4">
            <p>Denis Korbakov</p>
          </div>

          <div class="flex-initial w-1/2 text-gray-500">
            <p>5 часов назад</p>
          </div>

          <div class="flex flex-initial w-1/4 space-x-4 text-cyan-500">
            <i class="fa-solid fa-user-plus text-xl"></i>
            <p>Подписаться</p>
          </div>
        </div>

        <div class="text-left mt-10 p-2">
          <p class="text-3xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        </div>

        <div class="text-left mt-2 text-ellipsis whitespace-normal space-y-5 p-2">
          <img class="rounded-lg w-min h-1/2" src="https://images.unsplash.com/photo-1687292475515-d9c0fd42f15f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="">
        </div>

        <div class="flex h-10 p-2 mt-5">
          <div class="flex-initial flex w-1/6 space-x-4">
            <i class="fa-regular fa-heart text-2xl"></i>
            <p>55</p>
          </div>

          <div class="flex-initial flex w-1/2 space-x-4">
            <i class="fa-regular fa-comment text-2xl"></i>
            <p>30</p>
          </div>

          <div class="flex-initial flex w-1/2 space-x-4">
            <i class="fa-regular fa-bookmark text-2xl"></i>
            <p>добавить в избранное</p>
          </div>

          <div class="flex-initial flex w-1/8 space-x-4">
            <i class="fa-regular fa-eye text-2xl"></i>
            <p>567</p>
          </div>
        </div>
      </div>

      <div class="container bg-white h-max mt-10 rounded-lg p-5">
        <div class="flex h-10 p-2 text-center">
          <div class="flex-initial w-1/6">
            <img class="rounded-full w-14 h-14" src="data:image/jpeg;base64,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">
          </div>

          <div class="flex-initial w-1/4">
            <p>Denis Korbakov</p>
          </div>

          <div class="flex-initial w-1/2 text-gray-500">
            <p>5 часов назад</p>
          </div>

          <div class="flex flex-initial w-1/4 space-x-4 text-cyan-500">
            <i class="fa-solid fa-user-plus text-xl"></i>
            <p>Подписаться</p>
          </div>
        </div>

        <div class="text-left mt-10 p-2">
          <p class="text-3xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        </div>

        <div class="text-left mt-2 text-ellipsis whitespace-normal space-y-5 p-2">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cum deleniti dolorem eum illum nisi, odit praesentium rerum tempora. A aliquid beatae consequatur deserunt est inventore minus qui soluta voluptas.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius facilis libero quaerat reiciendis vero? Architecto asperiores consequatur distinctio dolor dolore dolorem eum expedita impedit odit, quam quia reprehenderit suscipit voluptatem!</p>
        </div>

        <div class="flex h-10 p-2 mt-5">
          <div class="flex-initial flex w-1/6 space-x-4">
            <i class="fa-regular fa-heart text-2xl"></i>
            <p>55</p>
          </div>

          <div class="flex-initial flex w-1/2 space-x-4">
            <i class="fa-regular fa-comment text-2xl"></i>
            <p>30</p>
          </div>

          <div class="flex-initial flex w-1/2 space-x-4">
            <i class="fa-regular fa-bookmark text-2xl"></i>
            <p>добавить в избранное</p>
          </div>

          <div class="flex-initial flex w-1/8 space-x-4">
            <i class="fa-regular fa-eye text-2xl"></i>
            <p>567</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<style scoped>

</style>