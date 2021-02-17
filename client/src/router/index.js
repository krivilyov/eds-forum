import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import SignIn from '../views/SignIn'
import SignUp from '../views/SignUp'
import Category from '../views/Category'
import ArticleInfo from '../views/ArticleInfo'
import CreateArticle from '../views/CreateArticle'
import PageNotFound from '../views/PageNotFound'
import store from '@/store'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/about',
    name: 'about',
    component: About
  },
  {
    path: '/create-article',
    name: 'create article',
    component: CreateArticle,
    beforeEnter: (to, from, next) => {
      if(!store.getters['auth/authenticated']) {
        return next({
          name: 'signin'
        })
      }

      next()
    }
  },
  {
    path: '/signin',
    name: 'signin',
    component: SignIn,
    beforeEnter: (to, from, next) => {
      if(store.getters['auth/user']) {
        return next({
          name: 'home'
        })
      }

      next()
    }
  },
  {
    path: '/signup',
    name: 'signup',
    component: SignUp,
    beforeEnter: (to, from, next) => {
      if(store.getters['auth/user']) {
        return next({
          name: 'home'
        })
      }

      next()
    }
  },
  {
    path: '/category/:categoryAlias',
    name: 'category',
    component: Category,
  },
  {
    path: '/article-info/:articleAlias',
    name: 'article-info',
    component: ArticleInfo,
  },
  { 
    path: "*",
    name: 'page-not-found',
    component: PageNotFound
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
