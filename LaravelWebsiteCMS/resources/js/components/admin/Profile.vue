<template>
<div>
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">
                                            Profile
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input type="email" readonly v-model="user.email" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Name</label>
                                        <div class="form-group">
                                            <input type="text" v-model="user.name"  class="form-control"/>
                                            <small class="form-text text-danger" v-if="errors.has('name')" v-text="errors.get('name')"></small>
                                        </div>
                                    </div>

                                     <div class="col-md-12">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <input type="text" v-model="user.password" class="form-control" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" @click="updateProfile()">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";
export default {
    data() {
        return {
            user:{
                u_id:"",
                email:"",
                name:"",
                password:""
            },
            errors: new ErrorHandling(),
            error_message:""
        };
    },
    methods: {
        fetchUser() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/user/'+localStorage.getItem('user_id'), config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.user = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },

        updateProfile() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            axios.put('/api/admin/user/'+localStorage.getItem('user_id'),{name:this.user.name,email:this.user.email,password:this.user.password,confirm_password:this.user.confirm_password} ,config)
                .then(res => {
                    if (res.data.status == "Success") {
                      this.$toaster.success('User has been updated successfully')

                    }
                }).catch(error => {
					this.error_message = '';
					this.errors = new ErrorHandling();
					if (error.response.status == 422) {
						if(error.response.data.status == 'Error'){
							this.error_message = error.response.data.message;
						}
						else{
							this.errors.record(error.response.data.errors);
						}
					}
				})
                .finally(() => (this.$parent.loading = false));
        },

    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };

        this.fetchUser();
    }
};
</script>
