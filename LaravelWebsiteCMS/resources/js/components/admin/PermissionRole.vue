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
                        Assign Permissons To {{ $route.params.name }}
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
                      <div class="row">
                        <div
                          class="col-md-3"
                          v-for="(permission, i) in permissions"
                          v-bind:key="i"
                        >
                          <div class="custom-control custom-checkbox">
                            <input
                              type="checkbox"
                              :id="'permission' + i"
                              :value="permission.id"
                              class="custom-control-input"
                              @change="check($event)"
                              v-bind:checked="selectedPermission.includes(permission.id) ? 'checked':'' "
                            />
                            <label
                              :for="'permission' + i"
                              class="custom-control-label"
                              >{{ permission.name }}</label
                            >
                          </div>
                        </div>
                      </div>
                      <hr />
                      <button class="btn btn-primary" @click="addUpdateRolePermissions">
                          Save
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
import ErrorHandling from "./../../ErrorHandling";
export default {
  data() {
    return {
      permissions: [],
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
      page_url += '?role='+this.$route.params.id;

      axios
        .get(page_url, this.token)
        .then((res) => {
          var data = res.data.data;
          data.filter(res => {
              this.selectedPermission.push(parseInt(res.permission.id));
          })
        })
        .finally(() => (this.$parent.loading = false));
    },
    addUpdateRolePermissions() {
    if (this.selectedPermission.length == 0) {
         this.$toaster.error('Please Select one Permission Atleast');
         return
      }

      this.$parent.loading = true;
      var url = "/api/admin/permission_role";
      this.request_method = "post";
      axios[this.request_method](url, {"role_id":this.$route.params.id,'permissions':this.selectedPermission}, this.token)
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
    check(e){
        if(e.target.checked){
            alert(e.target.value)
            this.selectedPermission.push(parseInt(e.target.value))
        }else{
            this.selectedPermission.splice(this.selectedPermission.indexOf(parseInt(e.target.value)),1)
        }

        console.log(this.selectedPermission)
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
