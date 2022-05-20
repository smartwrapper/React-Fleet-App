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
                                            Product Category
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <button class="btn ml-2 p-0 kt_notes_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" v-if="$parent.permissions.includes('product-category-manage')">
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
                                        
                                            <div id="productcategoryTable_wrapper" class="dataTables_wrapper no-footer">

                                            <div class="dataTables_length" id="productcategoryTable_length"><label>Show 
                                            <select name="productcategoryTable_length" aria-controls="productcategoryTable" class="" v-model="limit" v-on:change="fetchcategorys()">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            </select> entries</label></div>

                                            <div id="productcategoryTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="productcategoryTable" v-model="searchParameter" @keyup="fetchcategorys()"></label></div>
                                                <table id="productcategoryTable" class="display dataTable no-footer" role="grid">
                                                    <thead class="text-body">
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="productcategoryTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending"  @click="sorting('id')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'id'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'id' ? 'sorting_desc' : 'sorting'">
                                                                ID
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productcategoryTable" rowspan="1" colspan="1" aria-label="category: activate to sort column ascending"  @click="sorting('category_name')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'category_name'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'category_name' ? 'sorting_desc' : 'sorting'">
                                                            Name
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1">
                                                                Description
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1">
                                                                Slug
                                                            </th>
                                                            <th v-if="$parent.permissions.includes('product-category-manage')" class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" >
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-table-tbody text-dark">
                                                        <tr class="kt-table-row kt-table-row-level-0 odd" role="row" v-for="category in categorys" v-bind:key="category.category_id">
                                                            <td class="sorting_1">
                                                                {{category.id}}
                                                            </td>
                                                            <td>
                                                                {{ category.detail[0] ? category.detail[0].name : '' }}
                                                            </td>
                                                            <td>
                                                                {{ category.detail[0] ? category.detail[0].description : '' }}
                                                            </td>
                                                            <td>
                                                                {{ category.slug}}
                                                            </td>
                                                            <td v-if="$parent.permissions.includes('product-category-manage')">
                                                            <a href="javascript:void(0)" class=" click-edit" id="click-edit1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" @click="editcategory(category)"><i class="fa fa-edit"></i></a>
                                                                        <a class="" href="#" @click="deletecategory(category.id)"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><button class="page-link" href="#" @click="fetchcategorys(pagination.prev_page_url)">Previous</button></li>

                                                    <li class="disabled"><button class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</button></li>

                                                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><button class="page-link" href="#" @click="fetchcategorys(pagination.next_page_url)">Next</button></li>
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
            <h4 class="font-size-h4 font-weight-bold m-0">Add category</h4>
            <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" v-on:click="clearForm()">
                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                </svg>
            </a>
        </div>
        <form id="myform">
            <div class="row">
                <div class="col-12">
                    <div class="tabslang">
                        <div v-for="language in languages" class="tablang" :class="language.id == selectedLanguage ?'active':''" @click="setSelectedLanguage(language.id)">
                            {{ language.language_name }}
                        </div>
                    </div>
                    <br />
                    <div class="form-group " v-for="(language,index) in languages" v-if="language.id == selectedLanguage">
                        <label class="text-dark">Name ( {{ language.language_name }} ) </label>
                        <input type="text" :name="'name'+index" v-model="category.name[index]" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('category_name.'+index)" v-text="errors.get('category_name.'+index)"></small>
                        <small class="form-text text-danger" v-if="errors.has('category_name')" v-text="errors.get('category_name')"></small>
                    </div>

                    <br />
                    <div class="form-group " v-for="(language,index) in languages" v-if="language.id == selectedLanguage">
                        <label class="text-dark">Description ( {{ language.language_name }} ) </label>
                        <vue-editor v-model="category.desc[index]"></vue-editor>
                        <small class="form-text text-danger" v-if="errors.has('description.'+index)" v-text="errors.get('description.'+index)"></small>
                        <small class="form-text text-danger" v-if="errors.has('description')" v-text="errors.get('description')"></small>
                    </div>

                    <div class="form-group ">
                        <label>Parent Category</label>
                        <fieldset class="form-group mb-3">
                            <select class="js-example-basic-single js-states form-control bg-transparent" v-model='category.parent' >
                                <option value="">Select Category</option>
                                <option 
                                v-for='parent in allcategories' :value='parent.id'
                                v-bind:selected="category.parent == parent.id"
                                v-bind:key="parent.id">{{ parent.detail[0] ? parent.detail[0].name : '' }}</option>
                            </select>
                            
                        </fieldset>
                    </div>
                    

                     <div class="form-group " >
                        <label class="text-dark">Slug</label>
                        <input type="text" :name="category.category_slug" v-model="category.category_slug" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('category_slug')" v-text="errors.get('category_slug')"></small>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" @click="toggleImageSelect()">Upload Category Media</button>
                        <small id="textHelp" class="form-text text-muted">Select Image file from gallary.</small>
                        <small class="form-text text-danger" v-if="errors.has('gallary_id')" v-text="errors.get('gallary_id')"></small>

                        <img v-if="gallary_path != ''" :src="gallary_path" style="width:100px;height:100px;"/>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary" @click="toggleImageSelectIcon()">Upload Category Icon</button>
                        <small id="textHelp" class="form-text text-muted">Select Image file from gallary.</small>
                        <small class="form-text text-danger" v-if="errors.has('category_icon')" v-text="errors.get('category_icon')"></small>

                        <img v-if="icon_path != ''" :src="icon_path" style="width:100px;height:100px;"/>
                    </div>
                </div>
            </div>
            <button type="button" @click="addUpdatecategory()" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <attach-image @toggleImageSelect="toggleImageSelect" :showModal="showModal" @setImage="setImage"/>


    
    <attach-image @toggleImageSelect="toggleImageSelectIcon" :showModal="showModalIcon" @setImage="setIcon"/>
