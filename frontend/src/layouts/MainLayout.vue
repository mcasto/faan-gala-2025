<template>
  <q-layout view="hHh lpR fFf">
    <q-page-container>
      <q-header>
        <q-toolbar class="shadow-1">
          <q-toolbar-title>
            Gala FAAN-tastica 2025
          </q-toolbar-title>

          <!-- <div v-if="Screen.gt.sm">
            <template v-for="item of nav" :key="item.name">
              <q-btn
                v-if="!item.meta.section && !item.meta.dropdown"
                :label="item.meta.label[store.language]"
                :to="item.path"
                :name="item.name"
                class="q-mx-sm text-black"
                :class="item.name === tab ? 'nav-underline' : ''"
                :color="item.name === tab ? 'amber-8' : 'warning'"
                exact
                @click="tab = item.name"
              ></q-btn>

              <q-btn
                v-if="item.meta.dropdown"
                icon="mdi-chevron-down"
                :name="item.name"
                class="q-mx-sm text-black"
                :color="item.name === tab ? 'amber-8' : 'warning'"
                @click="tab = item.name"
              >
                <span :class="item.name === tab ? 'nav-underline' : ''">{{
                  item.meta.label[store.language]
                }}</span>

                <q-menu dark>
                  <q-list separator dark>
                    <q-item
                      v-for="subItem in item.children"
                      :key="subItem.name"
                      :to="`${item.path}/${subItem.path}`"
                      clickable
                      exact
                      active-class="text-bold bg-grey-8"
                    >
                      <q-item-section>
                        <q-item-label>
                          {{ subItem.meta.label[store.language] }}
                        </q-item-label>
                      </q-item-section>
                    </q-item>
                  </q-list>
                </q-menu>
              </q-btn>
            </template>
          </div>

          <q-btn
            v-if="Screen.gt.sm"
            :label="languageButtonLabel"
            icon="mdi-web"
            color="warning"
            class="text-black"
            @click="toggleLanguage"
          ></q-btn> -->

          <q-btn
            icon="menu"
            v-if="Screen.lt.md"
            flat
            @click="store.drawer = !store.drawer"
          ></q-btn>
          <q-btn icon="menu" v-else flat>
            <q-menu dark>
              <q-list dense separator dark class="bg-primary">
                <q-item
                  v-for="item of nav"
                  :key="item.name"
                  clickable
                  :to="{ name: item.name }"
                  active-class="text-black bg-grey-3"
                  exact
                >
                  <q-item-section>
                    <q-item-label>
                      {{ item.meta.label[store.language] }}
                    </q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-menu>
          </q-btn>
        </q-toolbar>
      </q-header>

      <q-drawer
        v-model="store.drawer"
        class="bg-primary text-white"
        behavior="desktop"
        overlay
      >
        <div class="column q-gutter-y-md full-height flex-center">
          <template v-for="item of nav" :key="item.name">
            <q-btn
              v-if="!item.meta.section && !item.meta.dropdown"
              :label="item.meta.label[store.language]"
              :to="item.path"
              :name="item.name"
              class="q-mx-sm text-black"
              :class="item.name === tab ? 'nav-underline' : ''"
              :color="item.name === tab ? 'amber-8' : 'warning'"
              exact
              @click="tab = item.name"
              style="width: 75%;"
            ></q-btn>

            <q-btn
              v-if="item.meta.dropdown"
              icon="mdi-chevron-down"
              :name="item.name"
              class="q-mx-sm text-black"
              :color="item.name === tab ? 'amber-8' : 'warning'"
              @click="tab = item.name"
              style="width: 75%;"
            >
              <span :class="item.name === tab ? 'nav-underline' : ''">{{
                item.meta.label[store.language]
              }}</span>

              <q-menu dark>
                <q-list separator dark>
                  <q-item
                    v-for="subItem in item.children"
                    :key="subItem.name"
                    :to="`${item.path}/${subItem.path}`"
                    clickable
                    exact
                    active-class="text-bold bg-grey-8"
                  >
                    <q-item-section>
                      <q-item-label>
                        {{ subItem.meta.label[store.language] }}
                      </q-item-label>
                    </q-item-section>
                  </q-item>
                </q-list>
              </q-menu>
            </q-btn>
          </template>

          <q-btn
            :label="languageButtonLabel"
            icon="mdi-web"
            color="warning"
            class="text-black"
            @click="toggleLanguage"
            style="width: 75%;"
          ></q-btn>
        </div>
      </q-drawer>

      <q-page>
        <router-view />
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { Screen } from "quasar";
import { useStore } from "src/stores/store";
import { computed, onMounted, ref } from "vue";
import { useRoute } from "vue-router";

const store = useStore();

const tab = ref("home");

const drawer = ref(false);

const nav = computed(() => {
  return store.router
    .getRoutes()
    .filter((route) => {
      return route.name;
    })
    .sort((a, b) => a.meta.order - b.meta.order);
});

const languageButtonLabel = computed(() => {
  return store.language == "en" ? "ES" : "EN";
});

const toggleLanguage = () => {
  store.language = store.language == "en" ? "es" : "en";
  window.location.reload();
};

onMounted(() => {
  const route = useRoute();
  tab.value =
    route.meta.section === "get-involved" ? "get-involved" : route.name;
});
</script>
