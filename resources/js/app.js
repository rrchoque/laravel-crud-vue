require("./bootstrap");

// import vue from 'vue';
// window.Vue = vue;

// import App from './components/App.vue';

// // importamos axios
// import VueAxios from 'vue-axios';
// import axios from 'axios';

// //importamos y configuramos el vue-router
// import VueRouter from 'vue-router';
// import { routes } from './routes.js';
// import Vue from 'vue';
// Vue.use(VueRouter);
// Vue.use(VueAxios, axios);
// const router = new VueRouter({
//     mode: 'history',
//     routes,
// });

// const app = new Vue({
//     el: '#app',
//     router,
//     render: h => h(App),
// });

import { createApp } from "vue";
import App from "./components/App.vue";
import router from "./router";
import axios from "axios";
import VueAxios from "vue-axios";

const app = createApp(App);

app.use(router);
app.use(VueAxios, axios);

app.mount("#app");
