import { createRouter, createWebHistory } from "vue-router";

const Home = () => import("./components/Home.vue");
const Contacto = () => import("./components/Contacto.vue");
const Mostrar = () => import("./components/blog/Mostrar.vue");
const Crear = () => import("./components/blog/Crear.vue");
const Editar = () => import("./components/blog/Editar.vue");

const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "contacto",
        path: "/contacto",
        component: Contacto,
    },
    {
        name: "mostrarBlogs",
        path: "/blogs",
        component: Mostrar,
    },
    {
        name: "crearBlog",
        path: "/crear",
        component: Crear,
    },
    {
        name: "editarBlog",
        path: "/editar/:id",
        component: Editar,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
