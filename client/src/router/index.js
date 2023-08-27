import {createRouter, createWebHistory} from 'vue-router';
import Category from '../components/Category.vue'

const routes = [
  {
    path:'/',
    name:'Category',
    component:Category
  }

]

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: "apbd-active",
    linkExactActiveClass: "apbd-exact-active",
})

export default router
