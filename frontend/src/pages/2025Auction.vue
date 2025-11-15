<template>
  <div class="auction-container">
    <div class="row justify-center">
      <!-- Content Column -->
      <div
        class="col-12 col-md-5 content-column"
        :class="Screen.gt.sm ? 'q-pa-xl' : 'q-pa-md'"
      >
        <div class="content-wrapper">
          <!-- Decorative top line -->
          <div class="decorative-line top-line"></div>

          <div
            v-html="store.auction2025.contents"
            class="auction-content"
          ></div>

          <!-- Decorative bottom line -->
          <div class="decorative-line bottom-line"></div>
        </div>
      </div>

      <!-- Image Column -->
      <div
        class="col-12 col-md-7 image-column"
        :class="Screen.gt.sm ? 'q-pa-xl' : 'q-pa-md'"
      >
        <div class="image-frame">
          <q-img
            :src="store.auction2025.image"
            fit="contain"
            class="auction-image"
            :ratio="Screen.gt.sm ? 8 / 10 : 3 / 4"
          >
            <template v-slot:loading>
              <div class="absolute-full flex flex-center">
                <q-spinner color="primary" size="3em" />
              </div>
            </template>
          </q-img>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Screen } from "quasar";
import { useStore } from "src/stores/store";

const store = useStore();
</script>

<style scoped>
.auction-container {
  background: linear-gradient(to bottom, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
  min-height: 100vh;
}

.content-column {
  display: flex;
  align-items: center;
  justify-content: center;
}

.content-wrapper {
  max-width: 500px;
  position: relative;
}

.decorative-line {
  height: 2px;
  background: linear-gradient(
    to right,
    transparent,
    #d4af37 20%,
    #d4af37 80%,
    transparent
  );
  margin: 2rem 0;
  position: relative;
}

.decorative-line::before,
.decorative-line::after {
  content: "";
  position: absolute;
  width: 8px;
  height: 8px;
  background: #d4af37;
  transform: rotate(45deg);
  top: -3px;
}

.decorative-line::before {
  left: 20%;
}

.decorative-line::after {
  right: 20%;
}

.top-line {
  margin-top: 0;
}

.bottom-line {
  margin-bottom: 0;
}

/* Style the injected HTML content */
.auction-content {
  color: #f5f5f5;
  font-family: "Garamond", "Georgia", serif;
}

.auction-content :deep(.text-h4) {
  font-family: "Playfair Display", "Garamond", serif;
  font-weight: 400;
  letter-spacing: 0.05em;
  color: #d4af37;
  text-transform: uppercase;
  font-size: 2rem;
  line-height: 1.3;
  margin-bottom: 1.5rem;
}

.auction-content :deep(p) {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #e8e8e8;
  margin-bottom: 1.5rem;
}

.auction-content :deep(.q-btn) {
  background: linear-gradient(135deg, #d4af37 0%, #c5a028 100%) !important;
  color: #1a1a1a !important;
  font-family: "Garamond", "Georgia", serif;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  padding: 1rem 2.5rem !important;
  border-radius: 0 !important;
  box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
  transition: all 0.3s ease;
  font-size: 0.95rem;
  border: 2px solid #d4af37;
}

.auction-content :deep(.q-btn:hover) {
  box-shadow: 0 6px 25px rgba(212, 175, 55, 0.5);
  transform: translateY(-2px);
  background: linear-gradient(135deg, #e6c048 0%, #d4af37 100%) !important;
}

.auction-content :deep(.text-body1) {
  font-style: italic;
  color: #c9c9c9;
  font-size: 1rem;
  line-height: 1.7;
  border-left: 3px solid #d4af37;
  padding-left: 1.5rem;
  margin-top: 2rem;
}

.image-column {
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-frame {
  position: relative;
  width: 100%;
  max-width: 600px;
  padding: 1rem;
  background: linear-gradient(135deg, #2a2a2a 0%, #1f1f1f 100%);
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6),
    inset 0 0 0 1px rgba(212, 175, 55, 0.3),
    inset 0 0 20px rgba(212, 175, 55, 0.1);
  border: 1px solid rgba(212, 175, 55, 0.4);
}

.image-frame::before {
  content: "";
  position: absolute;
  top: 0.5rem;
  left: 0.5rem;
  right: 0.5rem;
  bottom: 0.5rem;
  border: 1px solid rgba(212, 175, 55, 0.2);
  pointer-events: none;
  z-index: 1;
}

.auction-image {
  filter: contrast(1.1) brightness(0.95);
  transition: all 0.4s ease;
}

.auction-image:hover {
  filter: contrast(1.15) brightness(1);
}

/* Mobile adjustments */
@media (max-width: 1023px) {
  .auction-container {
    padding: 1rem 0;
  }

  .auction-content :deep(.text-h4) {
    font-size: 1.5rem;
  }

  .auction-content :deep(p) {
    font-size: 1rem;
  }

  .auction-content :deep(.q-btn) {
    padding: 0.875rem 2rem !important;
    font-size: 0.875rem;
  }

  .decorative-line {
    margin: 1.5rem 0;
  }

  .image-frame {
    margin-top: 2rem;
  }
}

/* Extra small screens */
@media (max-width: 599px) {
  .auction-content :deep(.text-h4) {
    font-size: 1.3rem;
  }

  .auction-content :deep(.q-btn) {
    width: 100%;
    padding: 1rem 1.5rem !important;
  }
}
</style>
