/*
 * Includes
 */
window._ = require("lodash");
//window.$ = window.jQuery = require("jquery-slim");
window.Vue = require("vue");
window.axios = require("axios");
window.toastr = require("toastr");
window.swal = require('sweetalert2');

// Pusher installation
window.Pusher = require('pusher-js');
import Echo from "laravel-echo";

/*
 * toastr settings
 */
window.toastr.options = {
    "positionClass": "toast-bottom-right",
};

/*
 * axios settings
 */
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common["X-CSRF-TOKEN"] = document.head.querySelector("meta[name=\"csrf-token\"]").content;

/*
 * pusher settings
 */
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: document.head.querySelector("meta[name=\"pusher-key\"]").content,
    cluster: 'us2',
    namespace: 'GetShitDone.Events',
    encrypted: true
});