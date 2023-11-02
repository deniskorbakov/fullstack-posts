<script setup>
import {usePopUpStore} from "../../stores/popUpStore.js";

const popUpStore = usePopUpStore();

const {closePopUpWindow} = popUpStore;
</script>

<template>
  <Transition>
    <div class="absolute top-[200px] right-[10px] bg-red-200 border-2 border-red-500 rounded-lg">
      <div class="relative">
        <div class="absolute top-0 right-0 pr-3 pt-1">
          <button v-on:click="closePopUpWindow">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <div class="px-10 py-5">
          <p class="text-2xl">
            <slot/>
          </p>
        </div>
      </div>
    </div>
  </Transition>
</template>

<style scoped>

</style>