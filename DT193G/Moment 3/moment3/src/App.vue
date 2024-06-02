<script setup>
import { RouterView } from 'vue-router';
import "./assets/tailwind.css";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

</script>

<template>
  <Header />
  <RouterView />
  <Footer />
</template>

<style scoped>

</style>
