/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
const app = new Vue({
    el: '#app',
});
*/

/*
import IndexComponent from './components/IndexOneComponent.vue';

const app = new Vue({
    el: '#app',
    components: {
        'index-component': IndexComponent,
    },

});
*/

import VueRouter from 'vue-router'; //!!!npm install --save vue-router

window.Vue.use(VueRouter);

import IndexComponent from './components/cards/IndexComponent.vue';
import CreateComponent from './components/cards/CreateComponent.vue';
import EditComponent from './components/cards/EditComponent.vue';

const routes = [
    {
        path: '/',
        name: 'dashboard', //!!!for push-params
        components: {
            indexComponent: IndexComponent,
        },
    },
    {path: '/create', component: CreateComponent, name: 'CreateComponent'},
    {path: '/edit/:id', component: EditComponent, name: 'EditComponent'}, //:id - :to="{name: 'EditComponent', params: {id: card.id}}"
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')


