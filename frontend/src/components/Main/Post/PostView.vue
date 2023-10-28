<script setup>
import PostComment from "./PostComment/PostComment.vue";
import {showDeclensionsComments} from '../../../helpers/showDeclensionsComments.js';
import {convertJsonInHtml} from "../../../helpers/convertJsonInHtml.js";
import {ref} from "vue";

const props = defineProps({
  data: {
    type: Object,
    required: true,
    default: () => {}
  }
})

const body = ref(convertJsonInHtml(props.data['body']));
</script>

<template>
  <div class="container bg-white h-max p-14 rounded mt-10">
    <div class="flex text-center">
      <div class="flex-initial w-1/6">
        {{props.data['userName']}}
      </div>

      <div class="flex-initial w-1/4 p-2">
        <p></p>
      </div>

      <div class="flex-initial w-1/2 text-gray-500 p-2">
        <p>5 часов назад</p>
      </div>

      <div class="flex flex-initial w-1/4 space-x-4 text-cyan-500 p-2">
        <i class="fa-solid fa-user-plus text-xl"></i>
        <p>Подписаться</p>
      </div>
    </div>

    <div class="text-left mt-10 p-2">
      <p class="text-3xl">{{props.data['title']}}</p>
    </div>

    <div class="text-left mt-2 text-ellipsis whitespace-normal space-y-5 p-2">
      <div v-html="body"></div>
    </div>

    <div class="flex h-10 p-2 mt-5">
      <div class="flex-initial flex w-1/2 space-x-4">
        <i class="fa-regular fa-heart text-2xl"></i>
        <p>{{props.data['likes'].length}}</p>
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

    <div class="container bg-white h-max p-10 rounded mt-10">
      <div class="flex">
        <div class="flex-initial w-64">
          <p>{{showDeclensionsComments(props.data['comments'].length)}}</p>
        </div>

        <div class="flex-initial w-full text-right">
          <p class="">фильтрация</p>
        </div>
      </div>

      <div class="mt-5">
        <textarea class="bg-gray-900 text-white px-4 py-4 rounded-lg w-full h-32 resize-y outline-none" placeholder="Написать комментарий"></textarea>
      </div>

      <div class="mt-5 text-right">
        <button class="bg-cyan-500 rounded-lg px-4 py-2 hover:bg-cyan-600">Создать Коммент</button>
      </div>

      <PostComment v-for="item in props.data['comments']" :data="item"/>
    </div>
  </div>

</template>

<style scoped>

</style>