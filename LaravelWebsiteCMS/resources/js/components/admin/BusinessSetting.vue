<template>
<div class="card card-custom gutter-b bg-white border-0">
    <div class="card-header border-0 align-items-center">
        <h3 class="card-label mb-0 font-weight-bold text-body">Bussiness Setting
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
                        <a class="nav-link" @click.prevent="setActive('pos')" :class="{ active: isActive('pos') }" href="#pos">POS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('emailsmtp')" :class="{ active: isActive('emailsmtp') }" href="#emailsmtp">Email SMTP Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('sms')" :class="{ active: isActive('sms') }" href="#sms">SMS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('notification')" :class="{ active: isActive('notification') }" href="#notification">Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('invoice')" :class="{ active: isActive('invoice') }" href="#invoice">INVOICE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('EmailTemplate')" :class="{ active: isActive('EmailTemplate') }" href="#EmailTemplate">
                            Email Template
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('credentials')" :class="{ active: isActive('credentials') }" href="#credentials">
                            Consumer Keys
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('firebase')" :class="{ active: isActive('firebase') }" href="#firebase">
                            Firebase
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('google')" :class="{ active: isActive('google') }" href="#google">
                            Google
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent1">
                    <div class="tab-pane fade" :class="{ 'active show': isActive('general') }">
                        <General @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('pos') }">
                        <Pos @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('emailsmtp') }">
                        <EmailSmtp @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('sms') }">
                        <Sms @updateLoadingState ="updateLoadingState"/>
                    </div>

                    <div class="tab-pane fade" :class="{ 'active show': isActive('notification') }">
                        <Notification @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('invoice') }">
                        <Invoice @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('EmailTemplate') }">
                        <EmailTemplate @updateLoadingState ="updateLoadingState"/>
                    </div>
                    <div class="tab-pane fade" :class="{ 'active show': isActive('credentials') }">
                        <ConsumerKeys @updateLoadingState ="updateLoadingState"/>
                    </div>

                    <div class="tab-pane fade" :class="{ 'active show': isActive('firebase') }">
                        <Firebase @updateLoadingState ="updateLoadingState"/>
                    </div>

                    <div class="tab-pane fade" :class="{ 'active show': isActive('google') }">
                        <Google @updateLoadingState ="updateLoadingState"/>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import MobileHeader from './partials/MobileHeader';
import Header from './partials/Header';
import Sidebar from './partials/Sidebar';
import Footer from './partials/Footer';
import ToolBar from './partials/ToolBar';
import ColorPanel from './partials/ColorPanel';
import General from './settings/General';
import Pos from './settings/Pos';
import EmailSmtp from './settings/EmailSmtp';
import Sms from './settings/Sms';
import Notification from './settings/Notification';
import EmailTemplate from './settings/EmailTemplate';
import Invoice from './settings/Invoice';
import ConsumerKeys from './settings/ConsumerKeys';
import Firebase from './settings/Firebase.vue';
import Google from './settings/Google.vue';




export default {
    name: 'Dashboard',
    components: {
        MobileHeader,
        ToolBar,
        ColorPanel,
        Sidebar,
        Header,
        Footer,
        General,
        Pos,
        EmailSmtp,
        Sms,
        Notification,
        EmailTemplate,
        Invoice,
        ConsumerKeys,
        Firebase,
        Google
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
