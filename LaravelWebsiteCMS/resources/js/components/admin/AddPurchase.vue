<template>
  <div>
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                <div
                  class="
                    card card-custom
                    gutter-b
                    bg-transparent
                    shadow-none
                    border-0
                  "
                >
                  <div
                    class="
                      card-header
                      align-items-center
                      border-bottom-dark
                      px-0
                    "
                  >
                    <div class="card-title mb-0">
                      <h3 class="card-label mb-0 font-weight-bold text-body">
                        Purchase
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
                          <label class="text-body">Quotations</label>
                          <fieldset class="form-group mb-3">
                            <select
                              @change="getQuotation()"
                              v-model="selectedQuotation"
                              class="js-states form-control bg-transparent"
                            >
                              <option value="">Select Quotation</option>
                              <option
                                v-for="quotation in quotations"
                                v-bind:value="quotation.id"
                              >
                                {{ quotation.id }}
                              </option>
                            </select>
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <label class="text-body">Warehouses</label>
                          <fieldset class="form-group mb-3">
                            <select
                              v-model="purchase.warehouse_id"
                              class="js-states form-control bg-transparent"
                            >
                              <option value="">Select Warehouse</option>
                              <option
                                v-for="warehouse in warehouses"
                                v-bind:value="warehouse.warehouse_id"
                              >
                                {{ warehouse.warehouse_name }}
                              </option>
                            </select>
                            <small
                              class="form-text text-danger"
                              v-if="errors.has('warehouse_id')"
                              v-text="errors.get('warehouse_id')"
                            ></small>
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <label class="text-body">Purchasers</label>
                          <fieldset class="form-group mb-3">
                            <select
                              v-model="purchase.purchaser_id"
                              class="js-states form-control bg-transparent"
                            >
                              <option value="">Select Purchasers</option>
                              <option
                                v-for="purchaser in purchasers"
                                v-bind:value="purchaser.purchaser_id"
                              >
                                {{ purchaser.purchaser_first_name }}
                                {{ purchaser.purchaser_last_name }}
                              </option>
                            </select>
                            <small
                              class="form-text text-danger"
                              v-if="errors.has('purchaser_id')"
                              v-text="errors.get('purchaser_id')"
                            ></small>
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <label class="text-body">Purchase Date</label>
                          <fieldset class="form-group mb-3">
                            <input
                              type="date"
                              class="form-control bg-white"
                              value=""
                              v-model="purchase.purchase_date"
                            />
                          </fieldset>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('purchase_date')"
                            v-text="errors.get('purchase_date')"
                          ></small>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-xl-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-body">
                    <div class="col-md-12">
                      <label class="text-body">Products</label>
                      <fieldset class="form-group mb-3 d-flex">
                        <multiselect
                          v-model="product_id"
                          :options="products"
                          :custom-label="nameWithLang"
                          placeholder="Select Product"
                          label="name"
                          track-by="product_id"
                          :multiple="true"
                          :taggable="true"
                          @select="addProduct"
                          @remove="removeItem"
                        >
                        </multiselect>
                      </fieldset>
                      <small
                        class="form-text text-danger"
                        v-if="errors.has('product_id')"
                        v-text="errors.get('product_id')"
                      ></small>
                    </div>

                    <div
                      class="col-md-12"
                      v-if="combination_products.length > 0"
                    >
                      <label class="text-body">Select Variation Product</label>
                      <fieldset class="form-group mb-3 d-flex">
                        <multiselect
                          v-model="combination_product_id"
                          :options="combination_products"
                          placeholder="Select Product"
                          label="title"
                          track-by="product_combination_id"
                          :multiple="true"
                          :taggable="true"
                          @select="addCombinationProduct"
                          @remove="removeItem"
                        >
                        </multiselect>
                      </fieldset>
                      <small
                        class="form-text text-danger"
                        v-if="errors.has('product_id')"
                        v-text="errors.get('product_id')"
                      ></small>
                    </div>
                    <div class="col-12" v-if="display_table">
                      <div class="table-responsive">
                        <table class="table table-striped text-body">
                          <thead>
                            <tr>
                              <th class="border-0 header-heading" scope="col">
                                Name
                              </th>
                              <th class="border-0 header-heading" scope="col">
                                Quantity
                              </th>
                              <th class="border-0 header-heading" scope="col">
                                Price {{ getCurrencyTitle() }}
                              </th>
                              <th class="border-0 header-heading" scope="col">
                                Amount {{ getCurrencyTitle() }}
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr
                              class=""
                              v-for="(
                                selectedProduct, index
                              ) in selectedProducts"
                            >
                              <td>{{ selectedProduct.title }}</td>
                              <td class="text-center">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Enter Quantity"
                                  v-model="purchase.qty[index]"
                                  @change="computeValues()"
                                />
                                <small
                                  class="form-text text-danger"
                                  v-if="errors.has('qty.' + index)"
                                  v-text="errors.get('qty.' + index)"
                                ></small>
                              </td>
                              <td class="text-center">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Enter Price"
                                  v-model="purchase.price[index]"
                                  @change="computeValues()"
                                />
                                <small
                                  class="form-text text-danger"
                                  v-if="errors.has('price.' + index)"
                                  v-text="errors.get('price.' + index)"
                                ></small>
                              </td>
                              <td class="text-center">
                                <input
                                  type="text"
                                  readonly
                                  class="form-control"
                                  placeholder="Enter Price"
                                  :value="
                                    purchase.price[index] &&
                                    purchase.qty[index] &&
                                    !isNaN(purchase.price[index]) &&
                                    !isNaN(purchase.qty[index])
                                      ? purchase.price[index] *
                                        purchase.qty[index]
                                      : 0
                                  "
                                  @change="computeValues()"
                                />
                              </td>
                              <td class="text-right">
                                <a
                                  href="#"
                                  class="confirm-delete"
                                  title="Delete"
                                  @click="removeItem(index)"
                                  ><i class="fas fa-trash-alt"></i
                                ></a>
                              </td>

                              <input
                                type="hidden"
                                :set="
                                  (purchase.product_id[index] =
                                    selectedProduct.product_id)
                                "
                              />
                              <input
                                type="hidden"
                                :set="
                                  (purchase.product_combination_id[index] =
                                    selectedProduct.product_combination_id)
                                "
                              />
                            </tr>
                            <tr>
                              <td></td>
                              <td>
                                <small
                                  class="form-text text-danger"
                                  v-if="errors.has('qty')"
                                  v-text="errors.get('qty')"
                                ></small>
                              </td>
                              <td colspan="3">
                                <small
                                  class="form-text text-danger"
                                  v-if="errors.has('price')"
                                  v-text="errors.get('price')"
                                ></small>
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
                        <fieldset class="form-group mb-3">
                          <textarea
                            class="form-control"
                            id="label-textarea"
                            rows="6"
                            name="notes"
                            placeholder="Please add some note"
                            style="height: 130px"
                            spellcheck="false"
                            v-model="purchase.description"
                          ></textarea>
                        </fieldset>
                        <small
                          class="form-text text-danger"
                          v-if="errors.has('description')"
                          v-text="errors.get('description')"
                        ></small>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-12 col-md-3">
                        <div>
                          <table class="table right-table mb-0">
                            <tbody>
                              <tr
                                class="
                                  d-flex
                                  align-items-center
                                  justify-content-between
                                "
                              >
                                <th class="border-0">
                                  <h5
                                    class="
                                      font-size-h5
                                      mb-0
                                      font-size-bold
                                      text-dark
                                    "
                                  >
                                    Subtotal {{ getCurrencyTitle() }}
                                  </h5>
                                </th>
                                <td
                                  class="
                                    border-0
                                    justify-content-end
                                    d-flex
                                    text-black-50
                                    font-size-base
                                  "
                                >
                                  {{ purchase.subTotal }}
                                </td>
                              </tr>
                              <tr
                                class="
                                  d-flex
                                  align-items-center
                                  justify-content-between
                                "
                              >
                                <th class="border-0">
                                  <h5
                                    class="
                                      font-size-h5
                                      mb-0
                                      font-size-bold
                                      text-dark
                                    "
                                  >
                                    Total {{ getCurrencyTitle() }}
                                  </h5>
                                </th>
                                <td
                                  class="
                                    border-0
                                    justify-content-end
                                    d-flex
                                    text-black-50
                                    font-size-base
                                  "
                                >
                                  {{ purchase.total_amount }}
                                </td>
                              </tr>

                              <tr
                                class="
                                  d-flex
                                  align-items-center
                                  justify-content-between
                                "
                              >
                                <th class="border-0">
                                  <h5
                                    class="
                                      font-size-h5
                                      mb-0
                                      font-size-bold
                                      text-dark
                                    "
                                  >
                                    Due Amount {{ getCurrencyTitle() }}
                                  </h5>
                                </th>
                                <td
                                  class="
                                    border-0
                                    justify-content-end
                                    d-flex
                                    text-black-50
                                    font-size-base
                                  "
                                >
                                  {{ purchase.amount_due }}
                                </td>
                              </tr>
                              <tr
                                class="
                                  d-flex
                                  align-items-center
                                  justify-content-between
                                "
                              >
                                <th class="border-0">
                                  <h5
                                    class="
                                      font-size-h5
                                      mb-0
                                      font-size-bold
                                      text-dark
                                    "
                                  >
                                    Discount {{ getCurrencyTitle() }}
                                  </h5>
                                </th>
                                <td
                                  class="
                                    border-0
                                    justify-content-end
                                    d-flex
                                    text-black-50
                                    font-size-base
                                  "
                                >
                                  <input
                                    type="text"
                                    class="form-control bg-white"
                                    value="0"
                                    v-model="purchase.discount_amount"
                                    @change="computeValues()"
                                  />
                                  <small
                                    class="form-text text-danger"
                                    v-if="errors.has('discount_amount')"
                                    v-text="errors.get('discount_amount')"
                                  ></small>
                                </td>
                              </tr>
                              <tr
                                class="
                                  d-flex
                                  align-items-center
                                  justify-content-between
                                "
                              >
                                <th class="border-0">
                                  <h5
                                    class="
                                      font-size-h5
                                      mb-0
                                      font-size-bold
                                      text-dark
                                    "
                                  >
                                    Amount Paid {{ getCurrencyTitle() }}
                                  </h5>
                                </th>
                                <td
                                  class="
                                    border-0
                                    justify-content-end
                                    d-flex
                                    text-black-50
                                    font-size-base
                                  "
                                >
                                  <input
                                    type="text"
                                    class="form-control bg-white"
                                    value="0"
                                    v-model="purchase.amount_paid"
                                    @change="computeValues()"
                                  />
                                  <small
                                    class="form-text text-danger"
                                    v-if="errors.has('amount_paid')"
                                    v-text="errors.get('amount_paid')"
                                  ></small>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                      <button class="btn btn-primary" @click="addPurchase()">
                        Submit
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
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";
import Multiselect from "vue-multiselect";

