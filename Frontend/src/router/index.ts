import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminLayout from '../views/admin/layouts/app-layout.vue'
import AdminDashboard from '../views/admin/AdminDashboard.vue'
import UserDashboard from '../views/user/UserDashboard.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import LogoutView from '../views/LogoutView.vue'
import Orders from '../views/admin/Orders.vue'
import Portfolios from '../views/admin/Portfolios.vue'
import Users from '../views/admin/Users.vue'
import Packages from '../views/admin/Packages.vue'
import Analytics from '../views/admin/Analytics.vue'
import OrdersNew from '../views/admin/OrdersNew.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
    },
    {
      path: '/admin',
      component: AdminLayout,
      children: [
        {
          path: '',
          name: 'admin-dashboard',
          component: AdminDashboard,
        },
        {
          path: 'orders',
          name: 'admin-orders',
          component: Orders,
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
    {
      path: '/user',
      name: 'user',
      component: UserDashboard,
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

export default router
