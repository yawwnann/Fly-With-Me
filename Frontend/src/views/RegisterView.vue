<template>
  <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
    <div class="bg-white p-8 rounded shadow w-full max-w-sm">
      <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
      <form @submit.prevent="register" class="space-y-4">
        <div>
          <label class="block mb-1 font-medium">Nama:</label>
          <input
            v-model="name"
            type="text"
            required
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
          />
        </div>
        <div>
          <label class="block mb-1 font-medium">Email:</label>
          <input
            v-model="email"
            type="email"
            required
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
          />
        </div>
        <div>
          <label class="block mb-1 font-medium">Password:</label>
          <input
            v-model="password"
            type="password"
            required
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
          />
        </div>
        <button
          type="submit"
          class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition"
        >
          Register
        </button>
      </form>
      <div v-if="error" class="text-red-500 mt-4 text-center">{{ error }}</div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import api from '../api'

const name = ref('')
const email = ref('')
const password = ref('')
const error = ref('')

const register = async () => {
  error.value = ''
  try {
    const res = await api.post('/register', {
      name: name.value,
      email: email.value,
      password: password.value,
    })
    localStorage.setItem('token', res.data.token)
    alert('Register berhasil!')
    // Redirect ke dashboard, dsb
  } catch (e: any) {
    error.value = e.response?.data?.message || 'Register gagal'
  }
}
</script>
