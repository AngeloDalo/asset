require('./bootstrap');

window.Vue = require('vue');

import App from './views/App';
import Coin from './pages/Coin';
import Stock from './pages/Stock';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:  [
            {
                path: '/coin',
                name: 'coin',
                component: Coin
            },
            {
                path: '/stock',
                name: 'stock',
                component: Stock
            },
        ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
