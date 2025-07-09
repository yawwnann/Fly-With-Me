<template>
  <nav class="bg-white shadow px-4 py-3 flex items-center justify-between">
    <div class="flex items-center space-x-4">
      <RouterLink to="/" class="font-bold text-lg text-blue-600">DroneApp</RouterLink>
      <RouterLink to="/" class="hover:text-blue-600">Home</RouterLink>
      <RouterLink to="/about" class="hover:text-blue-600">About</RouterLink>
      <RouterLink to="/login" class="hover:text-blue-600">Login</RouterLink>
      <RouterLink to="/register" class="hover:text-blue-600">Register</RouterLink>
      <RouterLink to="/logout" class="hover:text-blue-600">Logout</RouterLink>
    </div>
  </nav>
</template>

<script setup lang="ts">
import { RouterLink } from 'vue-router'
</script>
