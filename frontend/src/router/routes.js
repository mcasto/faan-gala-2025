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
        meta: { label: "Home", order: 1 },
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
              label: "Sponsorship Opportunities",
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
            meta: { label: "Join Us", section: "get-involved", order: 4 },
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
              label: "Meet the Faantastics",
              section: "get-involved",
              order: 5,
            },
            name: "meet-faantastics",
          },
        ],
        meta: { label: "Get Involved", dropdown: true, order: 2 },
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

          console.log({ response });

          store.auctionPalooza = response;
        },
        meta: { label: "Auction Palooza", order: 6 },
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
