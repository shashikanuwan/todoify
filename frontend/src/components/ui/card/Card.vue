<script setup lang="ts">
defineProps({
  customClass: {
    type: String,
    default: '',
  },
})
</script>

<template>
  <div
    :class="
      customClass ||
      'mx-auto bg-white dark:bg-gray-800 max-w-2xl mt-8 px-6 py-6 rounded-lg shadow-md'
    "
  >
    <slot />
  </div>
</template>
