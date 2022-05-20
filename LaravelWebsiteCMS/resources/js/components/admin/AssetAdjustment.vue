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
                        Assets Adjustments
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-body">
                    <div>
                      <div class="form-group">
                        <label>Account Type</label>
                        <fieldset class="form-group mb-3">
                          <select
                            class="
                              js-example-basic-single js-states
                              form-control
                              bg-transparent
                            "
                            v-model="account.parent"
                            @change="appendChild($event, 'select')"
                          >
                            <option value="" disabled selected v-bind:key="0">
                              Asset
                            </option>
                          </select>
                        </fieldset>
                      </div>
                      <div
                        class="form-group child"
                        v-for="(child, index) in childToAppend"
                      >
                        <select
                          class="
                            js-example-basic-single js-states
                            form-control
                            bg-transparent
                          "
                          @change="appendChild($event, 'select' + index)"
                        >
                          <option value="" disabled selected v-bind:key="0">
                            Select account
                          </option>
                          <option
                            v-for="childern in child.data"
                            :value="childern.id"
                            v-bind:key="childern.id"
                          >
                            {{ childern.name }}
                          </option>
                        </select>
                      </div>
                      <small
                        class="form-text text-danger"
                        v-if="errors.has('account_id')"
                        v-text="errors.get('account_id')"
                      ></small>

                      <div class="row">
                        <div class="col-8"></div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>Transaction Type</label>
                            <fieldset class="form-group mb-3">
                              <select
                          class="
                            js-example-basic-single js-states
                            form-control
                            bg-transparent
                          "
                          v-model="ttype"
                        >
                          <option value="dr"  v-bind:key="0">
                            DR
                          </option>
                          <option value="cr"  v-bind:key="1">
                            CR
                          </option>
                        </select>

                              <small
                                class="form-text text-danger"
                                v-if="errors.has('ttype')"
                                v-text="errors.get('ttype')"
                              ></small>
                            </fieldset>
                          </div>

                          <div class="form-group">
                            <label>Amount</label>
                            <fieldset class="form-group mb-3">
                              <input
                                type="text"
                                class="form-control"
                                v-model="account.amount"
                              />
                              <small
                                class="form-text text-danger"
                                v-if="errors.has('dr_amount')"
                                v-text="errors.get('dr_amount')"
                              ></small>
                            </fieldset>
                          </div>
                          <div class="form-group">
                            <label>Refrence</label>
                            <fieldset class="form-group mb-3">
                              <input
                                type="text"
                                class="form-control"
                                v-model="account.refrence"
                              />
                              <small
                                class="form-text text-danger"
                                v-if="errors.has('refrence')"
                                v-text="errors.get('refrence')"
                              ></small>
                            </fieldset>
                          </div>
                          <button
                            class="btn btn-primary"
                            @click="customValidator()"
                          >
                            Submit
                          </button>
                        </div>
                        <div class="col-1"></div>
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
import ErrorHandling from "../../ErrorHandling";
export default {
  data() {
    return {
      display_form: 0,
      account: {
        id: "",
        name: "",
        parent: "",
        refrence: "",
        amount: "",
      },
      searchParameter: "",
      sortBy: "id",
      sortType: "ASC",
      limit: 10,
      error_message: "",
      edit: false,
      pagination: {},
      request_method: "",
      accounts: [],
      account_dropdowns: [],
      token: [],
      childToAppend: [],
      selected_account_id: "",
      ttype:"",
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    accountdropdowns(page_url) {
      this.$parent.loading = true;
      page_url = page_url || "/api/admin/account";
      axios
        .get(page_url, this.token)
        .then((res) => {
          this.account_dropdowns = res.data.data;
        })
        .finally(() => (this.$parent.loading = false));
    },

    addUpdateaccount() {
      this.$parent.loading = true;
      var url = "/api/admin/transaction";
      this.request_method = "post";
      var dr = 0;
      var cr =0;
      if(this.ttype === 'dr' )
        dr = this.account.amount
      else
        cr = this.account.amount;
        axios[this.request_method](
        url,
        {
          account_id: this.selected_account_id,
          dr_amount: dr,
          refrence: this.account.refrence,
          cr_amount:cr,
        },
        this.token
      )
        .then((res) => {
          if (res.data.status == "Success") {
            this.$toaster.success("Transaction has been added successfully");
            this.clearForm();
          } else {
            this.$toaster.error(res.data.message);
          }
        })
        .catch((error) => {
          this.error_message = "";
          this.errors = new ErrorHandling();
          if ((error.response.status = 422)) {
            if (error.response.data.status == "Error") {
              this.error_message = error.response.data.message;
            } else {
              this.errors.record(error.response.data.errors);
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    clearForm() {
      this.display_form = 0;
      this.edit = false;
      this.account = {
        id: "",
        name: "",
        parent: "",
        refrence: "",
        amount: "",
      };
      this.ttype = '';
      (this.errors = new ErrorHandling()), (this.selected_account_id = "");
      this.childToAppend = [];
    },

    appendChild(e, select) {
      this.findChild(e.target.value, select);
    },
    findChild(parent, select) {
      this.selected_account_id = parent;
      for (var i = 0; i < this.childToAppend.length; i++) {
        if (this.childToAppend[i].select == select) {
          this.childToAppend.splice(i);
        }
      }

      axios
        .get("/api/admin/account?parent_id=" + parent, this.token)
        .then((res) => {
          if (res.data.data.length > 0) {
            var data = res.data.data;
            this.childToAppend.push({ data, select });
          }
        });
    },
    
    
    customValidator() {
      this.$parent.loading = true;
      this.errors = new ErrorHandling();
      var err = {};
      var isError = false;

      if (this.ttype == "") {
        err.ttype = ["Please Transaction Type"];
        isError = true;
      }
      if (isError) {
        this.errors.record(err);
        setTimeout(() => {
          this.$parent.loading = false;
        }, 100);
      }else {
        this.addUpdateaccount();
      }
    },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.findChild(1, "select");
    this.accountdropdowns();
  },
};
</script>
