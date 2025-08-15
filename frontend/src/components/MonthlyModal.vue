<template>
  <q-dialog v-model="model">
    <q-card>
      <q-toolbar class="justify-end">
        <q-btn round flat icon="close" @click="model = false"></q-btn>
      </q-toolbar>
      <q-card-section>
        <div class="text-h6">{{ config.modalLabel }}</div>
        <p>{{ config.description }}</p>
      </q-card-section>

      <q-card-section>
        <div id="paypal-button-container"></div>
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script setup>
const model = defineModel();
const props = defineProps(["config"]);
</script>
