<script setup>
import { onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth.js'

const authStore = useAuthStore()

onMounted(async () => {
  await authStore.getUser()
})
</script>

<template>
  <div>
    <h1 class="text-lime-500">User Info</h1>

    <div v-if="authStore.user" class="text-gray-50">
      <p>User ID: {{ authStore.user.id }}</p>
      <p>User Name: {{ authStore.user.name }}</p>
      <p>User Email: {{ authStore.user.email }}</p>
    </div>

    <div v-else>
      <p>Please Login</p>
    </div>
  </div>
</template>
