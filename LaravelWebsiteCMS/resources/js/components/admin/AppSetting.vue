<template>
<div class="card card-custom gutter-b bg-white border-0">
    <div class="card-header border-0 align-items-center">
        <h3 class="card-label mb-0 font-weight-bold text-body">Mobile App Setting
        </h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column nav-pills mb-3" id="v-pills-tab1" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('general')" :class="{ active: isActive('general') }" href="#general">General</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('display')" :class="{ active: isActive('display') }" href="#display">Display In Menu/Sidebar</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('notification')" :class="{ active: isActive('notification') }" href="#notification">App Local Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('apploginsignup')" :class="{ active: isActive('apploginsignup') }" href="#apploginsignup">Login / Signup</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent1">
                    <div class="tab-pane fade" :class="{ 'active show': isActive('general') }">
                        <AppGeneral @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <!-- <div class="tab-pane fade" :class="{ 'active show': isActive('display') }">
                        <AppDisplay @updateLoadingState ="updateLoadingState"/>
                    </div> -->
                    <div class="tab-pane fade" :class="{ 'active show': isActive('notification') }">
                        <AppNotification @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('apploginsignup') }">
                        <AppLoginSignup @updateLoadingState ="updateLoadingState"/>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>

import AppGeneral from './settings/AppGeneral';
import AppDisplay from './settings/AppDisplay';
import AppNotification from './settings/AppNotification';
import AppLoginSignup from './settings/AppLoginSignup';

export default {
    name: 'AppSetting',
    components: {
        AppGeneral,
        AppDisplay,
        AppNotification,
        AppLoginSignup,
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
        },updateLoadingState(state){
            console.log(state,"working")
            this.$parent.loading = state;
        }
    }
}
</script>
