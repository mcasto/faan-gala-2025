<template>
  <div>
    <div
      style="
        min-height: 100vh;
        background: linear-gradient(to bottom right, #334155, #0f172a);
      "
    >
      <div
        style="
          width: 100%;
          margin-left: auto;
          margin-right: auto;
          padding-left: 1rem;
          padding-right: 1rem;
          padding-top: 2rem;
          padding-bottom: 2rem;
        "
      >
        <div style="text-align: center; margin-bottom: 3rem;">
          <h1
            style="
              font-size: 2.25rem;
              line-height: 2.5rem;
              font-weight: 700;
              color: white;
              margin-bottom: 1rem;
            "
          >
            <div v-html="store.meetFaantastics.header"></div>
          </h1>
        </div>

        <!-- Board Section -->
        <section style="margin-bottom: 4rem;">
          <div
            style="
              background-color: rgba(255, 255, 255, 0.1);
              backdrop-filter: blur(12px);
              border-radius: 0.5rem;
              padding: 2rem;
            "
          >
            <h2
              style="
                font-size: 1.875rem;
                line-height: 2.25rem;
                font-weight: 700;
                color: white;
                margin-bottom: 2rem;
                text-align: center;
              "
            >
              <div v-html="store.meetFaantastics.boardSection.header"></div>
            </h2>
            <div style="color: white;">
              <div v-html="store.meetFaantastics.boardSection.text"></div>
            </div>
          </div>
        </section>

        <!-- Team Section -->
        <section style="margin-bottom: 4rem;">
          <div
            style="
              background-color: rgba(255, 255, 255, 0.1);
              backdrop-filter: blur(12px);
              border-radius: 0.5rem;
              padding: 2rem;
            "
          >
            <h2
              style="
                font-size: 1.875rem;
                line-height: 2.25rem;
                font-weight: 700;
                color: white;
                margin-bottom: 2rem;
                text-align: center;
              "
            >
              <div v-html="store.meetFaantastics.teamSection.header"></div>
            </h2>
            <div style="color: white;">
              <div v-html="store.meetFaantastics.teamSection.text"></div>
            </div>
          </div>
        </section>

        <!-- Committee Section -->
        <section style="margin-bottom: 4rem;">
          <div
            style="
              background-color: rgba(255, 255, 255, 0.1);
              backdrop-filter: blur(12px);
              border-radius: 0.5rem;
              padding: 2rem;
            "
          >
            <h2
              style="
                font-size: 1.875rem;
                line-height: 2.25rem;
                font-weight: 700;
                color: white;
                margin-bottom: 2rem;
                text-align: center;
              "
            >
              <div v-html="store.meetFaantastics.committeeSection.header"></div>
            </h2>
            <div style="color: white;">
              <div v-html="store.meetFaantastics.committeeSection.text"></div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "src/stores/store";

const store = useStore();
</script>
