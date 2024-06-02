import { createRouter, createWebHistory } from 'vue-router'

import AppView from '../views/AppView.vue';
import ProductView from '../views/ProductView.vue';
import LoginView from '../views/LoginView.vue';
import RegisterView from '../views/RegisterView.vue';
import CategoryView from '../views/CategoryView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/app', 
      name: 'application', 
      component: AppView, 
      meta: { requiresAuth: true, title:'Lägg till produkt' }
    }, 
    {
      path: '/products', 
      name: 'products', 
      component: ProductView, 
      meta: { requiresAuth: true, title:'Produkter' }
    }, 
    {
      path: '/', 
      name: 'login', 
      component: LoginView
    }, 
    {
      path: '/registrera', 
      name: 'register', 
      component: RegisterView, 
      meta: { requiresAuth: true, title:'Registrera ny användare' }
    },
    {
      path: '/category', 
      name: 'category', 
      component: CategoryView, 
      meta: { requiresAuth: true, title:'Hantera kategorier' }
    }
  ]
})

router.beforeEach((to, from) => {
  document.title = to.meta.title ?? 'Min app';
  if(to.meta.requiresAuth) {
    const token = localStorage.getItem('token');
    if(!token) {
      return '/'
    } 
  } 
})

export default router
