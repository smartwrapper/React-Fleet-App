<template>
<div class="form-group row">
    <div class="col-md-12">
        <label>Large Height</label>
        <fieldset class="form-group mb-3">
            <input type="number" class="form-control border-dark" placeholder="" v-model="gallary_setting.large_height" ref="large_height">
        </fieldset>
    </div>
    <div class="col-md-12">
        <label>Large Width</label>
        <input type="number" class="form-control border-dark" placeholder="" v-model="gallary_setting.large_width" ref="large_width">
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
            gallary_setting: {
                large_height: "",
                large_width: "",
            },
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {
        fetchSetting() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/setting?type=gallary_setting', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.gallary_setting = responseData;
                })
                .finally(() => (this.$parent.loading = false));
        },

        updateSetting() {
            this.$parent.loading = true;
            var gallary_setting = Object.entries(this.gallary_setting);
            var key = [];
            var value = [];

            for (var i = 0; i < gallary_setting.length; i++) {
                key.push(gallary_setting[i][0]);
                value.push(gallary_setting[i][1])
            }
            

            // console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/gallary_setting', {
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
                .finally(() => (this.$parent.loading = false));

        }
    },
    mounted() {
        this.fetchSetting();
    }
};
</script>
