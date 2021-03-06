import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import { store } from "./store";
import i18n from "./i18n";
console.log(i18n);

import "./assets/tailwind.css";

import "./helper/validation/globalValidators.ts";

import BaseButton from "@/components/layout/BaseButton.vue";
import BaseInput from "@/components/layout/forms/BaseInput.vue";
import BaseCard from "@/components/layout/card/BaseCard.vue";

const app = createApp(App).use(i18n).use(store).use(router);

app.component("base-button", BaseButton);
app.component("base-input", BaseInput);
app.component("base-card", BaseCard);

app.mount("#app");
