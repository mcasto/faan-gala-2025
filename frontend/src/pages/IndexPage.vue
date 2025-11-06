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

    <div class="col-12 bg-secondary">
      <q-separator dark spaced></q-separator>
    </div>
    <div
      class="col-12 bg-secondary"
      v-html="store.welcome.globalLoveStory"
    ></div>

    <div class="col-12 bg-secondary text-center">
      <video :width="vid.width" :height="vid.height" controls>
        <source :src="store.welcome.video" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>

    <div class="col-12 bg-secondary">
      <q-separator dark spaced></q-separator>
    </div>
    <div class="col-12 bg-secondary" v-html="store.welcome.ungala"></div>

    <div class="col-12 bg-secondary">
      <q-separator dark spaced></q-separator>
    </div>
    <div class="col-12 bg-secondary" v-html="store.welcome.visionary"></div>

    <div class="col-12 row bg-secondary q-gutter-sm justify-center q-pt-xl">
      <div v-for="board of store.welcome.clapboards" :key="board" class="col-3">
        <q-img :src="board"></q-img>
      </div>
    </div>

    <div class="q-py-xl full-width bg-secondary">
      &nbsp;
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";
import WelcomeLeftPanel from "src/components/WelcomeLeftPanel.vue";
import WelcomeRightPanel from "src/components/WelcomeRightPanel.vue";
import WelcomeIntro from "src/components/WelcomeIntro.vue";
import { Screen } from "quasar";
import { computed } from "vue";

const store = useStore();

const vid = computed(() => {
  const originalWidth = 854;
  const originalHeight = 480;

  let width = Screen.gt.sm ? Screen.width * 0.5 : Screen.width * 0.9;
  if (width > 854) {
    width = 854;
  }

  const height = Math.round((originalHeight / originalWidth) * width);

  return {
    width,
    height,
  };
});
</script>
