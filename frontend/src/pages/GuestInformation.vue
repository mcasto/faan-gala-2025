<template>
  <div>
    <div class="row">
      <div class="col-12 col-md-6">
        <q-img :src="store.guestInformation.image"></q-img>
      </div>
      <div
        class="col-12 col-md-6 q-pa-md"
        v-html="store.guestInformation.contents"
      ></div>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();
</script>
