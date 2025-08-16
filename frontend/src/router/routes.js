import callApi from "src/assets/call-api";
import { useStore } from "src/stores/store";

const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/IndexPage.vue"),
        beforeEnter: async () => {
          const store = useStore();
          store.welcome = await callApi({ path: "/welcome", method: "get" });
        },
        meta: { label: { en: "Home", es: "Inicio" }, order: 1 },
        name: "home",
      },
      {
        path: "get-involved",
        children: [
          {
            path: "sponsorship-opportunities",
            component: () => import("pages/SponsorshipOpportunitiesPage.vue"),
            beforeEnter: async () => {
              const store = useStore();

              store.sopp = await callApi({
                path: "/sponsorship-opportunities",
                method: "get",
              });
            },
            meta: {
              label: {
                en: "Sponsorship Opportunities",
                es: "Oportunidades de Patrocinio",
              },
              section: "get-involved",
              order: 3,
            },
            name: "sponsorship-opportunities",
          },
          {
            path: "join-us",
            component: () => import("src/pages/JoinUsPage.vue"),
            beforeEnter: async () => {
              const store = useStore();

              store.joinUs = await callApi({
                path: "/join-us",
                method: "get",
              });
            },
            meta: {
              label: {
                en: "Join Us",
                es: "Únete a Nosotros",
              },
              section: "get-involved",
              order: 4,
            },
            name: "join-us",
          },
          {
            path: "meet-faantastics",
            component: () => import("pages/MeetFaantasticsPage.vue"),
            beforeEnter: async () => {
              const store = useStore();

              store.meetFaantastics = await callApi({
                path: "/meet-faantastics",
                method: "get",
              });
            },
            meta: {
              label: {
                en: "Meet the Faantastics",
                es: "Conoce a los Faantásticos",
              },
              section: "get-involved",
              order: 5,
            },
            name: "meet-faantastics",
          },
        ],
        meta: {
          label: { en: "Get Involved", es: "Involúcrate" },
          dropdown: true,
          order: 2,
        },
        name: "get-involved",
      },
      {
        path: "auction-palooza",
        component: () => import("pages/AuctionPaloozaPage.vue"),
        beforeEnter: async () => {
          const store = useStore();

          const response = await callApi({
            path: "/auction-palooza",
            method: "get",
          });

          store.auctionPalooza = response;
        },
        meta: {
          label: { en: "Auction Palooza", es: "Subasta Palooza" },
          order: 6,
        },
        name: "auction-palooza",
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
