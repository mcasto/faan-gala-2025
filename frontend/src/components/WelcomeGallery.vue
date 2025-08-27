<template>
  <div class="bg-secondary q-py-xl">
    <div class="gallery-banner">
      <div
        class="playfair-font text-bold text-center"
        :class="Screen.lt.md ? 'text-h5' : 'text-h2'"
      >
        Gala FAAN-tastica 2023
      </div>
    </div>

    <div class="flex justify-center q-mt-sm">
      <template v-for="section in store.welcome.galaImages" :key="section.id">
        <q-btn
          :label="section.name"
          class="q-mx-sm text-black q-my-xs"
          :class="section.id === galaSection ? 'nav-underline' : ''"
          :color="section.id === galaSection ? 'amber-8' : 'warning'"
          @click="changeSection(section.id)"
        ></q-btn>
      </template>
    </div>

    <q-tab-panels v-model="galaSection" class="bg-secondary">
      <q-tab-panel
        v-for="section in store.welcome.galaImages"
        :key="section.id"
        :name="section.id"
      >
        <div class="flex justify-center q-mb-md">
          <q-pagination
            v-model="pagination.currentPage"
            :max="totalPages"
            direction-links
            boundary-links
            icon-first="skip_previous"
            icon-last="skip_next"
            icon-prev="fast_rewind"
            icon-next="fast_forward"
            color="warning"
            :max-pages="8"
            v-if="totalPages > 1"
          />
        </div>

        <div class="row q-col-gutter-md">
          <div
            class="col-12 col-md-4"
            v-for="(image, index) in paginatedImages"
            :key="index"
          >
            <q-card class="bg-secondary" flat bordered dark>
              <q-card-section>
                <q-img
                  :src="`${section.path}/${image}`"
                  height="200px"
                  position="0% 10%"
                ></q-img>
              </q-card-section>
            </q-card>
          </div>
        </div>
      </q-tab-panel>
    </q-tab-panels>
  </div>
</template>

<script setup>
import { Screen } from "quasar";
import { useStore } from "src/stores/store";
import { computed, ref, watch } from "vue";

const store = useStore();

const galaSection = ref("ambience");
const pagination = ref({
  currentPage: 1,
  pageSize: 6, // Now this will actually control how many images show per page
});

// Track pagination per section
const sectionPagination = ref({});

// Get current section's images
const currentSectionImages = computed(() => {
  const section = store.welcome.galaImages.find(
    (s) => s.id === galaSection.value
  );
  return section ? section.images : [];
});

// Calculate paginated images
const paginatedImages = computed(() => {
  const start = (pagination.value.currentPage - 1) * pagination.value.pageSize;
  const end = start + pagination.value.pageSize;
  return currentSectionImages.value.slice(start, end);
});

// Calculate total pages
const totalPages = computed(() => {
  return Math.ceil(
    currentSectionImages.value.length / pagination.value.pageSize
  );
});

// Calculate display range
const startItem = computed(() => {
  return (pagination.value.currentPage - 1) * pagination.value.pageSize + 1;
});

const endItem = computed(() => {
  const end = pagination.value.currentPage * pagination.value.pageSize;
  return end > currentSectionImages.value.length
    ? currentSectionImages.value.length
    : end;
});

// Handle section change
const changeSection = (sectionId) => {
  // Save current page for the current section before switching
  sectionPagination.value[galaSection.value] = pagination.value.currentPage;

  // Switch section
  galaSection.value = sectionId;

  // Restore saved page or reset to 1
  pagination.value.currentPage = sectionPagination.value[sectionId] || 1;
};

// Watch for section changes to reset pagination if needed
watch(galaSection, (newVal) => {
  if (!sectionPagination.value[newVal]) {
    pagination.value.currentPage = 1;
  }
});
</script>
