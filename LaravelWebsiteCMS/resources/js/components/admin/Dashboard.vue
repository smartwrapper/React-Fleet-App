<template>
  <div>
    <div
      class="row"
      style="justify-content: center; align-items: center !important"
      v-if="!$parent.permissions.includes('dashboard')"
    >
      <div class="notfound" style="margin-top: 200px">
        <p>You Don't Have Permission To View Dashboard</p>
      </div>
    </div>
    <div class="row" v-if="$parent.permissions.includes('dashboard')">
      <div class="col-lg-6 col-xl-3">
        <div
          class="
            card card-custom
            gutter-b
            bg-white
            border-0
            theme-circle theme-circle-primary
          "
        >
          <div class="card-body">
            <h3 class="text-body font-weight-bold">Orders</h3>
            <div class="mt-3">
              <div class="d-flex align-items-center">
                <span class="text-dark font-weight-bold font-size-h1 mr-3"
                  ><span class="counter">
                    {{ totalOrders }}
                  </span></span
                >
                <span
                  class="font-weight-bold font-size-h0"
                  :class="OrderPercentage < 0 ? 'text-danger' : 'text-success'"
                >
                  {{ OrderPercentage }}
                </span>
                <span
                  class="svg-icon"
                  :class="OrderPercentage < 0 ? 'text-danger' : 'text-success'"
                >
                  <i
                    :class="
                      OrderPercentage < 0 ? 'fa-arrow-down' : 'fa-arrow-up'
                    "
                    class="fas"
                  ></i>
                </span>
              </div>
              <div class="text-black-50 mt-3">
                Compare to last year ({{ lastYear }})
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-3">
        <div
          class="
            card card-custom
            gutter-b
            bg-white
            border-0
            theme-circle theme-circle theme-circle-secondary
          "
        >
          <div class="card-body">
            <h3 class="text-body font-weight-bold">Products</h3>
            <div class="mt-3">
              <div class="d-flex align-items-center">
                <span class="text-dark font-weight-bold font-size-h1 mr-3"
                  ><span class="counter">
                    {{ totalProducts }}
                  </span></span
                >
                <span
                  class="font-weight-bold font-size-h0"
                  :class="
                    ProductPercentage < 0 ? 'text-danger' : 'text-success'
                  "
                >
                  {{ ProductPercentage }}
                </span>
                <span
                  class="svg-icon"
                  :class="
                    ProductPercentage < 0 ? 'text-danger' : 'text-success'
                  "
                >
                  <i
                    :class="
                      ProductPercentage < 0 ? 'fa-arrow-down' : 'fa-arrow-up'
                    "
                    class="fas"
                  ></i>
                </span>
              </div>
              <div class="text-black-50 mt-3">
                Compare to last year ({{ lastYear }})
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-3">
        <div
          class="
            card card-custom
            gutter-b
            bg-white
            border-0
            theme-circle theme-circle-success
          "
        >
          <div class="card-body">
            <h3 class="text-body font-weight-bold">Users</h3>
            <div class="mt-3">
              <div class="d-flex align-items-center">
                <span class="text-dark font-weight-bold font-size-h1 mr-3"
                  ><span class="counter">
                    {{ totalCustomers }}
                  </span></span
                >
                <span
                  class="font-weight-bold font-size-h0"
                  :class="
                    CustomerPercentage < 0 ? 'text-danger' : 'text-success'
                  "
                >
                  {{ CustomerPercentage }}
                </span>
                <span
                  class="svg-icon"
                  :class="
                    CustomerPercentage < 0 ? 'text-danger' : 'text-success'
                  "
                >
                  <i
                    :class="
                      CustomerPercentage < 0 ? 'fa-arrow-down' : 'fa-arrow-up'
                    "
                    class="fas"
                  ></i>
                </span>
              </div>
              <div class="text-black-50 mt-3">
                Compare to last year ({{ lastYear }})
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-3">
        <div
          class="
            card card-custom
            gutter-b
            bg-white
            border-0
            theme-circle theme-circle-info
          "
        >
          <div class="card-body">
            <h3 class="text-body font-weight-bold">Sales</h3>
            <div class="mt-3">
              <div class="d-flex align-items-center">
                <span class="text-dark font-weight-bold font-size-h1 mr-3"
                  >$<span class="counter">
                    {{ totalSales }}
                  </span></span
                >
                <span
                  class="font-weight-bold font-size-h0"
                  :class="SalePercentage < 0 ? 'text-danger' : 'text-success'"
                >
                  {{ SalePercentage }}
                </span>
                <span
                  class="svg-icon"
                  :class="SalePercentage < 0 ? 'text-danger' : 'text-success'"
                >
                  <i
                    :class="
                      SalePercentage < 0 ? 'fa-arrow-down' : 'fa-arrow-up'
                    "
                    class="fas"
                  ></i>
                </span>
              </div>
              <div class="text-black-50 mt-3">
                Compare to last year ({{ lastYear }})
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" v-if="$parent.permissions.includes('dashboard')">
      <div class="col-lg-6 col-xl-8">
        <div class="card card-custom gutter-b bg-white border-0">
          <div class="card-header align-items-center border-0">
            <div class="card-title mb-0">
              <h3 class="card-label text-body font-weight-bold mb-0">Users</h3>
            </div>
          </div>
          <div class="card-body pt-3">
            <div id="chart">
              <apexchart
                type="line"
                height="350"
                :options="chartOptions"
                :series="series"
              ></apexchart>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-xl-4">
        <div class="card card-custom gutter-b bg-white border-0">
          <div class="card-header align-items-center border-0">
            <div class="card-title mb-0">
              <h3 class="card-label text-body font-weight-bold mb-0">
                Last Update
              </h3>
            </div>
          </div>
          <div class="card-body px-0">
            <ul class="list-group scrollbar-1" style="height: 300px">
              <li
                class="
                  list-group-item list-group-item-action
                  border-0
                  d-flex
                  align-items-center
                  justify-content-between
                  py-2
                "
              >
                <div class="list-left d-flex align-items-center">
                  <span
                    class="
                      d-flex
                      align-items-center
                      justify-content-center
                      rounded
                      svg-icon
                      w-45px
                      h-45px
                      bg-primary
                      text-white
                      mr-2
                    "
                  >
                    <svg
                      width="20px"
                      height="20px"
                      viewBox="0 0 16 16"
                      class="bi bi-lightning-fill"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"
                      />
                    </svg>
                  </span>
                  <div class="list-content">
                    <span class="list-title text-body">Total Products</span>
                    <small class="text-muted d-block"
                      >{{ thisWeekProducts }} New Products</small
                    >
                  </div>
                </div>
                <span>{{ totalProducts }}</span>
              </li>
              <li
                class="
                  list-group-item list-group-item-action
                  border-0
                  d-flex
                  align-items-center
                  justify-content-between
                  py-2
                "
              >
                <div class="list-left d-flex align-items-center">
                  <span
                    class="
                      d-flex
                      align-items-center
                      justify-content-center
                      rounded
                      svg-icon
                      w-45px
                      h-45px
                      bg-secondary
                      text-white
                      mr-2
                    "
                  >
                    <svg
                      width="20px"
                      height="20px"
                      viewBox="0 0 16 16"
                      class="bi bi-bar-chart-line-fill"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"
                      />
                    </svg>
                  </span>
                  <div class="list-content">
                    <span class="list-title text-body">Total Sales</span>
                    <small class="text-muted d-block"
                      >{{ thisWeekSales }} New Sales</small
                    >
                  </div>
                </div>
                <span>{{ totalSales }}</span>
              </li>

              <li
                class="
                  list-group-item list-group-item-action
                  border-0
                  d-flex
                  align-items-center
                  justify-content-between
                  py-2
                "
              >
                <div class="list-left d-flex align-items-center">
                  <span
                    class="
                      d-flex
                      align-items-center
                      justify-content-center
                      rounded
                      svg-icon
                      w-45px
                      h-45px
                      bg-secondary
                      text-white
                      mr-2
                    "
                  >
                    <svg
                      width="20px"
                      height="20px"
                      viewBox="0 0 16 16"
                      class="bi bi-bar-chart-line-fill"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"
                      />
                    </svg>
                  </span>
                  <div class="list-content">
                    <span class="list-title text-body">Total Order</span>
                    <small class="text-muted d-block"
                      >{{ thisWeekOrders }} New Sales</small
                    >
                  </div>
                </div>
                <span>{{ totalOrders }}</span>
              </li>

              <li
                class="
                  list-group-item list-group-item-action
                  border-0
                  d-flex
                  align-items-center
                  justify-content-between
                  py-2
                "
              >
                <div class="list-left d-flex align-items-center">
                  <span
                    class="
                      d-flex
                      align-items-center
                      justify-content-center
                      rounded
                      svg-icon
                      w-45px
                      h-45px
                      bg-warning
                      text-white
                      mr-2
                    "
                  >
                    <svg
                      width="20px"
                      height="20px"
                      viewBox="0 0 16 16"
                      class="bi bi-lightning-fill"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"
                      />
                    </svg>
                  </span>
                  <div class="list-content">
                    <span class="list-title text-body">Total Users</span>
                    <small class="text-muted d-block"
                      >{{ thisWeekCustomer }}New Users</small
                    >
                  </div>
                </div>
                <span>{{ totalCustomers }}</span>
              </li>
              <!-- <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between py-2">
                            <div class="list-left d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center rounded svg-icon w-45px h-45px bg-info text-white mr-2">
                                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                                    </svg>
                                </span>
                                <div class="list-content">
                                    <span class="list-title text-body">Total Visits</span>
                                    <small class="text-muted d-block">New Visits</small>
                                </div>
                            </div>
                            <span>4.6k</span>
                        </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row" v-if="$parent.permissions.includes('dashboard')">
      <div class="col-lg-12 col-xl-12">
        <div class="card card-custom gutter-b bg-white border-0">
          <div class="card-header align-items-center border-0">
            <div class="card-title mb-0">
              <h3 class="card-label font-weight-bold mb-0 text-body">
                Monthly Sales
              </h3>
            </div>
          </div>
          <div class="card-body pt-3">
            <div id="chart">
              <apexchart
                type="line"
                height="350"
                :options="saleChartOptions"
                :series="saleSeries"
              ></apexchart>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" v-if="$parent.permissions.includes('dashboard')">
      <div class="col-lg-12 col-xl-12">
        <div class="card card-custom gutter-b bg-white border-0">
          <div class="card-body">
            <div>
              <div class="kt-table-content table-responsive">
                <Order />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Order from "./Orders";
