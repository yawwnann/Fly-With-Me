<template>
  <div>
    <h1>Logout</h1>
    <button @click="logout">Logout</button>
    <div v-if="message">{{ message }}</div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import api from '../api'

const message = ref('')

const logout = async () => {
  try {
    await api.post('/logout')
    localStorage.removeItem('token')
    message.value = 'Logout berhasil!'
    // Redirect ke login jika perlu
  } catch (e: any) {
    message.value = 'Logout gagal!'
  }
}
</script>
