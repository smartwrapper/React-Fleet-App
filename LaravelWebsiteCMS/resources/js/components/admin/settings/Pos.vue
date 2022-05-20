<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Default Customer</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='pos.default_customer' >
				<option 
                v-for='customer in customers' :value='customer.customer_id'
                v-bind:selected="pos.default_customer == customer.customer_id"
                v-bind:key="customer.customer_id">{{ customer.customer_first_name+' '+customer.customer_last_name }}</option>
			</select>
			
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Warehouse </label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='pos.default_warehouse'>
				<option 
                v-for='warehouse in warehouses' :value='warehouse.warehouse_id'
                v-bind:selected="pos.default_warehouse == warehouse.warehouse_id"
                v-bind:key="warehouse.warehouse_id"
                
                >{{ warehouse.warehouse_name }}</option>
			</select>
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Default Biller</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='pos.default_biller'>
				<option 
                v-for='biller in billers' :value='biller.biller_id'
                v-bind:selected="pos.default_biller == biller.biller_id"
                v-bind:key="biller.biller_id">{{ biller.biller_name }}</option>
			</select>
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>No of Product</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model='pos.no_of_products'>
        </fieldset>
    </div>
    <div class="col-md-12">
        <button @click="updateSetting()" type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
</div>
</template>

<script>
import ErrorHandling from './../../../ErrorHandling'
export default {
    data() {
        return {
            pos: {
                default_customer: "",
                default_biller: "",
                default_warehouse: "",
                no_of_products: ""
               
            },
            billers: [],
			warehouses: [],
            customers: [],
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {
        fetchBiller() {
            this.$emit('updateLoadingState', true);
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/biller', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.billers = res.data.data;
						console.log(res.data.data,'billers');
                    }
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },
		fetchCustomer() {
            this.$emit('updateLoadingState', true);
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/customer', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.customers = res.data.data;
						console.log(res.data.data,'customers');
                    }
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },
		fetchWareHouse() {
            this.$emit('updateLoadingState', true);
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/warehouse', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.warehouses = res.data.data;
						console.log(res.data.data,'warehouses');
                    }
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },
        fetchSetting() {
            this.$emit('updateLoadingState', true);
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/setting?type=pos', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.pos = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true);
            var pos = Object.entries(this.pos);
            var key = [];
            var value = [];

            for (var i = 0; i < pos.length; i++) {
                key.push(pos[i][0]);
                value.push(pos[i][1].toString())
            }

            console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/pos', {
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
        this.fetchBiller();
		this.fetchCustomer();
		this.fetchWareHouse();
    }
};
</script>
