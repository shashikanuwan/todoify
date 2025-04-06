<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps({
  type: {
    type: String,
    default: 'button',
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  loading: {
    type: Boolean,
    default: false,
  },
  customClass: {
    type: String,
    default: '',
  },
  size: {
    type: String,
    default: 'md',
    validator: (value: string) => ['sm', 'md', 'lg'].includes(value),
  },
})

const sizeClasses = computed(() => {
  switch (props.size) {
    case 'sm':
      return 'px-3 py-1.5 text-sm'
    case 'lg':
      return 'px-6 py-3 text-base'
    default:
      return 'px-4 py-2 text-sm'
  }
})

const classes = computed(() => {
  return [
    'block rounded-md text-center font-semibold shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2 cursor-pointer transition-all duration-200 ease-in-out',
    props.disabled || props.loading
      ? 'bg-gray-400 cursor-not-allowed'
      : 'bg-indigo-600 hover:bg-indigo-500 focus-visible:outline-indigo-600',
    'text-white',
    sizeClasses.value,
    props.customClass,
  ].join(' ')
})
</script>

<template>
  <button :type="type" :disabled="disabled || loading" :class="classes">
    <slot />
  </button>
</template>
