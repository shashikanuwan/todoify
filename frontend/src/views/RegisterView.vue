<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'

import Input from '@/components/ui/input/Input.vue'
import Label from '@/components/ui/label/Label.vue'
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'
import FormError from '@/components/ui/error/FormError.vue'

const authStore = useAuthStore()

const form = ref({
  name: '',
  email: '',
  password: '',
  conformPassword: '',
})
</script>

<template>
  <Card>
    <CardHeader> Register </CardHeader>

    <div class="mx-auto max-w-xl mt-8 sm:mt-12">
      <form @submit.prevent="authStore.handleRegister(form)">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
          <div class="sm:col-span-2">
            <Label for-id="name"> Name </Label>
            <div class="mt-2.5">
              <Input type="text" v-model="form.name" id="name" />
              <FormError :error="authStore.errors.name" />
            </div>
          </div>

          <div class="sm:col-span-2">
            <Label for-id="email"> Email </Label>
            <div class="mt-2.5">
              <Input type="email" v-model="form.email" id="email" />
              <FormError :error="authStore.errors.email" />
            </div>
          </div>

          <div class="sm:col-span-2">
            <Label for-id="password"> Password </Label>
            <div class="mt-2.5">
              <Input type="password" v-model="form.password" id="password" />
              <FormError :error="authStore.errors.password" />
            </div>
          </div>

          <div class="sm:col-span-2">
            <Label for-id="conform_password"> Conform Password </Label>
            <div class="mt-2.5">
              <Input type="password" v-model="form.conformPassword" id="conform_password" />
            </div>
          </div>
        </div>
        <div class="mt-10">
          <PrimaryButton type="submit"> Register </PrimaryButton>
        </div>
      </form>
    </div>
  </Card>
</template>
