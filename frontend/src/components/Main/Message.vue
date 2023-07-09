<script setup>
const props = defineProps({
  data: {
    type: Object,
    required: true,
    default:  {}
  }
})
</script>

<template>
  <div class="text-center text-red-500">
    {{props.data['message']}}
  </div>
</template>

<style scoped>

</style>