import VueApexCharts from "vue-apexcharts";

export default {
  name: "Dashboard",
  components: {
    Order,
    apexchart: VueApexCharts,
  },
  data() {
    return {
      loading: false,
      lastYearCustomers: 0,
      lastYearOrders: 0,
      lastYearProducts: 0,
      thisYearCustomers: 0,
      thisYearOrders: 0,
      thisYearProducts: 0,
      totalCustomers: 0,
      totalOrders: 0,
      totalProducts: 0,
      OrderPercentage: 0,
      ProductPercentage: 0,
      CustomerPercentage: 0,
      lastYear: "",
      totalSales: 0,
      thisYearSales: 0,
      lastYearSales: 0,
      SalePercentage: 0,
      thisWeekCustomer: 0,
      thisWeekOrders: 0,
      thisWeekProducts: 0,
      thisWeekSales: 0,
      series: [
        {
          name: "Customers",
          data: [],
        },
      ],
      chartOptions: {
        chart: {
          height: 350,
          type: "line",
          zoom: {
            enabled: false,
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "straight",
        },
        title: {
          text: "Monthly Users",
          align: "left",
        },
        grid: {
          row: {
            colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
            opacity: 0.5,
          },
        },
        xaxis: {
          categories: [],
        },
      },
      saleSeries: [
        {
          name: "Customers",
          data: [],
        },
      ],
      saleChartOptions: {
        chart: {
          height: 350,
          type: "line",
          zoom: {
            enabled: false,
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "straight",
        },
        title: {
          text: "Monthly Sales",
          align: "left",
        },
        grid: {
          row: {
            colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
            opacity: 0.5,
          },
        },
        xaxis: {
          categories: [],
        },
      },
    };
  },
  methods: {
    calculateOrders() {
      if (this.lastYearOrders < this.thisYearOrders)
        this.OrderPercentage =
          ((parseInt(this.thisYearOrders) - parseInt(this.lastYearOrders)) /
            parseInt(this.thisYearOrders)) *
          100;
      else if (this.lastYearOrders > this.thisYearOrders)
        this.OrderPercentage =
          (parseInt(this.thisYearOrders) - parseInt(this.lastYearOrders)) /
          parseInt(this.thisYearOrders) /
          100;
    },
    calculateProducts() {
      if (this.lastYearProducts < this.thisYearProducts)
        this.ProductPercentage =
          ((parseInt(this.thisYearProducts) - parseInt(this.lastYearProducts)) /
            parseInt(this.thisYearProducts)) *
          100;
      else if (this.lastYearProducts > this.thisYearProducts)
        this.ProductPercentage =
          (parseInt(this.thisYearProducts) - parseInt(this.lastYearProducts)) /
          parseInt(this.thisYearProducts) /
          100;
    },
    calculateCustomers() {
      if (this.lastYearCustomers < this.thisYearCustomers)
        this.CustomerPercentage =
          ((parseInt(this.thisYearCustomers) -
            parseInt(this.lastYearCustomers)) /
            parseInt(this.thisYearCustomers)) *
          100;
      else if (this.lastYearCustomers > this.thisYearCustomers)
        this.CustomerPercentage =
          (parseInt(this.thisYearCustomers) -
            parseInt(this.lastYearCustomers)) /
          parseInt(this.thisYearCustomers) /
          100;
    },
    calculateSales() {
      if (this.lastYearSales < this.thisYearSales)
        this.SalePercentage =
          ((parseInt(this.thisYearSales) - parseInt(this.lastYearSales)) /
            parseInt(this.thisYearSales)) *
          100;
      else if (this.lastYearSales > this.thisYearSales)
        this.SalePercentage =
          (parseInt(this.thisYearSales) - parseInt(this.lastYearSales)) /
          parseInt(this.thisYearSales) /
          100;
    },
    getDashboardStats() {
      this.$parent.loading = true;
      let page_url = "/api/admin/dashboard";

      axios
        .get(page_url, this.token)
        .then((res) => {
          let data = res.data;
          this.lastYearCustomers = parseInt(data.lastYearCustomers);
          this.lastYearOrders = parseInt(data.lastYearOrders);
          this.lastYearProducts = parseInt(data.lastYearProducts);
          this.thisYearCustomers = parseInt(data.thisYearCustomers);
          this.thisYearOrders = parseInt(data.thisYearOrders);
          this.thisYearProducts = parseInt(data.thisYearProducts);
          this.totalCustomers = parseInt(data.totalCustomers);
          this.totalOrders = parseInt(data.totalOrders);
          this.totalProducts = parseInt(data.totalProducts);
          this.lastYear = data.lastYear;
          this.totalSales = data.totalSales;
          this.thisYearSales = data.thisYearSales;
          this.lastYearSales = data.lastYearSales;
          this.thisWeekOrders = data.lastYearOrders;
          this.thisWeekProducts = data.thisWeekProducts;
          this.thisWeekCustomer = data.thisWeekCustomer;
          this.thisWeekSales = data.thisWeekSales;
          this.calculateOrders();
          this.calculateProducts();
          this.calculateCustomers();

          if (data.customerMonthly.length > 0) {
            var seiresData = [];
            var categories = [];
            for (var i = 0; i < data.customerMonthly.length; i++) {
              seiresData.push(data.customerMonthly[i].id);
              categories[i] = data.customerMonthly[i].month;
            }
            this.series = [{ name: "Customers", data: seiresData }];
            this.chartOptions = {
              ...this.chartOptions,
              ...{
                xaxis: {
                  categories,
                },
              },
            };
          }
          if (data.saleMonthly.length > 0) {
            var saleSeriesData = [];
            var salCategories = [];
            for (var i = 0; i < data.saleMonthly.length; i++) {
              saleSeriesData.push(data.saleMonthly[i].amount);
              salCategories[i] = data.saleMonthly[i].month;
            }
            this.saleSeries = [{ name: "Sales", data: saleSeriesData }];
            this.saleChartOptions = {
              ...this.saleChartOptions,
              ...{
                xaxis: {
                  categories: salCategories,
                },
              },
            };
          }
          console.log(this.saleSeries, this.saleChartOptions);
        })
        .finally(() => (this.$parent.loading = false));
    },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };

    this.getDashboardStats();
  },
};
</script>