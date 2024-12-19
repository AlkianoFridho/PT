import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Cart from '../views/Cart.vue';
import Payment from '../views/Payment.vue';
import About from '../views/About.vue';
import Contact from '../views/Contact.vue';
import Products from '../views/Products.vue';
import Register from '../views/Register.vue';
import Signin from '../views/Signin.vue';
import Userlist from '../List/userlist.vue';
import Editlist from '../List/editlist.vue';

const routes = [
  { path: '/', component: Home },
  { path: '/cart', component: Cart },
  { path: '/payment', component: Payment },
  { path: '/about', component: About },
  { path: '/contact', component: Contact },
  {path: '/product', component: Products},
  {path: '/register', component: Register},
  {path: '/login', component: Signin},
  {path: '/userlist', component: Userlist},
  {path: '/editlist/:id', component: Editlist,props:true}
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
