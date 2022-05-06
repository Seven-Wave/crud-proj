import { createRouter, createWebHistory } from 'vue-router'
import UserForm from "./views/UserFormComponent";
import App from "./components/App";

const routes = [
    {
        path: '/form',
        name: 'Test',
        component: UserForm
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
