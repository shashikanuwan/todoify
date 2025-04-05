<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <nav class="bg-gray-200 dark:bg-slate-800 text-gray-900 dark:text-gray-50">
    <div class="grid grid-cols-2 container mx-auto gap-4 p-4 justify-content-between">
      <div>
        <h1 class="text-2xl font-bold">Todoify</h1>
      </div>
      <div class="flex flex-row justify-end space-x-2">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </div>
    </div>
  </nav>
</template>

<style scoped></style>
