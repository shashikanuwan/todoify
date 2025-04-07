import axios from 'axios'
import router from '@/router/index.js'
import { useAuthStore } from '@/stores/auth.js'

axios.defaults.withCredentials = true
axios.defaults.withXSRFToken = true
axios.defaults.baseURL = 'http://localhost:8000'
axios.interceptors.response.use(
  (response) => response,
  async (error) => {
    const authStore = useAuthStore()
    switch (error.response.status) {
      case 401:
        await authStore.cleanState()
        await router.push('/login')
        break
      case 404:
        await router.push('/404')
        console.error('Resource not found')
        break
      case 419:
        await authStore.cleanState()
        await router.push('/login')
        break
      case 500:
        await router.push('/500')
        console.error('Server error')
        break
      default:
        console.error('Unhandled error', error)
    }

    return Promise.reject(error)
  },
)
