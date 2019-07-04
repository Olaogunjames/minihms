
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import NProgress from 'nprogress';
import { Form, HasError, AlertError } from 'vform';
import moment from 'moment';
import swal from 'sweetalert2'
window.swal = swal;
window.NProgress = NProgress;
window.Fire = new Vue();

 
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.filter('humanDate', function(created){
  return moment(created).format('MMMM Do YYYY, h:mm:ss a');
})

// let str = '';
// Vue.filter('removeSpace', function(){
//   return  str.replace(/ /g, '-');
// })



const routes = [
    { name: 'home', path: '/', component: require('./components/home.vue').default },   
    { name: 'rooms', path: '/rooms', component: require('./components/rooms.vue').default },
    { name: 'room-details', path: '/room/:id', component: require('./components/room-details.vue').default },
    { name: 'dashboard', path: '/admin/dashboard', component: require('./components/dashboard.vue').default },    
    { name: 'userdashboard', path: '/dashboard', component: require('./components/userdashboard.vue').default },
    { name: 'reservations', path: '/admin/reservations', component: require('./components/reservations.vue').default },
    { name: 'confirm-reservation', path: '/admin/confirm-reservation', component: require('./components/confirm-reservations.vue').default },
    { name: 'users', path: '/admin/users', component: require('./components/users.vue').default },
    { name: 'profile', path: '/profile', component: require('./components/profile.vue').default },
    { name: 'adminRoom', path: '/admin/rooms', component: require('./components/adminRoom.vue').default },
    // { name: 'example', path: '/example', component: require('./components/ExampleComponent2.vue').default },
  ]

  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
  

  router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start()
        NProgress.set(0.4); // To set a progress percentage, call .set(n), where n is a number between 0..1
        NProgress.inc(); // To increment the progress bar, just use .inc(). This increments it with a random amount. This will never get to 100%: use it for every image load (or similar).If you want to increment by a specific value, you can pass that as a parameter
        NProgress.configure({ ease: 'ease', speed: 500 }); // Adjust animation settings using easing (a CSS easing string) and speed (in ms). (default: ease and 200)
        NProgress.configure({trickleSpeed: 800 }); //Adjust how often to trickle/increment, in ms.
    }
    next()
  })
  
  
  router.afterEach((to, from) => {
       
  })
  
 


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Sidebar', require('./components/Sidebar.vue').default);
Vue.component('UserSidebar', require('./components/UserSidebar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
