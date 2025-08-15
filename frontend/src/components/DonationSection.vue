<template>
  <div>
    <div class="text-white text-h6">
      <q-btn color="warning" class="text-black full-width">
        <div class="flex justify-between items-center">
          <div>{{ store.joinUs.oneTimeConfig.label }}</div>
          <q-icon name="mdi-chevron-down" class="q-ml-md"></q-icon>
        </div>
        <q-menu dark class="bg-primary" fit>
          <q-list separator dark>
            <q-item
              v-for="(item, index) in store.joinUs.oneTimeConfig.dropdown"
              :key="`one-time-dropdown-${index}`"
              clickable
              @click="openOneTimeModal(item)"
            >
              <q-item-section>{{ item.label }}</q-item-section>
            </q-item>
          </q-list>
        </q-menu>
      </q-btn>

      <q-btn
        color="warning"
        class="text-black full-width q-mt-sm"
        :label="store.joinUs.monthlyConfig.buttonLabel"
        @click="openMonthlyModal"
      ></q-btn>
    </div>
    <one-time-modal
      v-model="showOneTimeModal"
      :config="modalConfig"
    ></one-time-modal>
    <monthly-modal
      v-model="showMonthlyModal"
      :config="store.joinUs.monthlyConfig"
    ></monthly-modal>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";
import { onMounted, ref } from "vue";
import OneTimeModal from "./OneTimeModal.vue";
import MonthlyModal from "./MonthlyModal.vue";

const store = useStore();

const showOneTimeModal = ref(false);
const showMonthlyModal = ref(false);
const modalConfig = ref(null);

const openOneTimeModal = (item) => {
  modalConfig.value = item;
  showOneTimeModal.value = true;
};

// Load PayPal SDK when component mounts
onMounted(() => {
  const script = document.createElement("script");
  script.src =
    "https://www.paypal.com/sdk/js?client-id=ATHisUp0ai56Xleqxu6JdHOY-u0zbSxic4TB7SSm2Tefzgv1dmZJkN7ghlPMApTSmeIjKQEu_03oipI-&vault=true&intent=subscription";
  script.onload = () => {
    console.log("PayPal SDK loaded");
  };
  document.body.appendChild(script);
});

const openMonthlyModal = () => {
  modalConfig.value = store.joinUs.monthlyConfig;
  showMonthlyModal.value = true;
  // Need to wait for modal to render before initializing button
  setTimeout(initPayPalButton, 100);
};

const initPayPalButton = () => {
  // Clear previous button if exists
  const container = document.getElementById("paypal-button-container");
  if (container) container.innerHTML = "";

  if (window.paypal) {
    paypal
      .Buttons({
        style: {
          shape: "rect",
          color: "gold",
          layout: "vertical",
          label: "subscribe",
        },
        createSubscription: function (data, actions) {
          return actions.subscription.create({
            plan_id: "P-00T03963TT926993UNCKLB3Q",
          });
        },
        onApprove: function (data) {
          alert("Thank you! Your subscription ID is: " + data.subscriptionID);
          showMonthlyModal.value = false;
        },
        onError: function (err) {
          console.error("PayPal error:", err);
          alert("There was an error processing your donation");
        },
      })
      .render("#paypal-button-container");
  } else {
    console.error("PayPal SDK not loaded");
  }
};
</script>
