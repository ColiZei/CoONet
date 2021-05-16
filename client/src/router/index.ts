import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import store from "@/store/index";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "Home",
    component: () => import(/* webpackChunkName: "home" */ "../views/Home.vue"),
  },
  {
    path: "/login",
    name: "Login",
    meta: {
      layout: "fullwidth-with-footer",
      needsToBeUnauthenticated: true,
    },
    component: () =>
      import(/* webpackChunkName: "login" */ "../views/Login.vue"),
  },
  {
    path: "/:catchAll(.*)",
    name: "PageNotFound",
    component: () =>
      import(
        /* webpackChunkName: "pagenotfound" */ "../views/PageNotFound.vue"
      ),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  if (!to.meta.needsToBeUnauthenticated && !store.getters.isAuthenticated) {
    next("/login");
  } else if (
    to.meta.needsToBeUnauthenticated &&
    store.getters.isAuthenticated
  ) {
    next("/");
  } else {
    next();
  }
});

export default router;
