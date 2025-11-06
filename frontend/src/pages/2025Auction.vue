<template>
  <div class="q-pa-md text-center">
    <div v-html="store.auction2025.header" class="text-h4 q-mb-md"></div>
    <q-img :src="store.auction2025.image" height="80vh" fit="contain"></q-img>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();

console.log({ auction: store.auction2025 });
</script>
