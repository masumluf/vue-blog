require('./bootstrap');

import Swal from 'sweetalert2'





// CommonJS
import vue from 'vue'
import Vuex from 'vuex'
import vuestore from './store/app'
import {
    routes
} from './router/route'
import {
    Form,
    HasError,
    AlertError
} from 'vform'
import veditor from 'yimo-vue-editor'

import vueRouter from 'vue-router'



window.Vue = require('vue')


import {
    filter
} from './components/filter/filter'




Vue.use(Vuex)
const store = new Vuex.Store(
    vuestore
)

Vue.use(vueRouter);

Vue.use(veditor, {
    name: 'veditor', //Custom name
    config: {}, //wagnEditor config
    uploadHandler: (type, resTxt) => { //Upload processing hook
        if (type === 'success') {
            var res = JSON.parse(resTxt) //Do not process the default look at the return value bit image path
            if (res.status !== 1) {
                return null
            }
            return res.data
        } else if (type === 'error') {
            //todo toast
        } else if (type === 'timeout') {
            //todo toast
        }
        return 'upload failed__'
    }
})


window.vform = Form;





const router = new vueRouter({
    mode: 'hash',
    routes
})

window.swal = Swal

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
})



window.toast = Toast

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('admin-main', require('./components/admin/AdminMain.vue').default);
Vue.component('public-master', require('./components/public/PublicMaster.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store,
    filter
})

function newFunction() {
    return 'jquery';
}
