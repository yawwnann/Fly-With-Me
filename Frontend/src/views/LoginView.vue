<template>
  <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
    <div class="bg-white p-8 rounded shadow w-full max-w-sm">
      <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
      <form @submit.prevent="login" class="space-y-4">
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
          class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
        >
          Login
        </button>
      </form>
      <div v-if="error" class="text-red-500 mt-4 text-center">{{ error }}</div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import api from '../api'

const email = ref('')
const password = ref('')
const error = ref('')
const router = useRouter()

const login = async () => {
  error.value = ''
  try {
    const res = await api.post('/login', {
      email: email.value,
      password: password.value,
    })
    localStorage.setItem('token', res.data.token)
    // Redirect sesuai role
    const role = res.data.user.role
    if (role === 'admin') {
      router.push('/admin')
    } else {
      router.push('/user')
    }
  } catch (e: any) {
    error.value = e.response?.data?.error || 'Login gagal'
  }
}
</script>
