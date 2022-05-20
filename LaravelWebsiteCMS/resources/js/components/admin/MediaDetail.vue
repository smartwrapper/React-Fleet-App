<template>
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
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Image Detail
                                    </h3>
                                </div>
                                <div class="icons d-flex">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">

                    <div class="col-12 ">
                        <div class="card card-custom gutter-b bg-white border-0 h-auto">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 d-flex align-items-center">
                                        <div class="thumbnail-detail w-100">
                                            <img :src='"/gallary/"+gallary.gallary_name' class="img-fluid border-radius-10px w-100" alt="actual image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card card-custom bg-light shadow-none border-0">
                                            <div class="card-body">

                                                <div class="thumbnail h-100 d-flex flex-column justify-content-center">
                                                    <h4 class="text-primary">Actual Size(
                                                        {{ gallary.detail ? gallary.detail[0].gallary_type =='large' ?   gallary.detail[0].gallary_height +'*'+  gallary.detail[0].gallary_width : '' :"" }} 
                                                        
                                                        )</h4>
                                                    <div class="thumbnail-input-detail mt-3 w-100">
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12">
                                                                <label class="form-label">Path</label>
                                                                <input type="text" id="first-name" class="form-control" name="fname" placeholder="image path" :value='"/gallary/"+gallary.gallary_name' />
                                                               
                                                            </div>

                                                        </div>
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12">
                                                                <label class="form-label">Image Tag</label>
                                                                <input-tag  v-model="gallary_tags"></input-tag>
                                                                <br />
                                                                <div class="form-group row align-items-center justify-content-center">
                                                                    <div class="col-12 d-flex justify-content-end">
                                                                        <button class="btn btn-secondary white" @click="updateTags()" >
                                                                        Update Tags
                                                                        </button>
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

                            </div>
                        </div>
                        <div class="card card-custom gutter-b bg-white border-0 h-auto">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-5 d-flex align-items-center">
                                        <div class="thumbnail-detail w-100">
                                            <img :src="gallary.detail[0].gallary_type =='large' ?''+gallary.detail[0].gallary_path:''" class="img-fluid border-radius-10px w-100" alt="actual image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="card card-custom bg-light shadow-none border-0">
                                            <div class="card-body">

                                                <div class="thumbnail h-100 d-flex flex-column justify-content-center">
                                                    <h4 class="text-primary">Large ({{ gallary.detail ? gallary.detail[0].gallary_type =='large' ?   gallary.detail[0].gallary_height +'*'+  gallary.detail[0].gallary_width : '' :"" }})</h4>
                                                    <div class="thumbnail-input-detail mt-3 w-100">
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12">
                                                                <label class="form-label">Path</label>
                                                                <input type="text" id="first-name1" class="form-control" name="fname" placeholder="image path" :value=" gallary.detail[0].gallary_type =='large' ?''+gallary.detail[0].gallary_path:''">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-6">
                                                                <label class="form-label">Height</label>
                                                                <input type="text" class="form-control" name="fname" placeholder="width" v-model="resize_large.height">
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="form-label">Width</label>
                                                                <input type="text" class="form-control" name="fname" placeholder="Width" v-model="resize_large.width">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button class="btn btn-secondary white" @click="resizeSingleImage(gallary.detail[0].id, 'large')">Regenrate</button>
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
                        <div class="card card-custom gutter-b bg-white border-0 h-auto">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-5 d-flex align-items-center">
                                        <div class="thumbnail-detail w-100">
                                            <img :src="gallary.detail[1].gallary_type =='medium' ?''+gallary.detail[1].gallary_path:''" class="img-fluid border-radius-10px w-100" alt="actual image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="card card-custom bg-light shadow-none border-0">
                                            <div class="card-body">

                                                <div class="thumbnail h-100 d-flex flex-column justify-content-center">
                                                    <h4 class="text-primary">MEDIUM ({{ gallary.detail ? gallary.detail[1].gallary_type =='medium' ?   gallary.detail[1].gallary_height +'*'+  gallary.detail[1].gallary_width : '' :"" }})</h4>
                                                    <div class="thumbnail-input-detail mt-3 w-100">
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12">
                                                                <label class="form-label">Path</label>
                                                                <input type="text" id="first-name1" class="form-control" name="fname" placeholder="image path" :value=" gallary.detail[1].gallary_type =='medium' ?''+gallary.detail[1].gallary_path:''">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-6">
                                                                <label class="form-label">Height</label>
                                                                <input type="text" class="form-control" name="fname" placeholder="width" v-model="resize_medium.height">
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="form-label">Width</label>
                                                                <input type="text" class="form-control" name="fname" placeholder="Width" v-model="resize_medium.width">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button class="btn btn-secondary white" @click="resizeSingleImage(gallary.detail[1].id, 'medium')">Regenrate</button>
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

                        <div class="card card-custom gutter-b bg-white border-0 h-auto">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-5 d-flex align-items-center">
                                        <div class="thumbnail-detail w-100">
                                            <img :src="gallary.detail[2].gallary_type =='thumbnail' ?''+gallary.detail[2].gallary_path:''" class="img-fluid border-radius-10px w-100" alt="actual image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="card card-custom bg-light shadow-none border-0">
                                            <div class="card-body">

                                                <div class="thumbnail h-100 d-flex flex-column justify-content-center">
                                                    <h4 class="text-primary">Thumbnail ({{ gallary.detail ? gallary.detail[2].gallary_type =='thumbnail' ?   gallary.detail[2].gallary_height +'*'+  gallary.detail[2].gallary_width : '' :"" }})</h4>
                                                    <div class="thumbnail-input-detail mt-3 w-100">
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12">
                                                                <label class="form-label">Path</label>
                                                                <input type="text" id="first-name1" class="form-control" name="fname" placeholder="image path" :value=" gallary.detail[2].gallary_type =='thumbnail' ?''+gallary.detail[2].gallary_path:''">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-6">
                                                                <label class="form-label">Height</label>
                                                                <input type="text" class="form-control" name="fname"  placeholder="width" v-model="resize_thumbnail.height">
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="form-label">Width</label>
                                                                <input type="text" class="form-control" name="fname"  placeholder="height" v-model="resize_thumbnail.width">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row align-items-center justify-content-center">
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button class="btn btn-secondary white" @click="resizeSingleImage(gallary.detail[2].id, 'medium')">Regenrate</button>
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
            error_message: '',
            request_method: "",
            gallary: {},
            token: [],
            file: [],
            gallary_tags: [],
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            resize_medium: {'height':'', 'width':''},
            resize_thumbnail: {'height':'', 'width':''},
            resize_large: {'height':'', 'width':''},
        };
    },

    methods: {
        
        fetchgallaries(id) {
            this.$parent.loading = true;
            let vm = this;
            var page_url = page_url || "/api/admin/gallary/"+id;
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            } else {
                page_url += '?limit=' + this.limit;
            }
            if (this.tag_id != null) {
                page_url += '&tag_id=' + this.tag_id;
            }
            page_url += '&getDetail=1&getGallaryTag=1';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.gallary = res.data.data;
                if(res.data.data.gallary_tag != null){
                    for(var i = 0; i < res.data.data.gallary_tag.length; i++){
                        if(this.gallary_tags.indexOf(res.data.data.gallary_tag[i].tag.tag_name) == -1)
                            this.gallary_tags.push(res.data.data.gallary_tag[i].tag.tag_name);
                    }
                }
                this.resize_thumbnail.width = this.gallary.detail[2].gallary_width;
                this.resize_thumbnail.height = this.gallary.detail[2].gallary_height;
                this.resize_medium.width = this.gallary.detail[1].gallary_width;
                this.resize_medium.height = this.gallary.detail[1].gallary_height;
                this.resize_large.width = this.gallary.detail[0].gallary_width;
                this.resize_large.height = this.gallary.detail[0].gallary_height;
                
            }).finally(() => (this.$parent.loading = false));
        },
        resizeSingleImage(id, type) {
            this.$parent.loading = true;
            let vm = this;
            var page_url = "/api/admin/gallary/resize_single_image";
            
            this.request_method = 'post';
            var responseData = {};

            if(type == 'medium'){
                var data = this.resize_medium;
            }
            else if(type == 'large'){
                var data = this.resize_large;
            }
            else{
                var data = this.resize_thumbnail;
            }
            data['id'] = id;

            axios[this.request_method](page_url, data, this.token).then(res => {
                if (res.data.status == "Success") {
                    this.$toaster.success(res.data.message);
                } else {
                    this.$toaster.error(res.data.message)
                }
                
            }).finally(() => (this.$parent.loading = false));
        },
        updateTags(){
            this.$parent.loading = true;
            var url = '/api/admin/gallary/'+this.$route.params.id;
            this.request_method = 'put';

            if(this.gallary_tags != ""){
            axios[this.request_method](url,{gallary_tags:this.gallary_tags}, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.$toaster.success(res.data.message)
                        this.fetchgallaries(this.$route.params.id);
                    } else {
                        this.$toaster.error(res.data.message)
                    }
                })
                .catch(error => {
                    this.error_message = '';
                    this.errors = new ErrorHandling();
                    if (error.response.status == 422) {
                        if (error.response.data.status == 'Error') {
                            this.error_message = error.response.data.message;
                        } else {
                            this.errors.record(error.response.data.errors);
                        }
                    }
                }).finally(() => (this.$parent.loading = false));
            }
            else
            {
                this.$toaster.error('Tag input cannot be empty');
                this.$parent.loading = false;
            }

        }
    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchgallaries(this.$route.params.id);
    }
};
</script>
