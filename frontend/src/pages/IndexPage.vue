<template>
  <div class="home-page">
    <!-- Thank You Section -->
    <div class="thank-you-section bg-secondary">
      <div class="row">
        <div class="col-12">
          <div class="q-pa-xl text-center">
            <div v-html="store.welcome.rightPanel"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Artist Videos Gallery -->
    <artist-videos-gallery
      v-if="store.welcome.contributingArtists"
      :artists="store.welcome.contributingArtists"
    />

    <!-- Footer Spacing -->
    <div class="q-py-xl full-width bg-secondary">
      &nbsp;
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";
import ArtistVideosGallery from "src/components/ArtistVideosGallery.vue";

const store = useStore();
</script>

<style lang="scss" scoped>
.home-page {
  min-height: 100vh;
}

.thank-you-section {
  padding: 2rem 0;
}
</style>
