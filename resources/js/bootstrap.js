import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// resources/js/app.js
import Wretch from "wretch";

// Initialize Wretch with Laravel defaults
const wretch = Wretch()
  .errorType("json")
  .options({
    credentials: "same-origin",
    headers: {
      "X-Requested-With": "XMLHttpRequest",
      Accept: "application/json",
      "Content-Type": "application/json",
      "X-CSRF-TOKEN":
        document.head.querySelector('meta[name="csrf-token"]')?.content || "",
    },
  });

// For console debugging in development
if (import.meta.env.DEV) {
  window.wretch = wretch;
}

export default wretch;
