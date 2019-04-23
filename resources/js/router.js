import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '@/store'

Vue.use(VueRouter)

const routes = [
    { path: '/login', name: 'login', component: () => import('./pages/login'), meta: { requiresGuest: true } },
    { path: '/', name: 'home', component: () => import('./pages/dashboard'), meta: { requiresAuth: true } },
    { path: '/user', component: () => import('./pages/user'), meta: { requiresAuth: true } },
    { path: '/rmh', component: () => import('./pages/rmh'), meta: { requiresAuth: true } },
    { path: '/rp', component: () => import('./pages/rp'), meta: { requiresAuth: true } },
    { path: '/mhp', component: () => import('./pages/mhp'), meta: { requiresAuth: true } },
    { path: '/vidrl', component: () => import('./pages/vidrl'), meta: { requiresAuth: true } },
    { path: '/removeditems', component: () => import('./pages/removeditems'), meta: { requiresAuth: true },
        children: [
            { path: 'rmh', component: () => import('./pages/removeditems/removedrmh') },
            { path: 'rp', component: () => import('./pages/removeditems/removedrp') },
            { path: 'mhp', component: () => import('./pages/removeditems/removedmhp') },
            { path: 'vidrl', component: () => import('./pages/removeditems/removedvidrl') }
        ]
    },
    { path: '/rmhmobile', component: () => import('./pages/rmhmobile'), meta: { requiresAuth: false } },
    { path: '/mhpmobile', component: () => import('./pages/mhpmobile'), meta: { requiresAuth: false } }
]

const router = new VueRouter({
    mode: 'history',
    routes
})


router.beforeEach((to, from, next) => {
  if (to.matched.some(route => route.meta.requiresAuth)) {
    if (store.getters.authenticated) {
      next()
    } else {
      next({ name: 'login', query: { redirectTo: to.fullPath } })
    }
  } else if (to.matched.some(route => route.meta.requiresGuest)) {
    if (!store.getters.authenticated) {
      next()
    } else {
      next({ name: 'home' })
    }
  } else {
    next()
  }
})

export default router