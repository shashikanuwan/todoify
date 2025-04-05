<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'

import Input from '@/components/ui/input/Input.vue'
import Label from '@/components/ui/label/Label.vue'
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'

const authStore = useAuthStore()

const form = ref({
  email: '',
  password: '',
})
</script>

<template>
  <Card>
    <CardHeader> Login </CardHeader>

    <div class="mx-auto max-w-xl mt-8 sm:mt-12">
      <form @submit.prevent="authStore.handleLogin(form)">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <Label for-id="email"> Email </Label>
            <div class="mt-2.5">
              <Input v-model="form.email" id="email" type="email" />
            </div>
          </div>

          <div class="sm:col-span-2">
            <Label for-id="password"> Password </Label>
            <div class="mt-2.5">
              <Input v-model="form.password" id="password" type="password" />
            </div>
          </div>
        </div>
        <div class="mt-10">
          <PrimaryButton> Login </PrimaryButton>
        </div>
      </form>
    </div>
  </Card>
</template>
