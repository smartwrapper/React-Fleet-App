import VueRouter from 'vue-router'
// Routes
const routes = [
    {
        path: '/admin/login',
        name: 'login',
        component: require('./components/admin/Login.vue'),
        meta: {
            auth: false
        }
    },
    // USER ROUTES
    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: require('./components/admin/Dashboard.vue'),
        meta: {
            auth: true
        }
    },
]
const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})
export default router