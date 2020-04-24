import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/pages/Home.vue'
import ListCategory from '@/pages/Category/ListCategory.vue'
import CreateCategory from '@/pages/Category/CreateCategory.vue'
import ListProduct from '@/pages/Product/ListProduct.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/categorias',
    name: 'ListCategory',
    component: ListCategory
  },
  {
    path: '/categorias/criar',
    name: 'CreateCategory',
    component: CreateCategory
  },
  {
    path: '/categorias/:id',
    name: 'EditCategory',
    component: CreateCategory
  },
  {
    path: '/produtos',
    name: 'ListProduct',
    component: ListProduct
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
