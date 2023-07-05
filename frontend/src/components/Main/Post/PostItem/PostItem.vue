<script setup>
  const props = defineProps({
    data: {
      type: Object,
      required: true,
      default: () => {},
    }
  })
</script>

<template>
  <div class="container bg-white h-max mt-10 rounded-lg p-5">
        <div class="flex text-center p-2">
            <div class="flex-initial w-1/2 flex space-x-5">
              <p>{{props.data['userName']}}</p>
            </div>

          <div class="flex-initial w-1/2 text-gray-500">
            <p>5 часов назад</p>
          </div>

          <div class="flex flex-initial w-1/4 space-x-4 text-cyan-500">
            <i class="fa-solid fa-user-plus text-xl"></i>
            <p>Подписаться</p>
          </div>
        </div>
        <router-link :to="{name: 'postId', params: { id: props.data['id']}}">
          <div class="text-left mt-5">
            <p class="text-3xl">{{props.data['title']}}</p>
          </div>

          <div class="text-left mt-2 text-ellipsis whitespace-normal space-y-5">
            {{props.data['body']}}
          </div>
        </router-link>

        <div class="flex h-10 p-2 mt-5">
          <div class="flex-initial flex w-1/6 space-x-4">
            <i class="fa-regular fa-heart text-2xl"></i>
            <p> {{props.data['likes'].length}}</p>
          </div>

          <div class="flex-initial flex w-1/2 space-x-4">
            <i class="fa-regular fa-comment text-2xl"></i>
            <p>{{props.data['comments'].length}}</p>
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
</template>

<style scoped>

</style>