<template>
<div class="form-group row">
 
    <div class="col-md-6">
        <label>Invoice Address</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.invoice_address" ref="invoice_address">
    </div>

	 <div class="col-md-6">
        <label>Invoice Email</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.invoice_email" ref="invoice_email">
    </div>

	<div class="col-md-6">
        <label>Invoice Mobile</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.invoice_mobile" ref="invoice_mobile">
    </div>


    <div class="col-md-6">
        <label>Invoice Phone</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.invoice_phone" ref="invoice_phone">
    </div>

    <div class="col-md-6">
        <label>Invoice Logo</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.invoice_logo" ref="invoice_logo">
    </div>

	 <div class="col-md-6">
        <label>Invoice Prefix</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.invoice_prefix" ref="invoice_prefix">
    </div>

	<div class="col-md-6">
        <label>Invoice Footer Content</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="notification.invoice_footer_content" ref="invoice_footer_content">
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
                invoice_address: "",
                invoice_email: "",
                invoice_mobile: "",
                invoice_phone:"",
                invoice_prefix:"",
                invoice_footer_content:"",
                invoice_logo:""
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

            axios.get('/api/admin/setting?type=invoice', config)
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

            axios.post('/api/admin/setting/invoice', {
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
