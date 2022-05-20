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
                        Add Sale
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
                              v-model="sale.warehouse_id"
                              class="js-states form-control bg-transparent"
                              @change="taxApply()"
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
                          <label class="text-body">Customer</label>
                          <fieldset class="form-group mb-3">
                            <select
                              v-model="sale.customer_id"
                              class="js-states form-control bg-transparent"
                              @change="selectCustomerAddress"
                            >
                              <option value="">Select Customer</option>
                              <option
                                v-for="customer in customers"
                                v-bind:value="customer.customer_id"
                              >
                                {{ customer.customer_first_name }}
                                {{ customer.customer_last_name }}
                              </option>
                            </select>
                            <small
                              class="form-text text-danger"
                              v-if="errors.has('customer_id')"
                              v-text="errors.get('customer_id')"
                            ></small>
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <label class="text-body">Sale Date</label>
                          <fieldset class="form-group mb-3">
                            <input
                              type="date"
                              class="form-control bg-white"
                              value=""
                              v-model="sale.sale_date"
                            />
                          </fieldset>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('sale_date')"
                            v-text="errors.get('sale_date')"
                          ></small>
                        </div>

                        <div class="col-md-6">
                          <label class="text-body">Customer Address</label>
                          <fieldset class="form-group mb-3">
                            <select
                              class="form-control"
                              v-model="selectedCustomerAddress"
                            >
                              <option
                                v-bind:value="customeraddress"
                                v-for="customeraddress in customer_address"
                                :selected="
                                  selectedCustomerAddress.id ==
                                  customeraddress.id
                                "
                              >
                                {{ customeraddress.street_address }}
                              </option>
                            </select>
                            <small
                              class="form-text text-danger"
                              v-if="errors.has('customer_address')"
                              v-text="errors.get('customer_address')"
                            ></small>
                          </fieldset>
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
                                  v-model="sale.qty[index]"
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
                                  readonly
                                  :value="selectedProduct.product_price"
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
                                    sale.price[index] &&
                                    sale.qty[index] &&
                                    !isNaN(sale.price[index]) &&
                                    !isNaN(sale.qty[index])
                                      ? sale.price[index] * sale.qty[index]
                                      : 0
                                  "
                                  @change="computeValues()"
                                />
                              </td>
                              

                              <input
                                type="hidden"
                                :set="
                                  (sale.product_id[index] =
                                    selectedProduct.product_id)
                                "
                              />
                              <input
                                type="hidden"
                                :set="
                                  (sale.product_name[index] =
                                    selectedProduct.title)
                                "
                              />
                              <input
                                type="hidden"
                                :set="
                                  (sale.price[index] =
                                    selectedProduct.product_price)
                                "
                              />
                              <input
                                type="hidden"
                                :set="
                                  (sale.product_combination_id[index] =
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
                            v-model="sale.desc"
                          ></textarea>
                        </fieldset>
                        <small
                          class="form-text text-danger"
                          v-if="errors.has('desc')"
                          v-text="errors.get('desc')"
                        ></small>
                      </div>
                      <div class="col-12">
                        <label>Coupon</label>
                        <fieldset class="form-group mb-3">
                          <select class="form-control" v-model="selectedCoupon">
                            <option
                              v-for="coupon in coupons"
                              :selected="coupon.id == selectedCoupon"
                              v-bind:value="coupon"
                            >
                              {{ coupon.coupon_code }}
                            </option>
                          </select>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('coupon')"
                            v-text="errors.get('coupon')"
                          ></small>
                        </fieldset>
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
                                  {{ sale.subtotal.toFixed(2) }}
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
                                    Tax
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
                                  {{
                                    (
                                      (sale.subtotal * tax_per_apply) /
                                      100
                                    ).toFixed(2)
                                  }}
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
                                    Discount
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
                                  {{
                                    this.selectedCoupon
                                      ? this.selectedCoupon.coupon_type ==
                                        "fixed"
                                        ? this.selectedCoupon.coupon_amount.toFixed(
                                            2
                                          )
                                        : this.selectedCoupon.coupon_type ==
                                          "percentage"
                                        ? (
                                            (sale.subtotal *
                                              this.selectedCoupon
                                                .coupon_amount) /
                                            100
                                          ).toFixed(2)
                                        : 0
                                      : 0
                                  }}
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
                                  {{
                                    (
                                      sale.payable +
                                      (sale.subtotal * tax_per_apply) / 100 -
                                      (this.selectedCoupon
                                        ? this.selectedCoupon.coupon_type ==
                                          "fixed"
                                          ? this.selectedCoupon.coupon_amount.toFixed(
                                              2
                                            )
                                          : this.selectedCoupon.coupon_type ==
                                            "percentage"
                                          ? (
                                              (sale.subtotal *
                                                this.selectedCoupon
                                                  .coupon_amount) /
                                              100
                                            ).toFixed(2)
                                          : 0
                                        : 0)
                                    ).toFixed(2)
                                  }}
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button
                        class="btn btn-primary"
                        @click="saveTransaction()"
                      >
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
import ErrorHandling from "../../ErrorHandling";
import Multiselect from "vue-multiselect";

export default {
  components: { Multiselect },
  data() {
    return {
      display_form: 0,
      sale: {
        customer_id: "",
        warehouse_id: "",
        desc: "",
        payable: 0,
        discount: 0,
        tax_id: "",
        tax_amount: 0,
        amount_paid: 0,
        due_amount: 0,
        sale_date: new Date().toISOString().substr(0, 10),
        product_id: [],
        product_name: [],
        qty: [],
        price: [],
        total: [],
        subtotal: 0,
        product_combination_id: [],
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
      sales: [],
      warehouses: [],
      customers: [],
      products: [],
      category_products: [],
      selectedProducts: [],
      token: [],
      taxes: [],
      quotations: [],
      selectedQuotation: "",
      selectedCustomerAddress: {},
      errors: new ErrorHandling(),
      tax_per_apply: 0,
      customer_address: [],
      coupons: [],
      selectedCoupon: {},
      selectedProductDropdown: {},
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    fetchSaleQuotations() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/quotation?type=sale", config)
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
    fetchTaxes() {
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios.get("/api/admin/tax", config).then((res) => {
        if (res.data.status == "Success") {
          this.taxes = res.data.data;
        }
      });
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
        .get(
          "/api/admin/product?getAllData=1&getDetail=1&getCategory=1",
          config
        )
        .then((res) => {
          if (res.data.status == "Success") {
            this.products = res.data.data;

            this.showSideBarProduct();
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchCustomers() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};

      axios
        .get("/api/admin/customer?getAllData=1", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.customers = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    addsale() {
      this.$parent.loading = true;
      var url = "/api/admin/sale";
      if (this.edit === false) {
        // Add
        this.request_method = "post";
      } else {
        // Update
        var url = "/api/admin/sale/" + this.sale.id;
        this.request_method = "put";
      }
      axios[this.request_method](url, this.sale, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.sale = {
              saler_id: "",
              sale_date: new Date().toISOString().substr(0, 10),
              desc: "",
              payable: 0,
              amount_paid: 0,
              discount: 0,
              due_amount: 0,
              product_id: [],
              product_name: [],
              product_combination_id: [],
              price: [],
              qty: [],
              product_total: [],
              warehouse_id: "",
              subtotal: 0,
            };
            this.errors = new ErrorHandling();
            this.selectedProducts = [];
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
          } else if (error.response.status == 500) {
            this.$toaster.error(error.response.data.message);
          }
        })
        .finally(() => (this.$parent.loading = false));
    },

    incrementIndex() {
      console.log("custom index => ");
      // this.customIndex++;
    },
    computeValues: function () {
      if (this.sale.qty.length == this.sale.price.length) {
        let subtotal = 0;
        for (var i = 0; i < this.sale.qty.length; i++) {
          if (
            this.sale.qty[i] != "" &&
            this.sale.price[i] != "" &&
            !isNaN(this.sale.qty[i]) &&
            !isNaN(this.sale.price[i])
          ) {
            subtotal = subtotal + this.sale.qty[i] * this.sale.price[i];
            this.sale.total.push(this.sale.qty[i] * this.sale.price[i]);
          } else {
            subtotal = subtotal + 0;
            this.sale.product_total.push(0);
          }
        }
        this.sale.subtotal = subtotal;
        this.sale.payable =
          subtotal + parseFloat(this.sale.tax_amount) - this.sale.discount;

        this.sale.due_amount = this.sale.payable - this.sale.amount_paid;
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
            this.sale.warehouse_id = res.data.data.warehouse.warehouse_id;
            this.sale.customer_id = res.data.data.customer.customer_id;
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
      this.product_id = "";
      this.selectedQuotation = "";
      this.product_price = [];
      this.combination_products = [];
      this.combination_product_id = [];
      this.sale = {
        saler_id: "",
        sale_date: new Date().toISOString().substr(0, 10),
        desc: "",
        payable: 0,
        amount_paid: 0,
        discount: 0,
        due_amount: 0,
        product_id: [],
        product_name: [],
        product_combination_id: [],
        price: [],
        qty: [],
        product_total: [],
        warehouse_id: "",
        subtotal: 0,
      };
      this.errors = new ErrorHandling();
      this.selectedProducts = [];
      this.selectedCustomerAddress = {};
    },
    taxApply() {
      this.tax_per_apply = 0;
      var page_url = "/api/admin/warehouse/" + this.sale.warehouse_id;
      axios.get(page_url, this.token).then((res) => {
        console.log("current warehouse", res.data.data);
        if (res.data.status == "Success") {
          if (res.data.data.warehouse_tax != null) {
            res.data.data.warehouse_tax.forEach((element) => {
              this.tax_per_apply =
                parseFloat(this.tax_per_apply) + parseFloat(element.tax_rate);
            });
          }
        }
      });
    },
    selectCustomerAddress() {
      var customer_data = this.customers.filter((query) => {
        if (query.customer_id == this.sale.customer_id) {
          return true;
        }
      });
      if (customer_data[0].customer_first_name) {
        this.customer_address =
          customer_data[0].customer_address != null
            ? customer_data[0].customer_address
            : [];
        if (customer_data[0].customer_address != null) {
          this.selectedCustomerAddress = {};
          customer_data[0].customer_address.forEach((element) => {
            if (element.default_address == 1)
              this.selectedCustomerAddress = element;
          });
        }
      }
    },
    saveTransaction() {
      this.errors = new ErrorHandling();
      let err = {};
      let isError = false;
      if (this.sale.warehouse_id == "") {
        err.warehouse_id = ["Warehouse field is required"];
        isError = true;
      }
      if (this.sale.customer_id == "") {
        err.customer_id = ["Customer field is required"];
        isError = true;
      }

      if (Object.keys(this.selectedCustomerAddress).length === 0) {
        err.customer_address = ["Customer Address field is required"];
        isError = true;
      }

      if (isError) {
        this.errors.record(err);
      } else {
        this.sale.product_id.forEach((element, i) => {
          if (this.sale.qty[i] != "" && this.sale.qty[i] != null) {
            var page_url = "/api/admin/cart";
            axios
              .post(
                page_url,
                {
                  product_id: element,
                  product_combination_id: this.sale.product_combination_id[i],
                  qty: this.sale.qty[i],
                  customer_id: this.sale.customer_id,
                },
                this.token
              )
              .then((res) => {
                if (res.data.status == "Success") {
                  if (this.sale.product_id.length == i + 1) {
                    var page_url =
                      "/api/admin/customer/" + this.sale.customer_id;
                    axios.get(page_url, this.token).then((res) => {
                      if (res.data.status == "Success") {
                        var page_url = "/api/admin/order";
                        var data = {
                          billing_first_name: res.data.data.customer_first_name,
                          billing_last_name: res.data.data.customer_last_name,
                          billing_street_aadress:
                            this.selectedCustomerAddress.street_address,
                          billing_country:
                            this.selectedCustomerAddress.country_id.country_id,
                          billing_state:
                            this.selectedCustomerAddress.state_id.id,
                          billing_city: this.selectedCustomerAddress.city,
                          billing_postcode:
                            this.selectedCustomerAddress.postcode,
                          billing_phone: this.selectedCustomerAddress.phone
                            ? this.selectedCustomerAddress.phone
                            : "no phone number",

                          delivery_first_name:
                            res.data.data.customer_first_name,
                          delivery_last_name: res.data.data.customer_last_name,
                          delivery_street_aadress:
                            this.selectedCustomerAddress.street_address,
                          delivery_country:
                            this.selectedCustomerAddress.country_id.country_id,
                          delivery_state:
                            this.selectedCustomerAddress.state_id.id,
                          delivery_city: this.selectedCustomerAddress.city,
                          delivery_postcode:
                            this.selectedCustomerAddress.postcode,
                          delivery_phone: this.selectedCustomerAddress.phone
                            ? this.selectedCustomerAddress.phone
                            : "no phone number",
                          order_notes: this.sale.order_notes,
                          coupon_code: this.selectedCoupon
                            ? this.selectedCoupon.coupon_code
                            : "",
                          latlong: "12312312312",
                          currency_id: "1",
                          payment_method: "cod",
                          customer_id: this.sale.customer_id,
                          order_status: "Complete",
                        };
                        axios
                          .post(page_url, data, this.token)
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
                                // this.error_message = error.response.data.message;
                                this.$toaster.error(
                                  error.response.data.message
                                );
                              } else {
                                this.errors.record(error.response.data.errors);
                              }
                            }
                          })
                          .finally(() => (this.$parent.loading = false));
                      } else {
                        this.$toaster.error(res.data.message);
                      }
                    });
                  }
                } else {
                  this.$toaster.error(res.data.message);
                }
              })
              .catch((error) => {
                this.error_message = "";
                this.errors = new ErrorHandling();
                if (error.response.status == 422) {
                  if (error.response.data.status == "Error") {
                    // this.error_message = error.response.data.message;
                    this.$toaster.error(error.response.data.message);
                  } else {
                    this.errors.record(error.response.data.errors);
                  }
                }
              })
              .finally(() => (this.$parent.loading = false));
          }
        });
      }
    },
    fetchCoupons() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };

      axios
        .get("/api/admin/coupon_setting", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.coupons = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    showSideBarProduct() {
      var data = this.products;
      this.category_products = [];
      for (var i = 0; i < data.length; i++) {
        if (data[i].product_type == "variable") {
          for (var k = 0; k < data[i].combination_detail.length; k++) {
            // data[i].combination_detail[k].available_qty;
            var product_name = data[i].detail[0].title + " ";
            for (
              var m = 0;
              m < data[i].combination_detail[k].combination.length;
              m++
            ) {
              if (data[i].combination_detail[k].combination.length - 1 == m) {
                product_name +=
                  data[i].combination_detail[k].combination[m].variation
                    .detail[0].name;
              } else {
                product_name +=
                  data[i].combination_detail[k].combination[m].variation
                    .detail[0].name + "_";
              }
            }
            var parms = {};
            parms["product_name"] = product_name;
            parms["product_id"] = data[i].product_id;
            parms["product_id"] = data[i].product_id;
            parms["product_type"] = data[i].product_type;
            parms["product_combination_id"] =
              data[i].combination_detail[k].product_combination_id;
            if (data[i].combination_detail[k].gallary != null) {
              parms["image"] =
                data[i].combination_detail[k].gallary.gallary_name;
            }
            parms["product_price"] = data[i].combination_detail[k].price;
            this.category_products.push(parms);
          }
        } else {
          var parms = {};
          parms["product_name"] = data[i].detail[0].title;
          parms["product_id"] = data[i].product_id;
          parms["product_combination_id"] = "";
          parms["product_type"] = data[i].product_type;
          parms["product_price"] =
            data[i].product_discount_price > 0
              ? data[i].product_discount_price
              : data[i].product_price;
          if (data[i].product_gallary != null) {
            parms["image"] = data[i].product_gallary.gallary_name;
          }
          this.category_products.push(parms);
        }
      }
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
              arr.product_price =
                res.data.data.product_discount_price > 0
                  ? res.data.data.product_discount_price
                  : res.data.data.product_price;
              this.sale.qty.push(1);
              this.selectedProducts.push(arr);
              setTimeout(() => {
                this.computeValues();
              }, 300);
            } else {
              if (res.data.data.combination_detail.length > 0) {
                for (
                  var i = 0;
                  i < res.data.data.combination_detail.length;
                  i++
                ) {
                  arr.product_price = res.data.data.combination_detail[i].price;

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
      this.sale.qty.push(1);
      setTimeout(() => {
        this.computeValues();
      }, 300);
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
              this.sale.qty.splice(index, 1);
              this.sale.product_combination_id.splice(index, 1);
              this.sale.product_id.splice(index, 1);
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
            this.sale.qty.splice(index, 1);
            this.sale.product_combination_id.splice(index, 1);
            this.sale.product_id.splice(index, 1);
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
    this.fetchSaleQuotations();
    this.fetchCurrency();
    this.fetchWarehouses();
    this.fetchCustomers();
    this.fetchProducts();
    this.fetchTaxes();
    this.fetchCoupons();
  },
};
</script>
