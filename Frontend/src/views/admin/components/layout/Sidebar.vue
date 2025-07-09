<template>
  <div>
    <!-- Header for Mobile/Tablet -->
    <header class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white shadow-lg border-b">
      <div class="flex items-center justify-between px-4 py-3">
        <div class="flex items-center gap-3">
          <button
            class="w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 hover:bg-slate-200 transition-colors duration-200"
            @click="toggleSidebar()"
            aria-label="Toggle sidebar"
          >
            <svg
              class="w-5 h-5 text-slate-600"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
          <router-link to="/" class="flex items-center gap-2">
            <img
              src="/src/assets/flywithus.png"
              alt="FlyWithUs Logo"
              class="h-8 w-8 object-contain"
            />
            <span class="text-xl font-bold text-slate-800">ADMIN</span>
          </router-link>
        </div>
        <div class="flex items-center gap-4">
          <span class="text-sm text-slate-600 hidden sm:block">Dashboard Panel</span>
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center">
              <span class="text-white font-semibold text-xs">AD</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Sidebar -->
    <nav
      class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[280px] shadow-xl z-50 transition-all duration-300 bg-gradient-to-b from-slate-900 to-slate-800 lg:translate-x-0"
    >
      <div class="h-full flex flex-col">
        <!-- Header Section -->
        <div class="flex items-center justify-between px-6 py-6 border-b border-slate-700">
          <router-link to="/" class="flex items-center gap-3 group">
            <div class="relative">
              <img
                src="/src/assets/flywithus.png"
                alt="FlyWithUs Logo"
                class="h-12 w-12 object-contain rounded-lg bg-white p-2 shadow-md group-hover:scale-105 transition-transform duration-200"
              />
              <div
                class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-slate-900"
              ></div>
            </div>
            <div class="flex flex-col">
              <span class="text-xl font-bold tracking-wide text-white">ADMIN</span>
              <span class="text-xs text-slate-400">Dashboard Panel</span>
            </div>
          </router-link>
          <button
            class="lg:hidden w-10 h-10 flex items-center justify-center rounded-full hover:bg-slate-700 transition-colors duration-200 text-slate-400 hover:text-white"
            @click="toggleSidebar()"
            aria-label="Close sidebar"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>

        <!-- Navigation Menu -->
        <div class="flex-1 px-4 py-6">
          <div class="mb-6">
            <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3 px-3">
              Main Menu
            </h3>
            <ul class="space-y-2">
              <li>
                <router-link
                  to="/admin"
                  :exact="true"
                  class="group flex items-center gap-3 py-3 px-4 rounded-xl hover:bg-slate-700/50 transition-all duration-200 text-slate-300 hover:text-white"
                  exact-active-class="bg-emerald-600 text-white shadow-lg"
                  active-class="text-white shadow-lg"
                >
                  <svg
                    class="w-5 h-5 group-hover:scale-110 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 5a2 2 0 012-2h4a2 2 0 012 2v0a2 2 0 01-2 2H10a2 2 0 01-2-2v0z"
                    />
                  </svg>
                  <span class="font-medium">Dashboard</span>
                </router-link>
              </li>
              <li>
                <router-link
                  to="/admin/orders"
                  class="group flex items-center gap-3 py-3 px-4 rounded-xl hover:bg-slate-700/50 transition-all duration-200 text-slate-300 hover:text-white"
                  active-class="bg-emerald-600 text-white shadow-lg"
                >
                  <svg
                    class="w-5 h-5 group-hover:scale-110 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                    />
                  </svg>
                  <span class="font-medium">Orders</span>
                  <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full"
                    >3</span
                  >
                </router-link>
              </li>
              <li>
                <router-link
                  to="/admin/portfolios"
                  class="group flex items-center gap-3 py-3 px-4 rounded-xl hover:bg-slate-700/50 transition-all duration-200 text-slate-300 hover:text-white"
                  active-class="bg-emerald-600 text-white shadow-lg"
                >
                  <svg
                    class="w-5 h-5 group-hover:scale-110 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                    />
                  </svg>
                  <span class="font-medium">Portfolios</span>
                </router-link>
              </li>
              <li>
                <router-link
                  to="/admin/users"
                  class="group flex items-center gap-3 py-3 px-4 rounded-xl hover:bg-slate-700/50 transition-all duration-200 text-slate-300 hover:text-white"
                  active-class="bg-emerald-600 text-white shadow-lg"
                >
                  <svg
                    class="w-5 h-5 group-hover:scale-110 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"
                    />
                  </svg>
                  <span class="font-medium">Users</span>
                </router-link>
              </li>
              <li>
                <router-link
                  to="/admin/packages"
                  class="group flex items-center gap-3 py-3 px-4 rounded-xl hover:bg-slate-700/50 transition-all duration-200 text-slate-300 hover:text-white"
                  active-class="bg-emerald-600 text-white shadow-lg"
                >
                  <svg
                    class="w-5 h-5 group-hover:scale-110 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <rect x="3" y="7" width="18" height="13" rx="2" />
                    <path d="M16 3v4M8 3v4" />
                  </svg>
                  <span class="font-medium">Packages</span>
                </router-link>
              </li>
            </ul>
          </div>

          <!-- Quick Actions -->
          <div class="mb-6">
            <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3 px-3">
              Quick Actions
            </h3>
            <div class="space-y-2">
              <button
                class="w-full flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-slate-700/50 transition-all duration-200 text-slate-300 hover:text-white text-sm"
              >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                  />
                </svg>
                <span>New Order</span>
              </button>
              <button
                class="w-full flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-slate-700/50 transition-all duration-200 text-slate-300 hover:text-white text-sm"
              >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                  />
                </svg>
                <span>Analytics</span>
              </button>
            </div>
          </div>
        </div>

        <!-- Footer Section -->
        <div class="p-4 border-t border-slate-700">
          <div class="flex items-center gap-3 p-3 rounded-lg bg-slate-700/50">
            <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center">
              <span class="text-white font-semibold text-sm">AD</span>
            </div>
            <div class="flex-1">
              <p class="text-white text-sm font-medium">Admin User</p>
              <p class="text-slate-400 text-xs">admin@flywithus.com</p>
            </div>
            <button
              class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-600 transition-colors text-slate-400 hover:text-white"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script setup lang="ts">
import { useCounterStore } from '@/stores/counter'

const store = useCounterStore()
const toggleSidebar = () => {}
</script>
