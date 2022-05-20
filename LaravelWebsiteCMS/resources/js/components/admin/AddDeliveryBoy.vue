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
                        {{ $route.params.id ? "Edit" : "Add" }} Delivery Boy
                      </h3>
                    </div>
                    <div class="icons d-flex"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-header border-0 align-items-center">
                    <h4 class="card-label mb-0 font-weight-bold text-body">
                      Delivery Boy Info
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">First Name</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.first_name"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('first_name')"
                            v-text="errors.get('first_name')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Last Name</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.last_name"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('last_name')"
                            v-text="errors.get('last_name')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Phone Number</label>
                          <input
                            type="tel"
                            name="mobilenumber"
                            class="form-control"
                            v-model="deliver_boy.phone_number"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('phone_number')"
                            v-text="errors.get('phone_number')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Avatar</label>
                          <fieldset
                            class="form-group mb-3 border-dark rounded p-1"
                          >
                            <input
                              type="file"
                              class="d-block"
                              id="img1"
                              name="img"
                              @change="uploadAvatar($event)"
                            />
                          </fieldset>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('avatar')"
                            v-text="errors.get('avatar')"
                          ></small>

						  <img v-if="edit" :src="'/delivery/'+selectedAvatar" style="width:100px;" />
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Date of Birth</label>
                          <input
                            type="date"
                            id="birthday"
                            name="birthday"
                            class="form-control"
                            v-model="deliver_boy.dob"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('dob')"
                            v-text="errors.get('dob')"
                          ></small>
                        </div>
                      </div>

                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Blood Group</label>
                          <select
                            class="bloodgroup w-100 mb-3 h-30px"
                            v-model="deliver_boy.blood_group"
                          >
                            <option value="1">A +ve</option>
                            <option value="1">B +ve</option>
                            <option value="1">AB +ve</option>
                            <option value="1">A -ve</option>
                          </select>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('blood_group')"
                            v-text="errors.get('blood_group')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Commission</label>
                          <input
                            type="number"
                            value="0"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.commission"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('commission')"
                            v-text="errors.get('commission')"
                          ></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-header border-0 align-items-center">
                    <h4 class="card-label mb-0 font-weight-bold text-body">
                      Login Info
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Email Address</label>
                          <input
                            type="email"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.email"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('email')"
                            v-text="errors.get('email')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Pin Code</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.pin_code"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('pin_code')"
                            v-text="errors.get('pin_code')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Status</label>
                          <select
                            class="status w-100 mb-3 h-30px"
                            v-model="deliver_boy.status"
                          >
                            <option value="1">Active</option>
                            <option value="2">In active</option>
                          </select>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('status')"
                            v-text="errors.get('status')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Availability Status</label>
                          <select
                            class="availability a w-100 mb-3 h-30px"
                            v-model="deliver_boy.availability_status"
                          >
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                          </select>
                        </div>
                        <small
                          class="form-text text-danger"
                          v-if="errors.has('availability_status')"
                          v-text="errors.get('availability_status')"
                        ></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-header border-0 align-items-center">
                    <h4 class="card-label mb-0 font-weight-bold text-body">
                      Address Info
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark"> Address</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.address"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('address')"
                            v-text="errors.get('address')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">City</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.city"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('city')"
                            v-text="errors.get('city')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Country</label>
                          <select class="js-example-basic-single js-states form-control bg-transparent" v-model='deliver_boy.country' @change="fetchStatesByCountryID(deliver_boy.country)">
                            <option 
                            v-for='country in countries' :value='country.country_id'
                            v-bind:selected="deliver_boy.country == country.country_id"
                            v-bind:key="country.country_id">
                                {{ country.country_name }}</option>
                        </select>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('country')"
                            v-text="errors.get('country')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Zip Code</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.zip_code"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('zip_code')"
                            v-text="errors.get('zip_code')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark"> State</label>
                          <select class="js-example-basic-single js-states form-control bg-transparent" v-model='deliver_boy.state' >
                            <option 
                            v-for='state in states' :value='state.id'
                            v-bind:selected="deliver_boy.state == state.id"
                            v-bind:key="state.id"
                            >{{ state.name }}</option>
                        </select>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('state')"
                            v-text="errors.get('state')"
                          ></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-header border-0 align-items-center">
                    <h4 class="card-label mb-0 font-weight-bold text-body">
                      Vehicle Info
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Vehicle Name</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.vehicle_name"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('vehicle_name')"
                            v-text="errors.get('vehicle_name')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Owner Name</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.owner_name"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('owner_name')"
                            v-text="errors.get('owner_name')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Vehicle Color</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.vehicle_color"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('vehicle_color')"
                            v-text="errors.get('vehicle_color')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Vehicle Registration#</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.vehicle_registration_no"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('vehicle_registration_no')"
                            v-text="errors.get('vehicle_registration_no')"
                          ></small>
                        </div>
                      </div>

                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Vehicle Details</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.vehicle_details"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('vehicle_details')"
                            v-text="errors.get('vehicle_details')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Driving License</label>
                          <fieldset
                            class="form-group mb-3 border-dark rounded p-1"
                          >
                            <input
                              type="file"
                              class="d-block"
                              id="img1"
                              name="img"
                              @change="uploadDrivingLicense($event)"
                            />
                          </fieldset>
						  <img v-if="edit" :src="'/delivery/'+selectedDrivingLicenseNo" style="width:100px;" />

                          <!-- <input type="text" name="text" class="form-control"  v-model="deliver_boy.driving_license_no"> -->
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('driving_license_no')"
                            v-text="errors.get('driving_license_no')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Vehicle RC Book</label>
                          <fieldset
                            class="form-group mb-3 border-dark rounded p-1"
                          >
                            <input
                              type="file"
                              class="d-block"
                              id="img1"
                              name="img"
                              @change="uploadRcBooK($event)"
                            />
                          </fieldset>
						  <img v-if="edit" :src="'/delivery/'+selectedVehicleRcBookNo" style="width:100px;" />

                          <!-- <input type="text" name="text" class="form-control"  v-model="deliver_boy.vehicle_rc_book_no"> -->
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('vehicle_rc_book_no')"
                            v-text="errors.get('vehicle_rc_book_no')"
                          ></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-header border-0 align-items-center">
                    <h4 class="card-label mb-0 font-weight-bold text-body">
                      Bank Info
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Account Name</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.account_name"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('account_name')"
                            v-text="errors.get('account_name')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Account Number</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.account_number"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('account_number')"
                            v-text="errors.get('account_number')"
                          ></small>
                        </div>
                      </div>

                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Gpay Number</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.gpay_number"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('gpay_number')"
                            v-text="errors.get('gpay_number')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Bank Address</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.bank_address"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('bank_address')"
                            v-text="errors.get('bank_address')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">IFSC Code</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.ifsc_code"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('ifsc_code')"
                            v-text="errors.get('ifsc_code')"
                          ></small>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label class="text-dark">Branch Name</label>
                          <input
                            type="text"
                            name="text"
                            class="form-control"
                            v-model="deliver_boy.branch_name"
                          />
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('branch_name')"
                            v-text="errors.get('branch_name')"
                          ></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 d-flex justify-content-between">
                <a href="#" class="btn btn-dark">Back</a>
                <button
                  href="#"
                  class="btn btn-secondary white"
                  @click="saveUpdate()"
                >
                  Add Delivery Boy
                </button>
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
      display_form: 0,
      deliver_boy: {
        first_name: "",
        last_name: "",
        email: "",
        phone_number: "",
        avatar: "",
        dob: "",
        blood_group: "",
        commission: "",
        pin_code: "",
        status: "",
        availability_status: "",
        address: "",
        city: "",
        country: "",
        in_active: "",
        zip_code: "",
        state: "",
        vehicle_name: "",
        owner_name: "",
        vehicle_color: "",
        vehicle_registration_no: "",
        vehicle_details: "",
        driving_license_no: "",
        vehicle_rc_book_no: "",
        account_name: "",
        account_number: "",
        gpay_number: "",
        bank_address: "",
        ifsc_code: "",
        branch_name: "",
      },
	  selectedAvatar:"",
	  selectedDrivingLicenseNo:"",
	  selectedVehicleRcBookNo:"",

      countries: [],
      states: [],
      error_message: "",
      edit: false,
      actions: false,
      pagination: {},
      request_method: "",
      token: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    saveUpdate() {
	  this.$parent.loading = true;
      let data = new FormData();
      data.append("first_name", this.deliver_boy.first_name),
      data.append("last_name", this.deliver_boy.last_name);
      data.append("email", this.deliver_boy.email);
      data.append("phone_number", this.deliver_boy.phone_number);
      data.append("avatar", this.deliver_boy.avatar);
      data.append("dob", this.deliver_boy.dob);
      data.append("blood_group", this.deliver_boy.blood_group);
      data.append("commission", this.deliver_boy.commission);
      data.append("pin_code", this.deliver_boy.pin_code);
      data.append("status", this.deliver_boy.status);
      data.append("availability_status", this.deliver_boy.availability_status);
      data.append("address", this.deliver_boy.address);
      data.append("city", this.deliver_boy.city);
      data.append("country", this.deliver_boy.country);
      data.append("in_active", this.deliver_boy.in_active);
      data.append("zip_code", this.deliver_boy.zip_code);
      data.append("state", this.deliver_boy.state);
      data.append("vehicle_name", this.deliver_boy.vehicle_name);
      data.append("owner_name", this.deliver_boy.owner_name);
      data.append("vehicle_color", this.deliver_boy.vehicle_color);
      data.append(
        "vehicle_registration_no",
        this.deliver_boy.vehicle_registration_no
      );
      data.append("vehicle_details", this.deliver_boy.vehicle_details);
      data.append("driving_license_no", this.deliver_boy.driving_license_no);
      data.append("vehicle_rc_book_no", this.deliver_boy.vehicle_rc_book_no);
      data.append("account_name", this.deliver_boy.account_name);
      data.append("account_number", this.deliver_boy.account_number);
      data.append("gpay_number", this.deliver_boy.gpay_number);
      data.append("bank_address", this.deliver_boy.bank_address);
      data.append("ifsc_code", this.deliver_boy.ifsc_code);
      data.append("branch_name", this.deliver_boy.branch_name);

      var url = "/api/admin/delivery_boy";
      if (this.edit === false) {
        // Add
        this.request_method = "post";
      } else {
        // Update
        var url = "/api/admin/delivery_boy/"+this.$route.params.id;
        this.request_method = "post";
		 data.append("_method", 'put');

      }
      axios[this.request_method](url, data, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.$toaster.success(res.data.message);
            
			      this.$parent.loading = false;
            setTimeout(() => { this.$router.push('/admin/deliveryboy-list'); }, 500);
          } else {
            this.$toaster.error(res.data.message);
			      this.$parent.loading = false;
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
    deleteproduct(id) {
      if (confirm("Are You Sure?")) {
        this.$parent.loading = true;
        axios
          .delete(`/api/admin/product/${id}`, this.token)
          .then((res) => {
            if (res.data.status == "Success") {
              this.$toaster.success(res.data.message);
              this.fetchproducts();
            }
          })
          .catch((err) => console.log(err))
          .finally(() => (this.$parent.loading = false));
      }
    },
    uploadAvatar(e) {
      this.deliver_boy.avatar = e.target.files[0];
    },
    uploadDrivingLicense(e) {
      this.deliver_boy.driving_license_no = e.target.files[0];
    },
    uploadRcBooK(e) {
      this.deliver_boy.vehicle_rc_book_no = e.target.files[0];
    },
	clearForm(){
	deliver_boy = {
        first_name: "",
        last_name: "",
        email: "",
        phone_number: "",
        avatar: "",
        dob: "",
        blood_group: "",
        commission: "",
        pin_code: "",
        status: "",
        availability_status: "",
        address: "",
        city: "",
        country: "",
        in_active: "",
        zip_code: "",
        state: "",
        vehicle_name: "",
        owner_name: "",
        vehicle_color: "",
        vehicle_registration_no: "",
        vehicle_details: "",
        driving_license_no: "",
        vehicle_rc_book_no: "",
        account_name: "",
        account_number: "",
        gpay_number: "",
        bank_address: "",
        ifsc_code: "",
        branch_name: "",
    }
	
	},
	fetchDeliveryBoy(id){
            this.$parent.loading = true;
            var page_url =  "/api/admin/delivery_boy/"+id;
            axios.get(page_url, this.token).then(res => {
                this.deliver_boy = res.data.data;
				
				
				this.selectedAvatar = res.data.data.avatar;
				this.selectedDrivingLicenseNo = res.data.data.driving_license_no;
				this.selectedVehicleRcBookNo = res.data.data.vehicle_rc_book_no;
				this.fetchStatesByCountryID(res.data.data.country)
            })
            .finally(() => (this.$parent.loading = false));
        
	},
	fetchCountries() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/country?getAllData=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.countries = res.data.data;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
        fetchStatesByCountryID(country_id) {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            if(country_id == null){
                return;
            }

            axios.get('/api/admin/country/'+country_id+'?getStates=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.states = res.data.data.states;
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
		"Content-Type": "multipart/form-data"
      },
    };

	if(this.$route.params.id != undefined){
		this.fetchDeliveryBoy(this.$route.params.id);
		this.edit = true;
	}
	this.fetchCountries();
  },
  props: ["loading"],
};
</script>
