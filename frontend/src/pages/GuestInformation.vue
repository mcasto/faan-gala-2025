<template>
  <div class="guest-info-container">
    <div class="row justify-center">
      <!-- Image Column -->
      <div class="col-12 col-md-5 image-column q-pa-md">
        <div class="poster-frame">
          <q-img
            :src="store.guestInformation.image"
            fit="contain"
            class="guest-poster"
            :ratio="3 / 4"
          >
            <template v-slot:loading>
              <div class="absolute-full flex flex-center">
                <q-spinner color="red-7" size="3em" />
              </div>
            </template>
          </q-img>
        </div>
      </div>

      <!-- Content Column -->
      <div class="col-12 col-md-7 content-column q-pa-md">
        <div class="content-wrapper">
          <!-- Decorative marquee top -->
          <div class="marquee-decoration top"></div>

          <div
            v-html="store.guestInformation.contents"
            class="guest-content"
          ></div>

          <!-- Decorative marquee bottom -->
          <div class="marquee-decoration bottom"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();
</script>

<style scoped>
.guest-info-container {
  background: linear-gradient(135deg, #1a1a1a 0%, #2d1a1a 50%, #1a1a1a 100%);
  min-height: 100vh;
  padding: 2rem 0;
}

.image-column {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  padding-top: 3rem !important;
}

.poster-frame {
  position: relative;
  width: 100%;
  max-width: 500px;
  padding: 0.75rem;
  background: linear-gradient(135deg, #3a1a1a 0%, #2a1515 100%);
  box-shadow: 0 15px 50px rgba(0, 0, 0, 0.7),
    inset 0 0 0 1px rgba(212, 175, 55, 0.2), 0 0 30px rgba(139, 0, 0, 0.3);
  border: 2px solid rgba(139, 0, 0, 0.4);
}

.poster-frame::before {
  content: "";
  position: absolute;
  top: 0.5rem;
  left: 0.5rem;
  right: 0.5rem;
  bottom: 0.5rem;
  border: 1px solid rgba(212, 175, 55, 0.3);
  pointer-events: none;
  z-index: 1;
}

.guest-poster {
  filter: contrast(1.05) brightness(0.98);
}

.content-column {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  padding-top: 3rem !important;
}

.content-wrapper {
  max-width: 700px;
  width: 100%;
}

.marquee-decoration {
  height: 3px;
  background: linear-gradient(
    to right,
    transparent,
    #d4af37 10%,
    #8b0000 30%,
    #d4af37 50%,
    #8b0000 70%,
    #d4af37 90%,
    transparent
  );
  position: relative;
  margin: 1.5rem 0;
}

.marquee-decoration::before,
.marquee-decoration::after {
  content: "★";
  position: absolute;
  color: #d4af37;
  font-size: 1.2rem;
  top: -0.6rem;
}

.marquee-decoration::before {
  left: 10%;
}

.marquee-decoration::after {
  right: 10%;
}

.marquee-decoration.top {
  margin-top: 0;
}

.marquee-decoration.bottom {
  margin-bottom: 0;
}

/* Style the injected HTML content */
.guest-content {
  color: #f5f5f5;
  font-family: "Georgia", "Times New Roman", serif;
  background: rgba(26, 26, 26, 0.6);
  padding: 2rem;
  border-left: 4px solid #8b0000;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.guest-content :deep(h1),
.guest-content :deep(h2),
.guest-content :deep(h3) {
  font-family: "Playfair Display", "Georgia", serif;
  color: #d4af37;
  font-weight: 400;
  letter-spacing: 0.05em;
  margin-top: 0;
  margin-bottom: 1rem;
  text-transform: uppercase;
}

.guest-content :deep(h1) {
  font-size: 2rem;
  border-bottom: 2px solid rgba(139, 0, 0, 0.5);
  padding-bottom: 0.5rem;
  margin-bottom: 1.5rem;
}

.guest-content :deep(h2) {
  font-size: 1.5rem;
  color: #e6c048;
  margin-top: 2rem;
}

.guest-content :deep(h3) {
  font-size: 1.2rem;
  color: #d4af37;
}

.guest-content :deep(p) {
  font-size: 1rem;
  line-height: 1.7;
  color: #e8e8e8;
  margin-bottom: 1rem;
}

.guest-content :deep(ol),
.guest-content :deep(ul) {
  padding-left: 1.5rem;
  margin-bottom: 1.5rem;
}

.guest-content :deep(li) {
  font-size: 1rem;
  line-height: 1.7;
  color: #e8e8e8;
  margin-bottom: 0.75rem;
  position: relative;
}

.guest-content :deep(ol li) {
  padding-left: 0.5rem;
}

.guest-content :deep(ol li::marker) {
  color: #d4af37;
  font-weight: bold;
}

.guest-content :deep(strong) {
  color: #d4af37;
  font-weight: 600;
}

.guest-content :deep(a) {
  color: #e6c048;
  text-decoration: none;
  border-bottom: 1px solid rgba(230, 192, 72, 0.3);
  transition: all 0.3s ease;
}

.guest-content :deep(a:hover) {
  color: #d4af37;
  border-bottom-color: #d4af37;
}

/* Mobile adjustments */
@media (max-width: 1023px) {
  .guest-info-container {
    padding: 1rem 0;
  }

  .image-column,
  .content-column {
    padding-top: 1.5rem !important;
  }

  .guest-content {
    padding: 1.5rem;
  }

  .guest-content :deep(h1) {
    font-size: 1.6rem;
  }

  .guest-content :deep(h2) {
    font-size: 1.3rem;
  }

  .poster-frame {
    margin-bottom: 1.5rem;
  }
}

@media (max-width: 599px) {
  .guest-content {
    padding: 1rem;
  }

  .guest-content :deep(h1) {
    font-size: 1.4rem;
  }

  .guest-content :deep(h2) {
    font-size: 1.2rem;
  }

  .guest-content :deep(p),
  .guest-content :deep(li) {
    font-size: 0.95rem;
  }
}
</style>
