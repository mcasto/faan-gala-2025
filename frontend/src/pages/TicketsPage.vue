<template>
  <div class="rsvp-page">
    <!-- Header Section -->
    <div class="header-section">
      <h1 class="title">{{ store.tickets?.header || "Registration Form" }}</h1>
      <p class="subtitle" v-html="store.tickets?.subheader"></p>
    </div>

    <!-- Main Form -->
    <q-form class="rsvp-form" @submit="onSubmit">
      <!-- Purchaser Information -->
      <div class="form-section">
        <h3 class="section-title">Purchaser Information</h3>

        <q-input
          v-model="formData.purchaser_name"
          :label="
            store.tickets?.['form-labels']?.purchaser_name?.label ||
            'Purchaser Name'
          "
          :hint="
            store.tickets?.['form-labels']?.purchaser_name?.hint ||
            'You are the person ordering ticket(s)'
          "
          outlined
          class="form-input"
          :rules="[(val) => !!val || 'Name is required']"
        />

        <div class="input-row">
          <q-input
            v-model="formData.email"
            :label="store.tickets?.['form-labels']?.email?.label || 'Email'"
            type="email"
            outlined
            class="form-input"
            :rules="[
              (val) => !!val || 'Email is required',
              (val) => /.+@.+\..+/.test(val) || 'Enter a valid email',
            ]"
          />
          <q-input
            v-model="formData.phone"
            :label="store.tickets?.['form-labels']?.phone?.label || 'Phone'"
            outlined
            class="form-input"
            mask="(###) ###-####"
            unmasked-value
          />
        </div>
      </div>

      <!-- Ticket Quantity -->
      <div class="form-section">
        <q-input
          v-model="formData.quantity"
          type="number"
          :label="store.tickets?.['form-labels']?.quantity?.label || 'Quantity'"
          :hint="
            store.tickets?.['form-labels']?.quantity?.hint ||
            'Number of Tickets Purchased'
          "
          outlined
          class="form-input"
          min="1"
          max="15"
          :rules="[(val) => val >= 1 || 'At least one ticket is required']"
        />
      </div>

      <!-- Guest Information -->
      <div class="form-section">
        <div class="guest-section-header">
          <h3 class="section-title">Guest Information</h3>
          <p class="guest-count">({{ formData.guests.length }} guests added)</p>
        </div>

        <p class="section-subtitle">
          Add information for any guests attending with you
        </p>

        <div class="guest-cards">
          <div
            v-for="(guest, index) in formData.guests"
            :key="index"
            class="guest-card"
          >
            <div class="guest-header">
              <h4>Guest {{ index + 1 }}</h4>
              <q-btn
                icon="delete"
                flat
                round
                dense
                color="negative"
                @click="removeGuest(index)"
                class="guest-remove-btn"
              />
            </div>

            <div class="input-row">
              <q-input
                v-model="guest.name"
                :label="store.tickets?.['guest-form']?.name || 'Guest Name'"
                outlined
                class="form-input"
              />
              <q-input
                v-model="guest.email"
                :label="store.tickets?.['guest-form']?.email || 'Guest Email'"
                type="email"
                outlined
                class="form-input"
                :rules="[
                  (val) =>
                    !val || /.+@.+\..+/.test(val) || 'Enter a valid email',
                ]"
              />
            </div>
          </div>
        </div>

        <!-- Add Guest Button -->
        <div class="add-guest-section" v-if="formData.guests.length < 15">
          <q-btn
            icon="person_add"
            label="Add Guest"
            color="secondary"
            @click="addGuest"
            class="add-guest-btn"
          />
          <p class="guest-limit-note">You can add up to 15 guests</p>
        </div>

        <!-- Guest Limit Reached Message -->
        <div class="guest-limit-reached" v-else>
          <q-icon name="check_circle" color="positive" />
          <span>{{ maximum_guests }}</span>
        </div>
      </div>

      <!-- Additional Information -->
      <div class="form-section">
        <h3 class="section-title">
          {{ store.tickets?.additional_information }}
        </h3>

        <q-input
          v-model="formData.table_number_or_ambassador"
          :label="
            store.tickets?.['form-labels']?.table_number_or_ambassador?.label ||
            'Table ID or Ambassador'
          "
          :hint="
            store.tickets?.['form-labels']?.table_number_or_ambassador?.hint ||
            'Some tables have an Ambassador/Movie Theme. ID if known.'
          "
          outlined
          class="form-input"
        />

        <q-input
          v-model="formData.vegetarian_requirement"
          :label="
            store.tickets?.['form-labels']?.vegetarian_requirement?.label ||
            'Vegetarian Requirement'
          "
          :hint="
            store.tickets?.['form-labels']?.vegetarian_requirement?.hint ||
            'The entree will be a combination of beef and chicken. If you prefer vegetarian, please note your preferences/restrictions.'
          "
          type="textarea"
          outlined
          class="form-input"
          rows="2"
        />

        <q-input
          v-model="formData.note_from_rsvp"
          :label="
            store.tickets?.['form-labels']?.note_from_rsvp?.label ||
            'Note from RSVP'
          "
          :hint="
            store.tickets?.['form-labels']?.note_from_rsvp?.hint ||
            'What are you most looking forward to from this event?'
          "
          type="textarea"
          outlined
          class="form-input"
          rows="2"
        />
      </div>

      <!-- Payment Method -->
      <div class="form-section">
        <h3 class="section-title">
          {{
            store.tickets?.["form-labels"]?.payment_methods?.label ||
            "Payment Method"
          }}
        </h3>

        <q-option-group
          v-model="formData.payment_method"
          :options="paymentOptions"
          color="primary"
          class="payment-options"
        />

        <div
          v-if="formData.payment_method"
          class="payment-info"
          v-html="getPaymentInfo(formData.payment_method)"
        ></div>
      </div>

      <!-- Submit Button -->
      <div class="form-actions">
        <q-btn
          :label="
            store.tickets?.['form-labels']?.submit?.label || 'Submit RSVP'
          "
          type="submit"
          color="primary"
          class="submit-btn"
          :loading="submitting"
        />
      </div>
    </q-form>

    <rsvp-thanks :num-tickets="formData.quantity" v-model="showThanks" />
  </div>
