import { defineStore } from "pinia";
import { ref, computed } from "vue";

export const useStore = defineStore(
  "store",
  () => {
    const state = {
      auctionPalooza: ref(null),
      drawer: ref(false),
      joinUs: ref(null),
      language: ref("en"),
      meetFaantastics: ref(null),
      sopp: ref(null),
      welcome: ref(null),
    };
    const getters = {};
    const actions = {};

    return { ...state, ...getters, ...actions };
  },
  {
    persist: {
      key: "gala-faantastica-2025",
    },
  }
);
