<script setup>
import { useTaskStore } from '@/stores/task.js'
import { onMounted } from 'vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'

const taskStore = useTaskStore()

onMounted(() => {
  taskStore.fetchTasks()
})
</script>

<template>
  <div class="max-h-[500px] overflow-y-auto space-y-4">
    <div v-for="task in taskStore.tasks" :key="task.id">
      <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-md shadow">
        <div class="mb-4 text-gray-700 dark:text-gray-50">
          <span class="text-sm">{{ task.due_date }}</span>
        </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 justify-items-stretch">
          <div class="">
            <h3 class="font-bold text-gray-800 dark:text-white">{{ task.title }}</h3>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ task.description }}</p>
          </div>
          <div class="justify-self-end">
            <PrimaryButton @click="taskStore.completeTask(task.id)">Done</PrimaryButton>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
