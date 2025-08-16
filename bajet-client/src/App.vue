<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <header>
    <nav>
      <RouterLink to="/" class="underline text-blue-500 hover:text-blue-800">Home</RouterLink>
    </nav>
  </header>

  <RouterView />
</template>
