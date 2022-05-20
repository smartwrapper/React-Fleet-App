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
                        Stock Transfer
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
                          <label class="text-body">Warehouses From</label>
                          <fieldset class="form-group mb-3">
                            <select
                              v-model="stocktransfer.warehouse_from"
                              class="js-states form-control bg-transparent"
                            >
                              <option value="">Select Warehouse From</option>
                              <option
                                v-for="warehouse in warehouses"
                                v-bind:value="warehouse.warehouse_id"
                              >
                                {{ warehouse.warehouse_name }}
                              </option>
                            </select>
                            <small
                              class="form-text text-danger"
                              v-if="errors.has('warehouse_from')"
                              v-text="errors.get('warehouse_from')"
                            ></small>
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <label class="text-body">Warehouses To</label>
                          <fieldset class="form-group mb-3">
                            <select
                              v-model="stocktransfer.warehouse_to"
                              class="js-states form-control bg-transparent"
                            >
                              <option value="">Select Warehouse To</option>
                              <option
                                v-for="warehouse in warehouses"
                                v-bind:value="warehouse.warehouse_id"
                              >
                                {{ warehouse.warehouse_name }}
                              </option>
                            </select>
                            <small
                              class="form-text text-danger"
                              v-if="errors.has('warehouse_to')"
                              v-text="errors.get('warehouse_to')"
                            ></small>
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <label class="text-body">Refrence No</label>
                          <fieldset class="form-group mb-3">
                            <input
                              type="text"
                              class="form-control bg-white"
                              aria-describedby="textHelp"
                              value=""
                              v-model="stocktransfer.reference_no"
                            />
                          </fieldset>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('reference_no')"
                            v-text="errors.get('reference_no')"
                          ></small>
                        </div>

                        <div class="col-md-6">
                          <label class="text-body">Stock Transfer Date</label>
                          <fieldset class="form-group mb-3">
                            <input
                              type="date"
                              class="form-control bg-white"
                              aria-describedby="textHelp"
                              value=""
                              v-model="stocktransfer.trasfer_date"
                            />
                          </fieldset>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('trasfer_date')"
                            v-text="errors.get('trasfer_date')"
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
                    <!-- <div class="col-md-12">
                                        <label class="text-body">Products</label>
                                        <fieldset class="form-group mb-3 d-flex">
                                            <select class="js-example-basic-single js-states form-control bg-transparent" v-model="product_id">
                                                <option value="">Select Product</option>
                                                <option v-for="product in products" v-bind:value="product.product_id" v-if="product.available_qty != null && product.product_type == 'simple' ">
                                                    {{ product.detail == null ? '' : product.detail[0].title }}
                                                </option>

                                                 <option v-for="product in products" v-bind:value="product.product_id" v-if="product.product_type == 'variable' ">
                                                    {{ product.detail == null ? '' : product.detail[0].title }}
                                                </option>
                                            </select>
                                            <a href="javascript:void(0)" class="btn-secondary btn ml-2 white pt-1 pb-1 d-flex align-items-center justify-content-center" @click="addProduct()">ADD</a>
                                        </fieldset>
                                        <small class="form-text text-danger" v-if="errors.has('product_id')" v-text="errors.get('product_id')"></small>
                                    </div> -->

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
                                  v-model="stocktransfer.qty[index]"
                                  @change="
                                    setStockTransfer(index, selectedProduct)
                                  "
                                />
                                <small
                                  class="form-text text-danger"
                                  v-if="errors.has('qty.' + index)"
                                  v-text="errors.get('qty.' + index)"
                                ></small>
                              </td>
                              <!-- <td class="text-right"><a href="#" class="confirm-delete" title="Delete" @click="removeItem(index)"><i class="fas fa-trash-alt"></i></a></td> -->

                              <!-- <input type="hidden" :set="stocktransfer.product_id[index] = selectedProduct.product_id" />
                                                        <input type="hidden" :set="stocktransfer.product_combination_id[index] = selectedProduct.product_combination_id" /> -->
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
                            v-model="stocktransfer.notes"
                          ></textarea>
                        </fieldset>
                        <small
                          class="form-text text-danger"
                          v-if="errors.has('notes')"
                          v-text="errors.get('notes')"
                        ></small>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button
                        class="btn btn-primary"
                        @click="addstocktransfer()"
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
      stocktransfer: {
        reference_no: "",
        trasfer_date: "2021-06-30",
        notes: "",
        warehouse_from: "",
        warehouse_to: "",
        product_id: [],
        product_combination_id: [],
        qty: [],
      },
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
      stocktransfers: [],
      warehouses: [],
      stocktransferrs: [],
      products: [],
      selectedProducts: [],
      token: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
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
        .get("/api/admin/product?getAllData=1&getDetail=1", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.products = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    setStockTransfer(index, selectedProduct) {
      this.stocktransfer.product_id[index] = selectedProduct.product_id;
      if (selectedProduct.product_combination_id != null)
        this.stocktransfer.product_combination_id[index] =
          selectedProduct.product_combination_id;

      console.log(selectedProduct.product_id, index, this.stocktransfer);
    },
    addstocktransfer() {
      this.$parent.loading = true;
      var url = "/api/admin/stock_transfer";
      this.request_method = "post";

      axios[this.request_method](url, this.stocktransfer, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.stocktransfer = {
              reference_no: "",
              trasfer_date: "2021-06-30",
              notes: "",
              warehouse_from: "",
              warehouse_to: "",
              product_id: [],
              product_combination_id: [],
              qty: [],
            };
            this.selectedProducts = [];
            this.combination_product_id = [];
            this.combination_products = [];
            this.product_id = "";
            this.errors = new ErrorHandling();
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
              this.stocktransfer.qty.push(1);

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
      this.stocktransfer.qty.push(1);
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
              this.stocktransfer.qty.splice(index, 1);
              this.stocktransfer.product_combination_id.splice(index, 1);
              this.stocktransfer.product_id.splice(index, 1);
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
            this.stocktransfer.qty.splice(index, 1);
            this.stocktransfer.product_combination_id.splice(index, 1);
            this.stocktransfer.product_id.splice(index, 1);
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
    this.fetchWarehouses();
    this.fetchProducts();
  },
};
</script>
