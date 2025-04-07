<script setup>
import { computed, ref } from 'vue'
import { useTaskStore } from '@/stores/task.js'

import Textarea from '@/components/ui/input/Textarea.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'
import Input from '@/components/ui/input/Input.vue'
import SuccessAlert from '@/components/ui/alert/SuccessAlert.vue'
import FormError from '@/components/ui/error/FormError.vue'

const taskStore = useTaskStore()

const form = ref({
  title: '',
  description: '',
  due_date: '',
})

const dueDateLocal = computed({
  get() {
    if (!form.value.due_date) return ''
    return form.value.due_date.replace(' ', 'T')
  },
  set(value) {
    form.value.due_date = value.replace('T', ' ')
  },
})
</script>

<template>
  <SuccessAlert v-if="taskStore.status" :message="taskStore.status" />
  <form @submit.prevent="taskStore.createTask(form)" class="w-full">
    <div class="mb-4 py-2">
      <Input id="title" v-model="form.title" type="text" autoFocus placeholder="Enter task title" />
      <FormError :error="taskStore.errors.title" />
    </div>

    <div class="mb-4 py-2">
      <Textarea v-model="form.description"></Textarea>
      <FormError :error="taskStore.errors.description" />
    </div>

    <div class="mb-4 py-2">
      <Input id="due_date" v-model="dueDateLocal" type="datetime-local" autoFocus />
      <FormError :error="taskStore.errors.due_date" />
    </div>

    <div class="mt-10">
      <PrimaryButton type="submit"> Add </PrimaryButton>
    </div>
  </form>
</template>
