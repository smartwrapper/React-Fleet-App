
<template>
  <div>
    <div
      class="aside aside-left aside-fixed d-flex flex-column flex-row-auto"
      :class="burgerMenu ? 'aside-on' : ''"
      id="tc_aside"
    >
      <!--begin::Brand-->
      <div class="brand flex-column-auto" id="tc_brand">
        <!--begin::Logo-->

        <router-link to="/admin/dashboard" class="brand-logo">
          <img
            class="brand-image"
            style="height: 25px"
            alt="Logo"
            src="/assets/images/misc/r.png"
          />
          <span class="brand-text"
            ><img
              style="height: 25px"
              alt="Logo"
              src="/assets/images/misc/logo.png"
          /></span>
        </router-link>
        <!--end::Logo-->
      </div>

      <!--begin::Aside Menu-->
      <div
        class="aside-menu-wrapper flex-column-fluid overflow-auto h-100"
        id="tc_aside_menu_wrapper"
      >
        <!--begin::Menu Container-->
        <div
          id="tc_aside_menu"
          class="aside-menu mb-5"
          data-menu-vertical="1"
          data-menu-scroll="1"
          data-menu-dropdown-timeout="500"
        >
          <!--begin::Menu Nav-->
          <div id="accordion">
            <ul class="nav flex-column">
              <!--begin::Nav Dashboard -->

              <li class="nav-item">
                <router-link to="/admin/dashboard" class="nav-link">
                  <span class="svg-icon nav-icon">
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
                      class="feather feather-home"
                    >
                      <path
                        d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"
                      ></path>
                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                  </span>
                  <span class="nav-text"> Dashboard </span>
                </router-link>
              </li>

              <!--begin::Nav Media -->

              <li class="nav-item" v-if="$parent.permissions.includes('media')">
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="javascript:void(0)"
                  data-target="#media"
                  role="button"
                  aria-expanded="false"
                  aria-controls="media"
                  @click.prevent="setActive('media')"
                  :class="{ active: isActive('media') }"
                >
                  <span class="svg-icon nav-icon">
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
                      class="feather feather-image"
                    >
                      <rect
                        x="3"
                        y="3"
                        width="18"
                        height="18"
                        rx="2"
                        ry="2"
                      ></rect>
                      <circle cx="8.5" cy="8.5" r="1.5"></circle>
                      <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                  </span>
                  <span class="nav-text">Media</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('media') }"
                  class="nav-collapse"
                  id="media"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('media-settings')"
                    >
                      <router-link
                        to="/admin/media-setting"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>

                        <span class="nav-text">Media Settings</span>
                      </router-link>
                    </li>

                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('manage-media')"
                    >
                      <router-link
                        to="/admin/media"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Manage Media</span>
                      </router-link>
                    </li>
                  </ul>
                </div>
              </li>

              <!--begin::Nav Catalog -->

              <li
                class="nav-item"
                v-if="$parent.permissions.includes('catalog')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="javascript:void(0)"
                  @click.prevent="setActive('catalog')"
                  :class="{ active: isActive('catalog') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-boxes font-size-h4"></i>
                  </span>
                  <span class="nav-text">Catalog</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('catalog') }"
                  class="nav-collapse"
                  id="catalog"
                  data-parent="#accordion"
                >
                  <div id="accordion1">
                    <ul class="nav flex-column">
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('product-unit-list')"
                      >
                        <router-link
                          to="/admin/product-unit"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Product Units</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('product-attribute-list')
                        "
                      >
                        <router-link
                          to="/admin/product-attribute"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Product Attributes</span>
                        </router-link>
                      </li>

                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('product-variation-list')
                        "
                      >
                        <router-link
                          to="/admin/product-variation"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Product Variations</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('product-brand-list')
                        "
                      >
                        <router-link
                          to="/admin/product-brand"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Product Brands</span>
                        </router-link>
                      </li>

                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('product-category-list')
                        "
                      >
                        <router-link
                          to="/admin/product-category"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Product Categories</span>
                        </router-link>
                      </li>

                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('product-list')"
                      >
                        <a
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          @click.prevent="setChildActive('product')"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Products</span>
                          <i class="fas fa-chevron-right fa-rotate-90"></i>
                        </a>
                        <!-- <div class="collapse nav-collapse" id="catalogProduct" data-parent="#accordion1">
                                                
                                            </div> -->
                        <ul
                          class="nav flex-column"
                          :style="
                            activeChildItem == 'product' && toggleChildMenu
                              ? 'display:block'
                              : 'display:none'
                          "
                        >
                          <li
                            class="nav-item"
                            v-if="$parent.permissions.includes('product-list')"
                          >
                            <router-link
                              to="/admin/products"
                              class="nav-link mini-sub-nav-link"
                            >
                              <span class="nav-text">List Products</span>
                            </router-link>
                          </li>

                          <li
                            class="nav-item"
                            v-if="
                              $parent.permissions.includes('product-manage')
                            "
                          >
                            <router-link
                              to="/admin/add-product"
                              class="nav-link mini-sub-nav-link"
                            >
                              <span class="nav-text">Add Product</span>
                            </router-link>
                          </li>
                        </ul>
                      </li>

                      <!-- <li class="nav-item">
                                            <a href="product-barcode.html" class="nav-link sub-nav-link">
                                                <span class="svg-icon nav-icon d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    </svg>
                                                </span>
                                                <span class="nav-text">Product Bar code Label</span>
                                            </a>
                                        </li> -->

                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('product-reviews')"
                      >
                        <router-link
                          to="/admin/product-reviews"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Product Reviews</span>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>

              <!--begin::Nav Product Stock / Inventory -->

              <li class="nav-item" v-if="$parent.permissions.includes('stock')">
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="javascript:void(0)"
                  @click.prevent="setActive('stock')"
                  :class="{ active: isActive('stock') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-boxes font-size-h4"></i>
                  </span>
                  <span class="nav-text">Stock / Inventory</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                
                <div
                  :class="{ 'collapse nav-collapse': !isActive('stock') }"
                  class="nav-collapse"
                  id="stock"
                  data-parent="#accordion"
                >
                  <div id="accordion1">
                    <ul class="nav flex-column">
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('stock-list')"
                      >
                        <router-link
                          to="/admin/stocks"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">List Stock</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('stock-manage')"
                      >
                        <router-link
                          to="/admin/add-stock"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Add Stock</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('stock-transfer-list')
                        "
                      >
                        <router-link
                          to="/admin/stock-transfers"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">List Stock Transfers</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('stock-transfer-manage')
                        "
                      >
                        <router-link
                          to="/admin/stock-transfer"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Add Stock Transfer</span>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>

              <!--begin::Nav Quotations -->

              <li
                class="nav-item"
                v-if="$parent.permissions.includes('quotation-list')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#Quotations"
                  @click.prevent="setActive('quotations')"
                  :class="{ active: isActive('quotations') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-quote-right font-size-h4"></i>
                  </span>
                  <span class="nav-text">Quotations</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('quotations') }"
                  class="nav-collapse"
                  id="Quotations"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('quotation-list')"
                    >
                      <router-link to="/admin/quotations" class="nav-link sub-nav-link">
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">List Quotations</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('quotation-manage')"
                    >
                      <a
                        href="/admin/add-quotation"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Add Quotation</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <!--begin::Nav Purchase -->

              <li
                class="nav-item"
                v-if="$parent.permissions.includes('purchase-list')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#catalogPurchase"
                  @click.prevent="setActive('purchase')"
                  :class="{ active: isActive('purchase') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-money-check-alt font-size-h4"></i>
                  </span>
                  <span class="nav-text">Purchase</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('purchase') }"
                  class="nav-collapse"
                  id="catalogPurchase"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('purchase-list')"
                    >
                      <router-link
                        to="/admin/purchases"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">List Purchases</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('purchase-manage')"
                    >
                      <router-link
                        to="/admin/add-purchase"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Add Purchase</span>
                      </router-link>
                    </li>
                  </ul>
                </div>
              </li>

              <!--begin::Nav Sell / Orders -->

              <li
                class="nav-item"
                v-if="$parent.permissions.includes('sale-order')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#order"
                  @click.prevent="setActive('sale')"
                  :class="{ active: isActive('sale') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-clipboard-check font-size-h4"></i>
                  </span>
                  <span class="nav-text">Sell / Orders</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('sale') }"
                  class="nav-collapse"
                  id="order"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <!-- <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('sale-list')"
                    >
                      <router-link
                        to="/admin/sales"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">List</span>
                      </router-link>
                    </li> -->
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('order-list')"
                    >
                      <router-link
                        to="/admin/orders"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Orders</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('sale-manage')"
                    >
                      <router-link
                        to="/admin/add-sale"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Add Sale</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('pos')"
                    >
                      <a href="/admin/pos" class="nav-link sub-nav-link">
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">POS</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <!--begin::Nav Returns -->
              <li
                class="nav-item"
                v-if="$parent.permissions.includes('return')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#Returns"
                  @click.prevent="setActive('returns')"
                  :class="{ active: isActive('returns') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-undo-alt font-size-h4"></i>
                  </span>
                  <span class="nav-text">Returns</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('returns') }"
                  class="nav-collapse"
                  id="Returns"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('sale-return-list')"
                    >
                      <router-link
                        to="/admin/sale-return"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Sale Returns</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('sale-return-manage')"
                    >
                      <router-link
                        to="/admin/add-sale-return"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Add Sale Returns</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="
                        $parent.permissions.includes('purchase-return-list')
                      "
                    >
                      <router-link
                        to="/admin/purchase-return"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Purchase Returns</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="
                        $parent.permissions.includes('purchase-return-manage')
                      "
                    >
                      <router-link
                        to="/admin/add-purchase-return"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Add Return Purchase</span>
                      </router-link>
                    </li>
                  </ul>
                </div>
              </li>

              <!--begin::Nav Accounts -->
              <li
                class="nav-item"
                v-if="$parent.permissions.includes('account')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#account"
                  @click.prevent="setActive('accounts')"
                  :class="{ active: isActive('accounts') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-file-invoice-dollar font-size-h4"></i>
                  </span>
                  <span class="nav-text">Accounts</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('accounts') }"
                  class="nav-collapse"
                  id="account"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('account-list')"
                    >
                      <router-link
                        to="/admin/account_list"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">List Accounts</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('ledger-report')"
                    >
                      <router-link
                        to="/admin/ledger"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Ledger Report</span>
                      </router-link>
                    </li>

                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('assets-adjustment')"
                    >
                      <router-link
                        to="/admin/adjustment"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Asset Adjustment</span>
                      </router-link>
                    </li>

                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('payment')"
                    >
                      <router-link
                        to="/admin/payment-adjustment"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Payments</span>
                      </router-link>
                    </li>

                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('reciepts')"
                    >
                      <router-link
                        to="/admin/reciept-adjustment"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Reciepts</span>
                      </router-link>
                    </li>

                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('expense')"
                    >
                      <router-link
                        to="/admin/expense-adjustment"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Expense</span>
                      </router-link>
                    </li>

                    <!-- <li class="nav-item">
                                        <a href="accounts-balance-sheet.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Balance Sheet</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="accounts-trial-balance.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Trial Balance</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="accounts-cashFlow.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Cash Flow</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="accounts-payment-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Payment Account Report</span>
                                        </a>
                                    </li> -->
                  </ul>
                </div>
              </li>

              <!--begin::Nav Blog -->

              <li
                class="nav-item"
                v-if="$parent.permissions.includes('blog-list')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="javascript:void(0)"
                  data-target="#blog"
                  role="button"
                  aria-expanded="false"
                  aria-controls="blog"
                  @click.prevent="setActive('blog')"
                  :class="{ active: isActive('blog') }"
                >
                  <span class="svg-icon nav-icon">
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
                      class="feather feather-image"
                    >
                      <rect
                        x="3"
                        y="3"
                        width="18"
                        height="18"
                        rx="2"
                        ry="2"
                      ></rect>
                      <circle cx="8.5" cy="8.5" r="1.5"></circle>
                      <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                  </span>
                  <span class="nav-text">News / Blogs</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('blog') }"
                  class="nav-collapse"
                  id="blog"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('blog-list')"
                    >
                      <router-link
                        to="/admin/blog"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Manage Blogs</span>
                      </router-link>
                    </li>
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('blog-manage')"
                    >
                      <router-link
                        to="/admin/blog-category"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>

                        <span class="nav-text">Blog Categories</span>
                      </router-link>
                    </li>
                  </ul>
                </div>
              </li>

              <!--begin::Nav Content Page -->

              <li
                class="nav-item"
                v-if="$parent.permissions.includes('content-page-manage')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="javascript:void(0)"
                  data-target="#contentpages"
                  role="button"
                  aria-expanded="false"
                  aria-controls="contentpages"
                  @click.prevent="setActive('contentpages')"
                  :class="{ active: isActive('contentpages') }"
                >
                  <span class="svg-icon nav-icon">
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
                      class="feather feather-image"
                    >
                      <rect
                        x="3"
                        y="3"
                        width="18"
                        height="18"
                        rx="2"
                        ry="2"
                      ></rect>
                      <circle cx="8.5" cy="8.5" r="1.5"></circle>
                      <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                  </span>
                  <span class="nav-text">Content Pages</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{
                    'collapse nav-collapse': !isActive('contentpages'),
                  }"
                  class="nav-collapse"
                  id="contentpages"
                  data-parent="#accordion"
                >
                  <ul class="nav flex-column">
                    <li
                      class="nav-item"
                      v-if="$parent.permissions.includes('content-page-manage')"
                    >
                      <router-link
                        to="/admin/content-page"
                        class="nav-link sub-nav-link"
                      >
                        <span
                          class="
                            svg-icon
                            nav-icon
                            d-flex
                            justify-content-center
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="10px"
                            height="10px"
                            fill="currentColor"
                            class="bi bi-circle"
                            viewBox="0 0 16 16"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                          </svg>
                        </span>
                        <span class="nav-text">Manage Content Pages</span>
                      </router-link>
                    </li>
                  </ul>
                </div>
              </li>

              <!--begin::Nav People -->
              <li
                class="nav-item"
                v-if="$parent.permissions.includes('people')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#People"
                  @click.prevent="setActive('people')"
                  :class="{ active: isActive('people') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-user-friends font-size-h4"></i>
                  </span>
                  <span class="nav-text">People</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('people') }"
                  class="nav-collapse"
                  id="People"
                  data-parent="#accordion"
                >
                  <div id="accordion2">
                    <ul class="nav flex-column">
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('role-list')"
                      >
                        <router-link
                          to="/admin/roles"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Role</span>
                        </router-link>
                      </li>
                      <!-- <li class="nav-item">
                                            <router-link to="/admin/biller" class="nav-link sub-nav-link">
                                                <span class="svg-icon nav-icon d-flex justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        </svg>
                                                </span>
                                                <span class="nav-text">Billers</span>
                                            </router-link>
                                        </li> -->
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('customer-list')"
                      >
                        <router-link
                          to="/admin/customer"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Customers</span>
                        </router-link>
                      </li>

                      <!-- <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('purchaser-list')"
                      >
                        <router-link
                          to="/admin/purchasers"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Purchasers</span>
                        </router-link>
                      </li> -->

                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('user-list')"
                      >
                        <router-link
                          to="/admin/users"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Users</span>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>

              <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#expenses" @click.prevent="setActive('expenses')" :class="{ active: isActive('expenses') }">
                                <span class="svg-icon nav-icon">
                                    <i class="fas fa-money-bill font-size-h4"></i>
                                </span>
                                <span class="nav-text">Expenses</span>
                                <i class="fas fa-chevron-right fa-rotate-90"></i>
                            </a>
                            <div :class="{ 'collapse nav-collapse': !isActive('expenses') }" id="expenses" data-parent="#accordion">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="expenses-list.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="expenses-type.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Expense Type</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#reports" @click.prevent="setActive('reports')" :class="{ active: isActive('reports') }">
                                <span class="svg-icon nav-icon">
                                    <i class="fas fa-chart-line font-size-h4"></i>
                                </span>
                                <span class="nav-text">Reports</span>
                                <i class="fas fa-chevron-right fa-rotate-90"></i>
                            </a>
                            <div :class="{ 'collapse nav-collapse': !isActive('reports') }" class="nav-collapse" id="reports" data-parent="#accordion">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="profit-loss-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Profit / Loss</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="purchase-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Purchase Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="sale-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Sale Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="supplier-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Supplier Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="customer-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Customer Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="stock-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Stock Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="stock-adjustment-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Stock Adjustment Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="outOfStock-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Out of Stock Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="stock-alert-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Stock Alert Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="expense-report.html" class="nav-link sub-nav-link">
                                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                </svg>
                                            </span>
                                            <span class="nav-text">Expense Report</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->

              <!--begin::Nav Business Settings -->

              <li
                class="nav-item"
                v-if="$parent.permissions.includes('business-setting')"
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#setting"
                  @click.prevent="setActive('setting')"
                  :class="{ active: isActive('setting') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-cogs font-size-h4"></i>
                  </span>
                  <span class="nav-text">Business Settings</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('setting') }"
                  class="nav-collapse"
                  id="setting"
                  data-parent="#accordion"
                >
                  <div id="accordion3">
                    <ul class="nav flex-column">
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('general-setting')"
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/bussiness-setting"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingB"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">General Settings</span>
                        </router-link>
                      </li>

                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('warehouse-list')"
                      >
                        <router-link
                          to="/admin/warehouse"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Warehouse</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('language-list')"
                      >
                        <router-link
                          to="/admin/languages"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Language</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('currency-list')"
                      >
                        <router-link
                          to="/admin/currencies"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Currency</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('payment-methods-list')
                        "
                      >
                        <router-link
                          to="/admin/payment-methods"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Payment Methods</span>
                        </router-link>
                      </li>

                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('shipping-methods-list')
                        "
                      >
                        <router-link
                          to="/admin/shipping-methods"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Shipping Methods</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('tax-setting-list')"
                      >
                        <router-link
                          to="/admin/tax-setting"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Tax Settings</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('tax-setting-rate-list')
                        "
                      >
                        <router-link
                          to="/admin/tax-rate-setting"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Tax Rate Settings</span>
                        </router-link>
                      </li>

                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('coupon-list')"
                      >
                        <router-link
                          to="/admin/coupon-setting"
                          class="nav-link sub-nav-link"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Coupon Settings</span>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>

              <!--begin::Nav Website Settings -->
              <li
                class="nav-item"
                v-if="
                  setting.is_web_purchased === '1' &&
                  $parent.permissions.includes('website-setting')
                "
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#websetting"
                  @click.prevent="setActive('websetting')"
                  :class="{ active: isActive('websetting') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-cogs font-size-h4"></i>
                  </span>
                  <span class="nav-text">Website Settings</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('websetting') }"
                  class="nav-collapse"
                  id="websetting"
                  data-parent="#accordion"
                >
                  <div id="accordion3">
                    <ul class="nav flex-column">
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('website-setting')"
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/website-setting"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">General Settings</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('home-page-builder')"
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/home-setting"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Home Page Builder</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="$parent.permissions.includes('menu-builder')"
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/menu-builder"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Menu Builder</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('slider-bannder-manage')
                        "
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/slider-setting"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Slider Banners</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('constant-bannder-list')
                        "
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/constant-banner"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Constant Banners</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('parrallex-bannder-list')
                        "
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/home-banner"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Parallax Banners</span>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>

              <!--begin::Nav Mobile App Settings -->

              <li
                class="nav-item"
                v-if="
                  setting.is_app_purchased === '1' &&
                  $parent.permissions.includes('mobile-setting')
                "
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#appsetting"
                  @click.prevent="setActive('appsetting')"
                  :class="{ active: isActive('appsetting') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-cogs font-size-h4"></i>
                  </span>
                  <span class="nav-text">Mobile App Settings</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('appsetting') }"
                  class="nav-collapse"
                  id="appsetting"
                  data-parent="#accordion"
                >
                  <div id="accordion3">
                    <ul class="nav flex-column">
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('mobile-general-setting')
                        "
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/app-setting"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">General Settings</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes(
                            'mobile-slider-bannder-list'
                          )
                        "
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/banner-setting"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Slider Banners</span>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>

              <!--begin::Nav Delivery Boy Settings -->

              <li
                class="nav-item"
                v-if="
                  setting.is_deliveryboyapp_purchased === '1' &&
                  $parent.permissions.includes('delivery-boy-list')
                  
                "
              >
                <a
                  class="nav-link"
                  data-toggle="collapse"
                  href="#deliveryboy"
                  @click.prevent="setActive('deliveryboy')"
                  :class="{ active: isActive('deliveryboy') }"
                >
                  <span class="svg-icon nav-icon">
                    <i class="fas fa-cogs font-size-h4"></i>
                  </span>
                  <span class="nav-text">Delivery App Settings</span>
                  <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>
                <div
                  :class="{ 'collapse nav-collapse': !isActive('deliveryboy') }"
                  class="nav-collapse"
                  id="deliveryboy"
                  data-parent="#accordion"
                >
                  <div id="accordion3">
                    <ul class="nav flex-column">
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes('delivery-boy-list')
                        "
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/deliveryboy-list"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Delivery Boys List</span>
                        </router-link>
                      </li>
                      <li
                        class="nav-item"
                        v-if="
                          $parent.permissions.includes(
                            'manage-delivery-boy'
                          )
                        "
                      >
                        <router-link
                          class="nav-link sub-nav-link"
                          data-toggle="collapse"
                          to="/admin/deliveryboy"
                          role="button"
                          aria-expanded="false"
                          aria-controls="settingW"
                        >
                          <span
                            class="
                              svg-icon
                              nav-icon
                              d-flex
                              justify-content-center
                            "
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10px"
                              height="10px"
                              fill="currentColor"
                              class="bi bi-circle"
                              viewBox="0 0 16 16"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                              />
                            </svg>
                          </span>
                          <span class="nav-text">Add Delivery Boy</span>
                        </router-link>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              
            </ul>
            <br />
            <br />
            <br />
            <br />
          </div>
          <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
      </div>
      <!--end::Aside Menu-->
    </div>
  </div>
