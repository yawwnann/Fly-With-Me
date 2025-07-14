<template>
  <div class="min-h-screen p-4 sm:p-6 lg:p-8 font-sans">
    <div class="max-w-3xl mx-auto">
      <h1 class="text-3xl font-bold mb-6">Riwayat Pesanan</h1>
      <div v-if="loading" class="text-center py-20 text-gray-500">Memuat data pesanan...</div>
      <div v-else-if="error" class="text-center py-20 text-red-500">{{ error }}</div>
      <div v-else>
        <div v-if="orders.length === 0" class="text-center py-20 text-gray-400">
          Belum ada pesanan.
        </div>
        <div v-else class="space-y-6">
          <div
            v-for="order in orders"
            :key="order.id"
            class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4 border border-gray-100"
          >
            <div>
              <div class="font-semibold text-lg">{{ order.package?.name || '-' }}</div>
              <div class="text-gray-500 text-sm">Tanggal: {{ formatDate(order.date) }}</div>
              <div class="text-gray-500 text-sm">Lokasi: {{ order.location }}</div>
              <div class="text-gray-500 text-sm">Catatan: {{ order.notes || '-' }}</div>
            </div>
            <div class="flex flex-col items-end gap-2">
              <span :class="statusClass(order.payment_status)">{{ order.payment_status }}</span>
              <span :class="orderStatusClass(order.status)">{{ order.status }}</span>
              <div class="text-lg font-bold text-emerald-700 mt-2">
                Rp {{ formatPrice(order.total_price) }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import api from '@/api'

interface Order {
  id: number
  package?: { name: string }
  date: string
  location: string
  notes: string
  payment_status: string
  status: string
  total_price: number
}

const orders = ref<Order[]>([])
const loading = ref(true)
const error = ref('')

onMounted(async () => {
  loading.value = true
  error.value = ''
  try {
    const res = await api.get('/orders')
    orders.value = res.data.data || res.data
  } catch (e: any) {
    error.value = e?.response?.data?.message || 'Gagal memuat data pesanan.'
  } finally {
    loading.value = false
  }
})

function formatDate(date: string) {
  return new Date(date).toLocaleDateString('id-ID', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
  })
}
function formatPrice(price: number) {
  return price.toLocaleString('id-ID')
}
function statusClass(status: string) {
  if (status === 'paid')
    return 'bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold'
  if (status === 'unpaid')
    return 'bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold'
  if (status === 'pending')
    return 'bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold'
  return 'bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold'
}
function orderStatusClass(status: string) {
  if (status === 'completed')
    return 'bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-semibold'
  if (status === 'pending')
    return 'bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold'
  if (status === 'cancelled')
    return 'bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-semibold'
  return 'bg-gray-50 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold'
}
</script>
