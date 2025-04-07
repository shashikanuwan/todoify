<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <div class="h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-900">
    <div class="text-center">
      <h1 class="text-6xl font-extrabold text-red-600 dark:text-red-400">500</h1>
      <p class="mt-4 text-xl text-gray-600 dark:text-gray-300">Internal Server Error</p>
      <p class="mt-2 text-gray-500 dark:text-gray-400">
        Something went wrong on our end. Please try again later.
      </p>
      <RouterLink
        to="/"
        class="mt-6 inline-block px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition"
      >
        Back to Home
      </RouterLink>
    </div>
  </div>
</template>

<style scoped></style>
