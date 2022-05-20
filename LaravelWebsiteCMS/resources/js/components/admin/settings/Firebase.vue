<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Api Key</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="firebase.api_key" ref="api_key">
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Auth Domain</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="firebase.auth_domain" ref="auth_domain">
    </div>

	 <div class="col-md-6">
        <label>Database Url</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="firebase.database_url" ref="database_url">
    </div>

	<div class="col-md-6">
        <label>Project Id</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="firebase.peoject_id" ref="peoject_id">
    </div>

	<div class="col-md-6">
        <label>Storage Bucket</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="firebase.storage_bucket" ref="storage_bucket">
    </div>

	<div class="col-md-6">
        <label>Message Sender Id</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="firebase.messaging_sender_id" ref="messaging_sender_id">
    </div>

	<div class="col-md-6">
        <label>App Id</label>
        <input type="email" class="form-control border-dark" placeholder="" v-model="firebase.app_id" ref="app_id">
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
            firebase: {
                api_key: "",
                auth_domain: "",
                database_url: "",
                peoject_id: "",
                storage_bucket: "",
                messaging_sender_id: "",
                app_id: ""
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

            axios.get('/api/admin/setting?type=business_firebase_setting', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.firebase = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var firebase = Object.entries(this.firebase);
            var key = [];
            var value = [];

            for (var i = 0; i < firebase.length; i++) {
                key.push(firebase[i][0]);
                value.push(firebase[i][1])
            }

            console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/business_firebase_setting', {
                    _method: 'PUT',
                    key,
                    value
                }, config)
                .then(res => {
                    if (res.data.status == "Success") {
						this.$toaster.success('Settings has been updated successfully')
                    }
                  else if(res.data.status == 'Error'){
                        this.$toaster.error(res.data.message)
                    }
                    
                })
                .catch(err => {
                    if(err.response.data.status == 'Error'){
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
