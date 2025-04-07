<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <div class="h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-900">
    <div class="text-center">
      <h1 class="text-6xl font-extrabold text-gray-900 dark:text-white">404</h1>
      <p class="mt-4 text-xl text-gray-600 dark:text-gray-300">Page Not Found</p>
      <p class="mt-2 text-gray-500 dark:text-gray-400">
        Sorry, we couldn't find the page you're looking for.
      </p>
      <RouterLink
        to="/"
        class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition"
      >
        Go Home
      </RouterLink>
    </div>
  </div>
</template>

<style scoped></style>
