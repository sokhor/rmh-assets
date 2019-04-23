require('./bootstrap');
import Vue from 'vue'
import Vuetify from 'vuetify'
import moment from 'moment'
import router from './router'
import store from './store'
import AppMain from './components/appMain.vue'

Vue.use(Vuetify)

Object.defineProperties(Vue.prototype, {
    $moment: {
        get() {
            return moment
        }
    }
})

const app = new Vue({
    router,
    store,
    render: h => h(AppMain)
}).$mount('#app');
