<script setup>
defineProps({
  error: {
    type: [String, Array],
    required: false,
    default: null,
  },
})
</script>

<template>
  <div v-if="error">
    <span class="mt-1 text-sm text-red-400 dark:text-red-400">
      {{ Array.isArray(error) ? error[0] : error }}
    </span>
  </div>
</template>
