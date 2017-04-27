
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.component('app-index', require('./components/App.vue'));
 Vue.component('app-add', require('./components/Add.vue'));
 Vue.component('app-edit', require('./components/Edit.vue'));

 const app = new Vue({
   el: '#app'
 });
