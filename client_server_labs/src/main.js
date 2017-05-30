// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import App from './App'

Vue.config.productionTip = false;

Vue.use(VueRouter);
Vue.use(VueResource);

const routes = [
  {path: '/' , component: App , name: 'home'}
];

const router = new VueRouter({
  mode: 'history',
  routes
});


new Vue({
  router
}).$mount('#app');
