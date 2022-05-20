<template>
<div class="form-group row">
    <div class="col-md-12">
        <label>Title</label>
        <fieldset class="form-group mb-3">
            <input type="email" class="form-control border-dark" placeholder="" v-model="appnotification.title" ref="title">
        </fieldset>
    </div>
    <div class="col-md-12">
        <label>Detail</label>
        <fieldset class="form-group mb-3">
            <textarea type="email" class="form-control border-dark" placeholder="" v-model="appnotification.detail" ref="detail"></textarea>
        </fieldset>
    </div>

    <div class="col-md-6">
        <label>Notification Duration</label>
        <fieldset class="form-group mb-3">
            <select  class="form-control border-dark" v-model="appnotification.notification_duration" ref="notification_duration">
                <option value="year">Year</option>
                <option value="month">Month</option>
                <option value="week">Week</option>

            </select>
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
            appnotification: {
                notification_duration: "style 1",
                title: "",
                detail:""
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

            axios.get('/api/admin/setting?type=app_notification_setting', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('response datass', responseData);
                    this.appnotification = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        updateSetting() {
            this.$emit('updateLoadingState', true)
            var appnotification = Object.entries(this.appnotification);
            var key = [];
            var value = [];

            for (var i = 0; i < appnotification.length; i++) {
                key.push(appnotification[i][0]);
                value.push(appnotification[i][1].toString())
            }

            console.log(key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/app_notification_setting', {
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
