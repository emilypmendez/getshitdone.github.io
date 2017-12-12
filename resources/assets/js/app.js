// Load dependencies and settings
require('./bootstrap');

// Load Vue Bootstrap implementation
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

// Load global components
Vue.component('login-form', require('./components/forms/LoginForm.vue'));
Vue.component('post-request-link', require('./components/PostRequestLink.vue'));
Vue.component('register-form', require('./components/forms/RegisterForm.vue'));

// Vue root instance
new Vue({
    el: "#app",
});