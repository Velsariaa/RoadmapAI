import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';

import { createApp } from 'vue';
import App from './App.vue';
import BootstrapVue3 from 'bootstrap-vue-3';
import router from './router';

const app = createApp(App);
app.use(BootstrapVue3);

createApp(App).use(router).mount('#app');
