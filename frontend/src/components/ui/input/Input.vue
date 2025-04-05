<script setup>
import { defineProps, defineEmits } from 'vue'

defineProps({
  modelValue: {
    type: [String, Number],
    required: true,
  },
  type: {
    type: String,
    default: 'text',
  },
  id: {
    type: String,
    required: true,
  },
  autocomplete: {
    type: String,
    default: '',
  },
  placeholder: {
    type: String,
    default: '',
  },
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
  <input
    :type="type"
    :id="id"
    :model-value="modelValue"
    @input="(event) => emit('update:modelValue', event.target.value)"
    class="block w-full rounded-md bg-gray-50 dark:bg-gray-800 px-3.5 py-2 text-base text-gray-900 dark:text-gray-50 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
    v-bind="$attrs"
    :autocomplete="autocomplete"
    :placeholder="placeholder"
  />
</template>
