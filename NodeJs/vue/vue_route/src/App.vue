
<script setup>

import { ref,watchEffect } from 'vue'
import { createMemoryHistory, createRouter } from 'vue-router'

import HomeView from './components/HomeView.vue'
import AboutView from './components/AboutView.vue'
import CrudView from './components/CrudView.vue'
import LoginView from './components/Login.vue'

const routes = [
  { path: '/', component: HomeView },
  { path: '/about', component: AboutView },
  { path: '/crud', component: CrudView },
  { path: '/login', component: LoginView },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
})


</script>

<template>
  
  <h1>Application avec routeur!</h1>
  
  <p>
    <strong>Current route path:</strong> {{ $route.fullPath }}
  </p>
 
  <nav>
    <RouterLink to="/">Go to Home</RouterLink>
    <RouterLink to="/about">Go to About</RouterLink>
    <RouterLink to="/crud">Exemple CRUD</RouterLink>
    <RouterLink to="/login">Login</RouterLink>
  </nav>
  <main>
    <RouterView />
  </main>
</template>

<style>

</style>