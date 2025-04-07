<script setup>
import { ref, onMounted } from 'vue'

const isDark = ref(false)

const applyTheme = () => {
  const html = document.documentElement
  if (isDark.value) {
    html.classList.add('dark')
    localStorage.setItem('theme', 'dark')
  } else {
    html.classList.remove('dark')
    localStorage.setItem('theme', 'light')
  }
}

const toggleTheme = () => {
  isDark.value = !isDark.value
  applyTheme()
}

onMounted(() => {
  isDark.value = localStorage.getItem('theme') === 'dark'
  applyTheme()
})
</script>

<template>
  <button
    @click="toggleTheme"
    class="fixed bottom-4 left-4 bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-2 py-2 md:px-4 md:py-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 sm:hover:scale-105 text-xl sm:text-lg"
  >
    <span v-if="!isDark">🌞</span>
    <span v-else>🌙</span>
  </button>
</template>
