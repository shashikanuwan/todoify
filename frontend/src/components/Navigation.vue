<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <nav class="bg-gray-200 dark:bg-slate-800 text-gray-900 dark:text-gray-50">
    <div class="grid grid-cols-2 container mx-auto gap-4 p-4 justify-content-between">
      <div>
        <RouterLink to="/">
          <h1 class="text-2xl font-bold">Todoify</h1>
        </RouterLink>
      </div>
      <div class="flex flex-row justify-end space-x-2">
        <RouterLink to="/login">Login</RouterLink>
        <RouterLink to="/register">Register</RouterLink>
        <RouterLink to="/dashboard">Dashboard</RouterLink>
      </div>
    </div>
  </nav>
</template>
