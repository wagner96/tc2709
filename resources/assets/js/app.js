
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery.bootstrap.wizard.min');
window.Vue = require('vue');
import VueResource from 'vue-resource'
Vue.use(VueResource)
import VcUsers from './components/users.vue'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


new Vue({
    el: '#app',
    
    components:{
      VcUsers  
    },
    data: {
        title: 'TESTE'
    }


});
