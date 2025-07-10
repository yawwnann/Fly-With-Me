<template>
  <nav class="bg-white/95 backdrop-blur-lg shadow-lg border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo/Brand -->
        <div class="flex items-center">
          <RouterLink
            to="/"
            class="flex items-center space-x-3 text-2xl font-bold text-green-700 hover:text-green-800 transition-all duration-300 transform hover:scale-105"
          >
            <div
              class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center shadow-lg"
            >
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                />
              </svg>
            </div>
            <span
              class="bg-gradient-to-r from-green-700 to-green-600 bg-clip-text text-transparent"
            >
              FlyWithUs
            </span>
          </RouterLink>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-2">
          <RouterLink
            to="/user/dashboard"
            class="group relative px-4 py-2 rounded-xl text-gray-700 hover:text-green-700 transition-all duration-300 font-medium"
            active-class="text-green-700 bg-green-50"
          >
            <span class="relative z-10">Home</span>
            <div
              class="absolute inset-0 bg-green-50 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"
            ></div>
          </RouterLink>

          <RouterLink
            to="/user/portfolios"
            class="group relative px-4 py-2 rounded-xl text-gray-700 hover:text-green-700 transition-all duration-300 font-medium"
            active-class="text-green-700 bg-green-50"
          >
            <span class="relative z-10">Portfolio</span>
            <div
              class="absolute inset-0 bg-green-50 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"
            ></div>
          </RouterLink>

          <RouterLink
            to="/user/orders"
            class="group relative px-4 py-2 rounded-xl text-gray-700 hover:text-green-700 transition-all duration-300 font-medium"
            active-class="text-green-700 bg-green-50"
          >
            <span class="relative z-10">Orders</span>
            <div
              class="absolute inset-0 bg-green-50 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"
            ></div>
          </RouterLink>

          <RouterLink
            to="/about"
            class="group relative px-4 py-2 rounded-xl text-gray-700 hover:text-green-700 transition-all duration-300 font-medium"
            active-class="text-green-700 bg-green-50"
          >
            <span class="relative z-10">About</span>
            <div
              class="absolute inset-0 bg-green-50 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"
            ></div>
          </RouterLink>

          <!-- Profile Dropdown -->
          <div class="relative pl-4 ml-4 border-l border-gray-200">
            <button
              @click="toggleProfileDropdown"
              class="flex items-center space-x-2 p-2 rounded-xl text-gray-700 hover:text-green-700 hover:bg-green-50 transition-all duration-300 font-medium"
            >
              <div
                class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center shadow-sm"
              >
                <svg
                  class="w-5 h-5 text-white"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                  />
                </svg>
              </div>
              <svg
                class="w-4 h-4 transition-transform duration-300"
                :class="isProfileDropdownOpen ? 'rotate-180' : ''"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </button>

            <!-- Profile Dropdown Menu -->
            <Transition
              enter-active-class="transition duration-200 ease-out"
              enter-from-class="transform scale-95 opacity-0"
              enter-to-class="transform scale-100 opacity-100"
              leave-active-class="transition duration-150 ease-in"
              leave-from-class="transform scale-100 opacity-100"
              leave-to-class="transform scale-95 opacity-0"
            >
              <div
                v-if="isProfileDropdownOpen"
                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-1 z-50"
              >
                <RouterLink
                  to="/user/profile"
                  class="flex items-center space-x-3 px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-700 transition-colors duration-200"
                  @click="closeProfileDropdown"
                >
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                  </svg>
                  <span>Profile</span>
                </RouterLink>

                <div class="border-t border-gray-100 my-1"></div>

                <RouterLink
                  to="/logout"
                  class="flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200"
                  @click="closeProfileDropdown"
                >
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                    />
                  </svg>
                  <span>Logout</span>
                </RouterLink>
              </div>
            </Transition>
          </div>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button
            @click="toggleMenu"
            class="relative inline-flex items-center justify-center p-2 rounded-xl text-gray-700 hover:text-green-700 hover:bg-green-50 transition-all duration-300 transform hover:scale-105"
          >
            <div class="w-6 h-6 relative">
              <span
                class="absolute block w-6 h-0.5 bg-current transition-all duration-300"
                :class="isMenuOpen ? 'rotate-45 top-2.5' : 'top-1'"
              ></span>
              <span
                class="absolute block w-6 h-0.5 bg-current transition-all duration-300 top-2.5"
                :class="isMenuOpen ? 'opacity-0' : 'opacity-100'"
              ></span>
              <span
                class="absolute block w-6 h-0.5 bg-current transition-all duration-300"
                :class="isMenuOpen ? '-rotate-45 top-2.5' : 'top-4'"
              ></span>
            </div>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation -->
      <Transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-200 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <div v-if="isMenuOpen" class="md:hidden">
          <div
            class="px-2 pt-2 pb-3 space-y-1 bg-white/95 backdrop-blur-lg rounded-2xl mt-2 shadow-xl border border-gray-100"
          >
            <RouterLink
              to="/user/dashboard"
              class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-green-700 hover:bg-green-50 transition-all duration-300 font-medium"
              active-class="text-green-700 bg-green-50"
              @click="closeMenu"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                />
              </svg>
              <span>Home</span>
            </RouterLink>

            <RouterLink
              to="/user/portfolios"
              class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-green-700 hover:bg-green-50 transition-all duration-300 font-medium"
              active-class="text-green-700 bg-green-50"
              @click="closeMenu"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                />
              </svg>
              <span>Portfolio</span>
            </RouterLink>

            <RouterLink
              to="/user/orders"
              class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-green-700 hover:bg-green-50 transition-all duration-300 font-medium"
              active-class="text-green-700 bg-green-50"
              @click="closeMenu"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                />
              </svg>
              <span>Orders</span>
            </RouterLink>

            <RouterLink
              to="/user/profile"
              class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-green-700 hover:bg-green-50 transition-all duration-300 font-medium"
              active-class="text-green-700 bg-green-50"
              @click="closeMenu"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                />
              </svg>
              <span>Profile</span>
            </RouterLink>

            <RouterLink
              to="/about"
              class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-green-700 hover:bg-green-50 transition-all duration-300 font-medium"
              active-class="text-green-700 bg-green-50"
              @click="closeMenu"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <span>About</span>
            </RouterLink>

            <div class="border-t border-gray-200 pt-2 mt-2">
              <RouterLink
                to="/logout"
                class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-red-600 hover:text-red-700 hover:bg-red-50 transition-all duration-300 font-medium"
                @click="closeMenu"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                  />
                </svg>
                <span>Logout</span>
              </RouterLink>
            </div>
          </div>
        </div>
      </Transition>
    </div>
  </nav>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import { RouterLink } from 'vue-router'

const isMenuOpen = ref(false)
const isProfileDropdownOpen = ref(false)

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}

const closeMenu = () => {
  isMenuOpen.value = false
}

const toggleProfileDropdown = () => {
  isProfileDropdownOpen.value = !isProfileDropdownOpen.value
}

const closeProfileDropdown = () => {
  isProfileDropdownOpen.value = false
}

// Close dropdown when clicking outside
const handleClickOutside = (event: Event) => {
  const target = event.target as HTMLElement
  if (!target.closest('.relative') && isProfileDropdownOpen.value) {
    closeProfileDropdown()
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)
})

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside)
})
</script>
