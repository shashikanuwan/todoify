<script setup lang="ts">
defineProps({
  type: { type: String, default: 'text' },
  name: { type: String, required: true },
  id: { type: String, required: true },
  autocomplete: { type: String, default: '' },
  placeholder: { type: String, default: '' },
})
</script>

<template>
  <input
    :type="type"
    :name="name"
    :id="id"
    :autocomplete="autocomplete"
    :placeholder="placeholder"
    class="block w-full rounded-md bg-gray-50 dark:bg-gray-800 px-3.5 py-2 text-base text-gray-900 dark:text-gray-50 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
    v-bind="$attrs"
    v-on="$listeners"
  />
</template>
