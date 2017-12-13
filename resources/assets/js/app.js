// Load dependencies and settings
require('./bootstrap');

// Load Vue Bootstrap implementation
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

// Load global components
Vue.component('create-objective-form', require('./components/forms/CreateObjectiveForm.vue'));
Vue.component('login-form', require('./components/forms/LoginForm.vue'));
Vue.component('post-request-link', require('./components/PostRequestLink.vue'));
Vue.component('register-form', require('./components/forms/RegisterForm.vue'));
Vue.component('update-objective-priority-form', require('./components/forms/UpdateObjectivePriorityForm.vue'));
Vue.component('update-objective-schedule-form', require('./components/forms/UpdateObjectiveScheduleForm.vue'));

// Vue root instance
new Vue({
    el: "#app",
});