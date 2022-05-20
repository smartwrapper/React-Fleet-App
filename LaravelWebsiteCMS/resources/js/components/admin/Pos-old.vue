<template>
  <div>
    <header class="pos-header bg-white">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="greeting-text">
              <h3 class="card-label mb-0 font-weight-bold text-primary">
                WELCOME
              </h3>
              <h3 class="card-label mb-0">
                {{ login_name }}
              </h3>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5 col-md-6 clock-main">
            <div class="clock">
              <div class="datetime-content">
                <ul>
                  <li id="hours"></li>
                  <li id="point1">:</li>
                  <li id="min"></li>
                  <li id="point">:</li>
                  <li id="sec"></li>
                </ul>
              </div>
              <div class="datetime-content">
                <div id="Date" class=""></div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-3 col-md-12 order-lg-last order-second">
            <div class="topbar justify-content-end">
              <div class="dropdown mega-dropdown">
                <div
                  id="id2"
                  class="topbar-item"
                  data-toggle="dropdown"
                  data-display="static"
                >
                  <div
                    class="
                      btn btn-icon
                      w-auto
                      h-auto
                      btn-clean
                      d-flex
                      align-items-center
                      py-0
                      mr-3
                    "
                  >
                    <router-link to="/admin/dashboard" class="btn btn-primary"
                      >Dashboard</router-link
                    >
                  </div>
                </div>
                <div
                  id="id2"
                  class="topbar-item"
                  data-toggle="dropdown"
                  data-display="static"
                >
                  <div
                    class="
                      btn btn-icon
                      w-auto
                      h-auto
                      btn-clean
                      d-flex
                      align-items-center
                      py-0
                      mr-3
                    "
                    @click="toggle_calculator = !toggle_calculator"
                  >
                    <span class="symbol symbol-35 symbol-light-success">
                      <span class="symbol-label bg-primary font-size-h5">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="20px"
                          height="20px"
                          fill="#fff"
                          class="bi bi-calculator-fill"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z"
                          />
                        </svg>
                      </span>
                    </span>
                  </div>
                </div>

                <div
                  class="calu"
                  v-if="toggle_calculator"
                  style="min-width: 248px"
                >
                  <div class="calculator">
                    <Calculator />
                    <button
                      @click="toggle_calculator = false"
                      style="
                        float: right;
                        top: 4px;
                        right: 10px;
                        position: absolute;
                        background: transparent;
                        border: none;
                      "
                    >
                      X
                    </button>
                  </div>
                </div>
              </div>

              <div class="topbar-item folder-data">
                <div
                  class="
                    btn btn-icon
                    w-auto
                    h-auto
                    btn-clean
                    d-flex
                    align-items-center
                    py-0
                    mr-3
                  "
                  data-toggle="modal"
                  @click="showDraftOrderModal()"
                  data-target="#folderpop"
                >
                  <span class="badge badge-pill badge-primary">{{
                    draftOrders.length
                  }}</span>
                  <span class="symbol symbol-35 symbol-light-success">
                    <span class="symbol-label bg-warning font-size-h5">
                      <svg
                        width="20px"
                        height="20px"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="#ffff"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"
                        ></path>
                      </svg>
                    </span>
                  </span>
                </div>
              </div>

              <div class="dropdown">
                <div
                  class="topbar-item"
                  data-toggle="dropdown"
                  data-display="static"
                >
                  <div
                    class="
                      btn btn-icon
                      w-auto
                      h-auto
                      btn-clean
                      d-flex
                      align-items-center
                      py-0
                    "
                  >
                    <span class="symbol symbol-35 symbol-light-success">
                      <span class="symbol-label font-size-h5">
                        <svg
                          width="20px"
                          height="20px"
                          viewBox="0 0 16 16"
                          class="bi bi-person-fill"
                          fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                          ></path>
                        </svg>
                      </span>
                    </span>
                  </div>
                </div>

                <div
                  class="dropdown-menu dropdown-menu-right"
                  style="min-width: 150px"
                >
                  <a href="#" class="dropdown-item" @click="logout()">
                    <span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20px"
                        height="20px"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-power"
                      >
                        <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                        <line x1="12" y1="2" x2="12" y2="12"></line>
                      </svg>
                    </span>
                    Logout
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="contentPOS">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-4 order-xl-first order-last">
            <div class="card card-custom gutter-b bg-white border-0">
              <div class="card-body">
                <div class="d-flex justify-content-between colorfull-select">
                  <div class="selectmain">
                    <select
                      class="arabic-select w-150px bag-primary"
                      v-model="select_category"
                      @change="showSideBarProduct()"
                    >
                      <option value="all">All</option>
                      <template v-for="category in categories">
                        <option :value="category.id">
                          {{ category.detail ? category.detail[0].name : "" }}
                        </option>
                      </template>
                    </select>
                  </div>
                </div>
              </div>
              <div class="product-items">
                <div class="row">
                  <div
                    class="col-xl-4 col-lg-2 col-md-3 col-sm-4 col-6"
                    v-for="category_product in category_products"
                  >
                    <div class="productCard">
                      <div class="productThumb">
                        <img
                          class="img-fluid"
                          :src="'/gallary/' + category_product.image"
                          alt="ix"
                        />
                      </div>
                      <div class="productContent">
                        <a
                          href="#"
                          :attr="category_product.product_combination_id"
                          @click="
                            addProductInList(
                              category_product.product_id,
                              category_product.product_combination_id,
                              category_product.product_type
                            )
                          "
                        >
                          {{ category_product.product_name }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <ul class="pagination pagination-sm m-0 float-right">
                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]">
                  <a
                    class="page-link"
                    href="#"
                    @click="getProduct(pagination.prev_page_url)"
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
                  v-bind:class="[{ disabled: !pagination.next_page_url }]"
                  class="page-item"
                >
                  <a
                    class="page-link"
                    href="#"
                    @click="getProduct(pagination.next_page_url)"
                    >Next</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-5 col-lg-8 col-md-8">
            <div class="">
              <div
                class="
                  card card-custom
                  gutter-b
                  bg-white
                  border-0
                  table-contentpos
                "
              >
                <div class="card-body">
                  <div class="d-flex justify-content-between colorfull-select">
                    <div class="selectmain">
                      <label class="text-dark d-flex"
                        >Choose a Customer
                        <span
                          class="badge badge-secondary white rounded-circle"
                          data-toggle="modal"
                          data-target="#choosecustomer"
                          @click="showCustomerModel()"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="svg-sm"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1"
                            id="Layer_122"
                            x="0px"
                            y="0px"
                            width="512px"
                            height="512px"
                            viewBox="0 0 512 512"
                            enable-background="new 0 0 512 512"
                            xml:space="preserve"
                          >
                            <g>
                              <rect
                                x="234.362"
                                y="128"
                                width="43.263"
                                height="256"
                              ></rect>
                              <rect
                                x="128"
                                y="234.375"
                                width="256"
                                height="43.25"
                              ></rect>
                            </g>
                          </svg>
                        </span>
                      </label>
                      <select
                        class="arabic-select select-down"
                        v-model="selectedCustomer"
                      >
                        <option
                          v-bind:value="{
                            id: customer.customer_id,
                            text: customer.customer_first_name,
                          }"
                          v-for="customer in customers"
                        >
                          {{ customer.customer_first_name }}
                          {{ customer.customer_last_name }}
                          {{ customer.customer_id }}
                        </option>
                      </select>
                      <small
                        class="form-text text-danger"
                        v-if="errors.has('customer_id')"
                        v-text="errors.get('customer_id')"
                      ></small>
                    </div>

                    <div class="d-flex flex-column selectmain">
                      <label class="text-dark d-flex">Warehouse </label>
                      <select
                        class="arabic-select select-down"
                        v-model="selectedWarehouse"
                        @change="taxApply()"
                      >
                        <option
                          v-bind:value="{
                            id: warehouse.warehouse_id,
                            text: warehouse.warehouse_name,
                          }"
                          :selected="warehouse.warehouse_id == 1"
                          v-for="warehouse in warehouses"
                        >
                          {{ warehouse.warehouse_name }}
                        </option>
                      </select>
                      <small
                        class="form-text text-danger"
                        v-if="errors.has('warehouse_id')"
                        v-text="errors.get('warehouse_id')"
                      ></small>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="
                  card card-custom
                  gutter-b
                  bg-white
                  border-0
                  table-contentpos
                "
              >
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <div class="col-md-12">
                      <label>Select Product</label>
                      <fieldset class="form-group mb-0 d-flex barcodeselection">
                        <select
                          class="form-control w-25"
                          v-model="sortBy"
                          id="exampleFormControlSelect1"
                        >
                          <option value="name">Name</option>
                          <option value="sku">SKU</option>
                        </select>
                        <input
                          list="browsers"
                          type="text"
                          :class="sortBy == 'name' ? '' : 'd-none'"
                          class="form-control border-dark"
                          id="basicInput1"
                          @input="getSearchDataDetail()"
                          @keyup="searchProduct($event.target.value)"
                          placeholder=""
                        />
                        <datalist id="browsers">
                          <option
                            v-for="searchFilter in searchFilters"
                            :value="searchFilter.product_name"
                            :product="searchFilter.product"
                            :product_id="searchFilter.product_id"
                            :product_combination_id="
                              searchFilter.product_combination_id
                            "
                          >
                            {{ searchFilter.product_name }}
                          </option>
                        </datalist>

                        <input
                          list="browsers1"
                          type="text"
                          :class="sortBy == 'name' ? 'd-none' : ''"
                          class="form-control border-dark"
                          id="basicInput2"
                          @input="getSearchDataDetail()"
                          @keyup="searchProduct($event.target.value)"
                          placeholder=""
                        />
                        <datalist id="browsers1">
                          <option
                            v-for="searchFilter in searchFilters"
                            :value="
                              searchFilter.product
                                ? searchFilter.product.sku
                                : ''
                            "
                            :product="searchFilter.product"
                            :product_id="searchFilter.product_id"
                            :product_combination_id="
                              searchFilter.product_combination_id
                            "
                          >
                            {{
                              searchFilter.product
                                ? searchFilter.product.sku
                                : ""
                            }}
                          </option>
                        </datalist>
                      </fieldset>
                    </div>
                  </div>
                </div>
                <div class="table-datapos">
                  <div class="table-responsive" id="printableTable">
                    <table id="orderTable" class="display" style="width: 100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Discount</th>
                          <th>Subtotal</th>
                          <th class="text-right no-sort"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="add_to_cart_product in add_to_cart_products">
                          <td>{{ add_to_cart_product.product_name }}</td>
                          <td>{{ add_to_cart_product.price }}</td>
                          <td>
                            <input
                              type="number"
                              :value="add_to_cart_product.qty"
                              class="form-control border-dark w-100px"
                              placeholder=""
                              @change="
                                qtyInc(
                                  add_to_cart_product.product_id,
                                  add_to_cart_product.product_combination_id,
                                  $event.target.value,
                                  add_to_cart_product.product_type
                                )
                              "
                            />
                          </td>
                          <td>{{ add_to_cart_product.discount_show }}</td>
                          <td>{{ add_to_cart_product.subtotal }}</td>
                          <td>
                            <div class="card-toolbar text-right">
                              <a
                                href="#"
                                @click="
                                  removeProduct(
                                    add_to_cart_product.product_id,
                                    add_to_cart_product.product_combination_id
                                  )
                                "
                                class="confirm-delete"
                                title="Delete"
                                ><i class="fas fa-trash-alt"></i
                              ></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <div
                      class="col-md-12 btn-submit d-flex justify-content-end"
                    >
                      <button
                        type="submit"
                        class="btn btn-danger mr-2 confirm-delete"
                        title="Delete"
                        @click="emptyValue()"
                      >
                        <i class="fas fa-trash-alt mr-2"></i>
                        Suspand/Cancel
                      </button>
                      <button
                        type="submit"
                        class="btn btn-secondary white"
                        @click="draftOrder()"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          class="bi bi-folder-fill svg-sm mr-2"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"
                          />
                        </svg>
                        Draft Order
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-4">
            <div class="card card-custom gutter-b bg-white border-0">
              <div class="card-body">
                <div class="shop-profile">
                  <div class="media">
                    <div
                      class="
                        bg-primary
                        w-100px
                        h-100px
                        d-flex
                        justify-content-center
                        align-items-center
                      "
                    >
                      <h2 class="mb-0 white">K</h2>
                    </div>
                    <div class="media-body ml-3">
                      <h3 class="title font-weight-bold">The Kundol Shop</h3>
                      <p class="phoonenumber">
                        {{ businessPhone }}
                      </p>
                      <p class="adddress">
                        {{ businessAddress }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="resulttable-pos">
                  <table class="table right-table">
                    <tbody>
                      <tr
                        class="
                          d-flex
                          align-items-center
                          justify-content-between
                        "
                      >
                        <th
                          class="
                            border-0
                            font-size-h5
                            mb-0
                            font-size-bold
                            text-dark
                          "
                        >
                          Total Items
                        </th>
                        <td
                          class="
                            border-0
                            justify-content-end
                            d-flex
                            text-dark
                            font-size-base
                          "
                        >
                          {{ add_to_cart_products.length }}
                        </td>
                      </tr>
                      <tr
                        class="
                          d-flex
                          align-items-center
                          justify-content-between
                        "
                      >
                        <th
                          class="
                            border-0
                            font-size-h5
                            mb-0
                            font-size-bold
                            text-dark
                          "
                        >
                          Actual Total Price
                        </th>
                        <td
                          class="
                            border-0
                            justify-content-end
                            d-flex
                            text-dark
                            font-size-base
                          "
                        >
                          {{
                            add_to_cart_products
                              .reduce(
                                (acc, item) =>
                                  parseFloat(acc) +
                                  parseFloat(item.actual_price),
                                0
                              )
                              .toFixed(2)
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
                        <th
                          class="
                            border-0
                            font-size-h5
                            mb-0
                            font-size-bold
                            text-dark
                          "
                        >
                          Subtotal
                        </th>
                        <td
                          class="
                            border-0
                            justify-content-end
                            d-flex
                            text-dark
                            font-size-base
                          "
                        >
                          {{
                            add_to_cart_products
                              .reduce(
                                (acc, item) =>
                                  parseFloat(acc) + parseFloat(item.subtotal),
                                0
                              )
                              .toFixed(2)
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
                          <div
                            class="
                              d-flex
                              align-items-center
                              font-size-h5
                              mb-0
                              font-size-bold
                              text-dark
                            "
                          >
                            DISCOUNT ({{
                              (
                                ((add_to_cart_products.reduce(
                                  (acc, item) =>
                                    parseFloat(acc) +
                                    parseFloat(item.actual_price),
                                  0
                                ) -
                                  add_to_cart_products.reduce(
                                    (acc, item) =>
                                      parseFloat(acc) +
                                      parseFloat(item.subtotal),
                                    0
                                  )) /
                                  add_to_cart_products.reduce(
                                    (acc, item) =>
                                      parseFloat(acc) +
                                      parseFloat(item.actual_price),
                                    0
                                  )) *
                                100
                              ).toFixed(2)
                            }}
                            %)
                          </div>
                        </th>
                        <td
                          class="
                            border-0
                            justify-content-end
                            d-flex
                            text-dark
                            font-size-base
                          "
                        >
                          {{
                            (
                              add_to_cart_products.reduce(
                                (acc, item) =>
                                  parseFloat(acc) +
                                  parseFloat(item.actual_price),
                                0
                              ) -
                              add_to_cart_products.reduce(
                                (acc, item) =>
                                  parseFloat(acc) + parseFloat(item.subtotal),
                                0
                              )
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
                          <div
                            class="
                              d-flex
                              align-items-center
                              font-size-h5
                              mb-0
                              font-size-bold
                              text-dark
                            "
                          >
                            Tax ({{
                              add_to_cart_products.reduce(
                                (acc, item) =>
                                  parseFloat(acc) + parseFloat(item.subtotal),
                                0
                              ) > 0
                                ? tax_per_apply
                                : 0
                            }}) %
                          </div>
                        </th>
                        <td
                          class="
                            border-0
                            justify-content-end
                            d-flex
                            text-dark
                            font-size-base
                          "
                        >
                          {{
                            (
                              (add_to_cart_products.reduce(
                                (acc, item) =>
                                  parseFloat(acc) + parseFloat(item.subtotal),
                                0
                              ) /
                                100) *
                              parseFloat(tax_per_apply)
                            ).toFixed(2)
                          }}
                        </td>
                      </tr>
                      <tr
                        class="
                          d-flex
                          align-items-center
                          justify-content-between
                          item-price
                        "
                      >
                        <th
                          class="
                            border-0
                            font-size-h5
                            mb-0
                            font-size-bold
                            text-primary
                          "
                        >
                          TOTAL
                        </th>
                        <td
                          class="
                            border-0
                            justify-content-end
                            d-flex
                            text-primary
                            font-size-base
                          "
                        >
                          {{
                            (
                              add_to_cart_products.reduce(
                                (acc, item) =>
                                  parseFloat(acc) + parseFloat(item.subtotal),
                                0
                              ) -
                              (add_to_cart_products.reduce(
                                (acc, item) =>
                                  parseFloat(acc) + parseFloat(item.subtotal),
                                0
                              ) /
                                100) *
                                parseFloat(tax_per_apply)
                            ).toFixed(2)
                          }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div
                  class="
                    d-flex
                    justify-content-end
                    align-items-center
                    flex-column
                    buttons-cash
                  "
                >
                  <div>
                    <a
                      href="#"
                      class="btn btn-primary white mb-2"
                      data-toggle="modal"
                      data-target="#payment-popup"
                      @click="saveTransaction()"
                    >
                      <i class="fas fa-money-bill-wave mr-2"></i>
                      Pay With Cash
                    </a>
                  </div>
                  <div class="d-none">
                    <a
                      href="#"
                      class="btn btn-outline-secondary"
                      @click="showDraftOrderModal()"
                    >
                      <i class="fas fa-credit-card mr-2"></i>
                      Pay With Card
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal-backdrop"
      :class="discountModel == 1 ? 'show' : 'd-none'"
    ></div>
    <div
      role="dialog"
      aria-modal="true"
      class="text-left modal"
      tabindex="-1"
      :class="discountModel == 1 ? 'd-block' : 'd-none'"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title h4">
              <h3 class="modal-title" id="myModalLabel1">Add Discount</h3>
            </div>
            <button
              type="button"
              class="
                close
                rounded-pill
                btn btn-sm btn-icon btn-light btn-hover-primary
                m-0
              "
              data-dismiss="modal"
              aria-label="Close"
              @click="showDiscountModel()"
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
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <label class="text-body">Discount</label>
                <fieldset class="form-group mb-3 d-flex">
                  <input
                    type="text"
                    name="text"
                    class="form-control bg-white"
                    id="exampleInputText"
                    aria-describedby="textHelp"
                    placeholder="Enter Discount"
                    v-model="dicount_per"
                  /><a
                    href="javascript:void(0)"
                    class="
                      btn-secondary btn
                      ml-2
                      white
                      pt-1
                      pb-1
                      d-flex
                      align-items-center
                      justify-content-center
                    "
                    @click="discountApply()"
                    >Apply</a
                  >
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal-backdrop"
      :class="taxModel == 1 ? 'show' : 'd-none'"
    ></div>
    <div
      role="dialog"
      aria-modal="true"
      class="text-left modal"
      tabindex="-1"
      :class="taxModel == 1 ? 'd-block' : 'd-none'"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title h4">
              <h3 class="modal-title" id="myModalLabel1">Add Tax</h3>
            </div>
            <button
              type="button"
              class="
                close
                rounded-pill
                btn btn-sm btn-icon btn-light btn-hover-primary
                m-0
              "
              data-dismiss="modal"
              aria-label="Close"
              @click="showTaxModel()"
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
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <label class="text-body">Tax</label>
                <fieldset class="form-group mb-3 d-flex">
                  <input
                    type="text"
                    name="text"
                    class="form-control bg-white"
                    id="exampleInputText"
                    aria-describedby="textHelp"
                    placeholder="Enter Tax"
                    v-model="tax_val"
                  /><a
                    href="javascript:void(0)"
                    class="
                      btn-secondary btn
                      ml-2
                      white
                      pt-1
                      pb-1
                      d-flex
                      align-items-center
                      justify-content-center
                    "
                    @click="taxApply()"
                    >Apply</a
                  >
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal-backdrop show"
      :class="draftModel == 1 ? 'show' : 'd-none'"
    ></div>
    <div
      role="dialog"
      aria-modal="true"
      class="text-left modal"
      tabindex="-1"
      :class="draftModel == 1 ? 'd-block' : 'd-none'"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title h4">
              <h3 class="modal-title" id="myModalLabel1">Draft Orders</h3>
            </div>
            <button
              type="button"
              class="
                close
                rounded-pill
                btn btn-sm btn-icon btn-light btn-hover-primary
                m-0
              "
              data-dismiss="modal"
              aria-label="Close"
              @click="showDraftOrderModal()"
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
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-body pos-ordermain">
              <div class="row">
                <div class="col-lg-4">
                  <div
                    class="pos-order"
                    v-for="(draftOrder, index) in draftOrders"
                  >
                    <h3 class="pos-order-title" id="myModalLabel1">
                      Order {{ index + 1 }}
                    </h3>
                    <div class="orderdetail-pos">
                      <p>
                        <strong>Customer Name </strong
                        >{{ draftOrder.customer_name }}
                      </p>
                      <p><strong>Payment Status </strong>Pending</p>
                      <p>
                        <strong>Total Items </strong>
                        {{ draftOrder.product ? draftOrder.product.length : 0 }}
                      </p>
                      <p>
                        <strong>Amount to Pay </strong> ${{
                          draftOrder.product
                            ? draftOrder.product.reduce(
                                (acc, item) => acc + item.subtotal,
                                0
                              ) -
                              +(
                                (draftOrder.product.reduce(
                                  (acc, item) => acc + item.subtotal,
                                  0
                                ) /
                                  100) *
                                draftOrder.dicount_per_apply
                              ) +
                              +draftOrder.tax_per_apply
                            : 0
                        }}
                      </p>
                    </div>
                    <div class="d-flex justify-content-end">
                      <a
                        href="#"
                        class="confirm-delete ml-3"
                        title="edit"
                        @click="editDraft(draftOrder.id)"
                        ><i class="fas fa-edit"></i
                      ></a>
                      <a
                        href="#"
                        class="confirm-delete ml-3"
                        title="Delete"
                        @click="deleteDraft(draftOrder.id)"
                        ><i class="fas fa-trash-alt"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 modal-footer">
            <div class="row"><div class="col-12"></div></div>
          </div>
        </div>
      </div>
    </div>

    <div
      role="dialog"
      aria-modal="true"
      class="text-left modal"
      tabindex="-1"
      :class="customerModel == 1 ? 'd-block' : 'd-none'"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title h4">
              <h3 class="modal-title" id="myModalLabel1">Add Customer</h3>
            </div>
            <button
              type="button"
              class="
                close
                rounded-pill
                btn btn-sm btn-icon btn-light btn-hover-primary
                m-0
              "
              data-dismiss="modal"
              aria-label="Close"
              @click="showCustomerModel()"
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
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <div class="col-md-6">
                  <label class="text-body">First Name</label>
                  <fieldset class="form-group mb-3">
                    <input
                      type="text"
                      name="first_name"
                      class="form-control"
                      id="exampleInputText"
                      aria-describedby="textHelp"
                      placeholder="Enter First Name"
                      v-model="customer_info.first_name"
                    />
                    <small
                      class="form-text text-danger"
                      v-if="errors.has('first_name')"
                      v-text="errors.get('first_name')"
                    ></small>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <label class="text-body">Last Name</label>
                  <fieldset class="form-group mb-3">
                    <input
                      type="text"
                      name="last_name"
                      class="form-control"
                      id="exampleInputText"
                      aria-describedby="textHelp"
                      placeholder="Enter Last Name"
                      v-model="customer_info.last_name"
                    />
                    <small
                      class="form-text text-danger"
                      v-if="errors.has('last_name')"
                      v-text="errors.get('last_name')"
                    ></small>
                  </fieldset>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label class="text-body">Email</label>
                  <fieldset class="form-group mb-3">
                    <input
                      type="text"
                      name="email"
                      class="form-control"
                      id="exampleInputText"
                      aria-describedby="textHelp"
                      placeholder="Enter Email"
                      v-model="customer_info.email"
                    />
                    <small
                      class="form-text text-danger"
                      v-if="errors.has('email')"
                      v-text="errors.get('email')"
                    ></small>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <label class="text-body">Password</label>
                  <fieldset class="form-group mb-3">
                    <input
                      type="password"
                      name="password"
                      class="form-control"
                      id="exampleInputText"
                      aria-describedby="textHelp"
                      placeholder="Enter Password"
                      v-model="customer_info.password"
                    />
                    <small
                      class="form-text text-danger"
                      v-if="errors.has('password')"
                      v-text="errors.get('password')"
                    ></small>
                  </fieldset>
                </div>
              </div>
              <div class="form-group row justify-content-end mb-0">
                <div class="col-md-6 text-right">
                  <a href="#" class="btn btn-primary" @click="saveCustomer()"
                    >Add Customer</a
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal-backdrop"
      :class="customerModel == 1 ? 'show' : 'd-none'"
    ></div>
  </div>
</template>

<script>
import ErrorHandling from "../../ErrorHandling";
import Calculator from "./settings/Calculator.vue";

export default {
  components: { Calculator },
  data() {
    return {
      draftModel: 0,
      draftOrders: [],
      display_form: 0,
      tax_val: 0,
      sortBy: "name",
      list_products: [],
      error_message: "",
      select_category: "all",
      edit: false,
      actions: false,
      pagination: {},
      request_method: "",
      countrySelected: "",
      stateSelected: "",
      categories: [],
      discountModel: 0,
      taxModel: 0,
      login_name: "",
      customerModel: 0,
      category_products: [{}],
      searchFilters: {
        product_name: "",
        product_id: "",
        product_combination_id: "",
        sku: "",
        product: [],
      },
      businessPhone: "",
      businessAddress: "",
      languages: [],
      add_to_cart_products: [],
      token: [],
      selectedLanguage: "",
      settings: [],
      dicount_per: 0,
      customers: [],
      warehouses: [],
      selectedWarehouse: "",
      selectedCustomer: "",
      tax_per_apply: 0,
      dicount_per_apply: 0,
      showModal: false,
      price: [],
      qty: [],
      total: [],
      discount: [],
      product_id: [],
      product_combination_id: [],
      draftOrderCount: 0,
      customer_info: {
        first_name: "",
        last_name: "",
        email: "",
        password: "",
      },
      sortBy: "id",
      sortType: "DESC",
      limit: 2,
      pagination: {},
      toggle_calculator: false,
      current_product_stock: 0,
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    draftOrder() {
      var total =
        this.add_to_cart_products.reduce(
          (acc, item) => acc + item.subtotal,
          0
        ) -
        +(
          (this.add_to_cart_products.reduce(
            (acc, item) => acc + item.subtotal,
            0
          ) /
            100) *
          this.dicount_per_apply
        ) +
        +this.tax_per_apply;
      if (total == 0 || total == "0") {
        this.$toaster.error("please Select Product");
        return;
      }
      var parms = {};
      parms["product"] = this.add_to_cart_products;
      parms["customer_id"] = this.selectedCustomer.id;
      parms["customer_name"] = this.selectedCustomer.text;
      parms["warehouse_id"] = this.selectedWarehouse.id;
      parms["warehouse_name"] = this.selectedWarehouse.text;
      parms["dicount_per_apply"] = this.dicount_per_apply;
      parms["tax_per_apply"] = this.tax_per_apply;
      parms["id"] = this.draftOrderCount;
      this.draftOrderCount = +this.draftOrderCount + 1;
      this.draftOrders.push(parms);
      this.$toaster.success("Product Save In Draft");
      this.emptyValue();
    },
    editDraft(id) {
      for (var i = 0; i < this.draftOrders.length; i++) {
        if (this.draftOrders[i].id == id) {
          this.emptyValue();
          this.add_to_cart_products = this.draftOrders[i].product;
          this.selectedCustomer = {
            id: this.draftOrders[i].customer_id,
            text: this.draftOrders[i].customer_name,
          };
          this.selectedWarehouse = {
            id: this.draftOrders[i].warehouse_id,
            text: this.draftOrders[i].warehouse_name,
          };
          this.dicount_per_apply = this.draftOrders[i].dicount_per_apply;
          this.tax_per_apply = this.draftOrders[i].tax_per_apply;
          this.draftOrders.splice(i, 1);
          this.showDraftOrderModal();
          break;
        }
      }
    },
    deleteDraft(id) {
      for (var i = 0; i < this.draftOrders.length; i++) {
        if (this.draftOrders[i].id == id) {
          this.draftOrders.splice(i, 1);
          break;
        }
      }
    },
    showDraftOrderModal() {
      this.draftModel = !this.draftModel;
    },
    showCustomerModel() {
      this.customerModel = !this.customerModel;
    },
    saveCustomer() {
      var page_url = "/api/admin/customer";
      axios
        .post(page_url, this.customer_info, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.customer_info = {
              first_name: "",
              last_name: "",
              email: "",
              password: "",
            };
            this.$toaster.success(res.data.message);
            this.errors = new ErrorHandling();
            this.getCustomer();
            this.showCustomerModel();
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
    },
    saveTransaction() {
      this.errors = new ErrorHandling();
      var customer_id = this.selectedCustomer.id;
      var warehouse_id = this.selectedWarehouse.id;
      var tax_amount = this.tax_per_apply;
      var discount =
        (this.add_to_cart_products.reduce(
          (acc, item) => acc + item.subtotal,
          0
        ) /
          100) *
        this.dicount_per_apply;

      var total =
        this.add_to_cart_products.reduce(
          (acc, item) => acc + item.subtotal,
          0
        ) -
        +(
          (this.add_to_cart_products.reduce(
            (acc, item) => acc + item.subtotal,
            0
          ) /
            100) *
          this.dicount_per_apply
        ) +
        +this.tax_per_apply;
        
      if (total == 0 || total == "0") {
        this.$toaster.error("please Select Product");
        return;
      }
      var payable = total;
      var amount_paid = total;
      var currentDate = new Date();
      var currentDateWithFormat = new Date()
        .toJSON()
        .slice(0, 10)
        .replace(/-/g, "-");
      var sale_date = currentDateWithFormat;
      this.product_id = [];
      this.price = [];
      this.qty = [];
      this.discount = [];
      this.total = [];
      this.product_combination_id = [];

      this.add_to_cart_products.map((res) => {
        this.price.push(res.price);
        this.qty.push(res.qty);
        this.discount.push(res.discount);
        this.total.push(parseFloat(res.subtotal));
        this.product_id.push(res.product_id);
        this.product_combination_id.push(res.product_combination_id);
      });
      var data = {
        customer_id,
        warehouse_id,
        tax_amount,
        discount,
        total,
        payable,
        amount_paid,
        sale_date,
        price: this.price,
        qty: this.qty,
        total: this.total,
        product_id: this.product_id,
        product_combination_id: this.product_combination_id,
      };

      var page_url = "/api/admin/sale";
      axios
        .post(page_url, data, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.emptyValue();
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
              this.$toaster.error(error.response.data.message);
            } else {
              this.errors.record(error.response.data.errors);
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    emptyValue() {
      this.selectedCustomer = "";
      this.selectedWarehouse = "";
      this.add_to_cart_products = [];
      this.price = [];
      this.qty = [];
      this.total = [];
      this.discount = [];
      this.product_id = [];
      this.product_combination_id = [];
      this.dicount_per_apply = 0;
      this.dicount_per = 0;
      this.tax_per_apply = 0;
      this.tax_val = 0;
    },
    showDiscountModel() {
      this.discountModel = !this.discountModel;
    },
    showTaxModel() {
      this.taxModel = !this.taxModel;
    },
    discountApply() {
      this.dicount_per_apply = this.dicount_per;
      this.showDiscountModel();
    },
    taxApply() {
      this.tax_per_apply = 0;
      var page_url = "/api/admin/warehouse/" + this.selectedWarehouse.id;
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
    getProduct(page_url) {
      // var page_url = "/api/admin/product";
      // page_url += "?limit=2&getDetail=1&getCategory=1";

      let vm = this;
      page_url = page_url || "/api/admin/product";
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
      page_url += "&getDetail=1&getCategory=1";

      axios.get(page_url, this.token).then((res) => {
        this.list_products = res.data.data;
        vm.makePagination(res.data.meta, res.data.links);

        this.showSideBarProduct();
      });
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
    logout() {
      var page_url = "/api/admin/logout";
      axios.post(page_url, "", this.token).then((res) => {
        localStorage.removeItem("token");
        localStorage.removeItem("loggedIn");
        localStorage.removeItem("email");
        localStorage.removeItem("first_name");
        localStorage.removeItem("last_name");
        window.location.reload();
      });
    },
    showSideBarProduct() {
      var data = this.list_products;
      this.category_products = [];
      for (var i = 0; i < data.length; i++) {
        if (this.select_category != "all") {
          var continue_loop = 0;
          for (var loop = 0; loop < data[i].category.length; loop++) {
            if (data[i].category[loop].category_detail != null) {
              if (
                data[i].category[loop].category_detail.id ==
                  this.select_category ||
                data[i].category[loop].category_detail.parent_id ==
                  this.select_category
              ) {
                continue_loop = 1;
                break;
              }
            }
          }
          if (continue_loop == 0) {
            continue;
          }
        }
        console.log("123");

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
            this.category_products.push(parms);
          }
        } else {
          var parms = {};
          parms["product_name"] = data[i].detail[0].title;
          parms["product_id"] = data[i].product_id;
          parms["product_combination_id"] = "";
          parms["product_type"] = data[i].product_type;

          if (data[i].product_gallary != null) {
            parms["image"] = data[i].product_gallary.gallary_name;
          }
          this.category_products.push(parms);
        }
      }
    },
    qtyInc(product_id, product_combination_id, val, product_type) {
      var product_type = "simple";
      if (product_combination_id != null && product_combination_id != undefined)
        product_type = "variable";
      val = parseInt(val);
      var page_url =
        "/api/admin/available_qty?product_id=" +
        product_id +
        "&product_combination_id=" +
        product_combination_id +
        "&product_type=" +
        product_type +
        "&warehouse=" +
        this.selectedWarehouse.id;
      axios.get(page_url, this.token).then((res) => {
        if (res.data.data.remaining_stock > val) {
          for (var i = 0; i < this.add_to_cart_products.length; i++) {
            if (
              this.add_to_cart_products[i].product_id == product_id &&
              this.add_to_cart_products[i].product_combination_id ==
                product_combination_id
            ) {
              this.add_to_cart_products[i].qty = val;
              this.add_to_cart_products[i].subtotal =
                this.add_to_cart_products[i].discount > 0
                  ? parseFloat(
                      +(+val * this.add_to_cart_products[i].discount)
                    ).toFixed(2)
                  : parseFloat(
                      +(+val * this.add_to_cart_products[i].price)
                    ).toFixed(2);

              this.add_to_cart_products[i].actual_price = parseFloat(
                +(+val * this.add_to_cart_products[i].price)
              ).toFixed(2);

              break;
            }
          }
        } else {
          this.$toaster.error("Product is out of stock");
        }
      });
    },
    removeProduct(product_id, product_combination_id) {
      for (var i = 0; i < this.add_to_cart_products.length; i++) {
        if (
          this.add_to_cart_products[i].product_id == product_id &&
          this.add_to_cart_products[i].product_combination_id ==
            product_combination_id
        ) {
          this.add_to_cart_products.splice(i, 1);
          break;
        }
      }
    },
    getCategory() {
      var page_url = "/api/admin/category";
      page_url += "?getGallary=1&getDetail=1&limit=1000";
      axios.get(page_url, this.token).then((res) => {
        this.categories = res.data.data;
      });
    },
    getCustomer() {
      var page_url = "/api/admin/customer";
      page_url += "?getGallary=1&getDetail=1&limit=1000";
      axios.get(page_url, this.token).then((res) => {
        this.customers = res.data.data;
      });
    },
    getWarehouse() {
      var page_url = "/api/admin/warehouse";
      page_url += "?getGallary=1&getDetail=1&limit=1000";
      axios.get(page_url, this.token).then((res) => {
        if (res.data.status == "Success") {
          this.warehouses = res.data.data;
        }
      });
    },
    searchProduct(val) {
      var data = this.list_products;
      this.searchFilters = [];
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
            parms["product_combination_id"] =
              data[i].combination_detail[k].product_combination_id;
            var parms_product = {};
            parms_product["sku"] = data[i].combination_detail[k].sku;
            parms_product["product_price"] =
              data[i].combination_detail[k].price;
            parms_product["discount"] = data[i].combination_detail[k].price;
            parms_product["discount_show"] =
              data[i].combination_detail[k].price;
            parms_product["subtotal"] = data[i].combination_detail[k].price;
            parms["product"] = parms_product;
            this.searchFilters.push(parms);
          }
        } else {
          var parms = {};
          parms["product_name"] = data[i].detail[0].title;
          parms["product_id"] = data[i].product_id;
          parms["product_combination_id"] = "";

          var parms_product = {};
          parms_product["product_price"] = data[i].price;
          parms_product["sku"] = data[i].product_sku;
          parms_product["discount"] = data[i].product_discount_price;
          parms_product["discount_show"] = data[i].product_discount_price;
          parms_product["subtotal"] =
            +data[i].price - +data[i].product_discount_price;
          parms["product"] = parms_product;

          this.searchFilters.push(parms);
        }
      }
    },

    addProductInList(product_id, product_combination_id, product_type) {
      var page_url =
        "/api/admin/available_qty?product_id=" +
        product_id +
        "&product_combination_id=" +
        product_combination_id +
        "&product_type=" +
        product_type +
        "&warehouse=" +
        this.selectedWarehouse.id;
      axios.get(page_url, this.token).then((res) => {
        if (res.data.data.remaining_stock > 0) {
          var data = this.list_products;
          data = data.filter((query) => query.product_id == product_id);
          this.saveProducttoCart(data, product_combination_id);
        } else {
          this.$toaster.error("Product is out of stock");
        }
      });
    },

    getSearchDataDetail() {
      if (this.sortBy == "name") {
        var val = document.getElementById("basicInput1").value;
        var opts = document.getElementById("browsers").childNodes;
      } else {
        var val = document.getElementById("basicInput2").value;
        var opts = document.getElementById("browsers1").childNodes;
      }
      for (var i = 0; i < opts.length; i++) {
        if (opts[i].value === val) {
          var product_id = opts[i].getAttribute("product_id");
          var product_combination_id = opts[i].getAttribute(
            "product_combination_id"
          );
          var data = this.list_products;
          // alert('product_id '+product_id+ 'product_combination_id = '+product_combination_id)
          data = data.filter((query) => query.product_id == product_id);
          this.saveProducttoCart(data, product_combination_id);
          break;
        }
      }
    },
    saveProducttoCart(data, product_combination_id) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].product_type == "variable") {
          for (var k = 0; k < data[i].combination_detail.length; k++) {
            if (
              data[i].combination_detail[k].product_combination_id ==
              product_combination_id
            ) {
              var is_exist = this.add_to_cart_products.filter((query) => {
                if (
                  query.product_id == data[i].product_id &&
                  data[i].combination_detail[k].product_combination_id ==
                    query.product_combination_id
                ) {
                  return true;
                }
              });
              if (is_exist.length > 0) {
                return;
              }

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
              parms["discount"] = data[i].combination_detail[k].price;
              parms["discount_show"] = data[i].combination_detail[k].price;
              parms["product_combination_id"] =
                data[i].combination_detail[k].product_combination_id;
              parms["price"] = data[i].combination_detail[k].price;

              parms["subtotal"] = parseFloat(
                data[i].combination_detail[k].price
              ).toFixed(2);
              parms["qty"] = 1;
              parms["actual_price"] = +data[i].combination_detail[k].price;
              this.add_to_cart_products.push(parms);
            }
          }
        } else {
          var is_exist = this.add_to_cart_products.filter((query) => {
            if (query.product_id == data[i].product_id) {
              return true;
            }
          });
          if (is_exist.length > 0) {
            return;
          }
          console.log("3");
          var parms = {};
          parms["product_name"] = data[i].detail[0].title;
          parms["product_id"] = data[i].product_id;
          parms["product_combination_id"] = "";
          parms["discount"] =
            data[i].product_discount_price > 0
              ? data[i].product_discount_price
              : data[i].product_price;
          parms["discount_show"] =
            data[i].product_discount_price > 0
              ? data[i].product_discount_price
              : data[i].product_price;
          parms["price"] = data[i].product_price;
          parms["subtotal"] =
            data[i].product_discount_price > 0
              ? parseFloat(+data[i].product_discount_price).toFixed(2)
              : parseFloat(+data[i].product_price).toFixed(2);
          parms["qty"] = 1;
          parms["actual_price"] = +data[i].product_price;

          this.add_to_cart_products.push(parms);
        }
      }
    },
    getSetting() {
      var page_url = "/api/admin/setting";
      page_url += "?type=pos";
      axios.get(page_url, this.token).then((res) => {
        this.settings = res.data.data;
        var temp = this.settings.filter((query) => {
          if (query.setting_key == "default_customer") {
            return true;
          }
        });
        if (temp[0].setting_value) {
          var customer_data = this.customers.filter((query) => {
            if (query.customer_id == temp[0].setting_value) {
              return true;
            }
          });

          if (customer_data[0].customer_first_name) {
            this.selectedCustomer = {
              id: temp[0].setting_value,
              text: customer_data[0].customer_first_name,
            };
          }
        }

        var temp = this.settings.filter((query) => {
          if (query.setting_key == "default_warehouse") {
            return true;
          }
        });
        if (temp[0].setting_value) {
          var warehouse_data = this.warehouses.filter((query) => {
            if (query.warehouse_id == temp[0].setting_value) {
              return true;
            }
          });

          if (warehouse_data[0].warehouse_name) {
            this.selectedWarehouse = {
              id: temp[0].setting_value,
              text: warehouse_data[0].warehouse_name,
            };

            this.taxApply();
          }
        }
      });

      var page_url = "/api/admin/setting";
      page_url += "?type=business_general";
      axios.get(page_url, this.token).then((res) => {
        this.settings = res.data.data;
        var temp = this.settings.filter((query) => {
          if (query.setting_key == "address") {
            return true;
          }
        });
        if (temp[0].setting_value) {
          this.businessAddress = temp[0].setting_value;
        }
        var temp = this.settings.filter((query) => {
          if (query.setting_key == "phone_number") {
            return true;
          }
        });
        if (temp[0].setting_value) {
          this.businessPhone = temp[0].setting_value;
        }
      });
    },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.getCustomer();
    this.getWarehouse();
    this.getSetting();
    this.getProduct();
    this.getCategory();

    this.login_name = localStorage.getItem("name");
  },
};
</script>


<style scoped>
.calu {
  position: absolute;
  top: 100%;
  right: 10px;
  z-index: 1000;
  float: left;
  min-width: 10rem;
  padding: 0.5rem 0;
  margin: 0.125rem 0 0;
  font-size: 1rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 0.25rem;
}
</style>