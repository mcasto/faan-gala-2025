<template>
  <div class="row">
    <div class="col-12 col-md-6">
      <welcome-left-panel></welcome-left-panel>
    </div>
    <div class="col-12 col-md-6 bg-secondary">
      <welcome-right-panel></welcome-right-panel>
    </div>
    <div class="col-12 q-pt-xl bg-secondary">
      <welcome-intro></welcome-intro>
    </div>
    <div class="col-12">
      <welcome-gallery></welcome-gallery>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";
import WelcomeLeftPanel from "src/components/WelcomeLeftPanel.vue";
import WelcomeRightPanel from "src/components/WelcomeRightPanel.vue";
import WelcomeIntro from "src/components/WelcomeIntro.vue";
import WelcomeGallery from "src/components/WelcomeGallery.vue";

const store = useStore();
</script>
