<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'

import CardHeader from '@/components/ui/card/CardHeader.vue'
import Card from '@/components/ui/card/Card.vue'
import Input from '@/components/ui/input/Input.vue'
import Label from '@/components/ui/label/Label.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'
import FormError from '@/components/ui/error/FormError.vue'

const authStore = useAuthStore()
const email = ref()
</script>

<template>
  <Card>
    <CardHeader> Forgot Password </CardHeader>
    <div class="mx-auto max-w-xl mt-8 sm:mt-12">
      <form @submit.prevent="authStore.handleForgotPassword(email)">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <Label for-id="email"> Email </Label>
            <div class="mt-2.5">
              <Input v-model="email" id="email" type="email" />
              <FormError :error="authStore.errors.email" />
            </div>
          </div>
        </div>
        <div class="mt-10">
          <PrimaryButton type="submit"> Submit </PrimaryButton>
        </div>
      </form>
    </div>
  </Card>
</template>
