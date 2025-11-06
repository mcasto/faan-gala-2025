<template>
  <div class="ungala-bg ungala-gala-tickets">
    <div class="row">
      <div class="col-12 col-md-6">
        <q-img :src="store.ungalaGalaTickets.image"></q-img>
      </div>
      <div class="col-12 col-md-6 q-pa-md">
        <div v-html="store.ungalaGalaTickets.invited"></div>

        <div class="col-12">
          <q-separator dark spaced></q-separator>
        </div>
        <div class="col-12 col-md-6 q-pa-md">
          <div v-html="store.ungalaGalaTickets.walkRedCarpet"></div>
        </div>

        <div class="col-12">
          <q-separator dark spaced></q-separator>
        </div>
        <div class="col-12 col-md-6 q-pa-md">
          <div v-html="store.ungalaGalaTickets.wowzaBowza"></div>
        </div>
      </div>
    </div>

    <q-separator dark spaced></q-separator>
    <div class="q-px-xl">
      <div v-html="store.ungalaGalaTickets.ungalaTicket"></div>
      <q-img :src="store.ungalaGalaTickets.ticketImage"></q-img>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();
</script>
