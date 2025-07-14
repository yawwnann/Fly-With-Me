import { createRouter, createWebHistory, type RouteLocationNormalized, type NavigationGuard } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminLayout from '../views/admin/layouts/app-layout.vue'
import AdminDashboard from '../views/admin/AdminDashboard.vue'
import { UserDashboard, Portfolio, Orders, Profile } from '../views/user/index'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import LogoutView from '../views/LogoutView.vue'
import AdminOrders from '../views/admin/Orders.vue'
import Portfolios from '../views/admin/Portfolios.vue'
import Users from '../views/admin/Users.vue'
import Packages from '../views/admin/Packages.vue'
import Analytics from '../views/admin/Analytics.vue'
import OrdersNew from '../views/admin/OrdersNew.vue'
import PortfolioDetail from '../views/user/PortfolioDetail.vue'
import Checkout from '../views/user/Checkout.vue'

// Fungsi untuk memeriksa autentikasi
const isAuthenticated = (): boolean => {
  return !!localStorage.getItem('token')
}

// Fungsi untuk mendapatkan role user dari token
const getUserRole = (): string | null => {
  const token = localStorage.getItem('token')
  if (!token) return null
  
  try {
    const payload = JSON.parse(atob(token.split('.')[1]))
    return payload.role || null
  } catch (error) {
    console.error('Error parsing token:', error)
    return null
  }
}

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: { requiresAuth: false }
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
      meta: { requiresAuth: false }
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta: { requiresGuest: true }
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
      meta: { requiresGuest: true }
    },
    {
      path: '/logout',
      name: 'logout',
      component: LogoutView
    },
    // Admin routes
    {
      path: '/admin',
      component: AdminLayout,
      meta: { requiresAuth: true, role: 'admin' },
      children: [
        {
          path: '',
          name: 'admin-dashboard',
          component: AdminDashboard,
        },
        {
          path: 'orders',
          name: 'admin-orders',
          component: AdminOrders,
        },
        {
          path: 'portfolios',
          name: 'admin-portfolios',
          component: Portfolios,
        },
        {
          path: 'users',
          name: 'admin-users',
          component: Users,
        },
        {
          path: 'packages',
          name: 'admin-packages',
          component: Packages,
        },
        {
          path: 'analytics',
          name: 'admin-analytics',
          component: Analytics,
        },
        {
          path: 'orders/new',
          name: 'admin-orders-new',
          component: OrdersNew,
        },
      ],
    },
    // User routes
    {
      path: '/user',
      name: 'user',
      component: UserDashboard,
      meta: { requiresAuth: true, role: 'user' },
      children: [
        {
          path: 'dashboard',
          name: 'UserDashboard',
          component: UserDashboard,
        },
        {
          path: 'portfolios',
          name: 'UserPortfolio',
          component: Portfolio,
        },
        {
          path: 'portfolio/:id',
          name: 'UserPortfolioDetail',
          component: PortfolioDetail,
        },
        {
          path: 'orders',
          name: 'UserOrders',
          component: Orders,
        },
        {
          path: 'profile',
          name: 'UserProfile',
          component: Profile,
        },
        {
          path: 'checkout',
          name: 'Checkout',
          component: Checkout,
        }
      ]
    },
    {
      path: '/user/checkout/:packageId',
      name: 'UserCheckout',
      component: Checkout,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
    },
    {
      path: '/logout',
      name: 'logout',
      component: LogoutView,
    },
  ],
})

// Navigation guard
router.beforeEach((to, from, next) => {
  // Skip guard for the next navigation and for the initial navigation
  if (to.redirectedFrom) {
    return next()
  }

  const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
  const requiresGuest = to.matched.some(record => record.meta.requiresGuest)
  const requiredRole = to.meta.role as string | undefined
  const isAuth = isAuthenticated()
  const userRole = isAuth ? getUserRole() : null

  // Jika mencoba mengakses halaman yang memerlukan auth tapi belum login
  if (requiresAuth && !isAuth) {
    // Jika mencoba mengakses halaman yang memerlukan auth tapi belum login
    // Simpan path yang dituju untuk redirect setelah login
    return next({
      name: 'login',
      query: { redirect: to.fullPath !== '/' ? to.fullPath : undefined }
    })
  }

  // Jika sudah login tapi mencoba mengakses halaman guest (seperti login/register)
  if (requiresGuest && isAuth) {
    // Redirect ke dashboard berdasarkan role
    const redirectPath = userRole === 'admin' ? '/admin' : '/user/dashboard'
    return next(redirectPath)
  }

  // Jika route memerlukan role tertentu
  if (requiredRole && isAuth) {
    if (userRole !== requiredRole) {
      // Jika role tidak sesuai, arahkan ke dashboard yang sesuai
      const redirectPath = userRole === 'admin' ? '/admin' : '/user/dashboard'
      // Cegah infinite loop dengan memeriksa apakah kita sudah berada di halaman redirect
      if (to.path !== redirectPath) {
        return next(redirectPath)
      }
    }
  }

  // Jika semua pengecekan lolos, lanjutkan navigasi
  next()
})

export default router
