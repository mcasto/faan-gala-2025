<template>
  <div>
<img
        src="/images/clapboard.png"
        class="welcome-right-panel-clapboard"
      ></img>

      <div v-html="store.welcome.rightPanel"></div>
  </div>
</template>

<script setup>
import { useStore } from 'src/stores/store';

const store=useStore();
</script>
