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
                        Menu Builder
                      </h3>
                    </div>
                    <div class="icons d-flex">
                      <button
                        class="btn ml-2 p-0 kt_notes_panel_toggle"
                        data-toggle="tooltip"
                        title=""
                        data-placement="right"
                        data-original-title="Check out more demos"
                      >
                        <span
                          class="
                            bg-secondary
                            h-30px
                            font-size-h5
                            w-30px
                            d-flex
                            align-items-center
                            justify-content-center
                            rounded-circle
                            shadow-sm
                          "
                          v-on:click="display_form = !display_form"
                        >
                          <svg
                            width="25px"
                            height="25px"
                            viewBox="0 0 16 16"
                            class="bi bi-plus white"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                            ></path>
                          </svg>
                        </span>
                      </button>
                      <button @click="genrateCatalog()">
                        Generate Catalog
                      </button>
                      <button @click="updateSetting()">Update</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-body">
                    <vue-nestable v-model="nestableItems" @input="changeJson()">
                      <vue-nestable-handle
                        slot-scope="{ item, index, isChild }"
                        :item="item"
                      >
                        <div
                          class="row"
                          style="
                            background: #ADB5BD;
                            color: white;
                            margin-top: 4px;
                          "
                        >
                          <div class="col-12">
                            <br />
                          </div>
                          <div class="col-8">
                            <span>{{ item.name[0] }}</span>
                          </div>
                          <div class="col-1">
                            <a
                              class=""
                              href="#"
                              @click="deleteObject(index, item, isChild)"
                              ><i class="fa fa-trash"></i
                            ></a>
                          </div>
                          <div class="col-1">
                            <a
                              class=""
                              href="#"
                              @click="editObject(index, item, isChild)"
                              ><i class="fa fa-edit"></i
                            ></a>
                          </div>
                          <div class="col-2"></div>
                          <div class="col-12">
                            <br />
                          </div>
                        </div>
                      </vue-nestable-handle>
                    </vue-nestable>
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
        <h4 class="font-size-h4 font-weight-bold m-0">Add Menu Builder</h4>
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
            <div class="tabslang">
              <div
                v-for="language in languages"
                class="tablang"
                :class="language.id == selectedLanguage ? 'active' : ''"
                @click="setSelectedLanguage(language.id)"
              >
                {{ language.language_name }}
              </div>
            </div>
            <div
              class="form-group"
              v-for="(language, index) in languages"
              v-if="language.id == selectedLanguage"
            >
              <label class="text-dark"
                >Name ( {{ language.language_name }} )
              </label>
              <input
                type="text"
                :name="'name' + index"
                v-model="menuObject.name[index]"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('name')"
                v-text="errors.get('name')"
              ></small>
            </div>

            <div class="form-group">
              <label class="text-dark">Type </label>
              <select
                required=""
                id="select_id"
                v-model="menuObject.type"
                class="form-control"
                name="type"
              >
                <option value="" disabled>Select Type</option>
                <option value="exlink">External Link</option>
                <option value="link">Link</option>
                <option value="contentpage">Content Page</option>
                <option value="page">Page</option>
                <option value="category">Category</option>
                <option value="product">Product</option>
              </select>
              <small
                class="form-text text-danger"
                v-if="errors.has('type')"
                v-text="errors.get('type')"
              ></small>
            </div>

            <div class="form-group" v-if="menuObject.type == 'exlink'">
              <label class="text-dark">External Link</label>
              <input
                type="text"
                name="exlink"
                v-model="menuObject.exlink"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('exlink')"
                v-text="errors.get('exlink')"
              ></small>
            </div>

            <div class="form-group" v-if="menuObject.type == 'link'">
              <label class="text-dark">Link</label>
              <input
                type="text"
                name="link"
                v-model="menuObject.link"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('link')"
                v-text="errors.get('link')"
              ></small>
            </div>
            <div class="form-group" v-if="menuObject.type == 'page'">
              <label class="text-dark">Page </label>
              <select
                class="form-control"
                name="pages2"
                v-model="menuObject.page"
              >
                <option value="/">Home</option>
                <option value="/shop">Shop</option>
                <option value="/blog">Blogs</option>
                <option value="/contact-us">Contact Us</option>
              </select>
              <small
                class="form-text text-danger"
                v-if="errors.has('page')"
                v-text="errors.get('page')"
              ></small>
            </div>

            <div class="form-group" v-if="menuObject.type == 'category'">
              <label class="text-dark">Category </label>
              <select
                class="
                  js-example-basic-single js-states
                  form-control
                  bg-transparent
                "
                v-model="menuObject.category"
              >
                <option
                  v-for="category in categorys"
                  :value="category.id"
                  v-bind:key="category.id"
                >
                  {{ category.detail[0].name }}
                </option>
              </select>
              <small
                class="form-text text-danger"
                v-if="errors.has('category')"
                v-text="errors.get('category')"
              ></small>
            </div>

            <div class="form-group" v-if="menuObject.type == 'product'">
              <label class="text-dark">Product </label>
              <select
                class="
                  js-example-basic-single js-states
                  form-control
                  bg-transparent
                "
                v-model="menuObject.product"
              >
                <option
                  v-for="product in products"
                  :value="product.product_slug"
                  v-bind:key="product.id"
                >
                  {{ product.detail[0].title }}
                </option>
              </select>
              <small
                class="form-text text-danger"
                v-if="errors.has('product')"
                v-text="errors.get('product')"
              ></small>
            </div>

            <div class="form-group" v-if="menuObject.type == 'contentpage'">
              <label class="text-dark">Content Page </label>
              <select
                class="
                  js-example-basic-single js-states
                  form-control
                  bg-transparent
                "
                v-model="menuObject.contentpage"
              >
                <option
                  v-for="page in contentPages"
                  :value="page.id"
                  v-bind:key="page.slug"
                >
                  {{ page.slug }}
                </option>
              </select>
              <small
                class="form-text text-danger"
                v-if="errors.has('contentpage')"
                v-text="errors.get('contentpage')"
              ></small>
            </div>
          </div>
        </div>
        <button type="button" @click="addMenu()" class="btn btn-primary">
          Submit
        </button>
      </form>
    </div>
  </div>
