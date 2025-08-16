<script setup>
import axios from "axios";
import { RouterLink, RouterView } from "vue-router";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.baseURL = import.meta.env.VITE_API_BASE_URL;

console.log(import.meta.env.VITE_API_BASE_URL)

</script>

<template>
  <header>
    <nav>
      <RouterLink to="/" class="underline text-blue-500 hover:text-blue-800">Home</RouterLink>
    </nav>
  </header>

  <RouterView />
</template>
