import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authUser: null,
    authErrors: [],
  }),
  getters: {
    user: (state) => state.authUser,
    errors: (state) => state.authErrors,
  },
  actions: {
    async getToken() {
      await axios.get('/sanctum/csrf-cookie')
    },
    async getUser() {
      await this.getToken()
      const data = await axios.get('/api/user')
      this.authUser = data.data
    },
    async handleLogin(data) {
      this.authErrors = []
      await this.getToken()
      try {
        await axios.post('/login', {
          email: data.email,
          password: data.password,
        })
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
      await this.router.push('/')
    },
    async handleForgotPassword(email) {
      this.authErrors = []
      await this.getToken()
      try {
        await axios.post('/forgot-password', {
          email: email,
        })
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
        await axios.post('/reset-password', {
          email: data.email,
          password: data.password,
          password_confirmation: data.conformPassword,
          token: data.token,
        })
        await this.router.push('/login')
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors
        } else {
          this.authErrors = ['Invalid credentials']
        }
      }
    },
  },
})
