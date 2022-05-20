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
                        Constant Banner
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
                      <img :src="selected_banner" />
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
                                  <select class="form-control" v-model="searchable_banner">
                                    <option value="" disabled>choose style</option>
                                    <option value="banner1">
                                      Banner Style 1
                                    </option>
                                    <option value="banner2">
                                      Banner Style 2
                                    </option>
                                    <option value="banner3">
                                      Banner Style 3
                                    </option>
                                    <option value="banner4">
                                      Banner Style 4
                                    </option>
                                    <option value="banner5">
                                      Banner Style 5
                                    </option>
                                    <option value="banner6">
                                      Banner Style 6
                                    </option>
                                    <option value="banner7">
                                      Banner Style 7
                                    </option>
                                    <option value="banner8">
                                      Banner Style 8
                                    </option>
                                    <option value="banner9">
                                      Banner Style 9
                                    </option>
                                    <option value="banner10">
                                      Banner Style 10
                                    </option>
                                    <option value="banner11">
                                      Banner Style 11
                                    </option>
                                    <option value="banner12">
                                      Banner Style 12
                                    </option>
                                    <option value="banner13">
                                      Banner Style 13
                                    </option>
                                    <option value="banner14">
                                      Banner Style 14
                                    </option>
                                    <option value="banner15">
                                      Banner Style 15
                                    </option>
                                    <option value="banner16">
                                      Banner Style 16
                                    </option>
                                    <option value="banner17">
                                      Banner Style 17
                                    </option>
                                    <option value="banner18">
                                      Banner Style 18
                                    </option>
                                    <option value="banner19">
                                      Banner Style 19
                                    </option>

                                    <option value="rightsliderbanner">
                                      Right Slider with Thumbs
                                    </option>
                                    <option value="leftsliderbanner">
                                      Left Slider with Thumbs
                                    </option>
                                  </select>
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  
                                  style="width: 95.5288px"
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
                                  style="width: 95.5288px"
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
                                  style="width: 53.1891px"
                                ></th>
                                <th
                                  class="no-sort sorting_disabled"
                                  style="width: 53.1891px"
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
                                  Banner Number
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  Url
                                </th>
                                <th
                                  class="no-sort sorting_disabled"
                                  tabindex="0"
                                  style="width: 31.25px"
                                >
                                  Language
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
                                  v-if="$parent.permissions.includes('constant-bannder-manage')"
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

                                <td class="sorting_1">
                                  {{ banner.banner_number }}
                                </td>
                                <td>
                                  {{ banner.banner_url }}
                                </td>
                                <td>
                                  {{ banner.language.language_name }}
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
                                <td v-if="$parent.permissions.includes('constant-bannder-manage')">
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
              <label class="text-dark">Url</label>
              <input type="text" v-model="banner.url" class="form-control" />
              <small
                class="form-text text-danger"
                v-if="errors.has('url')"
                v-text="errors.get('url')"
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

export default {
  data() {
    return {
      display_form: 0,
      banner: {
        id: "",
        title: "",
        url: "",
        gallary_id: "",
        language_id: "",
      },
      banner_styles:[
                 ['banner1',"/assets/images/prototypes/banner-styles/banner1.jpg", ''],
                 ['banner2',"/assets/images/prototypes/banner-styles/banner2.jpg", ''],
                 ['banner3',"/assets/images/prototypes/banner-styles/banner3.jpg", ''],
                 ['banner4',"/assets/images/prototypes/banner-styles/banner4.jpg", ''],
                 ['banner5',"/assets/images/prototypes/banner-styles/banner5.jpg", ''],
                 ['banner6',"/assets/images/prototypes/banner-styles/banner6.jpg", ''],
                 ['banner7',"/assets/images/prototypes/banner-styles/banner7.jpg", ''],
                 ['banner8',"/assets/images/prototypes/banner-styles/banner8.jpg", ''],
                 ['banner9',"/assets/images/prototypes/banner-styles/banner9.jpg", ''],
                 ['banner10',"/assets/images/prototypes/banner-styles/banner10.jpg", ''],
                 ['banner11',"/assets/images/prototypes/banner-styles/banner11.jpg", ''],
                 ['banner12',"/assets/images/prototypes/banner-styles/banner12.jpg", ''],
                 ['banner13',"/assets/images/prototypes/banner-styles/banner13.jpg", ''],
                 ['banner14',"/assets/images/prototypes/banner-styles/banner14.jpg", ''],
                 ['banner15',"/assets/images/prototypes/banner-styles/banner15.jpg", ''],
                 ['banner16',"/assets/images/prototypes/banner-styles/banner16.jpg", ''],
                 ['banner17',"/assets/images/prototypes/banner-styles/banner17.jpg", ''],
                 ['banner18',"/assets/images/prototypes/banner-styles/banner18.jpg", ''],
                 ['banner19',"/assets/images/prototypes/banner-styles/banner19.jpg", ''],
                 ['rightsliderbanner',"/assets/images/prototypes/banner-styles/rightsliderbanner.jpg", ''],
                 ['leftsliderbanner',"/assets/images/prototypes/banner-styles/leftsliderbanner.jpg", ''],
      ],
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
        if(this.searchable_banner == ""){
            this.$toaster.error("please choose banner style to search");
        }else if(this.searchable_language_id == ""){
            this.$toaster.error("please choose languag to search");
        }
        else{
            for(var i =0; i < this.banner_styles.length;i++){
                if(this.banner_styles[i][0] == this.searchable_banner){
                    this.selected_banner = this.banner_styles[i][1];
                }
            }
            this.fetchConstantbanners(this.searchable_language_id,this.searchable_banner)
        }
    },
    fetchConstantbanners(language,title) {
      this.$parent.loading = true;
      let vm = this;
      var page_url ="/api/admin/constant_banner?getlanguage=1&getGallary=1&title="+title+"&language_id="+language+"";

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.banners = res.data.data;
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
        var url = "/api/admin/constant_banner/" + this.banner.id;
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
      console.log(banner);
      this.edit = true;
      this.display_form = 1;
      this.errors = new ErrorHandling();
      this.banner.id = banner.banner_id;
      this.banner.url = banner.banner_url;
      this.banner.title = banner.banner_title;
      this.banner.gallary_id = banner.gallary == null ? "" : banner.gallary.id;
      this.gallary_path = banner.gallary == null ? "" : "/gallary/thumbnail" + banner.gallary.gallary_name;
      this.banner.language_id = banner.language == null ? 1 : banner.language.id;
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
