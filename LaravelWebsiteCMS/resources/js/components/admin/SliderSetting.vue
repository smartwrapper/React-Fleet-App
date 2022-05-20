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
                                            Slider Setting
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <button class="btn ml-2 p-0 kt_notes_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" v-if="$parent.permissions.includes('slider-bannder-manage')">
                                            <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm " v-on:click="
                                                        display_form = !display_form
                                                    ">
                                                <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                                </svg>
                                            </span>
                                        </button>
                                        <!-- <a href="#" onclick="printDiv()" class="ml-2">
                                            <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"></path>
                                                    <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"></path>
                                                    <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="#" class="ml-2">
                                            <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"></path>
                                                </svg>
                                            </span>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div>
                                        <div class=" table-responsive" id="printableTable">

                                            <div id="productsliderTable_wrapper" class="dataTables_wrapper no-footer">

                                                <div class="dataTables_length" id="productsliderTable_length"><label>Show
                                                        <select name="productsliderTable_length" aria-controls="productsliderTable" class="" v-model="limit" v-on:change="fetchSliders()">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="200">200</option>
                                                            <option value="500">500</option>
                                                            <option value="1000">1000</option>
                                                        </select> entries</label></div>

                                                <div id="productsliderTable_filter" class="dataTables_filter">
                                                    <label>
                                                    Search:<input type="search" class="" placeholder="" aria-controls="productsliderTable" v-model="searchParameter" @keyup="fetchSliders()">
                                                    </label>
                                                </div>
                                                <table id="productsliderTable" class="display dataTable no-footer" role="grid">
                                                    <thead class="text-body">
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="productsliderTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 31.25px;" @click="sorting('id')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'id'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'id' ? 'sorting_desc' : 'sorting'">
                                                                ID
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productsliderTable" rowspan="1" colspan="1" aria-label="slider: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('title')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'title'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'title' ? 'sorting_desc' : 'sorting'">
                                                                Title
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productsliderTable" rowspan="1" colspan="1" aria-label="slider: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('description')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'description'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'description' ? 'sorting_desc' : 'sorting'">
                                                                Description
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Slider Type
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Slider Image
                                                            </th>
                                                            <th v-if="$parent.permissions.includes('slider-bannder-manage')" class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-table-tbody text-dark">
                                                        <tr class="kt-table-row kt-table-row-level-0 odd" role="row" v-for="slider in sliders" v-bind:key="slider.slider_id">
                                                            <td class="sorting_1">
                                                                {{slider.slider_id}}
                                                            </td>
                                                            <td>
                                                                {{ slider.slider_title }}
                                                            </td>
                                                            <td>
                                                                {{ slider.slider_description }}
                                                            </td>
                                                            <td>
                                                                {{ slider.slider_type == null ? '' : slider.slider_type.slider_type_name }}
                                                            </td>
                                                            <td>
                                                                <img v-if="slider.gallary != null" class="img-thumbnail" :src='"/gallary/thumbnail"+slider.gallary.gallary_name' alt="image not found" />
                                                            </td>
                                                            <td v-if="$parent.permissions.includes('slider-bannder-manage')">
                                                                <a href="javascript:void(0)" class=" click-edit" id="click-edit1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" @click="editSlider(slider)"><i class="fa fa-edit"></i></a>
                                                                <a class="" href="#" @click="deleteSlider(slider.slider_id)"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><button class="page-link" href="#" @click="fetchSliders(pagination.prev_page_url)">Previous</button></li>

                                                    <li class="disabled"><button class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</button></li>

                                                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><button class="page-link" href="#" @click="fetchSliders(pagination.next_page_url)">Next</button></li>
                                                </ul>
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

    <div class="offcanvas offcanvas-right kt-color-panel p-5 kt_notes_panel" v-if="display_form" :class="display_form ? 'offcanvas-on' : ''">
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
            <h4 class="font-size-h4 font-weight-bold m-0">Add slider</h4>
            <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" v-on:click="clearForm()">
                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                </svg>
            </a>
        </div>
        <form id="myform">
            <div class="row">
                <div class="col-12">
                    <div class="form-group ">
                        <label class="text-dark">slider Name</label>
                        <input type="text"  v-model="slider.title" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('title')" v-text="errors.get('title')"></small>
                    </div>
                    <div class="form-group ">
                        <label class="text-dark">Description</label>
                        <input type="text"  v-model="slider.description" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('description')" v-text="errors.get('description')"></small>
                    </div>


                    <div class="form-group ">
                        <label class="text-dark">Position</label>
                        <select class="form-control" v-model="slider.position">
                            <option  value="position-left">left</option>
                            <option value="position-right">right</option>
                            <option value="position-center">center</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('position')" v-text="errors.get('position')"></small>
                    </div>


                    <div class="form-group ">
                        <label class="text-dark">Text Content Position</label>
                        <select class="form-control" v-model="slider.textcontent">
                            <option :selected="slider.textcontent == 'textcontent-left'" value="textcontent-left">left</option>
                            <option :selected="slider.textcontent == 'textcontent-right'" value="textcontent-right">right</option>
                            <option :selected="slider.textcontent == 'textcontent-center'" value="textcontent-center">center</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('textcontent')" v-text="errors.get('description')"></small>
                    </div>

                    <div class="form-group ">
                        <label class="text-dark">Text Color</label>
                         <select class="form-control" v-model="slider.text">
                            <option value="text-black">black</option>
                            <option value="text-white">white</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('text')" v-text="errors.get('description')"></small>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary" @click="toggleImageSelect()">Upload slider Media</button>
                        <div class="clearfix"></div>
                        <small id="textHelp" class="form-text text-muted" v-if="gallary_path == null || gallary_path == ''">Select Image file from gallary.</small>
                        <small class="form-text text-danger" v-if="errors.has('gallary_id')" v-text="errors.get('gallary_id')"></small>

                        <img v-if="gallary_path != ''" :src="gallary_path" style="width:100px;height:100px;"/>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Language </label>
                        <select v-model="slider.language_id">
                        <option value="">Select Language</option>
                        <option v-for="language in languages" v-bind:value="language.id">
                        {{ language.language_name }}
                        </option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('language_id')" v-text="errors.get('language_id')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Slider type </label>
                        <select v-model="slider.slider_type_id">
                        <option value="">Select Slider type</option>
                        <option v-for="slider_type in slider_types" v-bind:value="slider_type.slider_type_id">
                        {{ slider_type.slider_type_name }}
                        </option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('slider_type_id')" v-text="errors.get('slider_type_id')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Slider Navigation </label>
                        <div class="clearfix"></div>
                        <select v-model="slider.slider_navigation_id">
                        <option value="">Select Slider Navigation</option>
                        <option v-for="slider_navigation in slider_navigations" v-bind:value="slider_navigation.slider_navigation_id">
                        {{ slider_navigation.slider_navigation_name }}
                        </option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('slider_navigation_id')" v-text="errors.get('slider_navigation_id')"></small>
                    </div>

                    <div class="form-group" v-if="slider.slider_navigation_id == 1">
                        <label class="text-dark">Category </label>
                        <div class="clearfix"></div>
                        <select v-model="slider.ref_id">
                        <option value="">Select Category</option>
                        <option v-for="category in categories" v-bind:value="category.id">
                        {{ category.detail == null ? '' : category.detail[0].name }}
                        </option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('ref_id')" v-text="errors.get('ref_id')"></small>
                    </div>

                    <div class="form-group" v-if="slider.slider_navigation_id == 2">
                        <label class="text-dark">Products </label>
                        <div class="clearfix"></div>
                        <select v-model="slider.ref_id">
                        <option value="">Select Product</option>
                        <option v-for="product in products" v-bind:value="product.product_id">
                        {{ product.detail == null ? '' : product.detail[0].title }}
                        </option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('ref_id')" v-text="errors.get('ref_id')"></small>
                    </div>

                    <div class="form-group" v-if="slider.slider_navigation_id == 3">
                        <label class="text-dark">Pages </label>
                        <div class="clearfix"></div>
                        <select v-model="slider.ref_id">
                        <option value="">Select Page</option>
                        <option v-for="page in pages" v-bind:value="page.id">
                            {{ page.slug }}
                        </option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('ref_id')" v-text="errors.get('ref_id')"></small>
                    </div>


                    <div class="form-group" v-if="slider.slider_navigation_id == 4">
                        <label class="text-dark">Link </label>
                        <div class="clearfix"></div>
                        <input type="text" :name="slider.url" v-model="slider.url">
                        
                        <small class="form-text text-danger" v-if="errors.has('url')" v-text="errors.get('url')"></small>
                    </div>
                    
                </div>
            </div>
            <button type="button" @click="addUpdateSlider()" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <attach-image @toggleImageSelect="toggleImageSelect" :showModal="showModal" @setImage="setImage"/>
