require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router';

Vue.use(VueRouter)
// ===== Router Import
import {routes} from './routes';

// Import user Class
import User from './Helpers/User';
window.User = User;

// Sweetalert start =======
import Swal from 'sweetalert2'
window.Swal = Swal;

// Notification =========
import Notification from './Helpers/Notification';
window.Notification = Notification;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    // onOpen
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;
// Sweetalert end =======

const router = new VueRouter({
    routes,
    mode: 'history'
})



const app = new Vue({
    el: '#app',
    router
});
