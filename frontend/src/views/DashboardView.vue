<script setup>
import { useAuthStore } from '@/stores/auth.js'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import Card from '@/components/ui/card/Card.vue'
import CreateTask from '@/components/task/CreateTask.vue'
import TaskList from '@/components/task/TaskList.vue'
import { onMounted } from 'vue'

const authStore = useAuthStore()

onMounted(() => {
  if (!authStore.isAuthenticated) authStore.getUser()
})
</script>

<template>
  <div class="text-center text-lg mt-8 font-bold">
    <div v-if="authStore.user" class="text-gray-700 dark:text-gray-300">
      <p>Hi {{ authStore.user.name }}</p>
    </div>
  </div>

  <div class="p-6">
    <Card class="max-w-6xl mx-auto overflow-hidden md:flex p-6">
      <div class="w-full md:w-1/2 mb-8 md:mb-0 md:pr-6">
        <CardHeader size="sm" align="left" customClass="mb-4"> Add a Task </CardHeader>
        <CreateTask />
      </div>

      <div class="w-full md:w-1/2 space-y-4">
        <TaskList />
      </div>
    </Card>
  </div>
</template>
