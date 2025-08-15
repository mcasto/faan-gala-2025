<template>
  <div class="bg-secondary q-pa-md">
    <div v-html="store.welcome.introduction"></div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();
</script>
