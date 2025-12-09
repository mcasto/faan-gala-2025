<template>
  <div class="artist-videos-gallery bg-secondary q-pa-lg">
    <!-- Section Header -->
    <div class="text-center q-mb-xl">
      <h2 class="text-h3 text-white playfair-font q-mb-md">
        {{ sectionTitle }}
      </h2>
      <p class="text-subtitle1 text-white">
        {{ sectionSubtitle }}
      </p>
    </div>

    <!-- Artist Grid -->
    <div class="row q-col-gutter-lg">
      <div
        v-for="artist in artists"
        :key="artist.name"
        class="col-12 col-sm-6 col-md-4"
      >
        <q-card
          class="artist-card cursor-pointer"
          :class="{ 'no-video': !artist.video }"
          @click="artist.video ? openVideo(artist) : null"
        >
          <q-img
            :src="artist.poster"
            :ratio="16/9"
            class="artist-poster"
          >
            <div class="absolute-full flex flex-center artist-overlay">
              <div class="text-center">
                <q-icon
                  v-if="artist.video"
                  name="play_circle_outline"
                  size="64px"
                  color="warning"
                  class="play-icon"
                />
                <div
                  v-else
                  class="coming-soon-badge bg-warning text-primary q-pa-sm"
                >
                  {{ comingSoonText }}
                </div>
              </div>
            </div>
          </q-img>
          <q-card-section class="bg-primary text-white">
            <div class="text-h6 playfair-font">{{ artist.name }}</div>
            <div class="text-caption">{{ artist.artwork }}</div>
          </q-card-section>
        </q-card>
      </div>
    </div>

    <!-- Video Modal -->
    <q-dialog
      v-model="showVideoModal"
      maximized
      transition-show="fade"
      transition-hide="fade"
    >
      <q-card class="bg-dark">
        <q-card-section class="row items-center q-pb-none">
          <div class="text-h5 text-white playfair-font">
            {{ currentArtist?.name }}
          </div>
          <q-space />
          <q-btn
            icon="close"
            flat
            round
            dense
            color="white"
            v-close-popup
          />
        </q-card-section>

        <q-card-section class="flex flex-center" style="min-height: 70vh">
          <video
            v-if="currentArtist?.video"
            :key="currentArtist.video"
            controls
            autoplay
            playsinline
            preload="metadata"
            style="max-width: 100%; max-height: 80vh;"
          >
            <source :src="currentArtist.video" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </q-card-section>

        <q-card-section class="text-center text-white">
          <div class="text-subtitle1">{{ currentArtist?.artwork }}</div>
        </q-card-section>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { ref, computed } from 'vue'
import { useStore } from 'src/stores/store'

export default {
  name: 'ArtistVideosGallery',

  props: {
    artists: {
      type: Array,
      required: true,
      default: () => []
    }
  },

  setup() {
    const store = useStore()
    const showVideoModal = ref(false)
    const currentArtist = ref(null)

    const sectionTitle = computed(() => {
      return store.language === 'en'
        ? 'Thank You to Our Generous Artists'
        : 'Gracias a Nuestros Generosos Artistas'
    })

    const sectionSubtitle = computed(() => {
      return store.language === 'en'
        ? 'We are deeply grateful to these talented artists who donated their work to support the SuperDogs Sanctuary'
        : 'Estamos profundamente agradecidos a estos talentosos artistas que donaron su trabajo para apoyar el Santuario SuperDogs'
    })

    const comingSoonText = computed(() => {
      return store.language === 'en' ? 'Coming Soon' : 'Próximamente'
    })

    const openVideo = (artist) => {
      if (artist.video) {
        currentArtist.value = artist
        showVideoModal.value = true
      }
    }

    return {
      showVideoModal,
      currentArtist,
      sectionTitle,
      sectionSubtitle,
      comingSoonText,
      openVideo
    }
  }
}
</script>

<style lang="scss" scoped>
.artist-videos-gallery {
  min-height: 50vh;
}

.artist-card {
  transition: all 0.3s ease;
  border: 2px solid transparent;

  &:hover:not(.no-video) {
    transform: translateY(-8px);
    box-shadow: 0 8px 24px rgba(240, 173, 78, 0.3);
    border-color: var(--q-warning);

    .artist-overlay {
      opacity: 1;
    }

    .play-icon {
      transform: scale(1.1);
    }
  }

  &.no-video {
    cursor: not-allowed;
    opacity: 0.7;
  }
}

.artist-poster {
  position: relative;
}

.artist-overlay {
  background: rgba(0, 0, 0, 0.5);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.play-icon {
  transition: transform 0.3s ease;
  filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.5));
}

.coming-soon-badge {
  font-weight: bold;
  border-radius: 4px;
  text-transform: uppercase;
  font-size: 0.875rem;
  letter-spacing: 1px;
}

.bg-dark {
  background-color: #1a1a2e;
}
</style>
