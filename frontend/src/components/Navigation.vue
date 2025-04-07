<script setup>
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'

const authStore = useAuthStore()
</script>

<template>
  <nav class="bg-gray-200 dark:bg-slate-800 text-gray-900 dark:text-gray-50">
    <div class="grid grid-cols-2 container mx-auto gap-4 p-4 justify-content-between">
      <div>
        <RouterLink to="/">
          <h1 class="text-2xl font-bold">Todoify</h1>
        </RouterLink>
      </div>
      <div class="flex flex-row justify-end items-center space-x-2">
        <template v-if="!authStore.isAuthenticated">
          <RouterLink to="login">Login</RouterLink>
          <RouterLink to="register">Register</RouterLink>
        </template>

        <template v-else>
          <RouterLink to="dashboard">Dashboard</RouterLink>
          <PrimaryButton @click="authStore.handleLogout">Logout</PrimaryButton>
        </template>
      </div>
    </div>
  </nav>
</template>