</template>
<script>
export default {
  name: "Sidebar",
  data() {
    return {
      activeItem: "",
      toggleMenu: false,
      activeChildItem: "",
      toggleChildMenu: "",
      setting: {},
    };
  },
  created: function () {
    this.setActive(this.$route.name);
  },
  methods: {
    isActive(menuItem) {
      return this.activeItem === menuItem && this.toggleMenu;
    },
    setActive(menuItem) {
      if (localStorage.getItem("menueItem") != menuItem) {
        this.toggleMenu = false;
      }
      localStorage.setItem("menueItem", menuItem);
      this.activeItem = menuItem;
      this.toggleMenu = !this.toggleMenu;
    },
    setChildActive(menuItem) {
      this.activeChildItem = menuItem;
      this.toggleChildMenu = !this.toggleChildMenu;
    },
    fetchSetting() {
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};
      axios
        .get("/api/admin/setting?type=is_purchased_setting", config)
        .then((res) => {
          for (var i = 0; i < res.data.data.length; i++) {
            Object.assign(responseData, {
              [res.data.data[i].setting_key]: res.data.data[i].setting_value,
            });
          }
          console.log(responseData, "setting ");
          this.setting = responseData;
        })
        .finally(() => console.log("working"));
    },
  },
  mounted() {
    console.log(this.$parent.permissions, "permissions");
    this.fetchSetting();
  },
  props: ["burgerMenu"],
};
</script>
