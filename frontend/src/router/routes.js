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
        path: "2025-auction",
        component: () => import("pages/2025Auction.vue"),
        meta: {
          label: { en: "2025 Auction", es: "Subasta de 2025" },
          order: 1,
        },
        name: "2025-auction",
      },
      {
        path: "ungala-tickets",
        component: () => import("pages/UgnalaGalaTickets.vue"),
        meta: {
          label: { en: "UngalaGala Tickets", es: "Entradas para UngalaGala" },
          order: 2,
        },
        name: "unbala-tickets",
      },
      {
        path: "guest-information",
        component: () => import("pages/GuestInformation.vue"),
        meta: {
          label: { en: "Guest Information", es: "Información para huéspedes" },
          order: 3,
        },
        name: "guest-information",
      },
      {
        path: "superdogs-sanctuary",
        component: () => import("pages/SuperDogsSanctuary.vue"),
        meta: {
          label: { en: "SuperDogs Sanctuary", es: "Santuario SuperDogs" },
        },
        name: "superdogs-sanctuary",
      },
      {
        path: "donate",
        beforeEnter: () => {
          location = "https://faanecuador.org/donate";
        },
        meta: {
          label: { en: "Donate", es: "Donar" },
        },
        name: "donate",
      },
      // {
      //   path: "tickets",
      //   component: () => import("pages/TicketsPage.vue"),
      //   beforeEnter: async () => {
      //     const store = useStore();
      //     store.tickets = await callApi({ path: "/tickets", method: "get" });
      //   },
      //   meta: { label: { en: "Tickets", es: "Entradas" }, order: 1.5 },
      //   name: "tickets",
      // },
      // {
      //   path: "get-involved",
      //   children: [
      //     {
      //       path: "sponsorship-opportunities",
      //       component: () => import("pages/SponsorshipOpportunitiesPage.vue"),
      //       beforeEnter: async () => {
      //         const store = useStore();

      //         store.sopp = await callApi({
      //           path: "/sponsorship-opportunities",
      //           method: "get",
      //         });
      //       },
      //       meta: {
      //         label: {
      //           en: "Sponsorship Opportunities",
      //           es: "Oportunidades de Patrocinio",
      //         },
      //         section: "get-involved",
      //         order: 3,
      //       },
      //       name: "sponsorship-opportunities",
      //     },
      //     {
      //       path: "join-us",
      //       component: () => import("src/pages/JoinUsPage.vue"),
      //       beforeEnter: async () => {
      //         const store = useStore();

      //         store.joinUs = await callApi({
      //           path: "/join-us",
      //           method: "get",
      //         });
      //       },
      //       meta: {
      //         label: {
      //           en: "Join Us",
      //           es: "Únete a Nosotros",
      //         },
      //         section: "get-involved",
      //         order: 4,
      //       },
      //       name: "join-us",
      //     },
      //     // {
      //     //   path: "meet-faantastics",
      //     //   component: () => import("pages/MeetFaantasticsPage.vue"),
      //     //   beforeEnter: async () => {
      //     //     const store = useStore();

      //     //     store.meetFaantastics = await callApi({
      //     //       path: "/meet-faantastics",
      //     //       method: "get",
      //     //     });
      //     //   },
      //     //   meta: {
      //     //     label: {
      //     //       en: "Meet the Faantastics",
      //     //       es: "Conoce a los Faantásticos",
      //     //     },
      //     //     section: "get-involved",
      //     //     order: 5,
      //     //   },
      //     //   name: "meet-faantastics",
      //     // },
      //   ],
      //   meta: {
      //     label: { en: "Get Involved", es: "Involúcrate" },
      //     dropdown: true,
      //     order: 2,
      //   },
      //   name: "get-involved",
      // },
      // {
      //   path: "auction-palooza",
      //   component: () => import("pages/AuctionPaloozaPage.vue"),
      //   beforeEnter: async () => {
      //     const store = useStore();

      //     const response = await callApi({
      //       path: "/auction-palooza",
      //       method: "get",
      //     });

      //     store.auctionPalooza = response;
      //   },
      //   meta: {
      //     label: { en: "Auction Palooza", es: "Subasta Palooza" },
      //     order: 6,
      //   },
      //   name: "auction-palooza",
      // },
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
