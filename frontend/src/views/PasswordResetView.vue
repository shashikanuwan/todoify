<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'

import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'
import Input from '@/components/ui/input/Input.vue'
import Label from '@/components/ui/label/Label.vue'

const authStore = useAuthStore()

const form = ref({
  password: '',
  confirmPassword: '',
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
            </div>
          </div>

          <div class="sm:col-span-2">
            <Label for-id="confirmPassword"> Confirm Password </Label>
            <div class="mt-2.5">
              <Input v-model="form.confirmPassword" id="confirmPassword" type="password" />
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
