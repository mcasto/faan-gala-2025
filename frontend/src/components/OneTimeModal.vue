<template>
  <q-dialog v-model="model">
    <q-card style="width: 300px;">
      <q-card-section class="row items-center">
        <div class="text-h6">{{ config.label }}</div>
        <q-space />
        <q-btn icon="close" flat round dense v-close-popup />
      </q-card-section>

      <q-card-section class="column items-center q-gutter-y-md">
        <p>{{ config.thanks }}</p>
        <form :action="config.url" method="post" target="_blank">
          <q-btn
            type="submit"
            color="primary"
            label="Continue to PayPal"
            v-close-popup
          />
        </form>
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script setup>
const model = defineModel();
const props = defineProps(["config"]);
</script>
