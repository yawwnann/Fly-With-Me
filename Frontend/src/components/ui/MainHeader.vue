<template>
  <header
    :class="[
      'fixed top-0 left-0 w-full z-50 transition-all duration-300',
      isScrolled ? 'bg-white shadow' : 'bg-transparent',
    ]"
  >
    <nav
      class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8 transition-colors duration-300"
      aria-label="Global"
    >
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5 flex items-center gap-2">
          <span class="sr-only">DronePro</span>
          <img
            :src="isScrolled ? logoBlack : logoWhite"
            alt="FlyWithUs Logo"
            class="h-8 w-auto transition-all duration-300"
          />
        </a>
      </div>
      <div class="flex lg:hidden">
        <button
          type="button"
          class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5"
          :class="isScrolled ? 'text-gray-700' : 'text-white'"
          @click="mobileMenuOpen = true"
        >
          <span class="sr-only">Open main menu</span>
          <Bars3Icon
            class="size-6 transition-colors duration-300"
            :class="isScrolled ? 'text-gray-700' : 'text-white'"
            aria-hidden="true"
          />
        </button>
      </div>
      <PopoverGroup class="hidden lg:flex lg:gap-x-8">
        <a
          href="#"
          :class="[
            isScrolled ? 'text-gray-900 hover:text-blue-600' : 'text-white hover:text-blue-200',
            'text-sm font-medium transition-colors duration-300',
          ]"
          >Beranda</a
        >
        <Popover class="relative">
          <PopoverButton
            :class="[
              isScrolled ? 'text-gray-900 hover:text-blue-600' : 'text-white hover:text-blue-200',
              'flex items-center gap-x-1 text-sm font-medium transition-colors duration-300',
            ]"
          >
            Layanan
            <ChevronDownIcon
              class="size-5 flex-none transition-colors duration-300"
              :class="isScrolled ? 'text-gray-400' : 'text-white'"
              aria-hidden="true"
            />
          </PopoverButton>
          <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0 translate-y-1"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-1"
          >
            <PopoverPanel
              class="absolute left-1/2 z-10 mt-3 w-56 -translate-x-1/2 overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-900/5"
            >
              <div class="py-2">
                <a href="#" class="block px-6 py-3 text-sm text-gray-900 hover:bg-gray-50"
                  >Videografi Udara</a
                >
                <a href="#" class="block px-6 py-3 text-sm text-gray-900 hover:bg-gray-50"
                  >Fotografi Udara</a
                >
                <a href="#" class="block px-6 py-3 text-sm text-gray-900 hover:bg-gray-50"
                  >Sewa Drone & Pilot</a
                >
              </div>
            </PopoverPanel>
          </transition>
        </Popover>
        <a
          href="#"
          :class="[
            isScrolled ? 'text-gray-900 hover:text-blue-600' : 'text-white hover:text-blue-200',
            'text-sm font-medium transition-colors duration-300',
          ]"
          >Portfolio</a
        >
        <a
          href="#"
          :class="[
            isScrolled ? 'text-gray-900 hover:text-blue-600' : 'text-white hover:text-blue-200',
            'text-sm font-medium transition-colors duration-300',
          ]"
          >Testimoni</a
        >
        <a
          href="#"
          :class="[
            isScrolled ? 'text-gray-900 hover:text-blue-600' : 'text-white hover:text-blue-200',
            'text-sm font-medium transition-colors duration-300',
          ]"
          >FAQ</a
        >
        <a
          href="#"
          :class="[
            isScrolled ? 'text-gray-900 hover:text-blue-600' : 'text-white hover:text-blue-200',
            'text-sm font-medium transition-colors duration-300',
          ]"
          >Kontak</a
        >
      </PopoverGroup>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-3">
        <template v-if="userName">
          <Popover class="relative">
            <PopoverButton class="flex items-center gap-2 outline-none">
              <UserCircleIcon
                :class="[
                  isScrolled ? 'text-gray-900' : 'text-white',
                  'w-7 h-7 transition-colors duration-300',
                ]"
              />
              <span
                :class="[
                  isScrolled ? 'text-gray-900' : 'text-white',
                  'text-sm font-semibold transition-colors duration-300',
                ]"
                >{{ userName }}</span
              >
            </PopoverButton>
            <transition
              enter-active-class="transition ease-out duration-200"
              enter-from-class="opacity-0 translate-y-1"
              enter-to-class="opacity-100 translate-y-0"
              leave-active-class="transition ease-in duration-150"
              leave-from-class="opacity-100 translate-y-0"
              leave-to-class="opacity-0 translate-y-1"
            >
              <PopoverPanel
                class="absolute right-0 z-20 mt-2 w-40 rounded-xl bg-white shadow-lg ring-1 ring-gray-900/5 py-2"
              >
                <button
                  @click="logout"
                  class="w-full text-left px-5 py-3 text-sm text-gray-700 hover:bg-gray-100 rounded-xl transition"
                >
                  Logout
                </button>
              </PopoverPanel>
            </transition>
          </Popover>
        </template>
        <template v-else>
          <a
            href="#"
            :class="[
              isScrolled ? 'text-gray-900 hover:text-blue-600' : 'text-white hover:text-blue-200',
              'text-sm font-semibold transition-colors duration-300',
            ]"
            >Login / Daftar <span aria-hidden="true">&rarr;</span></a
          >
        </template>
      </div>
    </nav>
    <!-- Mobile menu -->
    <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
      <div class="fixed inset-0 z-50" />
      <DialogPanel
        class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
      >
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5 flex items-center gap-2">
            <span class="sr-only">DronePro</span>
            <svg
              class="h-8 w-8 text-blue-600"
              fill="none"
              viewBox="0 0 32 32"
              stroke="currentColor"
              stroke-width="2"
            >
              <circle cx="16" cy="16" r="7" stroke="currentColor" stroke-width="2" fill="white" />
              <circle cx="16" cy="16" r="3" fill="currentColor" />
              <rect x="2" y="15" width="7" height="2" rx="1" fill="currentColor" />
              <rect x="23" y="15" width="7" height="2" rx="1" fill="currentColor" />
              <rect x="15" y="2" width="2" height="7" rx="1" fill="currentColor" />
              <rect x="15" y="23" width="2" height="7" rx="1" fill="currentColor" />
            </svg>
            <span class="font-bold text-xl text-gray-900">DronePro</span>
          </a>
          <button
            type="button"
            class="-m-2.5 rounded-md p-2.5 text-gray-700"
            @click="mobileMenuOpen = false"
          >
            <span class="sr-only">Close menu</span>
            <XMarkIcon class="size-6" aria-hidden="true" />
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-200">
            <div class="space-y-2 py-6">
              <a
                href="#"
                class="block rounded-lg px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50"
                >Beranda</a
              >
              <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                <DisclosureButton
                  class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base font-medium text-gray-900 hover:bg-gray-50"
                >
                  Layanan
                  <ChevronDownIcon
                    :class="[open ? 'rotate-180' : '', 'size-5 flex-none']"
                    aria-hidden="true"
                  />
                </DisclosureButton>
                <DisclosurePanel class="mt-2 space-y-2">
                  <a
                    href="#"
                    class="block rounded-lg py-2 pr-3 pl-6 text-sm font-medium text-gray-900 hover:bg-gray-50"
                    >Videografi Udara</a
                  >
                  <a
                    href="#"
                    class="block rounded-lg py-2 pr-3 pl-6 text-sm font-medium text-gray-900 hover:bg-gray-50"
                    >Fotografi Udara</a
                  >
                  <a
                    href="#"
                    class="block rounded-lg py-2 pr-3 pl-6 text-sm font-medium text-gray-900 hover:bg-gray-50"
                    >Sewa Drone & Pilot</a
                  >
                </DisclosurePanel>
              </Disclosure>
              <a
                href="#"
                class="block rounded-lg px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50"
                >Portfolio</a
              >
              <a
                href="#"
                class="block rounded-lg px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50"
                >Testimoni</a
              >
              <a
                href="#"
                class="block rounded-lg px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50"
                >FAQ</a
              >
              <a
                href="#"
                class="block rounded-lg px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50"
                >Kontak</a
              >
            </div>
            <div class="py-6">
              <a
                href="#"
                class="block rounded-lg px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50"
                >Login / Daftar</a
              >
            </div>
          </div>
        </div>
      </DialogPanel>
    </Dialog>
  </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { useRouter } from 'vue-router'
import logoWhite from '@/assets/flywithus.png'
import logoBlack from '@/assets/flywithus2.png'
import {
  Dialog,
  DialogPanel,
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
} from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import { UserCircleIcon } from '@heroicons/vue/24/solid'

const mobileMenuOpen = ref(false)
const isScrolled = ref(false)
const userName = ref('')
const router = useRouter()

function updateUserName() {
  try {
    const userData = JSON.parse(localStorage.getItem('user_data') || '{}')
    userName.value = userData.name || ''
  } catch (e) {
    userName.value = ''
  }
}

function handleScroll() {
  isScrolled.value = window.scrollY > 10
}

function logout() {
  localStorage.removeItem('token')
  localStorage.removeItem('user_data')
  userName.value = ''
  router.push('/login')
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
  window.addEventListener('storage', updateUserName)
  handleScroll()
  updateUserName()
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  window.removeEventListener('storage', updateUserName)
})
</script>
