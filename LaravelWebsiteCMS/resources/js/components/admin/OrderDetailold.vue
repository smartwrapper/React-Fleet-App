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
                        Order Detail
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-12">
                <div class="row">
                  <div class="col-12 col-md-5">
                    <div class="heading">
                      <h2>
                        <small>
                          Order ID#<span class="order-no">{{ orders.order_id }}</span>
                        </small>
                      </h2>
                      <hr />
                    </div>

                    <table class="table order-id">
                      <tbody>
                        <tr class="d-flex">
                          <td class="col-6 col-md-6">Order Status</td>
                          <td class="col-6 col-md-6">
                            <select @change="statusUpdate()" class="form-control" v-model="order_status" v-if="order_status =='Pending'">
                              <option value="Pending" :selected="order_status =='Pending' ? 'selected':''">Pending</option>
                              <option value="Complete" :selected="order_status =='Complete' ? 'selected':''">Complete</option>
                              <option value="Return" :selected="order_status =='Return' ? 'selected':''">Return</option>
                              <option value="Cancel" :selected="order_status =='Cancel' ? 'selected':''">Cancel</option>
                            </select>


                             <select @change="statusUpdate()" class="form-control" v-model="order_status" v-if="order_status =='Complete'">
                              <option value="Complete" :selected="order_status =='Complete' ? 'selected':''">Complete</option>
                              <option value="Return" :selected="order_status =='Return' ? 'selected':''">Return</option>
                            </select>

                            <select @change="statusUpdate()" class="form-control" v-model="order_status" v-if="order_status =='Cancel'">
                              <option value="Complete" :selected="order_status =='Cancel' ? 'selected':''">Cancel</option>
                            </select>

                            <select @change="statusUpdate()" class="form-control" v-model="order_status" v-if="order_status =='Return'">
                              <option value="Return" :selected="order_status =='Return' ? 'selected':''">Return</option>
                            </select>
                          </td>
                        </tr>
                        <tr class="d-flex">
                          <td class="col-6 col-md-6">Order Date</td>
                          <td
                            class="underline col-6 col-md-6 order-date"
                            align="left"
                          >
                            {{ orders.order_date }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-12 col-md-7">
                    <div class="heading">
                      <h2>
                        <small> Shipping Details </small>
                      </h2>
                      <hr />
                    </div>

                    <table class="table order-id">
                      <tbody>
                        <tr class="d-flex">
                          <th>
                            Shipping Cost : 
                          </th>
                          <td>{{ orders.shipping_cost == null ? 0 : orders.shipping_cost }}</td>
                        </tr>
                        <tr class="d-flex">
                          <th>Shipping Method</th>
                          <td>
                             {{ orders.shipping_method == null ? 0 : orders.shipping_method }}
                          </td>
                        </tr>
                        <tr class="d-flex">
                            <th>Shipping Duration: </th>
                            <td>
                                {{ orders.shipping_duration == null ? 0 : orders.shipping_duration }}
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-5">
                    <div class="heading">
                      <h2>
                        <small> Billing Details </small>
                      </h2>
                      <hr />
                    </div>

                    <table class="table order-id">
                      <tbody>
                        <tr class="d-flex">
                          <th>Billing Address</th>
                          <td >
                           {{ orders.billing_street_aadress }}
                          </td>
                        </tr>
                        <tr class="d-flex">
                          <th>Billing City</th>
                          <td >
                           {{ orders.billing_city }}
                          </td>
                        </tr>
                        <tr class="d-flex">
                          <th>Billing Phone</th>
                          <td >
                           {{ orders.billing_phone }}
                          </td>
                        </tr>
                        <tr class="d-flex">
                          <th>Billing Name</th>
                          <td >
                           {{ orders.billing_first_name+' '+ orders.billing_last_name }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-12 col-md-7">
                    <div class="heading">
                      <h2>
                        <small> Payment </small>
                      </h2>
                      <hr />
                    </div>

                    <table class="table order-id">
                      <tbody>
                        
                        <tr class="d-flex">
                          <td >Payment Method</td>
                          <td >
                            {{ orders.payment_method }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <table class="table items">
                  <thead>
                    <tr class="d-flex">
                      <th class="col-2"></th>
                      <th class="col-3">ITEM"S</th>
                      <th class="col-3">PRICE</th>
                      <th class="col-2">QTY</th>
                      <th class="col-2">SUBTOTAL</th>
                    </tr>
                  </thead>
                  <tbody id="order-show-detail">
                    
                    <tr class="d-flex responsive-lay" v-for="detail in orders.order_detail" v-if="detail.product.product_type == 'variable'">
                      <td class="col-12 col-md-2">
                        <img
                          class="img-fluid order-image"
                          :src="'/gallary/'+detail.product_combination.gallary.gallary_name"
                          :alt="'/gallary/'+detail.product_combination.gallary.gallary_name"
                          style="width:50px;height:60px"

                        />
                      </td>
                      <td class="col-12 col-md-3 item-detail-left">
                        <div class="text-body">
                          <h4 class="order-product-name">
                              {{ detail.product.detail[0].title }} <span v-for="variation in detail.product_combination.combination">
                                  {{ variation.variation.detail[0].name  }}
                              </span> 
                          </h4>
                        </div>
                      </td>
                      <td class="tag-color col-12 col-md-3 order-price">
                        {{ detail.product_price }}
                      </td>
                      <td class="col-12 col-md-2">
                        <div class="input-group">
                         {{ detail.product_qty }}
                        </div>
                      </td>
                      <td class="tag-s col-12 col-md-2 order-sub-price">
                        {{ detail.product_total }}
                      </td>
                    </tr>

                    <tr class="d-flex responsive-lay" v-for="detail in orders.order_detail" v-if="detail.product.product_type == 'simple'">
                      <td class="col-12 col-md-2">
                        <img
                          class="img-fluid order-image"
                          :src="'/gallary/'+detail.product.product_gallary.gallary_name"
                          :alt="'/gallary/'+detail.product.product_gallary.gallary_name"
                          style="width:50px;height:60px"
                        />
                      </td>
                      <td class="col-12 col-md-3 item-detail-left">
                        <div class="text-body">
                          <h4 class="order-product-name">
                              {{ detail.product.detail[0].title }} 
                              </span> 
                          </h4>
                        </div>
                      </td>
                      <td class="tag-color col-12 col-md-3 order-price">
                        {{ detail.product_price }}
                      </td>
                      <td class="col-12 col-md-2">
                        <div class="input-group">
                         {{ detail.product_qty }}
                        </div>
                      </td>
                      <td class="tag-s col-12 col-md-2 order-sub-price">
                        {{ detail.product_total }}
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div class="row">
                  <div class="col-12 col-sm-12">
                    <div class="comments-area">
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1"
                          >Comments</label
                        >
                       {{ orders.order_notes }}
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
            orders:[],
            searchParameter: '',
            sortBy: 'id',
            sortType: 'ASC',
            limit: 10,
            error_message: '',
            edit: false,
            actions: false,
            pagination: {},
            request_method: "",
            is_default: "0",
            order_status:"",
            token: [],
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },

    methods: {
        fetchorders(page_url) {
            this.$parent.loading = true;
            let vm = this;
            page_url = page_url || "/api/admin/order/"+this.$route.params.id+'?orderDetail=1&productDetail=1&currency=1&billing_country=1&billing_state=1&delivery_country=1&delivery_state=1&customer=1';

            axios.get(page_url, this.token).then(res => {
                this.orders = res.data.data;
                this.order_status = this.orders.order_status
            })
            .finally(() => (this.$parent.loading = false));
        },
        statusUpdate(){
          this.$parent.loading = true;
            let vm = this;
            var page_url = "/api/admin/order/"+this.$route.params.id;

            axios.put(page_url,{order_status:this.order_status},this.token).then(res => {
               this.fetchorders();
               this.$toaster.success('Order status updated');

            })
            .finally(() => (this.$parent.loading = false));
        }
    },
    mounted() {
     
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchorders();
    },
    props: ['loading'],
};
</script>
