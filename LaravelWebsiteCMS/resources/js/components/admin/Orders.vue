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
                        Order
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
                      <div class="table-responsive" id="printableTable">
                        <div
                          id="sale_wrapper"
                          class="dataTables_wrapper no-footer"
                        >
                          <div class="dataTables_length" id="sale_length">
                            <label
                              >Show
                              <select
                                name="sale_length"
                                aria-controls="sale"
                                class=""
                                v-model="limit"
                                v-on:change="fetchorders()"
                              >
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                              </select>
                              entries</label
                            >
                          </div>

                          <div id="sale_filter" class="dataTables_filter">
                            <label
                              >Search:<input
                                type="search"
                                class=""
                                placeholder=""
                                aria-controls="sale"
                                v-model="searchParameter"
                                @keyup="fetchorders()"
                            /></label>
                          </div>
                          <table
                            id="sale"
                            class="display dataTable no-footer"
                            sale="grid"
                          >
                            <thead class="text-body">
                              <tr sale="row">
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="sale"
                                  rowspan="1"
                                  colspan="1"
                                  aria-label="sale: activate to sort column ascending"
                                  style="width: 95.5288px"
                                >
                                  Order id
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="sale"
                                  rowspan="1"
                                  colspan="1"
                                  aria-label="sale: activate to sort column ascending"
                                  style="width: 95.5288px"
                                >
                                  Order Status
                                </th>

                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="sale"
                                  rowspan="1"
                                  colspan="1"
                                  aria-label="sale: activate to sort column ascending"
                                  style="width: 95.5288px"
                                >
                                  Order Price
                                </th>

                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="sale"
                                  rowspan="1"
                                  colspan="1"
                                  aria-label="sale: activate to sort column ascending"
                                  style="width: 95.5288px"
                                >
                                  Order Date
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="sale"
                                  rowspan="1"
                                  colspan="1"
                                  aria-label="sale: activate to sort column ascending"
                                  style="width: 95.5288px"
                                >
                                  Payment Method
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="sale"
                                  rowspan="1"
                                  colspan="1"
                                  aria-label="sale: activate to sort column ascending"
                                  style="width: 95.5288px"
                                >
                                  Action
                                </th>
                              </tr>
                            </thead>
                            <tbody class="kt-table-tbody text-dark">
                              <tr
                                class="kt-table-row kt-table-row-level-0 odd"
                                sale="row"
                                v-for="order in orders"
                                v-bind:key="order.id"
                              >
                                <td>
                                  {{ order.order_id }}
                                </td>
                                <td>
                                  {{ order.order_status }}
                                </td>
                                <td>
                                  {{ order.order_price }}
                                </td>
                                <td>
                                  {{ order.order_date }}
                                </td>
                                <td>
                                  {{ order.payment_method }}
                                </td>
                                <td>
                                  <a
                                    :href="'/admin/order/' + order.order_id"
                                    class="click-edit"
                                    id="click-edit1"
                                    data-toggle="tooltip"
                                    title=""
                                    data-placement="right"
                                    data-original-title="Check out more demos"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <ul class="pagination pagination-sm m-0 float-right">
                            <li
                              v-bind:class="[
                                { disabled: !pagination.prev_page_url },
                              ]"
                            >
                              <a
                                class="page-link"
                                href="#"
                                @click="fetchorders(pagination.prev_page_url)"
                                >Previous</a
                              >
                            </li>

                            <li class="disabled">
                              <a class="page-link text-dark" href="#"
                                >Page {{ pagination.current_page }} of
                                {{ pagination.last_page }}</a
                              >
                            </li>

                            <li
                              v-bind:class="[
                                { disabled: !pagination.next_page_url },
                              ]"
                              class="page-item"
                            >
                              <a
                                class="page-link"
                                href="#"
                                @click="deleteOrders(pagination.next_page_url)"
                                >Next</a
                              >
                            </li>
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

    <div
      class="offcanvas offcanvas-right kt-color-panel p-5 kt_notes_panel"
      v-if="display_form"
      :class="display_form ? 'offcanvas-on' : ''"
    >
      <div
        class="
          offcanvas-header
          d-flex
          align-items-center
          justify-content-between
          pb-3
        "
      >
        <h4 class="font-size-h4 font-weight-bold m-0">Add sale</h4>
        <a
          href="#"
          class="
            btn btn-sm btn-icon btn-light btn-hover-primary
            kt_notes_panel_close
          "
          v-on:click="display_form = 0"
        >
          <svg
            width="20px"
            height="20px"
            viewBox="0 0 16 16"
            class="bi bi-x"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
            ></path>
          </svg>
        </a>
      </div>
      <form id="myform">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label class="text-dark">Name </label>
              <input
                type="text"
                name="text"
                v-model="order.name"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('name')"
                v-text="errors.get('name')"
              ></small>
            </div>
            <div class="form-group">
              <label class="text-dark">Direction </label>
              <select v-model="order.direction">
                <option value="ltr">LTR</option>
                <option value="rtl">RTL</option>
              </select>
              <small
                class="form-text text-danger"
                v-if="errors.has('direction')"
                v-text="errors.get('direction')"
              ></small>
            </div>
            <div class="form-group">
              <label class="text-dark">Code </label>
              <input
                type="text"
                name="text"
                v-model="order.code"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('code')"
                v-text="errors.get('code')"
              ></small>
            </div>
            <div class="form-group">
              <label class="text-dark">Directory </label>
              <input
                type="text"
                name="text"
                v-model="order.directory"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('directory')"
                v-text="errors.get('directory')"
              ></small>
            </div>
            <div class="form-group">
              <input
                type="checkbox"
                name="text"
                v-model="order.is_default"
                id="is_default"
                class="form-check-input"
              />
              <label class="text-dark" for="is_default">Set as default </label>
              <small
                class="form-text text-danger"
                v-if="errors.has('is_default')"
                v-text="errors.get('is_default')"
              ></small>
            </div>
          </div>
        </div>
        <button type="button" @click="addUpdatesale()" class="btn btn-primary">
          Submit
        </button>
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
      orders: [],
      searchParameter: "",
      sortBy: "id",
      sortType: "DESC",
      limit: 10,
      error_message: "",
      edit: false,
      actions: false,
      pagination: {},
      request_method: "",
      is_default: "0",
      token: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchorders(page_url) {
      this.$parent.loading = true;
      let vm = this;
      page_url = page_url || "/api/admin/order";
      var arr = page_url.split("?");

      if (arr.length > 1) {
        page_url += "&limit=" + this.limit;
      } else {
        page_url += "?limit=" + this.limit;
      }
      if (this.searchParameter != null) {
        page_url += "&searchParameter=" + this.searchParameter;
      }
      page_url += "&sortBy=" + this.sortBy + "&sortType=" + this.sortType;

      var responseData = {};

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.orders = res.data.data;
          vm.makePagination(res.data.meta, res.data.links);
        })
        .finally(() => (this.$parent.loading = false));
    },

    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
      };

      this.pagination = pagination;
    },
    deleteOrders(id) {
      if (confirm("Are You Sure?")) {
        this.$parent.loading = true;
        axios
          .delete(`/api/admin/order/${id}`, this.token)
          .then((res) => {
            if (res.data.status == "Success") {
              this.$toaster.success(res.data.message);
              this.fetchorders();
            }
          })
          .catch((err) => console.log(err))
          .finally(() => (this.$parent.loading = false));
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
    this.fetchorders();
  },
  props: ["loading"],
};
</script>
