<script setup>
import Navigation from '@/components/Navigation.vue'
import {useRoute} from "vue-router";
import {useAuthStore} from "@/stores/auth.js";
import {watch} from "vue";

const route = useRoute()
const authStore = useAuthStore()

watch(
    () => route.path,
    () => {
      authStore.clearMessages()
    }
)
</script>

<template>
  <main>
    <header>
      <Navigation />
    </header>

    <RouterView />
  </main>
</template>

<style scoped></style>
