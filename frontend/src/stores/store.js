import { defineStore } from "pinia";
import { ref, computed } from "vue";

export const useStore = defineStore(
  "store",
  () => {
    const state = {
      auction2025: ref(null),
      auctionPalooza: ref(null),
      drawer: ref(false),
      joinUs: ref(null),
      language: ref("en"),
      meetFaantastics: ref(null),
      sanctuary: ref(null),
      sopp: ref(null),
      tickets: ref(null),
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