</template>


<script type="text/babel">
import ErrorHandling from "./../../ErrorHandling";

export default {
  data() {
    return {
      display_form: 0,
      nestableItems: [],
      selectedLanguage: "",
      languages: [],
      menuObject: {
        id: Date.now(),
        name: [],
        type: "exlink",
        exlink: "",
        link: "",
        category: "",
        product: "",
        contentpage: "",
        page: "",
        children: [],
        language_id:[],
      },
      language_id: [],
      categorys: [],
      products: [],
      contentPages: [],
      edit: false,
      editChild:false,
      editIndex:"",
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    changeJson() {
      console.log(this.nestableItems);
    },
    menu() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };

      axios
        .get("/api/admin/menu-builder", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.nestableItems = JSON.parse(res.data.data.menu);
            console.log(JSON.parse(res.data.data.menu));
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    updateSetting() {
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      
      if(this.edit){
        for (var i = 0; i < this.nestableItems.length; i++) {
          console.log(this.nestableItems[i],"single menu");
          if (this.editChild) {
            this.findChild(this.menuObject, this.nestableItems[i]);
          } else {
            if (this.menuObject.id == this.nestableItems[i].id) {
              this.nestableItems[i] = this.menuObject;
            }
          }
      }
        // console.log(menu);
        // return;
      }
      var menu = JSON.stringify(this.nestableItems);
      axios
        .post(
          "/api/admin/menu-builder",
          {
            menu,
          },
          config
        )
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.$toaster.success(res.data.message);
            this.clearForm();
            this.menu();
            this.fetchLanguages();
          } else if (res.data.status == "Error") {
            this.$toaster.error(res.data.message);
          }
        })
        .catch((err) => {
          if (err.response.data.status == "Error") {
            this.$toaster.error(err.response.data.message);
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchLanguages() {
      this.language_id = [];
      this.$parent.loading = true;
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      axios
        .get("/api/admin/language?limit=500", config)
        .then((res) => {
          if (res.data.status == "Success") {
            this.languages = res.data.data;
            for (var i = 0; i < res.data.data.length; i++) {
              this.language_id.push(res.data.data[i].id);
              if (res.data.data[i].is_default) {
                this.selectedLanguage = res.data.data[i].id;
              }
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    addMenu() {
      this.errors = new ErrorHandling();
      var err = {};
      var isError = false;
      console.log(this.menuObject.name.length, this.language_id.length);
      this.menuObject.language_id = this.language_id; 
      if (this.menuObject.name.length !== this.language_id.length) {
        err.name = ["name field is required"];
        isError = true;
      }
      if (this.menuObject.type == "") {
        err.type = ["Type field is required"];
        isError = true;
      }

      if (this.menuObject.type == "exlink" && this.menuObject.exlink == "") {
        err.exlink = ["External Link field is required"];
        isError = true;
      }

      if (this.menuObject.type == "link" && this.menuObject.link == "") {
        err.link = ["Link field is required"];
        isError = true;
      }

      if (
        this.menuObject.type == "contentpage" &&
        this.menuObject.contentpage == ""
      ) {
        err.contentpage = ["Content Page field is required"];
        isError = true;
      }

      if (this.menuObject.type == "page" && this.menuObject.page == "") {
        err.page = ["Page field is required"];
        isError = true;
      }

      if (
        this.menuObject.type == "category" &&
        this.menuObject.category == ""
      ) {
        err.category = ["Category field is required"];
        isError = true;
      }

      if (this.menuObject.type == "product" && this.menuObject.product == "") {
        err.product = ["Product field is required"];
        isError = true;
      }

      if (isError) {
        this.errors.record(err);
      } else {
        if(!this.edit)
           this.nestableItems.push(this.menuObject);
        this.updateSetting();
      }
    },
    setSelectedLanguage(selectedLanguage) {
      this.selectedLanguage = selectedLanguage;
      console.log("i am clicked", selectedLanguage);
    },
    fetchcategorys() {
      this.$parent.loading = true;
      var page_url = page_url || "/api/admin/category?limit=10000&getDetail=1";
      axios
        .get(page_url, this.token)
        .then((res) => {
          this.categorys = res.data.data;
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchproducts() {
      this.$parent.loading = true;
      var page_url = page_url || "/api/admin/product?limit=10000&getDetail=1";
      axios
        .get(page_url, this.token)
        .then((res) => {
          this.products = res.data.data;
        })
        .finally(() => (this.$parent.loading = false));
    },
    fetchPages() {
      this.$parent.loading = true;
      var page_url = page_url || "/api/admin/pages";
      axios
        .get(page_url, this.token)
        .then((res) => {
          this.contentPages = res.data.data;
        })
        .finally(() => (this.$parent.loading = false));
    },
    deleteObject(index, item, isChild) {
      for (var i = 0; i < this.nestableItems.length; i++) {
        if (isChild) {
          this.removeChild(item, this.nestableItems[i]);
        } else {
          if (item.id == this.nestableItems[i].id) {
            this.nestableItems.splice(i, 1);
            this.updateSetting();
          }
        }
      }
    },
    removeChild(item, nestedItem) {
      for (var j = 0; j < nestedItem.children.length; j++) {
        console.log(item.id, nestedItem.children[j].id);
        if (item.id == nestedItem.children[j].id) {
          nestedItem.children.splice(j, 1);
          this.updateSetting();
        }
        if (nestedItem.children[j]) {
          this.removeChild(item, nestedItem.children[j]);
        }
      }
    },
    findChild(item, nestedItem){
      // for (var j = 0; j < nestedItem.children.length; j++) {
      //   if (item.id == nestedItem.children[j].id) {
      //     nestedItem.children[j] =  item;
      //   }
      //   if (nestedItem.children[j]) {
      //     this.findChild(item, nestedItem.children[j]);
      //   }
      // }
    },
    editObject(index, item, isChild) {
      this.display_form = 1;
      this.edit = true;
      this.menuObject = item;
      this.editChild = isChild;
      this.editIndex = index;
    },
    genrateCatalog() {
      var catalog = {
        id: Date.now(),
        name: ["Catalog", "Catalog"],
        type: "category",
        exlink: "",
        link: "",
        category: "#",
        product: "",
        contentpage: "",
        page: "",
        children: [],
        language_id:[]
      };
      var childObject = [];
      catalog.language_id = this.language_id;
      for (var i = 0; i < this.categorys.length; i++) {
        if (
          this.categorys[i].parent_id == "" ||
          this.categorys[i].parent_id == null
        ) {
          childObject.push({
            
            id: Math.floor(Math.random() * 100),
            name: [
              this.categorys[i].detail[0].name,
              this.categorys[i].detail[0].name,
            ],
            type: "category",
            exlink: "",
            link: "",
            category: this.categorys[i].id,
            product: "",
            contentpage: "",
            page: "",
            children: [],
            language_id: this.language_id,
          });
        }
      }

      catalog.children = childObject;
      console.log(catalog);
      this.nestableItems.push(catalog);
      this.updateSetting();
    },
    clearForm() {
      this.display_form = 0;
      this.edit = false;
      this.menuObject = {
        id: Date.now(),
        name: [],
        type: "exlink",
        exlink: "",
        link: "",
        category: "",
        product: "",
        contentpage: "",
        page: "",
        children: [],
      };
    },
  },

  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.menu();
    this.fetchLanguages();
    this.fetchcategorys();
    this.fetchproducts();
    this.fetchPages();
  },
};
</script>