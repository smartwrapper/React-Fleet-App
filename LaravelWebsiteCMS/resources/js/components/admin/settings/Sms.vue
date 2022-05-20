<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Gateway</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="sms.gateway" ref="gateway">
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Twilio Sid</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="sms.twilio_sid" ref="twilio_sid">
    </div>

	 <div class="col-md-6">
        <label>Twilio Auth Token</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="sms.twilio_auth_token" ref="twilio_auth_token">
    </div>

	<div class="col-md-6">
        <label>Twilio Number</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="sms.twilio_number" ref="twilio_number">
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
            sms: {
                gateway: "",
                twilio_sid: "",
                twilio_auth_token: "",
                twilio_number: "",
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

            axios.get('/api/admin/setting?type=sms', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.sms = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var sms = Object.entries(this.sms);
            var key = [];
            var value = [];

            for (var i = 0; i < sms.length; i++) {
                key.push(sms[i][0]);
                value.push(sms[i][1])
            }

            console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/sms', {
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
