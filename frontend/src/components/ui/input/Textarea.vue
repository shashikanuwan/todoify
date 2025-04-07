<script setup>
import Input from '@/components/ui/input/Input.vue'
import { defineEmits } from 'vue'

defineProps({
  modelValue: {
    type: [String, Number],
    default: '',
  },
  placeholder: {
    type: String,
    default: '',
  },
  rows: {
    type: Number,
    default: 4,
  },
  required: {
    type: Boolean,
    default: true,
  },
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
  <textarea
    :placeholder="placeholder"
    :rows="rows"
    :value="modelValue"
    @input="(event) => emit('update:modelValue', event.target.value)"
    :required="required"
    class="block w-full rounded-md bg-gray-50 dark:bg-gray-800 px-3.5 py-2 text-base text-gray-900 dark:text-gray-50 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
  >
  </textarea>
</template>
