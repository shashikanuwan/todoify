<script setup>
defineProps({
  forId: { type: String, required: true },
  required: { type: Boolean, default: true },
})
</script>

<template>
  <label :for-id="forId" class="block text-sm/6 font-semibold text-gray-900 dark:text-gray-50">
    <slot />
    <span v-if="required" class="text-red-500"><sup>*</sup></span>
  </label>
</template>
