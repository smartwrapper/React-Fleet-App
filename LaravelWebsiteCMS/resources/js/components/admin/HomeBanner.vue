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
                        Home Banner
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
                  <div class="card-body">
                      
                    <div>
                      <div class="table-responsive" id="printableTable">
                        <div
                          id="productsliderTable_wrapper"
                          class="dataTables_wrapper no-footer"
                        >
                          <table
                            id="productsliderTable"
                            class="display dataTable no-footer"
                            role="grid"
                          >
                            <thead class="text-body">
                              <tr role="row">
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  <select
                                    class="form-control"
                                    v-model="searchable_language_id"
                                  >
                                    <option value="" disabled> choose Language</option>

                                    <option
                                      v-for="language in languages"
                                      v-bind:value="language.id"
                                    >
                                      {{ language.language_name }}
                                    </option>
                                  </select>
                                </th>

                                <th
                                  
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  <button
                                    class="btn btn-primary"
                                    @click="fetchBanner()"
                                  >
                                    Search
                                  </button>
                                </th>
                                
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                ></th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                ></th>
                              </tr>
                              <tr role="row">
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  ID
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  Name
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  Banner Image
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  Content
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                  v-if="$parent.permissions.includes('parrallex-bannder-manage')"
                                >
                                  Action
                                </th>
                              </tr>
                            </thead>
                            <tbody class="kt-table-tbody text-dark">
                              <tr
                                class="kt-table-row kt-table-row-level-0 odd"
                                role="row"
                                v-for="banner in banners"
                                v-bind:key="banner.banner_id"
                              >
                                <td class="sorting_1">
                                  {{ banner.banner_id }}
                                </td>
                                <td>
                                  {{ banner.banner_name }}
                                </td>
                                
                                <td>
                                  <img
                                    v-if="banner.gallary != null"
                                    class="img-thumbnail"
                                    :src="
                                      '/gallary/thumbnail' +
                                      banner.gallary.gallary_name
                                    "
                                    alt="image not found"
                                  />
                                </td>
                                <td>
                                  {{ banner.content }}
                                </td>
                                <td v-if="$parent.permissions.includes('parrallex-bannder-manage')">
                                  <a
                                    href="javascript:void(0)"
                                    class=" click-edit"
                                    id="click-edit1"
                                    data-toggle="tooltip"
                                    title=""
                                    data-placement="right"
                                    data-original-title="Check out more demos"
                                    @click="editBanner(banner)"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
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
        <h4 class="font-size-h4 font-weight-bold m-0">Update slider</h4>
        <a
          href="#"
          class="
            btn btn-sm btn-icon btn-light btn-hover-primary
            kt_notes_panel_close
          "
          v-on:click="clearForm()"
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
              <button
                type="button"
                class="btn btn-primary"
                @click="toggleImageSelect()"
              >
                Upload slider Media
              </button>
              <div class="clearfix"></div>
              <small
                id="textHelp"
                class="form-text text-muted"
                v-if="gallary_path == null || gallary_path == ''"
                >Select Image file from gallary.</small
              >
              <small
                class="form-text text-danger"
                v-if="errors.has('gallary_id')"
                v-text="errors.get('gallary_id')"
              ></small>

              <img
                v-if="gallary_path != ''"
                :src="gallary_path"
                style="width: 100px; height: 100px"
              />
            </div>
            <div class="form-group">
              <label class="text-dark">Content</label>
              <textarea v-model="banner.content"></textarea>
              <small
                class="form-text text-danger"
                v-if="errors.has('content')"
                v-text="errors.get('content')"
              ></small>
            </div>
          </div>
        </div>
        <button
          type="button"
          @click="addUpdateSlider()"
          class="btn btn-primary"
        >
          Submit
        </button>
      </form>
    </div>
    <attach-image
      @toggleImageSelect="toggleImageSelect"
      :showModal="showModal"
      @setImage="setImage"
    />
  </div>
</template>

<script>
import ErrorHandling from "../../ErrorHandling";
import { VueEditor } from "vue2-editor";

export default {
  components: {
        VueEditor
     },
  data() {
    return {
      display_form: 0,
      banner: {
        id: "",
        content: "",
        banner_name: "",
        gallary_id: "",
        language_id: "",
      },
      
      showModal: false,
      error_message: "",
      edit: false,
      actions: false,
      request_method: "",
      banners: [],
      languages: [],
      token: [],
      searchable_language_id: "",
      searchable_banner:"",
      selected_banner:"",
      gallary_path: "",
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchLanguages() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      axios
        .get("/api/admin/language", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.languages = res.data.data;
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchBanner(){
       if(this.searchable_language_id == ""){
            this.$toaster.error("please choose languag to search");
        }
        else{
            this.fetchHomeBanner(this.searchable_language_id)
        }
    },
    fetchHomeBanner(language) {
      this.$parent.loading = true;
      let vm = this;
      var page_url ="/api/admin/home_banner?getGallary=1&language_id="+language+"";

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.banners = res.data.data;

          console.log(this.banners);

        })
        .finally(() => (this.$parent.loading = false));
    },

    addUpdateSlider() {
      this.$parent.loading = true;
      var url = "/api/admin/slider";
      if (this.edit === false) {
        // Add
        this.request_method = "post";
      } else {
        // Update
        var url = "/api/admin/home_banner/" + this.banner.id;
        this.request_method = "put";
      }
      axios[this.request_method](url, this.banner, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.$toaster.success("Settings has been updated successfully");
            this.clearForm();
            this.fetchBanner();
          } else {
            this.$toaster.error(res.data.message);
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

    editBanner(banner) {
      
      this.edit = true;
      this.display_form = 1;
      this.errors = new ErrorHandling();
      this.banner = banner;



      this.banner.id = banner.banner_id;
      this.banner.gallary_id = banner.gallary == null ? "" : banner.gallary.id;
      this.gallary_path = banner.gallary == null ? "" : "/gallary/thumbnail" + banner.gallary.gallary_name;
      this.banner.language_id = this.banner.language;
      this.banner = Object.assign({}, this.banner, { id: banner.banner_id })
      this.banner = Object.assign({}, this.banner, { content: banner.content.toString() })



      console.log(this.banner.content);

    },
    clearForm() {
      this.edit = false;
      this.banner.id = null;
      this.banner.title = "";
      this.banner.url = "";
      this.banner.gallary_id = "";
      this.banner.language_id = "";
      this.gallary_path = "";
      this.display_form = 0;
    },
    setSelectedLanguage(selectedLanguage) {
      this.selectedLanguage = selectedLanguage;
    },
    toggleImageSelect() {
      this.showModal = !this.showModal;
    },
    setImage(gallary) {
      console.log(gallary);
      (this.gallary_path = gallary.gallary_path),
        (this.banner.gallary_id = gallary.gallary_id);
    },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.fetchLanguages();
  },
};
</script>
