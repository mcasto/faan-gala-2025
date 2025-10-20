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
    <div class="col-12 bg-secondary text-center">
      <div class="text-subtitle2 text-white">
        Thanks Video from 2023 Gala FAAN-tastica
      </div>
      <video width="640" height="360" controls>
        <source src="/videos/highlight-vid.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
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