</template>

<script setup>
import { ref, reactive, computed } from "vue";
import { useStore } from "src/stores/store";
import { Loading, Notify } from "quasar";
import callApi from "src/assets/call-api";
import RsvpThanks from "src/components/RsvpThanks.vue";

const store = useStore();
const submitting = ref(false);

const showThanks = ref(false);

// Initialize form data
let formData = reactive({
  purchaser_name: "",
  email: "",
  phone: "",
  quantity: 1,
  guests: [],
  table_number_or_ambassador: "",
  vegetarian_requirement: "",
  note_from_rsvp: "",
  payment_method: "0", // Default to first payment method
});

// Payment options computed from store data
const paymentOptions = computed(() => {
  const methods = store.tickets?.["form-labels"]?.payment_methods;
  if (!methods) return [];

  return Object.entries(methods)
    .filter(([key]) => !isNaN(key)) // Only numeric keys (0, 1, 2)
    .map(([key, value]) => ({
      label: value.label,
      value: key,
    }));
});

// Get payment info for selected method
function getPaymentInfo(methodKey) {
  return (
    store.tickets?.["form-labels"]?.payment_methods?.[methodKey]?.info || ""
  );
}

// Add a guest
function addGuest() {
  if (formData.guests.length < 15) {
    formData.guests.push({ name: "", email: "" });
  }
}

// Remove a guest
function removeGuest(index) {
  formData.guests.splice(index, 1);
}

// Submit form
async function onSubmit() {
  Loading.show(500);

  const response = await callApi({
    path: "/tickets",
    method: "post",
    payload: formData,
  });

  if (response.status == "ok") {
    // mc-todo: route to a thank you page
    // "we'll see you at the Gala & be in touch soon regarding your tickets"
    showThanks.value = true;

    formData = {
      purchaser_name: "",
      email: "",
      phone: "",
      quantity: 1,
      guests: [],
      table_number_or_ambassador: "",
      vegetarian_requirement: "",
      note_from_rsvp: "",
      payment_method: "0", // Default to first payment method
    };

    Loading.hide();

    return;
  }

  Notify.create({
    type: "negative",
    message: "There was an error submitting your RSVP. Please try again.",
    timeout: 3000,
  });

  Loading.hide();
}
</script>

<style scoped>
.rsvp-page {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.header-section {
  text-align: center;
  margin-bottom: 30px;
}

.title {
  color: oklch(0.279 0.041 260.031);
  font-size: 2.5rem;
  font-weight: 600;
  margin-bottom: 10px;
}

.subtitle {
  color: oklch(0.446 0.043 257.281);
  font-size: 1.2rem;
}

.form-section {
  background: white;
  border-radius: 10px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.section-title {
  color: oklch(0.279 0.041 260.031);
  margin-bottom: 15px;
  font-size: 1.3rem;
}

.guest-section-header {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 5px;
}

.guest-count {
  color: oklch(0.446 0.043 257.281);
  font-size: 0.9rem;
  margin: 0;
}

.section-subtitle {
  color: oklch(0.446 0.043 257.281);
  margin-bottom: 15px;
}

.form-input {
  margin-bottom: 15px;
}

.input-row {
  display: flex;
  gap: 15px;
}

.input-row .form-input {
  flex: 1;
}

.guest-cards {
  display: flex;
  flex-direction: column;
  gap: 15px;
  margin-bottom: 20px;
}

.guest-card {
  border: 1px solid oklch(0.85 0.02 260);
  border-radius: 8px;
  padding: 15px;
  background: #f9f9f9;
}

.guest-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.guest-header h4 {
  color: oklch(0.279 0.041 260.031);
  margin: 0;
}

.guest-remove-btn {
  font-size: 0.8rem;
}

.add-guest-section {
  text-align: center;
  padding: 15px;
  border: 2px dashed oklch(0.85 0.02 260);
  border-radius: 8px;
  margin-bottom: 15px;
}

.add-guest-btn {
  margin-bottom: 10px;
}

.guest-limit-note {
  color: oklch(0.446 0.043 257.281);
  font-size: 0.9rem;
  margin: 0;
}

.guest-limit-reached {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 15px;
  background-color: oklch(0.97 0.01 160);
  border-radius: 8px;
  color: oklch(0.279 0.041 260.031);
  font-weight: 500;
}

.payment-options {
  margin-bottom: 15px;
}

.payment-info {
  background: #f5f5f5;
  padding: 15px;
  border-radius: 8px;
  margin-top: 15px;
}

.payment-info :deep(address) {
  font-style: normal;
  margin-top: 10px;
}

.payment-info :deep(.text-bold) {
  font-weight: 600;
}

.payment-info :deep(a) {
  color: oklch(0.279 0.041 260.031);
  text-decoration: none;
  font-weight: 500;
}

.payment-info :deep(a:hover) {
  text-decoration: underline;
}

.form-actions {
  text-align: center;
  margin-top: 30px;
}

.submit-btn {
  padding: 10px 30px;
  font-size: 1.1rem;
}

/* Responsive adjustments */
@media (max-width: 600px) {
  .rsvp-page {
    padding: 15px;
  }

  .input-row {
    flex-direction: column;
    gap: 0;
  }

  .title {
    font-size: 2rem;
  }

  .guest-section-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 5px;
  }
}
</style>
