<template>
  <div
    style="
      background-image: url('/images/sponsorship-bg.jpeg');
      background-size: cover;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    "
  >
    <div class="text-left sponsorship-bg">
      <div
        class="sponsorship-banner"
        style="background-image: url('/images/sponsorship-banner.jpg');"
      >
        <div
          class="column items-center justify-center full-height text-white q-pa-md"
          style="background-color: rgba(0, 0, 0, 0.7);"
        >
          <div class="text-h3 text-weight-thin playfair-font q-mb-sm">
            {{ store.sopp.header }}
          </div>
          <div>{{ store.sopp.date }}</div>
          <div>{{ store.sopp.location }}</div>
        </div>
      </div>

      <div>
        <div class="row">
          <template
            v-for="(level, levelIndex) of store.sopp.levels"
            :key="`level-${levelIndex}`"
          >
            <div class="q-pa-sm col-12 col-md-6">
              <q-card class="bg-transparent" flat>
                <q-toolbar>
                  <q-toolbar-title>
                    <div class="text-h5 text-weight-bold">
                      {{ level.title }}
                    </div>
                  </q-toolbar-title>
                </q-toolbar>
                <q-list dense>
                  <q-item
                    v-for="(benefit, benefitIndex) in level.benefits"
                    :key="`benefit-${benefitIndex}`"
                    dense
                  >
                    <q-item-section side>
                      <q-icon
                        name="star"
                        size="xs"
                        color="amber-8"
                        class="outline-star"
                      ></q-icon>
                    </q-item-section>
                    <q-item-section>
                      <q-item-label>
                        {{ benefit }}
                      </q-item-label>
                    </q-item-section>
                  </q-item>
                </q-list>
              </q-card>
            </div>
          </template>
        </div>
      </div>

      <div class="text-lg font-thin mt-5 text-center mx-auto md:max-w-[60dvw]">
        {{ store.sopp.note }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();
</script>
