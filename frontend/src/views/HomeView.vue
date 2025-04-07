<script setup></script>

<template>
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-xl w-full text-center space-y-6">
      <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-400">
        Welcome to <span class="text-lime-500">Todoify</span>
      </h1>
      <p class="text-gray-600 text-lg">
        Organize your tasks with ease. Add your to-dos, mark them done, and stay focused.
      </p>
      <RouterLink to="login">
        <button class="bg-lime-500 hover:bg-lime-600 text-white font-semibold py-2 px-6 rounded-xl shadow">
          Get Started
        </button>
      </RouterLink>
    </div>
  </div>
</template>
