<template>
<div>
   <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="row">
                  <div class="col-lg-12 col-xl-12">
                     <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                        <div class="card-header align-items-center  border-bottom-dark px-0">
                           <div class="card-title mb-0">
                              <h3 class="card-label mb-0 font-weight-bold text-body">
                                 {{this.$route.params.id ? 'Edit' : 'Add'}} Product
                              </h3>
                           </div>
                           
                        </div>
                        <div class="card-body pb-0 pt-4 ">
                           <div class="d-flex justify-content-center">
                              <ul class="nav nav-pills mb-0" id="pills-tabmain" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link" @click.prevent="setActive('info-tab')" :class="{ active: isActive('info-tab') }" href="#info-tab">
                                       <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-file-earmark-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"></path>
                                          <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"></path>
                                          <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                       </svg>
                                       Basic Info
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" @click.prevent="setActive('ad-info-tab')" :class="{ active: isActive('ad-info-tab') }" href="#ad-info-tab">
                                       <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"></path>
                                          <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"></path>
                                       </svg>
                                       Advance Info
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" @click.prevent="setActive('seo-tab')" :class="{ active: isActive('seo-tab') }" href="#seo-tab">
                                       <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"></path>
                                          <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"></path>
                                       </svg>
                                       SEO
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12 col-xl-12">
                     <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade" :class="{ 'active show': isActive('info-tab') }">
                        <BasicInfo @setCategoryInChild="setCategory" @setTitleInChild="setTitle" @setDescInChild="setDesc" @setGallaryIdInChild="setGallaryId"  @setActiveInChild="setActiveFromChild" @isActiveInChild="isActiveFromChild" @setVideoUrlInChild="setVideoUrl" :errors="errors" :product="product" :edit="edit"></BasicInfo>
                        </div>
                        <div class="tab-pane fade" :class="{ 'active show': isActive('ad-info-tab') }">
                        <AdvanceInfo @setUnitInChild="setUnit" @setProductWeightInChild="setProductWeight" @setBrandInChild="setBrand" @setProductMaxOrderInChild="setProductMaxOrder" @setProductMinOrderInChild="setProductMinOrder" @setPriceInChild="setPrice" @setDiscountPriceInChild="setDiscountPrice" @setProductTypeInChild="setProductType" @setProductStatusInChild="setProductStatus" @setIsFeaturedInChild="setIsFeatured" @setIsPointsInChild="setIsPoints" :errors="errors" @addProductInChild="addProduct"  @setActiveInChild="setActiveFromChild" @isActiveInChild="isActiveFromChild" @setAttributesInChild="setAttributes" @setVariationsInChild="setVariations" @setCombinationPriceInChild="setCombinationPrice" @setCombinationGalleryInChild="setCombinationGallery" @setCombinationSkuInChild="setCombinationSku" :product="product" :edit="edit" @setProductskuInChild="setSku" />
                        </div>
                        <div class="tab-pane fade" :class="{ 'active show': isActive('seo-tab') }">
                        <Seo :product="product" :edit="edit" :errors="errors" @setSeoMetaTagInChild="setSeoMetaTag" @setSeoDescInChild="setSeoDesc" @setActiveInChild="setActiveFromChild" @isActiveInChild="isActiveFromChild" @addProductInChild="addProduct" />
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
import BasicInfo from './product/BasicInfo';
import Seo from './product/Seo';
import AdvanceInfo from './product/AdvanceInfo';

