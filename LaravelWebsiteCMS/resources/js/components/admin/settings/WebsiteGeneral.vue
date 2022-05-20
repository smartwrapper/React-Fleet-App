<template>
<div class="form-group row">
    <!-- <div class="col-md-6">
        <label>Show site_name_or_logo or Logo</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.site_name_or_logo" ref="site_name_or_logo">
        </fieldset>
    </div> -->
    <div class="col-md-6">
        <label>Website Name</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.site_name" ref="site_name">
        
    </div>

	 <div class="col-md-6">
        <label>Website Logo</label>
        <div class="form-group">
            <button type="button" class="btn btn-primary" @click="toggleImageSelect()">Select Logo from gallary</button>
            <small id="textHelp" class="form-text text-muted">Select Logo from gallary.</small>
            <small class="form-text text-danger" v-if="errors.has('gallary_id')" v-text="errors.get('gallary_id')"></small>

            <img v-if="webgeneral.site_logo != ''" :src="webgeneral.site_logo" style="width:100px;height:100px;"/>
        </div>
    </div>

	<div class="col-md-6">
        <label>FavIcon Logo</label>
        <div class="form-group">
            <button type="button" class="btn btn-primary" @click="toggleImageSelectIcon()">Select Favicon from gallary.</button>
            <small id="textHelp" class="form-text text-muted">Select Favicon from gallary.</small>
            <small class="form-text text-danger" v-if="errors.has('icon')" v-text="errors.get('icon')"></small>

            <img v-if="webgeneral.favicon != ''" :src="webgeneral.favicon" style="width:100px;height:100px;"/>
        </div>
    </div>

	<div class="col-md-6">
        <label>Facebook URL</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.facebook_url" ref="facebook_url">
    </div>

	<div class="col-md-6">
        <label>Google URL</label>
        <input type="text" class="form-control border-dark" placeholder="" v-model="webgeneral.google_url" ref="google_url">
    </div>

	<div class="col-md-6">
        <label>Twitter URL</label>
        <input type="email" class="form-control border-dark" placeholder="" v-model="webgeneral.twitter_url" ref="twitter_url">
    </div>

	<div class="col-md-6">
        <label>Linked URL</label>
        <input type="email" class="form-control border-dark" placeholder="" v-model="webgeneral.linkedin_url" ref="linkedin_url">
    </div>
    <div class="col-md-6">
        <label>Instagram URL</label>
        <input type="email" class="form-control border-dark" placeholder="" v-model="webgeneral.instagram_url" ref="instagram_url">
    </div>

	<div class="col-md-6">
        <label>Allow Cookies</label>
		<input type="email" class="form-control border-dark" placeholder="" v-model="webgeneral.allow_cookies" ref="allow_cookies">
    </div>

    <div class="col-md-12">
		<br />
        <button @click="updateSetting()" type="submit" class="btn btn-primary">Submit</button>
    </div>
    <attach-image @toggleImageSelect="toggleImageSelect" :showModal="showModal" @setImage="setImage"/>
    <attach-image @toggleImageSelect="toggleImageSelectIcon" :showModal="showModalIcon" @setImage="setIcon"/>

</div>
</template>

<script>
import ErrorHandling from './../../../ErrorHandling'
export default {
    data() {
        return {
            webgeneral: {
                site_name_or_logo: "",
                site_name: "",
                site_logo: "",
                favicon: "",
                facebook_url: "",
                google_url: "",
                twitter_url: "",
                linkedin_url: "",
                instagram_url: "",

                allow_cookies: ""
            },
            showModal:false,
            showModalIcon:false,
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

            axios.get('/api/admin/setting?type=website_general', config)
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

            axios.post('/api/admin/setting/website_general', {
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

        },
        toggleImageSelect(){
            this.showModal = !this.showModal;
        },
        setImage(gallary){
           this.webgeneral.site_logo = gallary.gallary_path;
        },
        toggleImageSelectIcon(){
            this.showModalIcon = !this.showModalIcon;
        },
        setIcon(gallary){
            this.webgeneral.favicon = gallary.gallary_path;
        },
    },
    mounted() {
        this.fetchSetting();
    }
};
</script>
