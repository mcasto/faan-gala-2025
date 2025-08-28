<template>
  <q-form @submit.prevent="handleSubmit" class="bg-secondary">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="text"
            v-model="formData.donor_name"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.donor_name"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="text"
            v-model="formData.contact_name"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.contact_name"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="email"
            v-model="formData.email"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.email"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="tel"
            mask="phone"
            v-model="formData.phone"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.phone"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="text"
            v-model="formData.address"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.address"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="text"
            v-model="formData.address_2"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.address_2"
            :placeholder="store.auctionPalooza?.address_2_placeholder"
            stack-label
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="text"
            v-model="formData.item_name"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.item_name"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="number"
            v-model="formData.item_value"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.item_value"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-uploader
            style="height: 300px;"
            url="/api/auction-item-image"
            ref="itemImageUploader"
            dark
            auto-upload
            :label="store.auctionPalooza?.item_image"
            accept="image/*"
            max-file-size="2000000"
            hide-upload-btn
            field-name="itemImage"
            :form-fields="[{ name: 'image_id', value: formData.image_id }]"
            @uploaded="
              (response) => {
                formData.item_image = response.files.length > 0;
              }
            "
          />
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="textarea"
            v-model="formData.description"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.description"
            :placeholder="store.auctionPalooza?.description_placeholder"
            stack-label
            required
          ></q-input>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="q-pa-sm">
          <q-input
            color="white"
            type="textarea"
            v-model="formData.terms_and_conditions"
            dense
            outlined
            dark
            :label="store.auctionPalooza?.terms"
            stack-label
          ></q-input>
        </div>
      </div>

      <div class="col-12 flex justify-end q-pr-md q-pb-md">
        <q-btn
          type="submit"
          label="Submit"
          color="warning"
          class="text-black"
        ></q-btn>
      </div>
    </div>
  </q-form>
</template>

<script setup>
import { Loading, Notify, uid } from "quasar";
import callApi from "src/assets/call-api";
import { useStore } from "src/stores/store";
import { ref } from "vue";

const store = useStore();

const itemImageUploader = ref(null);

const formData = ref({
  image_id: uid(),
  donor_name: null,
  contact_name: null,
  email: null,
  phone: null,
  address: null,
  address_2: null,
  item_name: null,
  item_value: 0,
  item_image: null,
  description: null,
  terms_and_conditions: null,
});

const handleSubmit = async () => {
  Loading.show({ delay: 100 });

  if (!formData.value.item_image) {
    Notify.create({
      type: "negative",
      message: "Item Image Required",
    });
    return;
  }

  const response = await callApi({
    path: "/auction-palooza",
    method: "post",
    payload: formData.value,
  });

  if (response) {
    Notify.create({
      type: "positive",
      message: "Auction Item Submitted Successfully",
    });

    formData.value = {
      image_id: uid(),
      donor_name: null,
      contact_name: null,
      email: null,
      phone: null,
      address: null,
      address_2: null,
      item_name: null,
      item_value: 0,
      item_image: null,
      description: null,
      terms_and_conditions: null,
    };

    itemImageUploader.value.reset();
  }

  Loading.hide();
};
</script>
