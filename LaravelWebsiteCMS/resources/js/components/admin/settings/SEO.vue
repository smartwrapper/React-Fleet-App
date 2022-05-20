<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>SEO Title</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.seo_title" ref="seo_title">
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>SEO Meta-Tag</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.seo_meta_tags" ref="seo_meta_tags">
    </div>

	 <div class="col-md-6">
        <label>SEO Keyword</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.seo_keywords" ref="seo_keywords">
    </div>

	<div class="col-md-6">
        <label>SEO Description</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.seo_description" ref="seo_description">
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
            webgeneral: {
                seo_title: "",
                seo_meta_tags: "",
                seo_keywords: "",
                seo_description: "",
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

            axios.get('/api/admin/setting?type=seo', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.webgeneral = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true);
            var webgeneral = Object.entries(this.webgeneral);
            var key = [];
            var value = [];

            for (var i = 0; i < webgeneral.length; i++) {
                key.push(webgeneral[i][0]);
                value.push(webgeneral[i][1])
            }
            

            // console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/seo', {
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
