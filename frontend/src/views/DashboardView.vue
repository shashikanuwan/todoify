<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'

const user = ref()
onMounted(async () => {
  const data = await axios.get('/api/user')
  user.value = data.data
  console.log(user.value)
})
</script>

<template>
  <div>
    <h1 class="text-lime-500">User Info</h1>

    <div v-if="user" class="text-gray-50">
      <p>User ID: {{ user.id }}</p>
      <p>User Name: {{ user.name }}</p>
      <p>User Email: {{ user.email }}</p>
    </div>
    <div v-else>
      <p>Loading...</p>
    </div>
  </div>
</template>
