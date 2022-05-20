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
                                            Shipping Method
                                        </h3>
                                    </div>
                                    <!-- <div class="icons d-flex">
                                        <a href="#" onclick="printDiv()" class="ml-2">
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
                                        </a>
                                    </div> -->
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

                                            <div id="ShippingMethod_wrapper" class="dataTables_wrapper no-footer">

                                            <div class="dataTables_length" id="ShippingMethod_length"><label>Show
                                            <select name="ShippingMethod_length" aria-controls="ShippingMethod" class="" v-model="limit" v-on:change="fetchShippingMethods()">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            </select> entries</label></div>

                                            <div id="ShippingMethod_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="ShippingMethod" v-model="searchParameter" @keyup="fetchShippingMethods()"></label></div>
                                                <table id="ShippingMethod" class="display dataTable no-footer" role="grid">
                                                    <thead class="text-body">
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="ShippingMethod" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 31.25px;" @click="sorting('id')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'id'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'id' ? 'sorting_desc' : 'sorting'">
                                                                ID
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="ShippingMethod" rowspan="1" colspan="1" aria-label="shipping_method: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('name')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'name'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'name' ? 'sorting_desc' : 'sorting'">
                                                            Name
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="ShippingMethod" rowspan="1" colspan="1" aria-label="shipping_method: activate to sort column ascending" style="width: 95.5288px;">
                                                            Default
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="ShippingMethod" rowspan="1" colspan="1" aria-label="shipping_method: activate to sort column ascending" style="width: 95.5288px;">
                                                            Shipping Price
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="ShippingMethod" rowspan="1" colspan="1" aria-label="shipping_method: activate to sort column ascending" style="width: 95.5288px;">
                                                            Status
                                                            </th>
                                                            <th v-if="$parent.permissions.includes('shipping-methods-manage')" class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-table-tbody text-dark">
                                                        <tr class="kt-table-row kt-table-row-level-0 odd" role="row" v-for="shipping_method in shipping_methods" v-bind:key="shipping_method.shipping_method_id">
                                                            <td class="sorting_1">
                                                                {{shipping_method.shipping_method_id}}
                                                            </td>
                                                            <td>
                                                                {{ shipping_method.shipping_method_discription.count == '0' ? '' : shipping_method.shipping_method_discription[0].name }}
                                                            </td>

                                                            
                                                            <td>
                                                                <input type="radio" name="is_default" :checked="shipping_method.shipping_method_is_default == '1'" @click="setAsDefault(shipping_method.shipping_method_id)">
                                                            </td>
                                                            <td>
                                                                {{ shipping_method.shipping_method_amount }}
                                                            </td>
                                                            <td>
                                                                {{ shipping_method.shipping_method_status == 1 ? 'Active' : 'Inactive' }}

                                                            </td>
                                                            <td v-if="$parent.permissions.includes('shipping-methods-manage')">
                                                            <a href="javascript:void(0)" class=" click-edit" id="click-edit1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" @click="editShippingMethod(shipping_method)"><i class="fa fa-edit"></i></a>
                                                            <!-- <a class="" href="#" @click="deletShippingMethod(shipping_method.shipping_method_id)"><i class="fa fa-trash"></i></a> -->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><button class="page-link" href="#" @click="fetchShippingMethods(pagination.prev_page_url)">Previous</button></li>

                                                    <li class="disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><button class="page-link" href="#" @click="fetchShippingMethods(pagination.next_page_url)">Next</button></li>
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
            <h4 class="font-size-h4 font-weight-bold m-0">Shipping Method</h4>
            <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" v-on:click="display_form = 0">
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
                        <label class="text-dark">Name ( {{ language.language_name }} ) {{shipping_method.language_value[index]}} </label>
                        <input type="text" :name="'language_value'+index" v-model="shipping_method.language_value[index]" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('language_value')" v-text="errors.get('language_value')"></small>
                    </div>

                    <div class="form-group ">
                        <label class="text-dark">Shipping Price</label>
                        <input type="text" :name="shipping_method.amount" v-model="shipping_method.amount" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('amount')" v-text="errors.get('amount')"></small>
                    </div>


                    <div class="form-group">
                        <label class="text-dark">Status </label>
                        <select v-model="shipping_method.status">
                            <option :selected="shipping_method.status == '1' ? 'selected':''" value="1">Active</option>
                            <option :selected="shipping_method.status == '0' ? 'selected':''" value="0">Inactive</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('status')" v-text="errors.get('status')"></small>
                    </div>
                    <!-- <div class="form-group">
                        <input type="checkbox" name="text" v-model="shipping_method.is_default"  :checked="shipping_method.is_default == '1' ? 'checked':''" id="is_default" class="form-check-input" />
                        <label class="text-dark" for="is_default">Set as default </label>
                        <small class="form-text text-danger" v-if="errors.has('is_default')" v-text="errors.get('is_default')"></small>
                    </div> -->
                </div>
            </div>
            <button type="button" @click="addUpdateShippingMethod()" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";
