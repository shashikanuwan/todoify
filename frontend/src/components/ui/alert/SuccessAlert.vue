<script setup>
defineProps({
  message: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <div
    class="mt-6 rounded-lg border border-green-300 bg-green-100 text-green-800 px-4 py-3 text-sm shadow-md dark:bg-green-900 dark:text-green-100 dark:border-green-700"
  >
    <div class="flex items-start space-x-2">
      <p class="font-medium leading-snug">
        {{ message }}
      </p>
    </div>
  </div>
</template>
