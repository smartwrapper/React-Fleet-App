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
                                            Sale Return Detail
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped  text-body">
                                                <thead>
                                                    <tr>
                                                        <th class="border-0  header-heading" scope="col">Name</th>
                                                        <th class="border-0  header-heading" scope="col">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="" v-for="(selectedProduct, index) in selectedProducts">
                                                        <td> {{ selectedProduct.title}}</td>
                                                        <td class=" text-center">
                                                            <input type="text" class="form-control" placeholder="Enter Quantity" :value="selectedProduct.qty" disabled>
                                                        </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
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
            display_form: 0,
            sale: [],
            currency: [],
            selectedProducts: [],
            token: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },
    methods: {

        fetchSale(id) {
            this.errors = new ErrorHandling();
            this.$parent.loading = true;
            
            axios.get('/api/admin/sale_return/' + id + '?getProduct=1&getProductCombination=1', this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_table = true;
                        this.sale = res.data.data;
                        this.selectedProducts = [];
                        this.customIndex = 0;
                        var arr = {};
                        for (var k = 0; k < res.data.data.detail.length; k++) {
                            if (res.data.data.detail[k].product.product_type == 'simple') {
                                arr.title = res.data.data.detail[k].product ? res.data.data.detail[k].product.detail[0].title : '';
                                arr.qty = res.data.data.detail[k].qty;
                                this.selectedProducts.push(arr);
                                arr = {};
                            } else {
                                if (res.data.data.detail[k].product.combination_detail && res.data.data.detail[k].product.combination_detail.length > 0) {
                                    for (var i = 0; i < res.data.data.detail[k].product.combination_detail.length; i++) {
                                        arr.product_combination_id = res.data.data.detail[k].product.combination_detail[i].product_combination_id;
                                        var combination_name = '';
                                
                                        if(res.data.data.detail[k].product.combination_detail[i].product_combination_id == res.data.data.detail[k].productCombinationId){
                                            if (res.data.data.detail[k].product.combination_detail[i].combination.length > 0) {
                                                for (var j = 0; j < res.data.data.detail[k].product.combination_detail[i].combination.length; j++) {
                                                    if (j == 0) {
                                                        combination_name = res.data.data.detail[k].product.combination_detail[i].combination[j].variation.detail[0].name
                                                    } else {
                                                        combination_name += '-' + res.data.data.detail[k].product.combination_detail[i].combination[j].variation.detail[0].name
                                                    }
                                                    // console.log('i=' + i + 'j=' + j);
                                                }
                                            }
                                            arr.qty = res.data.data.detail[k].qty;
                                            arr.title = res.data.data.detail[k].product.detail.length > 0 ? res.data.data.detail[k].product.detail[0].title + ' (' + combination_name + ')' : '';
                                            
                                            this.selectedProducts.push(arr);
                                            arr = {};
                                        }
                                    }
                                }
                            }
                        }

                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        getCurrencyTitle(){
            return this.currency == null ? '' : '('+this.currency.title+')';
        },
        fetchCurrency() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/currency?is_default=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.currency = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        
       

    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };


        this.fetchCurrency();
        this.fetchSale(this.$route.params.id);
    }
};
</script>