export default {
    data() {
        return {
            display_form: 0,
            shipping_method: {
                id: "",
                language_value:[],
                language_id:[],
                status: 1,
                amount:0
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
            shipping_methods: [],
            languages: [],
            token: [],
            selectedLanguage:'',
            is_default: "0",
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
                            this.shipping_method.language_id.push(res.data.data[i].id);
                            if(res.data.data[i].is_default){
                                this.selectedLanguage = res.data.data[i].id;
                            }
                        }
                    }
                }).finally(() => (this.$parent.loading = false));
        },
        fetchShippingMethods(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/shipping_method";
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
            page_url += '&sortBy='+this.sortBy+'&sortType='+this.sortType+'&getDetail=1';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.shipping_methods = res.data.data;
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
        deletShippingMethod(id) {
            if (confirm('Are You Sure?')) {
                this.$parent.loading = true;
                axios.delete(`/api/admin/shipping_method/${id}`,this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toaster.success('Settings has been updated successfully')
                            this.fetchShippingMethods();
                        }

                    })
                    .catch(err => console.log(err))
                    .finally(() => (this.$parent.loading = false));
            }
        },
        addUpdateShippingMethod() {
            this.$parent.loading = true;
            var url = '/api/admin/shipping_method';
            if (this.edit === false) {
                // Add
                this.request_method = 'post'
            } else {
                // Update
                var url = '/api/admin/shipping_method/' + this.shipping_method.shipping_method_id+'?updateDescription=1';
                this.request_method = 'put'
            }
            axios[this.request_method](url, this.shipping_method, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success('Settings has been updated successfully')
                        this.clearForm();
                        this.fetchShippingMethods();
                    } else {
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
				}).finally(() => (this.$parent.loading = false));

        },
        editShippingMethod(shipping_method) {
            console.log(this.shipping_method,shipping_method,"selected shipping method")
            this.edit = true;
            this.display_form = 1;
            this.errors = new ErrorHandling();
            this.shipping_method.shipping_method_id = shipping_method.shipping_method_id;
            this.shipping_method.status = shipping_method.shipping_method_status;
            this.shipping_method.amount = shipping_method.shipping_method_amount;
            this.shipping_method.language_value = [];
            
            this.$parent.loading = true;
            axios.get(`/api/admin/shipping_method/${shipping_method.shipping_method_id}?getDetail=1`,this.token)
            .then(res => {
                
                if (res.data.status == "Success") {
                    res.data.data.shipping_method_discription.forEach(u => {
                        if(u.language != null){
                            console.log(this.shipping_method.language_id.indexOf(u.language.id));
                            this.shipping_method.language_value[this.shipping_method.language_id.indexOf(u.language.id)] = u.name;
                            this.shipping_method = Object.assign({}, this.shipping_method, { amount: shipping_method.shipping_method_amount})

                        }
                        

                        // this.shipping_method.language_value.push(u.name)
                    });
                }

            })
            .catch(err => console.log(err))
            .finally(() => (this.$parent.loading = false));

            // this.shipping_method.amount = shipping_method.shipping_method_amount;
            this.shipping_method = Object.assign({}, this.shipping_method, { amount: shipping_method.shipping_method_amount})

        },
        clearForm() {
            this.edit = false;
            this.shipping_method.shipping_method_id = null;
            this.shipping_method.language_value = [];
            this.shipping_method.status = '1';
            this.shipping_method.amount = 0;


            },
        sorting(sortBy){
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType='desc' : this.sortType = 'asc';
            this.fetchShippingMethods();
        },
        setSelectedLanguage(selectedLanguage){
            this.selectedLanguage = selectedLanguage;
            console.log("i am clicked",selectedLanguage)
        },
        setAsDefault(shipping_method_id){
                this.$parent.loading = true;
                var page_url = '/api/admin/shipping_method/'+shipping_method_id+'?is_default=1';
                axios.put(page_url, {}, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success(res.data.message)
                        this.clearForm();
                        // this.fetchLanguages();
                    } else {
                        this.$toaster.error(res.data.message)
                    }
                }).finally(() => (this.$parent.loading = false));
        },
        setIsDefult(e){
           this.is_default = e.target.checked ? 1:0;
        }
    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchShippingMethods();
        this.fetchLanguages();
    }
};
</script>
