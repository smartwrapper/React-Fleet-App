<template>
<div class="form-group row">
    <div class="col-md-12">
        <label>Subject</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.subject" ref="subject">
            <small class="form-text text-danger" v-if="errors.has('subject')" v-text="errors.get('subject')"></small>
        </fieldset>
    </div>
    <div class="col-md-12">
        <label>Body</label>
        <textarea class="form-control border-dark" placeholder="" v-model="emailsetting.body" ref="body"> </textarea>
        <small class="form-text text-danger" v-if="errors.has('body')" v-text="errors.get('body')"></small>
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
                subject: "",
                body: "",
                type:"amazing_deal",
                
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

            axios.get('/api/admin/email_template_setting?type=type', config)
                .then(res => {
                    console.clear();
                    console.log('email template', res.data.data);
                    if(res.data.data.length > 0){
                        this.emailsetting = res.data.data[0];
                    }
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/email_template_setting',this.emailsetting, config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.errors = new ErrorHandling;
						this.$toaster.success('Settings has been updated successfully')
                    }
                  else if(res.data.status == 'Error'){
                        this.$toaster.error(res.data.message)
                    }
                    
                })
                .catch(error => {
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
                .finally(() => (this.$emit('updateLoadingState', false)));

        }
    },
    mounted() {
        this.fetchSetting();
    }
};
</script>
