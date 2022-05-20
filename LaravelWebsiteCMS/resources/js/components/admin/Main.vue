<style>
.tabslang {
  display: flex;
  cursor: pointer;
}

.tablang {
  padding: 5px;
}

.tablang.active {
  background: #ae69f5;
  color: white;
}
</style>
<template>
  <div>
    <div class="se-pre-con" v-if="loading">
      <div class="pre-loader">
        <img
          class="img-fluid"
          src="/assets/images/loadergif.gif"
          alt="loading"
        />
      </div>
    </div>
    <MobileHeader />
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <Sidebar :burgerMenu="burgerMenu" />

        <div class="aside-overlay" :class="burgerMenu ? 'active' : ''"></div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="tc_wrapper">
          <Header @setBurgerMenu="setBurgerMenu" />
          <!--begin::Content-->
          <div
            class="content d-flex flex-column flex-column-fluid"
            id="tc_content"
          >
            <BreadCrumb />
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
              <!--begin::Container-->
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <router-view
                      :loading="1"
                      :permissions="permissions"
                      warehouse="warehouse"
                      globalSettings="globalSettings"
                    ></router-view>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <Footer /> -->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- <ToolBar /> -->
    <!-- <ColorPanel /> -->
  </div>
</template>

<script>
import MobileHeader from "./partials/MobileHeader";
import Header from "./partials/Header";
import Sidebar from "./partials/Sidebar";
import Footer from "./partials/Footer";
import ToolBar from "./partials/ToolBar";
import ColorPanel from "./partials/ColorPanel";
import BreadCrumb from "./partials/BreadCrumbs";

export default {
  name: "Main",
  components: {
    MobileHeader,
    ToolBar,
    ColorPanel,
    Sidebar,
    Header,
    Footer,
    BreadCrumb,
  },
  data() {
    return {
      loading: false,
      burgerMenu: false,
      permissions: [],
      warehouse: [],
      globalSettings: {},
    };
  },
  methods: {
    setBurgerMenu() {
      this.burgerMenu = !this.burgerMenu;
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
        .get("/api/admin/setting", config)
        .then((res) => {
          for (var i = 0; i < res.data.data.length; i++) {
            Object.assign(responseData, {
              [res.data.data[i].setting_key]: res.data.data[i].setting_value,
            });
          }
          this.globalSettings = responseData;
          console.log(this.globalSettings,'from main');
        })
        .finally(() => console.log("working"));
    },
  },
  mounted() {
    this.fetchSetting();
    
  },
  created() {
    if (localStorage.getItem("permissions")) {
      this.permissions = localStorage.getItem("permissions").split(",");
      
        if (
            this.$route.name !== "dashboard" &&
            !this.permissions.includes(this.$route.name)
        ) {
            this.$router.push("/admin/accessdenied");
        }
    }
  },
};
</script>


