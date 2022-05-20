<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Mail Engine</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.mail_engine" ref="mail_engine">
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>SMTP Host</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_host" ref="smtp_host">
    </div>

	 <div class="col-md-6">
        <label>SMTP Port</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_port" ref="smtp_port">
    </div>

	<div class="col-md-6">
        <label>SMTP Encription</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_encription" ref="smtp_encription">
    </div>

	<div class="col-md-6">
        <label>SMTP User Name</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_username" ref="smtp_username">
    </div>

	<div class="col-md-6">
        <label>SMTP Password</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_password" ref="smtp_password">
    </div>

	<div class="col-md-6">
        <label>SMTP  From Email</label>
        <input type="email" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_from_email" ref="smtp_from_email">
    </div>

	<div class="col-md-6">
        <label>SMTP From Name</label>
        <input type="email" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_from_name" ref="smtp_from_name">
    </div>

	<div class="col-md-6">
        <label>SMTP Status</label>
		<input type="email" class="form-control border-dark" placeholder="" v-model="emailsetting.smtp_status" ref="smtp_status">
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
            emailsetting: {
                mail_engine: "",
                smtp_host: "",
                smtp_port: "",
                smtp_encription: "",
                smtp_username: "",
                smtp_password: "",
                smtp_from_email: "",
                smtp_from_name: "",
                smtp_status: ""
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

            axios.get('/api/admin/setting?type=email_smtp', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.emailsetting = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var emailsetting = Object.entries(this.emailsetting);
            var key = [];
            var value = [];

            for (var i = 0; i < emailsetting.length; i++) {
                key.push(emailsetting[i][0]);
                value.push(emailsetting[i][1])
            }

            console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/email_smtp', {
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
