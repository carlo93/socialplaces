require('./bootstrap');

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import { createApp } from 'vue'
import Home from './components/ExampleComponent.vue';

const app = createApp({});

app.component('home', Home);
app.mount('#app');