</div>
</template>

<script>
import ErrorHandling from "../../ErrorHandling";

export default {
    data() {
        return {
            display_form: 0,
            slider: {
                id: "",
                title: "",
                description: "",
                slider_type_id: "",
                slider_navigation_id: "",
                ref_id: "",
                gallary_id: "",
                language_id: "",
                position:"",
                textcontent:"",
                text:"",
                url:''
            },
            showModal:false,
            searchParameter: '',
            sortBy: 'id',
            sortType: 'ASC',
            limit: 10,
            error_message: '',
            edit: false,
            actions: false,
            pagination: {},
            request_method: "",
            sliders: [],
            categories: [],
            slider_types: [],
            slider_navigations: [],
            products: [],
            pages:[],
            token: [],
            gallary_path:"",
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },

    methods: {
        fetchProducts() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/product?getAllData=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.products = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchSliderTypes() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/slider_type', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.slider_types = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchLanguages() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/language', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.languages = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchSliderNavigation() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/slider_navigation', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.slider_navigations = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchCategory() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/category?getDetail=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.categories = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchSliders(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/slider";
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            } else {
                page_url += '?limit=' + this.limit;
            }
            if (this.searchParameter != null) {
                page_url += '&searchParameter=' + this.searchParameter;
            }
            page_url += '&sortBy=' + this.sortBy + '&sortType=' + this.sortType + '&getLanguage=1&getSliderType=1&getSliderNavigation=1&getSliderGallary=1';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.sliders = res.data.data;
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => (this.$parent.loading = false));
        },

        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };

            this.pagination = pagination;
        },
        deleteSlider(id) {
            if (confirm('Are You Sure?')) {
                this.$parent.loading = true;
                axios.delete(`/api/admin/slider/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toaster.success('Settings has been updated successfully')
                            this.fetchSliders();
                        }

                    })
                    .catch(err => console.log(err))
                    .finally(() => (this.$parent.loading = false));
            }
        },
        addUpdateSlider() {
            this.$parent.loading = true;
            var url = '/api/admin/slider';
            if (this.edit === false) {
                // Add
                this.request_method = 'post'
            } else {
                // Update
                var url = '/api/admin/slider/' + this.slider.id;
                this.request_method = 'put'
            }
            axios[this.request_method](url, this.slider, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success('Settings has been updated successfully')
                        this.clearForm();
                        this.fetchSliders();
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

        },
        editSlider(slider) {
            this.edit = true;
            this.display_form = 1;
            this.errors = new ErrorHandling();
            this.slider.id = slider.slider_id;
            this.slider.title = slider.slider_title;
            this.slider.position = slider.slider_position;
            this.slider.textcontent = slider.slider_textcontent;
            this.slider.text = slider.slider_text;
            this.slider.url = slider.slider_url;
            this.slider.description = slider.slider_description;
            this.slider.slider_type_id = slider.slider_type == null ? '' : slider.slider_type.slider_type_id;
            this.slider.slider_navigation_id = slider.slider_navigation == null ? '' : slider.slider_navigation.slider_navigation_id;
            this.slider.ref_id = slider.slider_ref_id;
            this.slider.gallary_id = slider.gallary == null ? '' : slider.gallary.id;
            this.gallary_path = "/gallary/thumbnail"+slider.gallary.gallary_name;
            this.slider.language_id = slider.language == null ? '' : slider.language.id;

        },
        clearForm() {
            this.edit = false;
            this.slider.id = null;
            this.slider.title = '';
            this.slider.description = '';
            this.slider.slider_type_id = '';
            this.slider.slider_navigation_id = '';
            this.slider.ref_id = '';
            this.slider.url = '';
            this.slider.gallary_id = '';
            this.slider.language_id = '';
            this.gallary_path = "";
            this.display_form = 0;
        },
        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchSliders();
        },
        setSelectedLanguage(selectedLanguage) {
            this.selectedLanguage = selectedLanguage;
            console.log("i am clicked", selectedLanguage)
        },
        toggleImageSelect(){
            this.showModal = !this.showModal;
        },
        setImage(gallary){
            console.log(gallary);
            this.gallary_path = gallary.gallary_path,
            this.slider.gallary_id = gallary.gallary_id;
        },
        fetchpages(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/pages";
            var arr = page_url.split('?');
            
            if (arr.length > 1) {
                page_url += '&limit=20000';
            }
            else{
                page_url += '?limit=20000';
            }
            
            page_url += '&getDetail=1';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.pages = res.data.data;
            }).finally(() => (this.$parent.loading = false));
        }
    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchSliders();
        this.fetchProducts();
        this.fetchCategory();
        this.fetchSliderTypes();
        this.fetchSliderNavigation();
        this.fetchLanguages();
        this.fetchpages();
    }
};
</script>
