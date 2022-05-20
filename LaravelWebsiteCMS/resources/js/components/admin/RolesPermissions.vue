<template>
  <div>
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container-fluid">
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
                class="card-header align-items-center border-bottom-dark px-0"
              >
                <div class="card-title mb-0">
                  <h3 class="card-label mb-0 font-weight-bold text-body">
                    Roles &amp; Permisssions
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-xl-12">
            <div class="card card-custom gutter-b bg-white border-0">
              <div class="card-header border-0 align-items-center">
                <h3 class="card-label mb-0 font-weight-bold text-body">Role</h3>
              </div>
              <div class="card-body">
                <form>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <fieldset class="form-group mb-3">
                        <input
                          type="text"
                          
                          v-model="role_name"

                          class="form-control round bg-transparent text-dark"
                          placeholder="role name"
                        />
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-3">
            <div class="card card-custom gutter-b bg-white border-0 roles-main">
              <div class="card-body">
                <ul
                  class="nav flex-column nav-pills mb-3"
                  id="v-pills-tab"
                  role="tablist"
                  aria-orientation="vertical"
                >
                  <li class="nav-item" v-for="permission in permissions" v-if="permission.parent_id == '0'">
                    <a
                      class="nav-link"
                      :id="permission.value+'-a-tab'"
                      data-toggle="pill"
                      :href="'#'+permission.value+'-a'"
                      role="tab"
                      :aria-controls="permission.value+'-a'"
                      aria-selected="false"
                      >{{ permission.name }}</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-9">
            <div class="card card-custom gutter-b bg-white border-0 roles-main">
              <div class="card-body">
                <div class="tab-content" id="v-pills-tabContent">
                  <div
                    v-for="permission in permissions"
                    class="tab-pane fade"
                    :id="permission.value+'-a'"
                    role="tabpanel"
                    :aria-labelledby="permission.value+'-a-tab'"
                    v-if="permission.parent_id == '0'"
                  >
                    <div class="main-heading border-0">
                      <h3 class="card-label mb-3 font-weight-bold text-body">
                        {{permission.name}}
                      </h3>
                    </div>
                    <div class="form-group row">
                      <div class="col-12">
                        <div class="p-2 bg-light mb-4">
                          <div
                            class="switch-h d-flex justify-content-between mb-0"
                          >
                            <h4 class="font-size-h4 text-dark mb-0">
                              {{permission.name}}
                            </h4>
                            <div
                              class="
                                custom-control
                                switch
                                custom-switch-info
                                custom-switch
                                custom-control-inline
                                mr-0
                              "
                            >
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                :id="'customdashboard'+permission.id"
                                :value="permission.id"
                                @change="check($event)"
                                v-bind:checked="selectedPermission.includes(permission.id) ? 'checked':'' "
                              />
                              <label
                                class="custom-control-label mr-1"
                                :for="'customdashboard'+permission.id"
                              >
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="permissionsallow0"  v-for="childpermission in permissions" v-if="permission.id == childpermission.parent_id">
                          <div class="toggle-swither px-5 py-3 border-top" v-if="selectedPermission.includes(permission.id)">
                            <div
                              class="
                                switch-h
                                d-flex
                                justify-content-between
                                mb-3
                              "
                            >
                              <h4 class="font-size-h4 text-dark mb-0">{{ childpermission.name }}</h4>
                              <div
                                class="
                                  custom-control
                                  switch
                                  custom-switch-info
                                  custom-switch
                                  custom-control-inline
                                  mr-0
                                "
                              >
                                <input
                                  type="checkbox"
                                  class="custom-control-input"
                                  :id="'customView'+childpermission.id"
                                  :value="childpermission.id"
                                  @change="check($event)"
                                  v-bind:checked="selectedPermission.includes(childpermission.id) ? 'checked':'' "
                                />
                                <label
                                  class="custom-control-label mr-1"
                                  :for="'customView'+childpermission.id"
                                >
                                </label>
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
        </div>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-secondary white" @click="addUpdateRolePermissions">
              Save Changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";
export default {
  data() {
    return {
      permissions: [],
      role_name:"",
      selectedPermission: [],
      token: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchPermissions() {
      this.$parent.loading = true;
      var page_url = "/api/admin/permission";

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.permissions = res.data.data;
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchPermissionsByRole() {
      this.$parent.loading = true;
      var page_url = "/api/admin/permission_role";
      page_url += "?role=" + this.$route.params.id;

      axios
        .get(page_url, this.token)
        .then((res) => {
          var data = res.data.data;
          data.filter((res) => {
            this.selectedPermission.push(parseInt(res.permission.id));
          });
        })
        .finally(() => (this.$parent.loading = false));
    },
    addUpdateRolePermissions() {
      if (this.selectedPermission.length == 0) {
        this.$toaster.error("Please Select one Permission Atleast");
        return;
      }

      this.$parent.loading = true;
      var url = "/api/admin/permission_role";
      this.request_method = "post";
      axios[this.request_method](
        url,
        {
          role_id: this.$route.params.id,
          permissions: this.selectedPermission,
          role_name:this.role_name
        },
        this.token
      )
        .then((res) => {
          if (res.data.status == "Success") {
            this.$toaster.success(res.data.msg);
            this.clearForm();
          } else {
            this.$toaster.error(res.data.msg);
          }
        })
        .catch((error) => {
          this.error_message = "";
          this.errors = new ErrorHandling();
          if (error.response.status == 422) {
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
      this.edit = false;
      this.paymentMethod.id = null;
      this.paymentMethod.status = "1";
      this.paymentMethod.environment = "0";
    },
    check(e) {
      if (e.target.checked) {
        this.selectedPermission.push(parseInt(e.target.value));
      } else {
        this.selectedPermission.splice(
          this.selectedPermission.indexOf(parseInt(e.target.value)),
          1
        );
      }

      console.log(this.selectedPermission);
    },
  },
  created(){
    if(this.$route.params.name){
      this.role_name = this.$route.params.name;
    }
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.fetchPermissions();
    this.fetchPermissionsByRole();
  },
};
</script>