export default {
     components: {
        BasicInfo,
        AdvanceInfo,
        Seo,
    },
    data() {
        return {
            activeItem: 'info-tab',
            product: {
                'category_id':[],
                'cat_id':[],
                'title':[],
                'desc':[],
                'language_id':[],
                'gallary_id':'',
                'gallary_detail_id':[],
                'video_url':'',
                'product_unit':'',
                'product_weight':'',
                'brand_id':'',
                'product_min_order':1,
                'product_max_order':5,
                'price':'0',
                'discount_price':'0',
                'product_type':'',
                'product_status':'active',
                'is_featured':1,
                'is_points':1,
                'seo_meta_tag':'',
                'seo_desc':'',
                'attributes':[],
                'title_lang':[],
                'desc_lang':[],
                'languages': [],
                'gallary_detail_path': [],
                'combination': {},
                'combination_detail': [],
                'sku':'',
            },
            request_method : '',
            edit:false,
            token: [],
            errors: new ErrorHandling(),
            variationData:{},
        };
    },
    methods: {
        isActive(menuItem) {
            return this.activeItem === menuItem
        },
        setActive(menuItem) {
            this.activeItem = menuItem
        },
        setCategory(value,type){
           console.log(value,type);
           if(type === 'push'){
              if(this.product.category_id.indexOf(value) === -1){
                  this.product.category_id.push(value);
               }
           }
           else if(type === 'remove'){
               if(this.product.category_id.indexOf(value) !== -1){
                  this.product.category_id.splice(this.product.category_id.indexOf(value),value);
               }
           }
           
        },
        setTitle(value, index){
            this.product.title[index] = value;
        },
        setDesc(value, index){
           this.product.desc[index] = value;
        },
        setGallaryId(value){
           console.log(value);
           this.product.gallary_id = value[0];
           this.product.gallary_detail_id = value;
        },
        setVideoUrl(value){
           this.product.video_url = value;
        },
        setActiveFromChild(value){
           this.activeItem = value
        },
        isActiveFromChild(value){
           return this.activeItem === value
        },
        setUnit(value){
           this.product.product_unit = value;
        },
        setProductWeight(value){
           this.product.product_weight = value;
        },
        setBrand(value){
           this.product.brand_id = value;
        },
        setProductMinOrder(value){
           this.product.product_min_order = value;
        },
        setProductMaxOrder(value){
           this.product.product_max_order = value;
        },
        setPrice(value){
           this.product.price = value;
        },
        setSeoMetaTag(value){
           this.product.seo_meta_tag = value;
        },
        setSeoDesc(value){
           this.product.seo_desc = value;
        },
        setDiscountPrice(value){
           this.product.discount_price = value;
        },
        setProductType(value){
           this.product.product_type = value;
        },
        setProductStatus(value){
           this.product.product_status = value == true || value == 'true' ? 'inactive' : 'active';
        },
        setIsFeatured(value){
           this.product.is_featured = value == true || value == 'true' ? 0 : 1;
        },
        setIsPoints(value){
           this.product.is_points = value == true || value == 'true' ? 0 : 1;
        },
        setAttributes(value){
           if(this.product.attributes.indexOf(value) < 0){
              this.product.attributes.push(value);
           }
        },
        setVariations(name, value){
           this.product[name] = value;
        },
        setCombinationPrice(name, value){
           console.log(value);
           this.product[name] = value;
        },
        setCombinationGallery(name, value){
           this.product[name] = value;
        },
        setCombinationSku(name, value){
           this.product[name] = value;
        },
        addProduct() {
            this.$parent.loading = true;
            var url = '/api/admin/product';

            this.product.title = this.product.title.filter(function (el) {
               console.log(el,"title")
               return el != null;
            });
            this.product.desc = this.product.desc.filter(function (el) {
               console.log(el,"desc")
               return el != null;
            });

            if (this.edit === false) {
                // Add
                this.request_method = 'post'
            } else {
                // Update
                var url = '/api/admin/product/' + this.$route.params.id;
                this.request_method = 'put'
            }
            axios[this.request_method](url, this.product, this.token)
                .then(res => {
                    if (res.data.status == "Success") {
                        // this.display_form = 0;
                        this.$toaster.success(res.data.message);
                        setTimeout(() => { this.$router.push('/admin/products'); }, 1000);



                    } else {
                        this.$toaster.error(res.data.message)
                    }
                })
                .catch(error => {
					this.error_message = '';
					this.errors = new ErrorHandling();
					if (error.response.status == 422) {
						if(error.response.data.status == 'Error'){
							// this.error_message = error.response.data.message;
                     this.$toaster.error(error.response.data.message)
						}
						else{
                     this.$toaster.error('you have an error please check if an input is invalid');
							this.errors.record(error.response.data.errors);
						}
					}
				}).finally(() => (this.$parent.loading = false));

        },
        fetchProduct(id) {
            this.$parent.loading = true;
            var page_url = "/api/admin/product/"+id+"?getCategory=1&getDetail=1";
            
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
               this.edit = true;
               
               this.product.seo_meta_tag = res.data.data.seo_meta_tag;
               this.product.seo_desc = res.data.data.seo_desc;
               this.product.sku = res.data.data.product_sku;
               this.product.is_points = res.data.data.is_points == '' || res.data.data.is_points == null ? 0 : 1;
               this.product.video_url = res.data.data.product_video_url;
               this.product.product_unit = res.data.data.product_unit == null ? '' : res.data.data.product_unit.id;
               this.product.product_weight = res.data.data.product_weight;
               this.product.product_min_order = res.data.data.product_min_order;
               this.product.product_max_order = res.data.data.product_max_order;
               this.product.price = parseFloat(res.data.data.product_price);
               this.product.discount_price = parseFloat(res.data.data.product_discount_price);
               this.product.product_type = res.data.data.product_type;
               this.product.product_status = res.data.data.product_status;
               this.product.brand_id = res.data.data.product_brand == null ? '' : res.data.data.product_brand.brand_id;
               
               if(res.data.data.category != null){
                  for(var i =0; i < res.data.data.category.length; i++){
                     this.product.category_id.push(res.data.data.category[i].category_detail.id);
                     this.product.cat_id.push(res.data.data.category[i].category_detail);
                  }
               }
               if(res.data.data.detail != null){
                  for(var i =0; i < res.data.data.detail.length; i++){
                     // this.product.title.push(res.data.data.detail[i].title);
                     // this.product.desc.push(res.data.data.detail[i].desc);
                     this.product.title[res.data.data.detail[i].language.id] = res.data.data.detail[i].title;
                     this.product.desc[res.data.data.detail[i].language.id] = res.data.data.detail[i].desc;
                     this.product.title_lang[res.data.data.detail[i].language.id] = res.data.data.detail[i].title;
                     this.product.desc_lang[res.data.data.detail[i].language.id] = res.data.data.detail[i].desc;
                     this.product.languages.push(res.data.data.detail[i].language.id);
                  }
               }
               if(res.data.data.product_gallary_detail != null){
                  for(var i = 0; i < res.data.data.product_gallary_detail.length; i++){
                     if(i==0){
                        this.product.gallary_id = res.data.data.product_gallary_detail[i].id;
                     }
                     this.product.gallary_detail_path.push('/gallary/'+res.data.data.product_gallary_detail[i].gallary_name);
                     this.product.gallary_detail_id.push(res.data.data.product_gallary_detail[i].id);
                  }
               }
               

               if(res.data.data.product_type == 'variable'){
                  for(var i=0; i < res.data.data.combination.length; i++){
                     this.product.attributes.push(res.data.data.combination[i].attributes.attribute_id);
                        this.product.combination[res.data.data.combination[i].attributes.attribute_id] = res.data.data.combination[i];
                  }
               }

               if(res.data.data.product_type == 'variable'){
                  for(var i=0; i < res.data.data.combination_detail.length; i++){
                        this.product.combination_detail[i] = res.data.data.combination_detail[i];
                  }
               }




               this.product = Object.assign({}, this.product, { is_featured: res.data.data.is_featured })
            }).finally(() => (this.$parent.loading = false));

            //     'attributes':[]
        },
        setSku(value){
           this.product.sku = value;
        },
      //   getLastSku() {
      //       this.$parent.$parent.loading = true;
      //       var token = localStorage.getItem('token');
      //       const config = {
      //           headers: {
      //               Authorization: `Bearer ${token}`
      //           }
      //       };
      //       var responseData = {};

      //       axios.post('/api/admin/product/sku',{},config)
      //           .then(res => {
      //               if (res.data.status == "Success") {
      //                   this.product = Object.assign({}, this.product, { sku: res.data.data})
      //               }
      //           })
      //           .finally(() => (this.$parent.$parent.loading = false));
            
      //   },

    },
    mounted() {
        
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };

        if(this.$route.params.id){
           this.fetchProduct(this.$route.params.id);

        }

      //   this.getLastSku();
     
    }
};
</script>
