<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps({
  customClass: {
    type: String,
    default: '',
  },
  align: {
    type: String,
    default: 'center',
    validator: (value: string) => ['left', 'center', 'right'].includes(value),
  },
  size: {
    type: String,
    default: 'md',
    validator: (value: string) => ['sm', 'md', 'lg'].includes(value),
  },
})

const alignClass = computed(() => {
  switch (props.align) {
    case 'left':
      return 'text-left'
    case 'right':
      return 'text-right'
    default:
      return 'text-center'
  }
})

const sizeClass = computed(() => {
  switch (props.size) {
    case 'sm':
      return 'text-lg sm:text-xl'
    case 'lg':
      return 'text-2xl sm:text-4xl'
    default:
      return 'text-xl sm:text-3xl'
  }
})

const classes = computed(() => {
  return [
    'font-semibold tracking-tight text-balance text-gray-900 dark:text-gray-50',
    alignClass.value,
    sizeClass.value,
    props.customClass,
  ].join(' ')
})
</script>

<template>
  <h2 :class="classes">
    <slot />
  </h2>
</template>
