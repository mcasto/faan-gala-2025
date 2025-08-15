<template>
  <div class="row">
    <div class="col-12 col-md-6">
      <div v-html="store.auctionPalooza?.leftPanel"></div>
    </div>
    <div class="col-12 col-md-6">
      <div v-html="store.auctionPalooza?.rightPanel"></div>
    </div>
    <div class="col-12">
      <div v-html="store.auctionPalooza?.bottomPanel"></div>
      <auction-form></auction-form>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";
import AuctionForm from "src/components/AuctionForm.vue";

const store = useStore();
</script>
