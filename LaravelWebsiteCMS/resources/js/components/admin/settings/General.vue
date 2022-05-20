<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>About Bussiness</label>
        <fieldset class="form-group mb-3">
            <textarea type="text" class="form-control border-dark" cols="12" rows="12" v-model="general.about_us"> </textarea>
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Address</label>
        <textarea type="text" class="form-control border-dark" cols="12" rows="12" v-model="general.address"> </textarea>
    </div>

	 <div class="col-md-6">
        <label>Phone Number</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="general.phone_number" ref="smtp_port">
    </div>

	<div class="col-md-6">
        <label>Business Email</label>
        <input type="email" class="form-control border-dark" placeholder="" v-model="general.email" ref="smtp_encription">
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
            general: {
                about_us:"",
                address:"",
                phone_number:"",
                email:""
            },
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {
        fetchSetting() {
            this.$emit('updateLoadingState', true);
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/setting?type=business_general', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.general = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true);
            var general = Object.entries(this.general);
            var key = [];
            var value = [];

            for (var i = 0; i < general.length; i++) {
                key.push(general[i][0]);
                value.push(general[i][1])
            }
            

            // console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/business_general', {
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
