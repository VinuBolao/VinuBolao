
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./moment-pt-br');

window.Vue = require('vue');
window.Vue.use(require('vue-resource'));
window.Vue.use(require('vue-moment'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('jogo', require('./components/Jogo.vue'));
Vue.component('palpites', require('./components/Palpites.vue'));
Vue.component('classificacao', require('./components/Classificacao.vue'));
Vue.component('participante', require('./components/Participante.vue'));

const app = new Vue({
    el: '#app'
});