</div>
</template>

<script>
import ErrorHandling from "../../ErrorHandling";
import { VueEditor } from "vue2-editor";

export default {
    components: {
        VueEditor
     },
    data() {
        return {
            display_form: 0,
            category: {
                id: "",
                name:[],
                category_slug:"",
                desc:[],
                parent:"",
                gallary_id:"",
                icon:"",
                language_id:[],
                is_active: "0",
            },
            searchParameter: '',
            sortBy: 'id',
            sortType: 'ASC',
            limit: 10,
            error_message: '',
            edit: false,
            actions: false,
            pagination: {},
            request_method: "",
            countrySelected: "",
            stateSelected: "",
            categorys: [],
            allcategories: [],
            languages: [],
            token: [],
            gallary_path:"",
            icon_path:"",
            showModal:false,
            showModalIcon:false,
            selectedLanguage:'',
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },

    methods: {
        fetchLanguages() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/language?limit=500', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.languages = res.data.data;
                        for(var i = 0 ; i < res.data.data.length; i++){
                            this.category.language_id.push(res.data.data[i].id);
                            if(res.data.data[i].is_default){
                                this.selectedLanguage = res.data.data[i].id;   
                            }
                        }
                    }
                }).finally(() => (this.$parent.loading = false));
        },
        fetchcategorys(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/category";
            var arr = page_url.split('?');
            
            if (arr.length > 1) {
                page_url += '&limit='+this.limit;
            }
            else{
                page_url += '?limit='+this.limit;
            }
            if(this.searchParameter != null){
                page_url += '&searchParameter='+this.searchParameter;
            }
            page_url += '&sortBy='+this.sortBy+'&sortType='+this.sortType+'&getDetail=1&getGallary=1';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.categorys = res.data.data;
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => (this.$parent.loading = false));
        },


        fetchAllCategories() {
            this.$parent.loading = true;
            let page_url = "/api/admin/category";
            var arr = page_url.split('?');
            if (arr.length > 1) {
                page_url += '&limit=200000';
            }
            else{
                page_url += '?limit=200000';
            }
            
            page_url += '&sortBy='+this.sortBy+'&sortType='+this.sortType+'&getDetail=1&getGallary=1';
            axios.get(page_url, this.token).then(res => {
                this.allcategories = res.data.data;
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
        deletecategory(id) {
            if (confirm('Are You Sure?')) {
                this.$parent.loading = true;
                axios.delete(`/api/admin/category/${id}`,this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toaster.success('Category has been Deleted successfully')
                            this.fetchcategorys();
                        }

                    })
                    .catch(error => {
                        if (error.response.status == 422) {
						if(error.response.data.status == 'Error'){
                             this.$toaster.error(error.response.data.message)
						} 
					}
                    })
                    .finally(() => (this.$parent.loading = false));
            }
        },
        addUpdatecategory() {
            this.$parent.loading = true;
            var url = '/api/admin/category';
            if (this.edit === false) {
                // Add
                this.request_method = 'post'
            } else {
                // Update
                var url = '/api/admin/category/' + this.category.id;
                this.request_method = 'put'
            }

            axios[this.request_method](url,
            {
                category_name:this.category.name,
                description:this.category.desc,
                category_slug:this.category.category_slug,
                parent_id:this.category.parent,
                gallary_id:this.category.gallary_id,
                category_icon:this.category.icon,
                language_id:this.category.language_id
            },
                this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success('Category has been updated successfully')
                        this.clearForm();
                        this.fetchcategorys();
                    } else {
                        this.$toaster.error(res.data.message)
                    }
                })
                .catch(error => {
					this.error_message = '';
					this.errors = new ErrorHandling();
					if (error.response.status = 422) {
						if(error.response.data.status == 'Error'){
							this.error_message = error.response.data.message;
						}
						else{
							this.errors.record(error.response.data.errors);
						}
					}
				}).finally(() => (this.$parent.loading = false));

        },
        editcategory(category) {
            this.edit = true;
            this.display_form = 1;
            this.errors = new ErrorHandling();
            this.category.id = category.id;
            this.category.name = [];
            this.category.desc = [];
            this.gallary_path = "";
            this.icon_path = "";
            this.icon = "";

            axios.get(`/api/admin/category/${category.id}?getDetail=1&getGallary=1`,this.token)
            .then(res => {
                if (res.data.status == "Success") {
                    res.data.data.detail.forEach(u => {
                        this.category.name[this.category.language_id.indexOf(u.language.id)] = u.name;
                        this.category.desc[this.category.language_id.indexOf(u.language.id)] = u.description;
                    });
                        console.log(res.data.data.gallary.gallary_name,"data data");
                        this.gallary_path = res.data.data.gallary != null ? '/gallary/'+res.data.data.gallary.gallary_name: "" ;
                        this.icon_path = res.data.data.icon != null ? '/gallary/'+res.data.data.icon.gallary_name:"";
                        this.category.gallary_id = res.data.data.gallary != null ? res.data.data.gallary.id:"";
                        this.category.icon = res.data.data.icon != null ? res.data.data.icon.id:"";

                    this.category.parent = res.data.data.parent_id;
                    this.category = Object.assign({}, this.category, { category_slug: res.data.data.slug })

                    
                }

            })
            .catch(err => console.log(err));
            
            
        },
        clearForm() {
            this.errors = new ErrorHandling();
            this.display_form = 0;
            this.edit = false;
            this.category.category_slug = "";
            this.category.parent = "";
            this.category.desc = [];
            this.category.id = null;
            this.category.name = [];
            this.category.is_active = 'inactive';
            this.category.gallary_id = "";
            this.gallary_path = "";
            this.icon_path = "";
            this.fetchAllCategories();
        },
        sorting(sortBy){
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType='desc' : this.sortType = 'asc';
            this.fetchcategorys();
        },
        setSelectedLanguage(selectedLanguage){
            this.selectedLanguage = selectedLanguage;
            console.log("i am clicked",selectedLanguage)
        },
        toggleImageSelect(){
            this.showModal = !this.showModal;
        },
        setImage(gallary){
            console.log(gallary);
            this.gallary_path = gallary.gallary_path,
            this.category.gallary_id = gallary.gallary_id;
        },
        toggleImageSelectIcon(){
            this.showModalIcon = !this.showModalIcon;
        },
        setIcon(gallary){
            console.log(gallary);
            this.icon_path = gallary.gallary_path
            this.category.icon = gallary.gallary_id;
        },

    },
    mounted() {
        
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchAllCategories();
        this.fetchcategorys();
        this.fetchLanguages();
    }
};
</script>
