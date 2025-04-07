import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authUser: null,
    authErrors: [],
    authStatus: null,
    isLoggedIn: false,
  }),
  getters: {
    user: (state) => state.authUser,
    errors: (state) => state.authErrors,
    status: (state) => state.authStatus,
    isAuthenticated: (state) => state.isLoggedIn,
  },
  actions: {
    async getToken() {
      await axios.get('/sanctum/csrf-cookie')
    },
    async getUser() {
      const data = await axios.get('/api/user')
      this.authUser = data.data
      this.isLoggedIn = true
    },
    async handleLogin(data) {
      this.authErrors = []
      await this.getToken()
      try {
        await axios.post('/login', {
          email: data.email,
          password: data.password,
        })
        await this.getUser()
        await this.router.push('/dashboard')
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors
        } else {
          this.authErrors = ['Invalid credentials']
        }
      }
    },
    async handleRegister(data) {
      this.authErrors = []
      await this.getToken()
      try {
        await axios.post('/register', {
          name: data.name,
          email: data.email,
          password: data.password,
          password_confirmation: data.conformPassword,
        })
        await this.getUser()
        await this.router.push('/dashboard')
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors
        } else {
          this.authErrors = ['Invalid credentials']
        }
      }
    },
    async handleLogout() {
      await axios.post('/logout')
      this.authUser = null
      this.isLoggedIn = false
      await this.router.push('/')
    },
    async handleForgotPassword(email) {
      this.authErrors = []
      await this.getToken()
      try {
        const response = await axios.post('/forgot-password', {
          email: email,
        })
        this.authStatus = response.data.status
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors
        } else {
          this.authErrors = ['Invalid credentials']
        }
      }
    },
    async handleResetPassword(data) {
      this.authErrors = []
      await this.getToken()
      try {
        const response = await axios.post('/reset-password', data)
        await this.router.push('/login')
        this.authStatus = response.data.status
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors
        } else {
          this.authErrors = ['Invalid credentials']
        }
      }
    },
    async clearMessages() {
      this.authErrors = []
      this.authStatus = null
    },
  },
  persist: {
    storage: sessionStorage,
    pick: ['authUser', 'isLoggedIn'],
  },
})
