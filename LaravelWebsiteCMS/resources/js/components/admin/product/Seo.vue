<template>
<div>
  <div class="card card-custom gutter-b bg-white border-0">
    <div class="card-header border-0 align-items-center">
      <h3 class="card-label mb-0 font-weight-bold text-body">
        Seo
      </h3>
    </div>
    <div class="card-body" id="printableTable">
      <div class="row">
        <div class="col-md-6 col-12">
          <h6 class="text-body">Seo Meta Tags</h6>
          <fieldset class="form-group mb-3">
            <input type="text" v-on:input="setSeoMetaTag($event.target.value)" class="form-control bg-transparent text-dark" v-model="seo_meta_tag" placeholder="Seo meta tags" />
            <small class="form-text text-danger" v-if="errors.has('seo_meta_tag')" v-text="errors.get('seo_meta_tag')"></small>
          </fieldset>
        </div>
        <div class="col-md-6 col-12">
          <h6 class="text-body">Seo Description</h6>
          <fieldset class="form-group mb-3">
            <input type="text" v-on:input="setSeoDesc($event.target.value)" class="form-control bg-transparent text-dark" v-model="seo_desc" placeholder="Seo Description" />
            <small class="form-text text-danger" v-if="errors.has('seo_desc')" v-text="errors.get('seo_desc')"></small>
          </fieldset>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 d-flex justify-content-end">
      <a href="#" data-toggle="pill" @click.prevent="setActive('ad-info-tab')" :class="{ active: isActive('ad-info-tab') }" class="btn btn-dark swipe-to-top cta ">Back</a>
      <a href="#" data-toggle="pill" @click.prevent="addProduct()" class="btn btn-primary  ml-2">Save</a>
    </div>
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      'seo_meta_tag':'',
      'seo_desc':'',
    };
  },

  methods: {
    isActive(value) {
        this.$emit('isActiveInChild', value);
    },
    setActive(value) {
        this.$emit('setActiveInChild', value);
    },
    addProduct() {
        this.$emit('addProductInChild');
    },
    setSeoMetaTag(value) {
        this.$emit('setSeoMetaTagInChild', value);
    },
    setSeoDesc(value) {
        this.$emit('setSeoDescInChild', value);
    },
  },
  watch:{
    product(newVal, oldVal){
      this.seo_meta_tag = newVal.seo_meta_tag;
      this.seo_desc = newVal.seo_desc;
    }
  },
  props: ["product", "errors", 'edit'],
};
</script>
