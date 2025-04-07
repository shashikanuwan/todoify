<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'

import Input from '@/components/ui/input/Input.vue'
import Label from '@/components/ui/label/Label.vue'
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'
import FormError from '@/components/ui/error/FormError.vue'
import SuccessAlert from '@/components/ui/alert/SuccessAlert.vue'

const authStore = useAuthStore()

const form = ref({
  email: '',
  password: '',
})
</script>

<template>
  <Card>
    <CardHeader> Login </CardHeader>
    <SuccessAlert v-if="authStore.status" :message="authStore.status" />

    <div class="mx-auto max-w-xl mt-8 sm:mt-10">
      <form @submit.prevent="authStore.handleLogin(form)">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <Label for-id="email"> Email </Label>
            <div class="mt-2.5">
              <Input v-model="form.email" id="email" type="email" />
              <FormError :error="authStore.errors.email" />
            </div>
          </div>

          <div class="sm:col-span-2">
            <Label for-id="password"> Password </Label>
            <div class="mt-2.5">
              <Input v-model="form.password" id="password" type="password" />
              <FormError :error="authStore.errors.password" />
            </div>
          </div>
        </div>
        <div class="flex flex-row items-center justify-between mt-10">
          <PrimaryButton type="submit"> Login </PrimaryButton>
          <router-link to="forgot-password" class="text-gray-700 dark:text-gray-50">
            Forgot Password?
          </router-link>
        </div>
      </form>
    </div>
  </Card>
</template>
