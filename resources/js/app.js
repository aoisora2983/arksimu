require('./bootstrap');
import Vue from 'vue'
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

window.Vue = require('vue');

Vue.component('simulator-component', require('./components/SimulatorComponent.vue').default);
Vue.use(BootstrapVue)

const app = new Vue({
}).$mount('#app')