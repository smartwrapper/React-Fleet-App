<template>
<div class="card card-custom gutter-b bg-white border-0">
    <div class="card-header border-0 align-items-center">
        <h3 class="card-label mb-0 font-weight-bold text-body">Website Setting
        </h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column nav-pills mb-3" id="v-pills-tab1" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('general')" :class="{ active: isActive('general') }" href="#general">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('theme')" :class="{ active: isActive('theme') }" href="#theme">Theme Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('seo')" :class="{ active: isActive('seo') }" href="#seo">SEO Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('loginsignup')" :class="{ active: isActive('loginsignup') }" href="#loginsignup">Login / Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('sociallitelogin')" :class="{ active: isActive('sociallitelogin') }" href="#sociallitelogin">Sociallite Login</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent1">
                    <div class="tab-pane fade" :class="{ 'active show': isActive('general') }">
                        <WebsiteGeneral @updateLoadingState ="updateLoadingState" />
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('theme') }">
                        <Theme @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('seo') }">
                        <SEO @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('loginsignup') }">
                        <LoginSignup @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('sociallitelogin') }">
                        <SocialliteLogin @updateLoadingState ="updateLoadingState"/>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>

import WebsiteGeneral from './settings/WebsiteGeneral';
import Theme from './settings/Theme';
import SEO from './settings/SEO';
import LoginSignup from './settings/LoginSignup';
import SocialliteLogin from './settings/SocialliteLogin';

export default {
    name: 'Dashboard',
    components: {
        WebsiteGeneral,
        Theme,
        SEO,
        LoginSignup,
        SocialliteLogin,
    },
    data() {
        return {
            activeItem: 'general'
        }
    },

    methods: {
        isActive(menuItem) {
            return this.activeItem === menuItem
        },
        setActive(menuItem) {
            this.activeItem = menuItem
        },
        updateLoadingState(state){
            console.log(state,"working")
            this.$parent.loading = state;
        }
    }
}
</script>
