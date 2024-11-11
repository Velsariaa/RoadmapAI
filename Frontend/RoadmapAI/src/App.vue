<template>
  <div id="app">
    <!-- Render Navbar on all pages -->
    <NavBar />
    <!-- Render the current route's component -->
    <router-view />
  </div>
</template>

<script setup>
import NavBar from './components/NavBar.vue';
</script>
