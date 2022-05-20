<template>
<div class="form-group row">
    <ul class="list-unstyled mb-0 login-forms">
        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="wishList" id="appDisplay1" @change="check($event)" v-bind:checked="display.wishList == 'show' ?'checked' : ''"><label class="custom-control-label" for="appDisplay1">Wishlist</label></div>
            </fieldset>
        </li>
        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="edit_profile" id="appDisplay2" @change="check($event)" v-bind:checked="display.edit_profile == 'show' ?'checked':''"><label class="custom-control-label" for="appDisplay2">Edit Profile</label></div>
            </fieldset>
        </li>
        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="shipping_address" id="appDisplay3" @change="check($event)" v-bind:checked="display.shipping_address == 'show' ?'checked':'' "><label class="custom-control-label" for="appDisplay3">Shipping Address</label></div>
            </fieldset>
        </li>
        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="my_orders" id="appDisplay4" @change="check($event)" v-bind:checked="display.my_orders == 'show' ? 'checked':'' "><label class="custom-control-label" for="appDisplay4">My Orders</label></div>
            </fieldset>
        </li>
        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="contact_us" id="appDisplay5" @change="check($event)" v-bind:checked="display.contact_us == 'show' ?'checked':''"><label class="custom-control-label" for="appDisplay5">Contact Us</label></div>
            </fieldset>
        </li>
        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="about_us" id="appDisplay6" @change="check($event)" v-bind:checked="display.about_us == 'show' ?'checked':''"><label class="custom-control-label" for="appDisplay6" >About Us</label></div>
            </fieldset>
        </li>

        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="news" id="appDisplay7" @change="check($event)" v-bind:checked="display.news == 'show' ?'checked':''"><label class="custom-control-label" for="appDisplay7">News</label></div>
            </fieldset>
        </li>

        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="introduction" id="appDisplay8" @change="check($event)" v-bind:checked="display.introduction == 'show' ?'checked':'' "><label class="custom-control-label" for="appDisplay8" >Introduction</label></div>
            </fieldset>
        </li>

        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="shareApp" id="appDisplay9" @change="check($event)" v-bind:checked="display.shareApp == 'show' ? 'checked':'' "><label class="custom-control-label" for="appDisplay9" >Share App</label></div>
            </fieldset>
        </li>

        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="rateapp" id="appDisplay10" @change="check($event)" v-bind:checked="display.rateapp == 'show' ? 'checked':'' "><label class="custom-control-label" for="appDisplay10" >Rate App</label></div>
            </fieldset>
        </li>

        <li class="mr-2 mb-1">
            <fieldset>
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="setting" id="appDisplay11" @change="check($event)" v-bind:checked="display.setting == 'show' ?'checked':'' "><label class="custom-control-label" for="appDisplay11" >Setting</label></div>
            </fieldset>
        </li>

        <div class="col-md-12">
            <br />
            <button @click="updateSetting()" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </ul>

</div>
</template>

<script>
import ErrorHandling from './../../../ErrorHandling'
export default {
    data() {
        return {
            display: {
                wishList: 'hide',
                edit_profile: 'hide',
                shipping_address: 'hide',
                my_orders: 'hide',
                contact_us: 'hide',
                about_us: 'hide',
                news: 'hide',
                introduction: 'hide',
                shareApp: 'hide',
                rateapp: 'hide',
                setting: 'hide'
            },
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {
        check: function (e) {
            this.display[e.target.name] = this.display[e.target.name] == "hide" ? "show" : "hide";

            console.log(this.display);
        },
        fetchSetting() {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/setting?type=app_display_in_setting', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.display = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var display = Object.entries(this.display);
            var key = [];
            var value = [];

            for (var i = 0; i < display.length; i++) {
                key.push(display[i][0]);
                value.push(display[i][1])
            }

            // console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/app_display_in_setting', {
                    _method: 'PUT',
                    key,
                    value
                }, config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.$toaster.success('Settings has been updated successfully')
                    } else if (res.data.status == 'Error') {
                        this.$toaster.error(res.data.message)
                    }

                })
                .catch(err => {
                    if (err.response.data.status == 'Error') {
                        this.$toaster.error(err.response.data.message)
                    }
                })
                .finally(() => (this.$emit('updateLoadingState', false)));

        }
    },
    mounted() {
        this.fetchSetting();
    }
};
</script>
