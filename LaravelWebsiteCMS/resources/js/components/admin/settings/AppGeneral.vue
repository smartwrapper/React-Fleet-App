<template>
<div class="form-group row">
    <div class="col-md-6">
        <label>Home Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='appgeneral.home_style'>
                <option value="style 1">Style 1</option>
                <option value="style 2">Style 2</option>
                <option value="style 3">Style 3</option>
                <option value="style 4">Style 4</option>
                <option value="style 5">Style 5</option>
                <option value="style 6">Style 6</option>
                <option value="style 7">Style 7</option>
                <option value="style 8">Style 8</option>
                <option value="style 9">Style 9</option>
            </select>

        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Card Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='appgeneral.card_style'>
                <option v-for="index in 28" :value="'style '+index " :key="index">
                    Style {{index}}
                </option>
            </select>
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Banner Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='appgeneral.banner_style'>
                <option value="style 1">Style 1</option>
                <option value="style 2">Style 2</option>
                <option value="style 3">Style 3</option>
                <option value="style 4">Style 4</option>
                <option value="style 5">Style 5</option>
            </select>

        </fieldset>
    </div>
    <div class="col-md-6">
        <label>Category Style</label>
        <fieldset class="form-group mb-3">
            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='appgeneral.category_style'>
                <option value="style 1">Style 1</option>
                <option value="style 2">Style 2</option>
                <option value="style 3">Style 3</option>
                <option value="style 4">Style 4</option>
                <option value="style 5">Style 5</option>
                <option value="style 6">Style 6</option>

            </select>
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>App Name</label>
        <fieldset class="form-group mb-3">
            <input type="email" class="form-control border-dark" placeholder="" v-model="appgeneral.app_name" ref="app_name">
        </fieldset>
    </div>
    <div class="col-md-6">
        <label>IOS App Url</label>
        <fieldset class="form-group mb-3">
            <input type="email" class="form-control border-dark" placeholder="" v-model="appgeneral.ios_app_url" ref="ios_app_url">
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
            appgeneral: {
                home_style: "style 1",
                card_style: "style 1",
                banner_style: "style 1",
                category_style: "style 1",
                app_name: "",
                ios_app_url:""
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

            axios.get('/api/admin/setting?type=app_general', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.appgeneral = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var appgeneral = Object.entries(this.appgeneral);
            var key = [];
            var value = [];

            for (var i = 0; i < appgeneral.length; i++) {
                key.push(appgeneral[i][0]);
                value.push(appgeneral[i][1].toString())
            }

            console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/app_general', {
                    _method: 'PUT',
                    key,
                    value
                }, config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.$toaster.success('Settings has been updated successfully')
                    } else if (res.data.status == 'Error') {
                        this.$toaster.error(res.data.message)
                    }

                })
                .catch(err => {
                    if (err.response.data.status == 'Error') {
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
