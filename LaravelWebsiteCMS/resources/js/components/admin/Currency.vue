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
                                            Currency
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <button class="btn ml-2 p-0 kt_notes_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" v-if="$parent.permissions.includes('currency-manage')">
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
                                        
                                            <div id="Curreney_wrapper" class="dataTables_wrapper no-footer">

                                            <div class="dataTables_length" id="Curreney_length"><label>Show 
                                            <select name="Curreney_length" aria-controls="currency" class="" v-model="limit" v-on:change="fetchCurrencies()">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            </select> entries</label></div>

                                            <div id="Curreney_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="currency" v-model="searchParameter" @keyup="fetchCurrencies()"></label></div>
                                                <table id="currency" class="display dataTable no-footer" currency="grid">
                                                    <thead class="text-body">
                                                        <tr currency="row">
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 31.25px;" @click="sorting('id')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'id'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'id' ? 'sorting_desc' : 'sorting'">
                                                                ID
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-label="currency: activate to sort column ascending" style="width: 95.5288px;">
                                                                Default Currency
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-label="currency: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('title')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'title'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'title' ? 'sorting_desc' : 'sorting'">
                                                                Name
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-label="currency: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('code')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'code'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'code' ? 'sorting_desc' : 'sorting'">
                                                                Code
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-label="currency: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('symbol_position')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'symbol_position'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'symbol_position' ? 'sorting_desc' : 'sorting'">
                                                                Position
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-label="currency: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('value')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'value'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'value' ? 'sorting_desc' : 'sorting'">
                                                                Exchange Rate
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-label="currency: activate to sort column ascending" style="width: 95.5288px;">
                                                                Decimal Places
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="currency" rowspan="1" colspan="1" aria-label="currency: activate to sort column ascending" style="width: 95.5288px;">
                                                                Status
                                                            </th>
                                                            <th v-if="$parent.permissions.includes('currency-manage')" class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-table-tbody text-dark">
                                                        <tr class="kt-table-row kt-table-row-level-0 odd" currency="row" v-for="currency in currencies" v-bind:key="currency.currency_id">
                                                            <td class="sorting_1">
                                                                {{currency.currency_id}}
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="is_default" :checked="currency.is_default == '1'" @click="setAsDefault(currency.currency_id)">
                                                            </td>
                                                            <td>
                                                                {{ currency.title }}
                                                            </td>
                                                            <td>
                                                                {{ currency.code }}
                                                            </td>
                                                            <td>
                                                                {{ currency.symbol_position }}
                                                            </td>
                                                            <td>
                                                                {{ currency.exchange_rate }}
                                                            </td>
                                                            <td>
                                                                {{ currency.decimal_point }}
                                                            </td>
                                                            <td>
                                                                {{ currency.status }}
                                                            </td>
                                                            <td v-if="$parent.permissions.includes('currency-manage')">
                                                            <a href="javascript:void(0)" class=" click-edit" id="click-edit1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" @click="editCurrency(currency)"><i class="fa fa-edit"></i></a>
                                                                        <a class="" href="#" @click="deleteCurrency(currency.currency_id)"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><button class="page-link" href="#" @click="fetchCurrencies(pagination.prev_page_url)">Previous</button></li>

                                                    <li class="disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><button class="page-link" href="#" @click="fetchCurrencies(pagination.next_page_url)">Next</button></li>
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
            <h4 class="font-size-h4 font-weight-bold m-0">Add currency</h4>
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
                        <input type="text" name="text" v-model="currency.title" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('title')" v-text="errors.get('title')"></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Country </label>
                        <select v-model="currency.country_id">
                        <option value="">Select Country</option>
                        <option v-for="country in countries" v-bind:value="country.country_id">
                        {{ country.country_name }}
                        </option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('country_id')" v-text="errors.get('country_id')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Symbol Position </label>
                        <select v-model="currency.symbol_position">
                            <option value="left">left</option>
                            <option value="right">right</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('symbol_position')" v-text="errors.get('symbol_position')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Code </label>
                        <input type="text" name="text" v-model="currency.code" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('code')" v-text="errors.get('code')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Decimal point </label>
                        <input type="text" name="text" v-model="currency.decimal_point" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('decimal_point')" v-text="errors.get('decimal_point')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Thousand point </label>
                        <input type="text" name="text" v-model="currency.thousand_point" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('thousand_point')" v-text="errors.get('thousand_point')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Decimal place </label>
                        <input type="text" name="text" v-model="currency.decimal_place" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('decimal_place')" v-text="errors.get('decimal_place')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Exchange rate </label>
                        <input type="text" name="text" v-model="currency.exchange_rate" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('exchange_rate')" v-text="errors.get('exchange_rate')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Status </label>
                        <select v-model="currency.status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('status')" v-text="errors.get('status')"></small>
                    </div>

                    
                    <div class="form-group">
                        <input type="checkbox" name="text" v-model="currency.is_default" id="is_default" class="form-check-input" />
                        <label class="text-dark" for="is_default">Set as default </label>
                        <small class="form-text text-danger" v-if="errors.has('is_default')" v-text="errors.get('is_default')"></small>
                    </div>
                    
                </div>
            </div>
            <button type="button" @click="addUpdatecurrency()" class="btn btn-primary">Submit</button>
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
            currency: {
                id: "",
                title: "",
                symbol_position: "left",
                code: "",
                country_id: "",
                decimal_point: "",
                thousand_point: "",
                decimal_place: "",
                status: "active",
                is_default: "0",
                exchange_rate: "0",
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
            is_default: "0",
            currencies: [],
            countries: [],
            token: [],
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
        fetchCurrencies(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/currency";
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
            page_url += '&sortBy='+this.sortBy+'&sortType='+this.sortType;
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.currencies = res.data.data;
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
        deleteCurrency(id) {
            if (confirm('Are You Sure?')) {
                
                axios.delete(`/api/admin/currency/${id}`,this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toaster.success(res.data.message)
                            this.fetchCurrencies();
                        }

                    })
                    .catch(error => {
                        if (error.response.status == 422) {
						if(error.response.data.status == 'Error'){
                             this.$toaster.error(error.response.data.message)
						} 
					}
                    })
            }
        },
        addUpdatecurrency() {
            this.$parent.loading = true;
            if(this.currency.is_default == false){
                this.currency.is_default = 0
            }
            else{
                this.currency.is_default = 1
            }
            var url = '/api/admin/currency';
            if (this.edit === false) {
                // Add
                this.request_method = 'post'
            } else {
                // Update
                var url = '/api/admin/currency/' + this.currency.currency_id;
                this.request_method = 'put'
            }
            axios[this.request_method](url, this.currency, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success(res.data.message)
                        this.clearForm();
                        this.fetchCurrencies();
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
				})
                .finally(() => (this.$parent.loading = false));

        },
        editCurrency(currency) {
            this.edit = true;
            this.display_form = 1;
            this.errors = new ErrorHandling();
            this.currency.currency_id = currency.currency_id;
            this.currency.title = currency.title;
            this.currency.symbol_position = currency.symbol_position;
            this.currency.code = currency.code;
            this.currency.country_id = currency.country_id.id;
            this.currency.decimal_point = currency.decimal_point;
            this.currency.thousand_point = currency.thousand_point;
            this.currency.decimal_place = currency.decimal_place;
            this.currency.status = currency.status;
            this.currency.exchange_rate = currency.exchange_rate;
            this.currency.is_default = currency.is_default;
        },
        clearForm() {
            this.edit = false;
            this.currency.currency_id = null;
            this.currency.title = '';
            this.currency.symbol_position = 'ltr';
            this.currency.code = '';
            this.currency.country_id = '';
            this.currency.decimal_point = '';
            this.currency.thousand_point = '';
            this.currency.decimal_place = '';
            this.currency.status = 'active';
            this.currency.exchange_rate = '';
            this.currency.is_default = '0';


            },
            sorting(sortBy){
                this.sortBy = sortBy;
                this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType='desc' : this.sortType = 'asc';
                this.fetchCurrencies();
            },
            setAsDefault(Curreney_id){
                this.$parent.loading = true;
                var page_url = '/api/admin/currency/is_default?is_default=1&id='+Curreney_id;
                axios.post(page_url, {}, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success(res.data.message)
                        this.clearForm();
                        // this.fetchCurrencies();
                    } else {
                        this.$toaster.error(res.data.message)
                    }
                })
                .finally(() => (this.$parent.loading = false));
            }
    },
    mounted() {
        
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchCountries();
        this.fetchCurrencies();
    }
};
</script>
