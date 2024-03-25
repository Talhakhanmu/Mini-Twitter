import { createRouter, createWebHistory } from "vue-router";
import EditTweet from "./pages/EditTweet.vue";
import AllTweets from "./pages/AllTweets.vue";

const routes = [
    {
        path: "/all/tweets",
        component: () => import("./pages/AllTweets.vue"),
    },
    {
        path: "/test",
        component: () => import("./pages/Test.vue"),
    },
    {
        path: "/tweets/create",
        component: () => import("./pages/CreateTweet.vue"),
    },
    {
        path: "/tweets/edit/:id",
        component: () => import("./pages/EditTweet.vue"),
    },
    {
        path: "/tweets/show/:id",
        component: () => import("./pages/ShowTweet.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
