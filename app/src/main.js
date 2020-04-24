import Vue from 'vue'
import App from '@/App.vue'
import router from '@/router'
import store from '@/store'
import axios from '@/plugins/AxiosPlugin'
import VueAxios from 'vue-axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import vModal from 'vue-js-modal'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'


library.add(faUserSecret)

Vue.use(vModal, { dialog: true })
Vue.use(VueAxios, axios)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('font-awesome-icon', FontAwesomeIcon)
 
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
