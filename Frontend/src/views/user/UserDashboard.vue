<template>
  <UserNavbar />
  <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50">
    <div class="bg-white p-8 rounded shadow w-full max-w-lg">
      <h1 class="text-3xl font-bold mb-4 text-center text-green-700">User Dashboard</h1>
      <p class="text-center text-gray-600">
        Selamat datang di halaman user. Silakan akses layanan dan fitur user di sini.
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import UserNavbar from '@/components/UserNavbar.vue'
</script>
