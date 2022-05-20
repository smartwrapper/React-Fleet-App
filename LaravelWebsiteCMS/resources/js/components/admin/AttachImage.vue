<template>
<div class="modal fade text-left" :class="{ 'show': showModal }" id="imagepopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" :style="[showModal ? {'display': 'block !important'} : {'display': 'none'}]" style="overflow: scroll;">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close" @click="toggleModal()">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                </button>

            </div>
            <div class="modal-body">
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <div class="gallary-categories">
                                    <ul class="nav nav-pills justify-content-start  mb-0" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link  btn-light-dark shadow-none mr-4 mb-4" :class="{ 'active': tag_id == '' }" id="All-tab-center" data-toggle="pill" href="#All-center" role="tab" aria-controls="All-center" aria-selected="true" @click="gallaryByTagId('')">
                                                All
                                            </a>
                                        </li>
                                        <li class="nav-item" v-for="tag in tags">
                                            <a class="nav-link  btn-light-dark shadow-none mr-4 mb-4" :class="{ 'active': tag_id == tag.tag_id }" id="general-tab-center" data-toggle="pill" :href="'#'+tag.tag_name" role="tab" aria-controls="general" aria-selected="false" @click="gallaryByTagId(tag.tag_id)">
                                                {{ tag.tag_name }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12 ">
                                <div id="generalgallary" class="gallary0 linked card card-custom gutter-b bg-white border-0">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="All-center" role="tabpanel" aria-labelledby="All-tab-center">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div v-for='gallary in gallaries' class="col-6 col-sm-4 col-md-3 col-lg-4  col-xl-3 loadingmore" style="display: block;" @click="setSelectedImages(gallary.id,gallary.gallary_name)">
                                                        <div class="thumbnail text-center  mb-4" :class="{ 'active': selectedImage == gallary.id}">
                                                            <div class="thumbnail-imges ">
                                                                <a class="img-select d-block" href="javascript:void(0);">
                                                                    <img class="img-fluid" :src='"/gallary/"+gallary.gallary_name' alt="image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <nav aria-label="navigation">
                                                            <div class="pagination d-flex justify-content-end align-items-center">
                                                                <div class="mr-2 text-dark">(Showing result <span id="numbering">{{ meta.to }}</span> out of <span id="totalnumber">{{ meta.total }}</span> )</div>
                                                                <a class="btn btn-secondary white" href="#" id="loadMore" @click="setLimit()">Load More</a>
                                                            </div>
                                                        </nav>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal" @click="toggleModal()">
                    <span class="">Choose</span>
                </button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";

export default {
  props: {
  	showModal: {
      type: Boolean,
  }},
    data() {
        return {
            meta: {},
            limit: 10,
            error_message: '',
            edit: false,
            actions: false,
            pagination: {},
            request_method: "",
            gallaries: [],
            tags: [],
            tag_id: "",
            token: [],
            selectedImage: '',
            file: [],
            gallary_tags: [],
            url: "",
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },

    methods: {
        setSelectedImages(gallary_id,gallary_path) {
            this.selectedImage = gallary_id;
            gallary_path ="/gallary/"+gallary_path;
            this.$emit('setImage',{gallary_id,gallary_path});
        },
        fetchtags() {

            axios.get("/api/admin/tag", this.token).then(res => {
                this.tags = res.data.data;
            })
        },
        gallaryByTagId(tag_id) {
            this.tag_id = tag_id;
            this.fetchgallaries();
        },
        fetchgallaries() {
            this.$parent.loading = true;
            let vm = this;
            var page_url = page_url || "/api/admin/gallary";
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            } else {
                page_url += '?limit=' + this.limit;
            }
            if (this.tag_id != null) {
                page_url += '&tag_id=' + this.tag_id;
            }
            page_url += '&getDetail=1&getGallaryTag=1&sortBy=id&sortType=DESC';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.gallaries = res.data.data;
                this.meta = res.data.meta;
            }).finally(() => (this.$parent.loading = false));
        },
         toggleModal() {
            this.$emit('toggleImageSelect');
        },
        setLimit() {
            var limit = this.limit;
            this.limit = limit + limit;
            this.fetchgallaries();
        }
    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchgallaries();
        this.fetchtags();
    }
};
</script>
