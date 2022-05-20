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
                                            Coupon Setting
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <button class="btn ml-2 p-0 kt_notes_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos"  v-if="$parent.permissions.includes('coupon-manage')">
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
                                        
                                            <div id="CouponSetting_wrapper" class="dataTables_wrapper no-footer">

                                            <div class="dataTables_length" id="CouponSetting_length"><label>Show 
                                            <select name="CouponSetting_length" aria-controls="productUnitTable" class="" v-model="limit" v-on:change="fetchCouponSetting()">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            </select> entries</label></div>

                                            <div id="CouponSetting_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="productUnitTable" v-model="searchParameter" @keyup="fetchCouponSetting()"></label></div>
                                                <table id="productUnitTable" class="display dataTable no-footer" role="grid">
                                                    <thead class="text-body">
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 31.25px;" @click="sorting('id')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'id'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'id' ? 'sorting_desc' : 'sorting'">
                                                                ID
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="coupon_setting: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('code')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'code'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'code' ? 'sorting_desc' : 'sorting'">
                                                                Code
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="Phone No: activate to sort column ascending" style="width: 81.8109px;">
                                                                Description
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 114.84px;" @click="sorting('type')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'type'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'type' ? 'sorting_desc' : 'sorting'">
                                                                Type
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 158.462px;">
                                                                Amount
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="No Of Product: activate to sort column ascending" style="width: 108.67px;">
                                                                Expiry date
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="Stock Quantity: activate to sort column ascending" style="width: 112.917px;">
                                                                Limit per user
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="productUnitTable" rowspan="1" colspan="1" aria-label="Stock Quantity: activate to sort column ascending" style="width: 112.917px;">
                                                                Limit per coupon
                                                            </th>
                                                            <th  v-if="$parent.permissions.includes('coupon-manage')" class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-table-tbody text-dark">
                                                        <tr class="kt-table-row kt-table-row-level-0 odd" role="row" v-for="coupon_setting in coupon_settings" v-bind:key="coupon_setting.coupon_id">
                                                            <td class="sorting_1">
                                                                {{coupon_setting.coupon_id}}
                                                            </td>
                                                            <td>
                                                                {{ coupon_setting.coupon_code }}
                                                            </td>
                                                            <td>
                                                                {{ coupon_setting.coupon_description }}
                                                            </td>
                                                            <td>
                                                                {{ coupon_setting.coupon_type }}
                                                            </td>
                                                            <td>
                                                                {{ coupon_setting.coupon_amount}}
                                                            </td>
                                                            <td>
                                                                {{ coupon_setting.coupon_expiry_date}}
                                                            </td>
                                                            <td>
                                                                {{ coupon_setting.coupon_usage_limit_per_user}}
                                                            </td>
                                                            <td>
                                                                {{ coupon_setting.coupon_usage_limit_per_coupon}}
                                                            </td>
                                                            <td  v-if="$parent.permissions.includes('coupon-manage')">
                                                            <a href="javascript:void(0)" class=" click-edit" id="click-edit1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Check out more demos" @click="editCouponSetting(coupon_setting)"><i class="fa fa-edit"></i></a>
                                                                        <a class="" href="#" @click="deleteCouponSetting(coupon_setting.coupon_id)"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><a class="page-link" href="#" @click="fetchCouponSetting(pagination.prev_page_url)">Previous</a></li>

                                                    <li class="disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>

                                                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchCouponSetting(pagination.next_page_url)">Next</a></li>
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
            <h4 class="font-size-h4 font-weight-bold m-0">Add coupon_setting</h4>
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
                        <label class="text-dark">Code </label>
                        <input type="text" name="text" v-model="coupon_setting.code" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('code')" v-text="errors.get('code')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Description </label>
                        <input type="text" name="text" v-model="coupon_setting.description" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('description')" v-text="errors.get('description')"></small>
                    </div>
                    

                    <div class="form-group">
                        <label class="text-dark">Discount type </label>
                        <select v-model="coupon_setting.type">
                            <option value="fixed">Fixed</option>
                            <option value="percentage">Percentage</option>
                        </select>
                        <small class="form-text text-danger" v-if="errors.has('type')" v-text="errors.get('type')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Coupon amount </label>
                        <input type="text" name="text" v-model="coupon_setting.amount" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('amount')" v-text="errors.get('amount')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Coupon Expiry Date </label>
                        <input type="date" name="text" v-model="coupon_setting.expiry_date" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('expiry_date')" v-text="errors.get('expiry_date')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Usage Limit Per User </label>
                        <input type="text" name="text" v-model="coupon_setting.usage_limit_per_user" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('usage_limit_per_user')" v-text="errors.get('usage_limit_per_user')"></small>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Usage Limit Per Coupon </label>
                        <input type="text" name="text" v-model="coupon_setting.usage_limit_per_coupon" class="form-control" />
                        <small class="form-text text-danger" v-if="errors.has('usage_limit_per_coupon')" v-text="errors.get('usage_limit_per_coupon')"></small>
                    </div>
                </div>
            </div>
            <button type="button" @click="addUpdateCouponSetting()" class="btn btn-primary">Submit</button>
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
            coupon_setting: {
                id: "",
                code: "",
                description: "",
                type: "fixed",
                amount: "",
                expiry_date: "",
                usage_limit_per_user: "",
                usage_limit_per_coupon: ""
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
            coupon_settings: [],
            token: [],
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },

    methods: {
        fetchCouponSetting(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/coupon_setting";
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
                this.coupon_settings = res.data.data;
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
        deleteCouponSetting(id) {
            if (confirm('Are You Sure?')) {
                this.$parent.loading = true;
                axios.delete(`/api/admin/coupon_setting/${id}`,this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toaster.success(res.data.message)
                            this.fetchCouponSetting();
                        }

                    })
                    .catch(err => console.log(err))
                    .finally(() => (this.$parent.loading = false));
            }
        },
        addUpdateCouponSetting() {
            this.$parent.loading = true;
            var url = '/api/admin/coupon_setting';
            if (this.edit === false) {
                // Add
                this.request_method = 'post'
            } else {
                // Update
                var url = '/api/admin/coupon_setting/' + this.coupon_setting.id;
                this.request_method = 'put'
            }
            axios[this.request_method](url, this.coupon_setting, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_form = 0;
                        this.$toaster.success(res.data.message)
                        this.clearForm();
                        this.fetchCouponSetting();
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
        editCouponSetting(coupon_setting) {
            this.edit = true;
            this.display_form = 1;
            this.errors = new ErrorHandling();
            this.coupon_setting.id = coupon_setting.coupon_id;
            this.coupon_setting.code = coupon_setting.coupon_code;
            this.coupon_setting.description = coupon_setting.coupon_description;
            this.coupon_setting.type = coupon_setting.coupon_type;
            this.coupon_setting.amount = coupon_setting.coupon_amount;
            this.coupon_setting.expiry_date = coupon_setting.coupon_expiry_date;
            this.coupon_setting.usage_limit_per_user = coupon_setting.coupon_usage_limit_per_user;
            this.coupon_setting.usage_limit_per_coupon = coupon_setting.coupon_usage_limit_per_coupon;
        },
        clearForm() {
            this.edit = false;
            this.coupon_setting.id = null;
            this.coupon_setting.code = '';
            this.coupon_setting.description = '';
            this.coupon_setting.type = 'fixed';
            this.coupon_setting.amount = '';
            this.coupon_setting.expiry_date = '';
            this.coupon_setting.usage_limit_per_user = '';
            this.coupon_setting.usage_limit_per_coupon = '';
            
            },
            sorting(sortBy){
                this.sortBy = sortBy;
                this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType='desc' : this.sortType = 'asc';
                this.fetchCouponSetting();
            }
    },
    mounted() {
        
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchCouponSetting();
    }
};
</script>
