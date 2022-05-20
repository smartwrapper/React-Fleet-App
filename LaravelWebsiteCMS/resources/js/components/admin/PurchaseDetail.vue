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
                                            Purchase Detail
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
                                    <form>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label class="text-body">Warehouses</label>
                                                <fieldset class="form-group mb-3">
                                                    <select class=" js-states form-control bg-transparent">
                                                        <option value="">{{purchase.warehouse ? purchase.warehouse.warehouse_name : ''}}</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-body">Purchasers</label>
                                                <fieldset class="form-group mb-3">
                                                    <select class=" js-states form-control bg-transparent">
                                                        <option value="">{{purchase.purchaser ? purchase.purchaser.purchaser_first_name + ' '+ purchase.purchaser.purchaser_last_name : ''}}</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-body">Purchase Date</label>
                                                <fieldset class="form-group mb-3">
                                                    <input type="date" class="form-control bg-white" :value="purchase.purchase_date"></fieldset>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                                        <th class="border-0  header-heading" scope="col">Price {{getCurrencyTitle()}}</th>
                                                        <th class="border-0  header-heading" scope="col">Amount {{getCurrencyTitle()}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="" v-for="(selectedProduct, index) in selectedProducts">
                                                        <td> {{ selectedProduct.title}}</td>
                                                        <td class=" text-center">
                                                            <input type="text" class="form-control" placeholder="Enter Quantity" :value="selectedProduct.qty">
                                                        </td>
                                                        <td class=" text-center">
                                                            <input type="text" class="form-control" placeholder="Enter Price" :value="selectedProduct.price">
                                                        </td>
                                                        <td class=" text-center">
                                                        <input type="text" readonly class="form-control" placeholder="Enter Price" :value="selectedProduct.price && selectedProduct.qty && !isNaN(selectedProduct.price) && !isNaN(selectedProduct.qty) ? selectedProduct.price*selectedProduct.qty:0">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label>Note</label>
                                            <fieldset class="form-group mb-3"><textarea class="form-control" id="label-textarea" rows="6" name="notes" placeholder="Please add some note" style="height: 130px;" spellcheck="false">{{purchase.description}}</textarea></fieldset>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-12 col-md-3">
                                            <div>
                                                <table class="table right-table mb-0">
                                                    <tbody>
                                                        <tr class="d-flex align-items-center justify-content-between">
                                                            <th class="border-0">
                                                                <h5 class="font-size-h5 mb-0 font-size-bold text-dark">Subtotal {{getCurrencyTitle()}}</h5>
                                                            </th>
                                                            <td class="border-0 justify-content-end d-flex text-black-50 font-size-base">{{ purchase.total_amount }}</td>
                                                        </tr>
                                                        
                                                        <tr class="d-flex align-items-center justify-content-between">
                                                            <th class="border-0">
                                                                <h5 class="font-size-h5 mb-0 font-size-bold text-dark">Due Amount {{getCurrencyTitle()}}</h5>
                                                            </th>
                                                            <td class="border-0 justify-content-end d-flex text-black-50 font-size-base">{{ purchase.amount_due }}</td>
                                                        </tr>
                                                        <tr class="d-flex align-items-center justify-content-between">
                                                            <th class="border-0">
                                                                <h5 class="font-size-h5 mb-0 font-size-bold text-dark">Discount {{getCurrencyTitle()}}</h5>
                                                            </th>
                                                            <td class="border-0 justify-content-end d-flex text-black-50 font-size-base">
                                                                <input type="text" class="form-control bg-white" value="0" :value="purchase.discount_amount">
                                                            </td>
                                                        </tr>
                                                        <tr class="d-flex align-items-center justify-content-between">
                                                            <th class="border-0">
                                                                <h5 class="font-size-h5 mb-0 font-size-bold text-dark">Amount Paid {{getCurrencyTitle()}}</h5>
                                                            </th>
                                                            <td class="border-0 justify-content-end d-flex text-black-50 font-size-base">
                                                                <input type="text" class="form-control bg-white" value="0" :value="purchase.amount_paid">
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

</div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";
export default {
    data() {
        return {
            display_form: 0,
            purchase: [],
            currency: [],
            selectedProducts: [],
            token: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },
    methods: {

        fetchPurchase(id) {
            this.errors = new ErrorHandling();
            this.$parent.loading = true;
            
            axios.get('/api/admin/purchase/' + id + '?getPurchaser=1&getProductDetail=1&getProductCombinationDetail=1&getWarehouse=1', this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.display_table = true;
                        this.purchase = res.data.data;
                        this.selectedProducts = [];
                        this.customIndex = 0;
                        var arr = {};
                        for (var k = 0; k < res.data.data.detail.length; k++) {
                            if (res.data.data.detail[k].product.product_type == 'simple') {
                                arr.title = res.data.data.detail[k].product.detail.length > 0 ? res.data.data.detail[k].product.detail[0].title : '';
                                arr.qty = res.data.data.detail[k].product_qty;
                                arr.price = res.data.data.detail[k].product_price;
                                console.log(arr);
                                this.selectedProducts.push(arr);
                                arr = {};
                            } else {
                                if (res.data.data.detail[k].product.combination_detail.length > 0) {
                                    for (var i = 0; i < res.data.data.detail[k].product.combination_detail.length; i++) {
                                        arr.product_combination_id = res.data.data.detail[k].product.combination_detail[i].product_combination_id;
                                        var combination_name = '';
                                        if(res.data.data.detail[k].product.combination_detail[i].product_combination_id == res.data.data.detail[k].product_combination_id){
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
                                            arr.qty = res.data.data.detail[k].product_qty;
                                            arr.price = res.data.data.detail[k].product_price;
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
        this.fetchPurchase(this.$route.params.id);
    }
};
</script>
