<script setup>
defineProps({
  show: Boolean,
  message: String,
})

defineEmits(['confirm', 'cancel'])
</script>

<template>
  <div
    v-if="show"
    class="fixed inset-0 z-50 flex items-center justify-center bg-white/5 backdrop-blur-sm"
  >
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-[90%] max-w-sm shadow-lg">
      <p class="text-gray-800 dark:text-gray-100 mb-6">{{ message }}</p>
      <div class="flex justify-end space-x-4">
        <button
          @click="$emit('cancel')"
          class="px-4 py-2 rounded bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white hover:bg-gray-400 cursor-pointer"
        >
          Cancel
        </button>
        <button
          @click="$emit('confirm')"
          class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600 cursor-pointer"
        >
          Confirm
        </button>
      </div>
    </div>
  </div>
</template>
