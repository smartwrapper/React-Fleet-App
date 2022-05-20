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
                                            Biller
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <button class="btn ml-2 p-0 kt_notes_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos">
                                            <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm " v-on:click="
                                                        display_form = !display_form
                                                    ">
                                                <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                                </svg>
                                            </span>
                                        </button>
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
                                            <div id="productUnitTable_wrapper" class="dataTables_wrapper no-footer">
                                                 <div class="dataTables_length" id="productUnitTable_length"><label>Show
                                                        <select name="productUnitTable_length" aria-controls="productUnitTable" class="" v-model="limit" v-on:change="fetchBillers()">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>

                                                <div id="productUnitTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="productUnitTable" v-model="searchParameter" @keyup="fetchBillers()"></label></div>
                                                <table id="productUnitTable" class="display dataTable no-footer" role="grid">
                                                    <thead class="text-body">
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 31.25px;"  @click="sorting('id')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'id'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'id' ? 'sorting_desc' : 'sorting'">
                                                                ID
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="biller: activate to sort column ascending" style="width: 95.5288px;"  @click="sorting('name')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'name'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'name' ? 'sorting_desc' : 'sorting'"> 
                                                                Name
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending" style="width: 81.8109px;"  @click="sorting('city')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'city'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'city' ? 'sorting_desc' : 'sorting'">
                                                                City
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="State: activate to sort column ascending" style="width: 114.84px;"  @click="sorting('state')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'state'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'state' ? 'sorting_desc' : 'sorting'">
                                                                State
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" style="width: 158.462px;"  @click="sorting('country')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'country'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'country' ? 'sorting_desc' : 'sorting'">
                                                                Country
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-table-tbody text-dark">
                                                        <tr class="kt-table-row kt-table-row-level-0 odd" role="row" v-for="biller in billers" v-bind:key="biller.id">
                                                            <td class="sorting_1">
                                                                {{biller.biller_id}}
                                                            </td>
                                                            <td>
                                                                {{ biller.biller_name }}
                                                            </td>
                                                            <td>
                                                                {{ biller.biller_city }}
                                                            </td>
                                                            <td>
                                                                {{ biller.state.name }}
                                                            </td>
                                                            <td>
                                                                {{ biller.country.country_name }}
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)" class=" click-edit" id="click-edit1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" @click="editbiller(biller)"><i class="fa fa-edit"></i></a>
                                                                <a class="" href="#" @click="deletebiller(biller.biller_id)"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><a class="page-link" href="#" @click="fetchBillers(pagination.prev_page_url)">Previous</a></li>

                                                    <li class="disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchBillers(pagination.next_page_url)">Next</a></li>
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
            <h4 class="font-size-h4 font-weight-bold m-0">Add biller</h4>
            <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" v-on:click="display_form = 0">
                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                </svg>
            </a>
        </div>
        <form id="myform">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-dark">Name </label>
                        <input type="text" name="text" v-model="biller.biller_name" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('name')" v-text="errors.get('name')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">City </label>
                        <input type="text" name="text" v-model="biller.biller_city" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('city')" v-text="errors.get('city')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Address </label>
                        <input type="text" name="text" v-model="biller.biller_address" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('address')" v-text="errors.get('address')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Phone </label>
                        <input type="text" name="text" v-model="biller.phone_number" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('phone_number')" v-text="errors.get('phone_number')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Email </label>
                        <input type="email" name="text" v-model="biller.biller_email" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('email')" v-text="errors.get('email')"></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Vat Number </label>
                        <input type="email" name="text" v-model="biller.vat_number" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('vat_number')" v-text="errors.get('vat_number')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Company Name </label>
                        <input type="email" name="text" v-model="biller.company_name" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('company_name')" v-text="errors.get('company_name')"></small>
                    </div>

                     <div class="form-group">
                        <label>Country</label>
                        <select class="js-example-basic-single js-states form-control bg-transparent" v-model='biller.country_id' @change="fetchStatesByCountryID(biller.country_id)">
                            <option 
                            v-for='country in countries' :value='country.country_id'
                            v-bind:selected="biller.country_id == country.country_id"
                            v-bind:key="country.country_id">
                                {{ country.country_name }}</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('country_id')" v-text="errors.get('country_id')"></small>
                    </div>

                     <div class="form-group">
                        <label>State</label>
                        <select class="js-example-basic-single js-states form-control bg-transparent" v-model='biller.state_id' >
                            <option 
                            v-for='state in states' :value='state.id'
                            v-bind:selected="biller.state_id == state.id"
                            v-bind:key="state.id"
                            >{{ state.name }}</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('state_id')" v-text="errors.get('state_id')"></small>
                    </div>

                    
                    
                </div>
            </div>
            <button type="button" @click="addbiller()" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</template>

