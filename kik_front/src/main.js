import { createApp } from "vue";
import App from "./App.vue";
import axios from "axios";
import VueAxios from "vue-axios";
import store from './store'

createApp(App).use(store)
  .use(VueAxios, axios)
  .mount("#app");
