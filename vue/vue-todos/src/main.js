import { createPinia } from "pinia";
import { createApp } from "vue";

import { plugin, defaultConfig } from "@formkit/vue";

import App from "./App.vue";

const app = createApp(App);

app.use(createPinia()).use(plugin, defaultConfig).mount("#app");