<script>
import ErrorHandling from "../../ErrorHandling";
export default {
    data() {
        return {
            display_form: 0,
            biller: {
                biller_id:"",
                biller_name:"",
                gallary_id:1,
                company_name:"",
                vat_number:"",
                biller_email:"",
                phone_number:"",
                biller_address:"",
                country_id:"",
                state_id:"",
                biller_city:"",
            },
            countries:[],
            states:[],
            error_message: '',
            edit: false,
            pagination: {},
            request_method: "",
            billers: [],
            token: [],
            searchParameter: '',
            sortBy: 'id',
            sortType: 'ASC',
            limit: 3,
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },

    methods: {
        fetchCountries() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/country?getAllData=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.countries = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchStatesByCountryID(country_id) {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            if(country_id == null){
                return;
            }

            axios.get('/api/admin/country/'+country_id+'?getStates=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.states = res.data.data.states;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchBillers(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/biller";
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            } else {
                page_url += '?limit=' + this.limit;
            }
            if (this.searchParameter != null) {
                page_url += '&searchParameter=' + this.searchParameter;
            }
            page_url += '&sortBy=' + this.sortBy + '&sortType=' + this.sortType + '&getCountry=1&getState=1';

            axios.get(page_url, this.token).then(res => {
                this.billers = res.data.data;
                vm.makePagination(res.data.meta, res.data.links);
            })
            .finally(() => (this.$parent.loading = false));
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
        deletebiller(id) {
            if (confirm('Are You Sure?')) {
                this.$parent.loading = true;
                axios.delete(`/api/admin/biller/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toaster.success(res.data.message)
                            this.fetchBillers();
                        }

                    })
                    .catch(err => console.log(err))
                    .finally(() => (this.$parent.loading = false));
            }
        },
        addbiller() {
            this.$parent.loading = true;
            var url = '/api/admin/biller';
            if (this.edit === false) {
                // Add
                this.request_method = 'post'
            } else {
                // Update
                var url = '/api/admin/biller/' + this.biller.biller_id;
                this.request_method = 'put'
            }
            axios[this.request_method](url, 
            {
                'name':this.biller.biller_name,
                'gallary_id':1,
                'company_name':this.biller.company_name,
                'vat_number':this.biller.vat_number,
                'email':this.biller.biller_email,
                'phone_number':this.biller.phone_number,
                'address':this.biller.biller_address,
                'country_id':this.biller.country_id,
                'state_id':this.biller.state_id,
                'city':this.biller.biller_city
            },
            this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success(res.data.message)
                        this.fetchBillers();
                        this.clearForm();
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
                })
                .finally(() => (this.$parent.loading = false));

        },
        editbiller(biller) {
            this.edit = true;
            this.display_form = 1;
            this.errors = new ErrorHandling();
            this.biller = biller;
            this.biller.country_id = biller.country.country_id;
            this.biller.state_id = biller.state.id;

            console.log(biller);

        },
        clearForm() {
            this.edit = false;
            this.biller = {
                biller_id:"",
                biller_name:"",
                gallary_id:1,
                company_name:"",
                vat_number:"",
                biller_email:"",
                phone_number:"",
                biller_address:"",
                country_id:"",
                state_id:"",
                biller_city:"",
            };
        },
        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchBillers();
        }
    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchBillers();
        this.fetchCountries();
    }
};
</script>
