<script setup>
  defineProps({
    modelValue: {
      type: String,
      default: "",
    },
  })
</script>

<template>
  <input
    class="rounded-lg bg-gray-900 px-10 py-4 text-white"
    style="outline:none;"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
  >
</template>

<style scoped>

</style>