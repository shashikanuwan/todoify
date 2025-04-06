<script setup>
import { ref } from 'vue'
import { useRoute } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'

import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'
import Input from '@/components/ui/input/Input.vue'
import Label from '@/components/ui/label/Label.vue'
import FormError from '@/components/ui/error/FormError.vue'

const route = useRoute()
const authStore = useAuthStore()

const form = ref({
  password: '',
  password_confirmation: '',
  email: route.query.email,
  token: route.params.token,
})
</script>

<template>
  <Card>
    <CardHeader> Password Reset </CardHeader>
    <div class="mx-auto max-w-xl mt-8 sm:mt-12">
      <form @submit.prevent="authStore.handleResetPassword(form)">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <Label for-id="password"> New Password </Label>
            <div class="mt-2.5">
              <Input v-model="form.password" id="password" type="password" />
              <FormError :error="authStore.errors.password" />
            </div>
          </div>

          <div class="sm:col-span-2">
            <Label for-id="confirmPassword"> Confirm Password </Label>
            <div class="mt-2.5">
              <Input v-model="form.password_confirmation" id="confirmPassword" type="password" />
            </div>
          </div>
        </div>
        <div class="mt-10">
          <PrimaryButton type="submit"> Reset </PrimaryButton>
        </div>
      </form>
    </div>
  </Card>
</template>
