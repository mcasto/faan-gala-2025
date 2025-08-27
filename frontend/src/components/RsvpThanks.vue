<template>
  <q-dialog v-model="model">
    <q-card style="min-width: 45vw;">
      <q-card-section class="text-center">
        <h4 class="playfair-font">Thank You for Your RSVP!</h4>
        <p class="text-subtitle1">Your response has been recorded.</p>
        <p class="text-subtitle1">
          We'll be in touch soon regarding your {{ ticketText }}.
        </p>
        <p class="text-h6">See you at the Gala!</p>
      </q-card-section>
      <q-card-actions class="justify-end">
        <q-btn label="Close" @click="model = false" color="positive" />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script setup>
import { computed } from "vue";

const model = defineModel();
const props = defineProps(["numTickets"]);

const ticketText = computed(() => {
  return props.numTickets > 1 ? `tickets` : `ticket`;
});
</script>
