<script setup lang="ts">
import Input from '@/components/ui/input/Input.vue'
import Label from '@/components/ui/label/Label.vue'
import Card from '@/components/ui/card/Card.vue'
import CardHeader from '@/components/ui/card/CardHeader.vue'
import PrimaryButton from '@/components/ui/button/PrimaryButton.vue'
</script>

<template>
  <Card>
    <CardHeader> Register </CardHeader>

    <form class="mx-auto max-w-xl mt-8 sm:mt-12">
      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <Label for-id="name"> Name </Label>
          <div class="mt-2.5">
            <Input type="email" v-model="form.name" id="name" />
          </div>
        </div>

        <div class="sm:col-span-2">
          <Label for-id="email"> Email </Label>
          <div class="mt-2.5">
            <Input type="email" v-model="email" id="email" />
          </div>
        </div>

        <div class="sm:col-span-2">
          <Label for-id="password"> Password </Label>
          <div class="mt-2.5">
            <Input v-model="form.password" id="password" />
          </div>
        </div>

        <div class="sm:col-span-2">
          <Label for-id="conform_password"> Conform Password </Label>
          <div class="mt-2.5">
            <Input name="form.conformPassword" id="conform_password" />
          </div>
        </div>
      </div>
      <div class="mt-10">
        <PrimaryButton> Register </PrimaryButton>
      </div>
    </form>
  </Card>
</template>
