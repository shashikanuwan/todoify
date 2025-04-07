import { defineStore } from 'pinia'
import axios from 'axios'

export const useTaskStore = defineStore('task', {
  state: () => ({
    tasks: [],
    taskErrors: [],
    taskStatus: null,
  }),
  getters: {
    allTasks: (state) => state.tasks,
    errors: (state) => state.taskErrors,
    status: (state) => state.taskStatus,
  },
  actions: {
    async createTask(data) {
      this.taskErrors = []
      try {
        const response = await axios.post('/api/tasks', {
          title: data.title,
          description: data.description,
          due_date: data.due_date,
        })
        this.taskStatus = response.data.status
        await this.fetchTasks()
        setTimeout(() => {
          this.taskStatus = null
        }, 4000)
      } catch (error) {
        if (error.response.status === 422) {
          this.taskErrors = error.response.data.errors
        } else {
          this.taskErrors = ['Failed to create task']
        }
      }
    },
    async fetchTasks() {
      const response = await axios.get('/api/tasks')
      this.tasks = response.data
    },
    async completeTask(taskId) {
      this.taskErrors = []
      try {
        const response = await axios.patch(`/api/tasks/${taskId}/complete`)
        this.taskStatus = response.data.status
        await this.fetchTasks()
      } catch (error) {
        if (error.response.status === 422) {
          this.taskErrors = error.response.data.errors
        } else {
          this.taskErrors = ['Failed to complete task']
        }
      }
    },
  },
})
