// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/LandingPage.vue';
import Dashboard from '../views/DashboardPage.vue';
import Login from '../views/LoginPage.vue';
import SignUp from '../views/SignUpPage.vue';
import Roadmap from '../views/RoadmapPage.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/signup',
    name: 'Sign Up',
    component: SignUp,
  },
  {
    path: '/roadmap',
    name: 'Roadmap',
    component: Roadmap,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
