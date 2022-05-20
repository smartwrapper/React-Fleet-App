import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
window.axios = require('axios');
import InputTag from 'vue-input-tag'
import Toaster from 'v-toaster';
import AttachImage from './Components/admin/AttachImage';
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css';
import VueNestable from 'vue-nestable'

import VueApexCharts from 'vue-apexcharts'
// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(VueApexCharts)
Vue.use(VueRouter)
Vue.use(Toaster, { timeout: 2000 })
Vue.component('input-tag', InputTag)
Vue.component('attach-image', AttachImage)
Vue.component('apexchart', VueApexCharts)
Vue.use(VueNestable)
let routes = [
    {
        path: '/admin/', component: require('./components/admin/Main.vue').default, name: 'main',
        children: [
            { path: '/admin/dashboard', component: require('./components/admin/Dashboard.vue').default, name: 'dashboard', meta: { auth: true } },
            { path: '/admin/bussiness-setting', component: require('./components/admin/BusinessSetting.vue').default, name: 'business-setting', meta: { auth: true } },
            { path: '/admin/website-setting', component: require('./components/admin/WebsiteSetting.vue').default, name: 'website-setting', meta: { auth: true } },
            { path: '/admin/app-setting', component: require('./components/admin/AppSetting.vue').default, name: 'mobile-setting', meta: { auth: true } },
            // { path: '/admin/biller', component: require('./components/admin/Biller.vue').default, name: 'biller', meta: { auth: true } },
            { path: '/admin/customer', component: require('./components/admin/Customer.vue').default, name: 'customer-list', meta: { auth: true } },
            // { path: '/admin/purchasers', component: require('./components/admin/Purchaser.vue').default, name: 'purchaser-list', meta: { auth: true } },
            

            { path: '/admin/product-unit', component: require('./components/admin/ProductUnit.vue').default, name: 'product-unit-list', meta: { auth: true } },
            { path: '/admin/product-attribute', component: require('./components/admin/ProductAttribute.vue').default, name: 'product-attribute-list', meta: { auth: true } },
            { path: '/admin/product-variation', component: require('./components/admin/ProductVariation.vue').default, name: 'product-variation-list', meta: { auth: true } },
            { path: '/admin/product-brand', component: require('./components/admin/ProductBrand.vue').default, name: 'product-brand-list', meta: { auth: true } },
            { path: '/admin/product-category', component: require('./components/admin/ProductCategory.vue').default, name: 'product-category-list', meta: { auth: true } },
            { path: '/admin/product-reviews', component: require('./components/admin/ProductReviews.vue').default, name: 'product-reviews', meta: { auth: true } },
            


            { path: '/admin/quotation-detail/:id', component: require('./components/admin/QuotationDetail.vue').default, name: 'quotation-detail', meta: { auth: true } },
            { path: '/admin/warehouse', component: require('./components/admin/Warehouse.vue').default, name: 'warehouse-list', meta: { auth: true } },
            { path: '/admin/users', component: require('./components/admin/User.vue').default, name: 'user-list', meta: { auth: true } },
            
            { path: '/admin/roles', component: require('./components/admin/Role.vue').default, name: 'role-list', meta: { auth: true } },
            { path: '/admin/roles/permission/:id/:name', component: require('./components/admin/PermissionRole.vue').default, name: 'role-list', meta: { auth: true } },
            
            { path: '/admin/roles/permissions/add', component: require('./components/admin/RolesPermissions.vue').default, name: 'role-manage', meta: { auth: true } },

            { path: '/admin/roles/permissions/:id/:name', component: require('./components/admin/RolesPermissions.vue').default, name: 'role-list', meta: { auth: true } },

            { path: '/admin/languages', component: require('./components/admin/Language.vue').default, name: 'language-list', meta: { auth: true } },
            { path: '/admin/currencies', component: require('./components/admin/Currency.vue').default, name: 'currency-list', meta: { auth: true } },
            { path: '/admin/payment-methods', component: require('./components/admin/PaymentMethod.vue').default, name: 'payment-methods-list', meta: { auth: true } },
            { path: '/admin/coupon-setting', component: require('./components/admin/CouponSetting.vue').default, name: 'coupon-list', meta: { auth: true } },
            { path: '/admin/tax-setting', component: require('./components/admin/TaxSetting.vue').default, name: 'tax-setting-list', meta: { auth: true } },
            { path: '/admin/tax-rate-setting', component: require('./components/admin/TaxRateSetting.vue').default, name: 'tax-setting-rate-list', meta: { auth: true } },
            { path: '/admin/shipping-methods', component: require('./components/admin/ShippingMethod.vue').default, name: 'shipping-methods-list', meta: { auth: true } },
            
            { path: '/admin/media-setting', component: require('./components/admin/MediaSetting.vue').default, name: 'media-setting', meta: { auth: true } },
            { path: '/admin/media', component: require('./components/admin/Media.vue').default, name: 'manage-media', meta: { auth: true } },
            { path: '/admin/media/:id', component: require('./components/admin/MediaDetail.vue').default, name: 'manage-media', meta: { auth: true } },
            
            { path: '/admin/purchases', component: require('./components/admin/ListPurchase.vue').default, name: 'purchase-list', meta: { auth: true } },
            { path: '/admin/add-purchase', component: require('./components/admin/AddPurchase.vue').default, name: 'purchase-manage', meta: { auth: true } },
            { path: '/admin/purchase-detail/:id', component: require('./components/admin/PurchaseDetail.vue').default, name: 'purchase-list', meta: { auth: true } },

            { path: '/admin/add-sale', component: require('./components/admin/AddSale.vue').default, name: 'sale-manage', meta: { auth: true } },
            { path: '/admin/sales', component: require('./components/admin/ListSale.vue').default, name: 'sale-list', meta: { auth: true } },
            { path: '/admin/sale-detail/:id', component: require('./components/admin/SaleDetail.vue').default, name: 'sale-list', meta: { auth: true } },
            { path: '/admin/orders', component: require('./components/admin/Orders.vue').default, name: 'order-list', meta: { auth: true } },
            { path: '/admin/order/:id', component: require('./components/admin/OrderDetail.vue').default, name: 'order-list', meta: { auth: true } },

            { path: '/admin/add-sale-return', component: require('./components/admin/AddSaleReturn.vue').default, name: 'sale-return-manage', meta: { auth: true } },
            { path: '/admin/sale-return', component: require('./components/admin/ListSaleReturn.vue').default, name: 'sale-return-list', meta: { auth: true } },
            { path: '/admin/sale-return-detail/:id', component: require('./components/admin/SaleReturnDetail.vue').default, name: 'sale-return-list', meta: { auth: true } },


            { path: '/admin/purchase-return', component: require('./components/admin/ListPurchaseReturn.vue').default, name: 'purchase-return-list', meta: { auth: true } },
            { path: '/admin/add-purchase-return', component: require('./components/admin/AddPurchaseReturn.vue').default, name: 'purchase-return-manage', meta: { auth: true } },
            { path: '/admin/purchase-return-detail/:id', component: require('./components/admin/PurchaseReturnDetail.vue').default, name: 'purchase-return-list', meta: { auth: true } },

            { path: '/admin/add-stock', component: require('./components/admin/Stock.vue').default, name: 'stock-manage', meta: { auth: true } },
            { path: '/admin/stocks', component: require('./components/admin/ListStock.vue').default, name: 'stock-list', meta: { auth: true } },
            { path: '/admin/stock-transfer', component: require('./components/admin/StockTransfer.vue').default, name: 'stock-transfer-list', meta: { auth: true } },
            { path: '/admin/stock-transfers', component: require('./components/admin/ListStockTransfer.vue').default, name: 'stock-transfer-manage', meta: { auth: true } },

            { path: '/admin/add-quotation', component: require('./components/admin/AddQuotation.vue').default, name: 'quotation-manage', meta: { auth: true } },
            { path: '/admin/quotations', component: require('./components/admin/ListQuotation.vue').default, name: 'quotation-list', meta: { auth: true } },
            
            
            { path: '/admin/products', component: require('./components/admin/ListProduct.vue').default, name: 'product-list', meta: { auth: true } },
            { path: '/admin/add-product', component: require('./components/admin/AddProduct.vue').default, name: 'product-manage', meta: { auth: true } },
            { path: '/admin/product/:id', component: require('./components/admin/AddProduct.vue').default, name: 'product-list', meta: { auth: true } },


            { path: '/admin/home-setting', component: require('./components/admin/HomePageSetting.vue').default, name: 'home-page-builder', meta: { auth: true } },
            { path: '/admin/slider-setting', component: require('./components/admin/SliderSetting.vue').default, name: 'slider-bannder-manage', meta: { auth: true } },
            { path: '/admin/banner-setting', component: require('./components/admin/BannerSetting.vue').default, name: 'mobile-slider-bannder-list', meta: { auth: true } },
            
            
            

            


            { path: '/admin/blog', component: require('./components/admin/Blog.vue').default, name: 'blog-list', meta: { auth: true } },
            { path: '/admin/blog-category', component: require('./components/admin/BlogCategory.vue').default, name: 'blog-manage', meta: { auth: true } },

            { path: '/admin/constant-banner', component: require('./components/admin/ConstantBanner.vue').default, name: 'constant-bannder-list', meta: { auth: true } },
            { path: '/admin/home-banner', component: require('./components/admin/HomeBanner.vue').default, name: 'parrallex-bannder-list', meta: { auth: true } },



            { path: '/admin/menu-builder', component: require('./components/admin/MenuBuilder.vue').default, name: 'menu-builder', meta: { auth: true } },
            { path: '/admin/content-page', component: require('./components/admin/ContentPage.vue').default, name: 'content-page-manage', meta: { auth: true } },
           
            { path: '/admin/account_list', component: require('./components/admin/Account.vue').default, name: 'account-list', meta: { auth: true } },
            { path: '/admin/ledger', component: require('./components/admin/Ledger.vue').default, name: 'ledger-report', meta: { auth: true } },
            { path: '/admin/adjustment', component: require('./components/admin/AssetAdjustment.vue').default, name: 'assets-adjustment', meta: { auth: true } },
            { path: '/admin/payment-adjustment', component: require('./components/admin/PaymentAdjustment.vue').default, name: 'payment', meta: { auth: true } },
            { path: '/admin/reciept-adjustment', component: require('./components/admin/RecieptAdjustment.vue').default, name: 'reciepts', meta: { auth: true } },
            { path: '/admin/expense-adjustment', component: require('./components/admin/ExpenseAdjustment.vue').default, name: 'expense', meta: { auth: true } },
            { path: '/admin/profile', component: require('./components/admin/Profile.vue').default, name: 'Profile', meta: { auth: true } },
            { path: '/admin/deliveryboy-list', component: require('./components/admin/DeliveryBoyList.vue').default, name: 'delivery-boy-list', meta: { auth: true } },
            { path: '/admin/deliveryboy', component: require('./components/admin/ADdDeliveryBoy.vue').default, name: 'manage-delivery-boy', meta: { auth: true } },
            { path: '/admin/deliveryboy/:id', component: require('./components/admin/ADdDeliveryBoy.vue').default, name: 'manage-delivery-boy', meta: { auth: true } },


        ]
    },

    { path: '/admin/pos', component: require('./components/admin/Pos.vue').default, name: 'pos', meta: { auth: true } },
    { path: '/admin/login', component: require('./components/admin/Login.vue').default, name: 'login', meta: { redirectToDashboard: true } },
    { path: "/admin/accessdenied", component: require('./components/AccessDenied.vue').default, name: 'accessdenied' },
    { path: "/admin/*", component: require('./components/PageNotFound.vue').default, name: 'pageNotFound' },

    


]


const router = new VueRouter({
    routes,
    mode: 'history',
    root: '/admin/'
})

router.beforeEach((to, from, next) => {


    var loggedIn = localStorage.getItem('loggedIn');
    if (to.matched.some(record => record.meta.auth) && (loggedIn == null || loggedIn == false)) {
        next('/admin/login')
        return
    }
    var token = localStorage.getItem('token');

    if (loggedIn != null && token != null && to.matched.some(record => record.meta.auth)) {

        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };

        axios.post('/api/admin/token-validate', {}, config)
            .then(res => {

                if (res.status == 401) {
                    localStorage.removeItem('token');
                    localStorage.removeItem('loggedIn');
                }
                // if (res.data.status == "Success") {
                //     loggedIn = true
                // }

            }).catch(error => {
                console.log(error);
                next('/admin/login')
                return
            })
    }
    else {
        if (to.matched.some(record => record.meta.auth) && (loggedIn == null || loggedIn == false)) {
            next('/admin/login')
            return
        }
    }

    // if (loggedIn == true && to.matched.some(record => record.meta.redirectToDashboard)) {
    //     next('/admin/dashboard')
    // }

    next()
})


const app = new Vue({
    router
}).$mount('#kundol-body');