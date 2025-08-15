<template>
  <div>
    <q-img
      src="/images/fred-dog.jpg"
      style="height: 100vh;"
      class="welcome-left-panel-image"
    >
      <div
        class="absolute-top-left text-h6"
        v-html="store.welcome.upperLeft"
      ></div>
      <div
        class="absolute-center text-h4"
        v-html="store.welcome.centered"
      ></div>
      <div
        class="absolute-bottom-left text-subtitle1"
        style="width: 50%;"
        v-html="store.welcome.lowerLeft"
      ></div>
    </q-img>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();
</script>