export default {
  components: { Multiselect },
  data() {
    return {
      display_form: 0,
      purchase: {
        purchaser_id: "",
        purchase_date: new Date().toISOString().substr(0, 10),
        description: "",
        total_amount: 0,
        amount_paid: 0,
        discount_amount: 0,
        amount_due: 0,
        product_id: [],
        product_combination_id: [],
        price: [],
        qty: [],
        product_total: [],
        warehouse_id: "",
        subTotal: 0,
      },
      currency: [],
      product_id: [],
      combination_product_id: [],
      combination_products: [],
      customIndex: 0,
      display_table: false,
      searchParameter: "",
      sortBy: "id",
      sortType: "ASC",
      limit: 10,
      error_message: "",
      edit: false,
      actions: false,
      pagination: {},
      request_method: "",
      purchases: [],
      warehouses: [],
      purchasers: [],
      products: [],
      selectedProducts: [],
      token: [],
      quotations: [],
      selectedQuotation: "",
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    fetchPurchaseQuotations() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/quotation?type=purchase", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.quotations = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchCurrency() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/currency?is_default=1", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.currency = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchWarehouses() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/warehouse?getAllData=1", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.warehouses = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchProducts() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/product?getAllData=1", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.products = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchPurchasers() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/purchaser?getAllData=1", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.purchasers = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },

    addPurchase() {
      this.$parent.loading = true;
      var url = "/api/admin/purchase";
      if (this.edit === false) {
        // Add
        this.request_method = "post";
      } else {
        // Update
        var url = "/api/admin/purchase/" + this.purchase.id;
        this.request_method = "put";
      }
      axios[this.request_method](url, this.purchase, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.clearForm();
            this.$toaster.success(res.data.message);
          } else {
            this.$toaster.error(res.data.message);
          }
        })
        .catch((error) => {
          this.error_message = "";
          this.errors = new ErrorHandling();
          if (error.response.status == 422) {
            if (error.response.data.status == "Error") {
              this.$toaster.error(error.response.data.message);
            } else {
              this.errors.record(error.response.data.errors);
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },

    incrementIndex() {
      console.log("custom index => ");
      // this.customIndex++;
    },
    computeValues: function () {
      if (this.purchase.qty.length == this.purchase.price.length) {
        let subTotal = 0;
        for (var i = 0; i < this.purchase.qty.length; i++) {
          if (
            this.purchase.qty[i] != "" &&
            this.purchase.price[i] != "" &&
            !isNaN(this.purchase.qty[i]) &&
            !isNaN(this.purchase.price[i])
          ) {
            subTotal = subTotal + this.purchase.qty[i] * this.purchase.price[i];
            this.purchase.product_total.push(
              this.purchase.qty[i] * this.purchase.price[i]
            );
          } else {
            subTotal = subTotal + 0;
            this.purchase.product_total.push(0);
          }
        }
        this.purchase.total_amount = subTotal - this.purchase.discount_amount;
        this.purchase.amount_due =
          this.purchase.total_amount - this.purchase.amount_paid;
      }
    },
    getCurrencyTitle() {
      return this.currency == null ? "" : "(" + this.currency.title + ")";
    },
    getQuotation() {
      if (this.selectedQuotation == "") {
        this.clearForm();
        return;
      }
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get(
          "/api/admin/quotation/" +
            this.selectedQuotation +
            "?getWarehouse=1&getTax=1&getQuotationDetail=1&productDetail=1&getCustomer=1",
          config
        )
        .then((res) => {
          if (res.data.status == "Success") {
            this.purchase.warehouse_id = res.data.data.warehouse.warehouse_id;
            this.purchase.customer_id = res.data.data.customer.customer_id;
            console.log(res.data.data.quotationDetail);
            for (var i = 0; i < res.data.data.quotationDetail.length; i++) {
             var quotationDetail =  res.data.data.quotationDetail[i]
              this.product_id.push({
                product_id: quotationDetail.product.product_id,
                detail: quotationDetail.product.detail,
              });
              this.addProduct(
                {
                  product_id:
                    quotationDetail.product.product_id,
                },
                quotationDetail.product.product_id
              );

                if (
                quotationDetail.product.product_type ==
                "variable"
              ) {
                var combination_detail = quotationDetail.product.combination_detail;
                var product = quotationDetail.product;

                console.log(combination_detail,"working");
                if (combination_detail.length > 0) {
                  var arr = {};
                  for (
                    var i = 0;
                    i < combination_detail.length;
                    i++
                  ) {
                    if(quotationDetail.product_combination_id == combination_detail[
                        i
                      ].product_combination_id )

                      {
                         arr.product_price =
                      combination_detail[i].price;

                    arr.product_combination_id =
                      combination_detail[
                        i
                      ].product_combination_id;
                    var combination_name = "";
                    if (
                      combination_detail[i].combination.length > 0
                    ) {
                      for (
                        var j = 0;
                        j <
                        combination_detail[i].combination.length;
                        j++
                      ) {
                        if (j == 0) {
                          combination_name =
                            combination_detail[i].combination[j]
                              .variation.detail[0].name;
                        } else {
                          combination_name +=
                            "-" +
                            combination_detail[i].combination[j]
                              .variation.detail[0].name;
                        }
                        // console.log('i=' + i + 'j=' + j);
                      }
                    }

                    arr.product_id = product.product_id;
                    arr.product_type = product.product_type;
                    arr.qty = "";
                    arr.stock_status = "";
                    arr.warehouse = "";
                    arr.product_price =combination_detail[i].price;

                    arr.title =
                      product.detail.length > 0
                        ? product.detail[0].title +
                          " (" +
                          combination_name +
                          ")"
                        : "";

                        this.addCombinationProduct(arr,arr.product_combination_id);
                        this.combination_product_id.push(
                          {
                            qty:"",
                            stock_status:"",
                            warehouse:"",
                            product_id:arr.product_id,
                            product_combination_id:arr.product_combination_id,
                            title:arr.title,
                            product_type:"variable",
                            product_price:arr.product_price
                          });
                    
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
    clearForm() {
      this.display_form = 0;
      this.display_table = false;
      this.product_id = [];
      this.combination_product_id =[];
      this.combination_products = [];
      this.selectedQuotation = "";
      this.purchase = {
        purchaser_id: "",
        purchase_date: new Date().toISOString().substr(0, 10),
        description: "",
        total_amount: 0,
        amount_paid: 0,
        discount_amount: 0,
        amount_due: 0,
        product_id: [],
        product_combination_id: [],
        price: [],
        qty: [],
        product_total: [],
        warehouse_id: "",
        subTotal: 0,
      };
      this.errors = new ErrorHandling();
      this.selectedProducts = [];
    },
    addProduct(selectedOption, id) {
      this.errors = new ErrorHandling();
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get(
          "/api/admin/product/" +
            selectedOption.product_id +
            "?getDetailWithLanguage=1&getDetail=1",
          config
        )
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_table = true;
            // this.selectedProducts = res.data.data;
            this.customIndex = 0;
            var arr = {};

            if (res.data.data.product_type == "simple") {
              arr.product_id = res.data.data.product_id;
              arr.product_type = res.data.data.product_type;
              arr.title =
                res.data.data.detail.length > 0
                  ? res.data.data.detail[0].title
                  : "";
              arr.product_combination_id = null;
              arr.qty = "";
              arr.stock_status = "";
              arr.warehouse = "";
              this.purchase.qty.push(1);

              this.selectedProducts.push(arr);
            } else {
              if (res.data.data.combination_detail.length > 0) {
                for (
                  var i = 0;
                  i < res.data.data.combination_detail.length;
                  i++
                ) {
                  arr.product_combination_id =
                    res.data.data.combination_detail[i].product_combination_id;
                  var combination_name = "";
                  if (
                    res.data.data.combination_detail[i].combination.length > 0
                  ) {
                    for (
                      var j = 0;
                      j <
                      res.data.data.combination_detail[i].combination.length;
                      j++
                    ) {
                      if (j == 0) {
                        combination_name =
                          res.data.data.combination_detail[i].combination[j]
                            .variation.detail[0].name;
                      } else {
                        combination_name +=
                          "-" +
                          res.data.data.combination_detail[i].combination[j]
                            .variation.detail[0].name;
                      }
                      // console.log('i=' + i + 'j=' + j);
                    }
                  }
                  arr.product_id = res.data.data.product_id;
                  arr.product_type = res.data.data.product_type;
                  arr.qty = "";
                  arr.stock_status = "";
                  arr.warehouse = "";
                  arr.title =
                    res.data.data.detail.length > 0
                      ? res.data.data.detail[0].title +
                        " (" +
                        combination_name +
                        ")"
                      : "";
                  this.combination_products.push(arr);
                  arr = {};
                }
              }
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    addCombinationProduct(selectedOption, id) {
      this.selectedProducts.push(selectedOption);
      this.purchase.qty.push(1);
    },
    removeItem(removedOption, id) {
      // console.log(removedOption);
      // check if key exists
      const hasKey = "product_combination_id" in removedOption;
      if (hasKey) {
        if (
          removedOption.product_combination_id != null &&
          removedOption.product_combination_id != ""
        ) {
          this.selectedProducts.forEach((el, index) => {
            if (
              el.product_combination_id == removedOption.product_combination_id
            ) {
              this.selectedProducts.splice(index, 1);
              this.purchase.qty.splice(index, 1);
              this.purchase.product_combination_id.splice(index, 1);
              this.purchase.product_id.splice(index, 1);
            }
          });

          this.combination_product_id = this.combination_product_id.filter(
            function (el) {
              return (
                el.product_id != removedOption.product_id &&
                el.product_combination_id !=
                  removedOption.product_combination_id
              );
            }
          );
        }
      } else {
        this.selectedProducts.forEach((el, index) => {
          if (el.product_id == removedOption.product_id) {
            this.selectedProducts.splice(index, 1);
            this.purchase.qty.splice(index, 1);
            this.purchase.product_combination_id.splice(index, 1);
            this.purchase.product_id.splice(index, 1);
          }
        });

        this.combination_product = this.combination_products.filter(function (
          el
        ) {
          return el.product_id != removedOption.product_id;
        });
      }
      // this.selectedProducts.splice(index, 1);
      // this.stock.qty.splice(index, 1);
    },
    nameWithLang(option) {
      return option.detail ? `${option.detail[0].title}` : "no name";
    },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };

    this.fetchPurchaseQuotations();
    this.fetchCurrency();
    this.fetchWarehouses();
    this.fetchPurchasers();
    this.fetchProducts();
  },
};
</script>
