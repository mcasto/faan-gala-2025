<template>
  <div class="row">
    <div class="col-12 col-md-6">
      <q-img src="/images/join-us-bg.jpeg"></q-img>
    </div>
    <div class="col-12 col-md-6 bg-secondary q-pa-md">
      <q-img src="/images/paws-on-red-carpet.jpeg">
        <div v-html="store.joinUs.rightPanelTop" class="absolute-bottom"></div>
      </q-img>

      <q-separator dark class="q-my-md"></q-separator>

      <donation-section></donation-section>

      <q-separator dark class="q-my-md"></q-separator>

      <div v-html="store.joinUs.rightPanelBottom"></div>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";
import DonationSection from "src/components/DonationSection.vue";

const store = useStore();
</script>
