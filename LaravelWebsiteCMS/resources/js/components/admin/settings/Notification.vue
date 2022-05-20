<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Default Notification</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="notification.default_notification" ref="default_notification">
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Onesignal App Id</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.onesignal_app_id" ref="onesignal_app_id">
    </div>

	 <div class="col-md-6">
        <label>Onsignal Sender Id</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.onsignal_sender_id" ref="onsignal_sender_id">
    </div>

	<div class="col-md-6">
        <label>Firebase Api Key</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.firebase_api_key" ref="firebase_api_key">
    </div>


    <div class="col-md-6">
        <label>Firebase Auth Domain</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.firebase_auth_domain" ref="firebase_auth_domain">
    </div>

	 <div class="col-md-6">
        <label>Firebase Database Url</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.firebase_database_url" ref="firebase_database_url">
    </div>

	<div class="col-md-6">
        <label>Firebase Project Id</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.firebase_project_id" ref="firebase_project_id">
    </div>

    <div class="col-md-6">
        <label>Firebase Storage Bucket</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.firebase_storage_bucket" ref="firebase_storage_bucket">
    </div>

	<div class="col-md-6">
        <label>Firebase Sender Id</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.firebase_sender_id" ref="firebase_sender_id">
    </div>

    <div class="col-md-12">
		<br />
        <button @click="updateSetting()" type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
</template>

<script>
import ErrorHandling from './../../../ErrorHandling'
export default {
    data() {
        return {
            notification: {
                default_notification: "",
                onesignal_app_id: "",
                onsignal_sender_id: "",
                firebase_api_key: "",
                firebase_auth_domain:"",
                firebase_database_url:"",
                firebase_project_id:"",
                firebase_storage_bucket:"",
                firebase_sender_id:""
            },
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {
        fetchSetting() {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/setting?type=business_notification_setting', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.notification = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var notification = Object.entries(this.notification);
            var key = [];
            var value = [];

            for (var i = 0; i < notification.length; i++) {
                key.push(notification[i][0]);
                value.push(notification[i][1])
            }

            console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/business_notification_setting', {
                    _method: 'PUT',
                    key,
                    value
                }, config)
                .then(res => {
                    if (res.data.status == "Success") {
						this.$toaster.success('Settings has been updated successfully')
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
