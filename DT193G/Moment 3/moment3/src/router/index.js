import { createRouter, createWebHistory } from 'vue-router';
// import HomeView from '../views/HomeView.vue'
import ApiView from '../views/ApiView.vue';
import StartView from '../views/StartView.vue';
import InfoView from '../views/InfoView.vue';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: StartView
    }, 
    {
      path: '/api', 
      name: 'api', 
      component: ApiView
    }, 
    {
      path: '/info', 
      name: 'info', 
      component: InfoView
    }
    
  ]
})

export default router
