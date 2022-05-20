<template>
    <div>
        <div class="card card-custom gutter-b bg-white border-0">
            <div class="card-header border-0 align-items-center">
                <h3 class="card-label mb-0 font-weight-bold text-body">Advance Information
                </h3>
            </div>
            <div class="card-body">
                <form>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Product Type</label>
                        <fieldset class="form-group mb-3">
                            <select @change="setProductType($event.target.value)" class="single-select w-100 mb-3 categories-select ms-offscreen" v-model="product_type">
                                <option value="" disabled>Select Product Type</option>
                                <option value="simple" :disabled="product_type == 'variable' && edit">Simple</option>
                                <option value="variable" :disabled="product_type == 'simple' && edit">Variable</option>
                            </select>
                            <small class="form-text text-danger" v-if="errors.has('product_type')" v-text="errors.get('product_type')"></small>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        
                    <label>&nbsp;</label>
                        <div class="switch-h d-flex justify-content-between align-items-center border p-2 mb-3">
                            <h4 class="font-size-h4 text-dark mb-0">Is Active?</h4>
                            <div class="custom-control switch custom-switch-info custom-switch custom-control-inline mr-0">
                                <input type="checkbox" class="custom-control-input" id="customSwitchcolor445" :value="product_status" v-model="product_status" v-on:input="setProductStatus($event.target.value)">
                                <label class="custom-control-label mr-1" for="customSwitchcolor445">
                                </label>
                            </div>
                        </div>
                        <small class="form-text text-danger" v-if="errors.has('product_status')" v-text="errors.get('product_status')"></small>
                    </div>
                    <div class="col-md-6">
                    <label>&nbsp;</label>
                        <div class="switch-h d-flex justify-content-between align-items-center border p-2 mb-3">
                            <h4 class="font-size-h4 text-dark mb-0">Is Point</h4>
                            <div class="custom-control switch custom-switch-info custom-switch custom-control-inline mr-0">
                                <input type="checkbox" class="custom-control-input" id="customSwitchcolor446" :value="is_points" v-model="is_points" v-on:input="setIsPoints($event.target.value)">
                                <label class="custom-control-label mr-1" for="customSwitchcolor446">
                                </label>
                            </div>
                        </div>
                        <small class="form-text text-danger" v-if="errors.has('is_points')" v-text="errors.get('is_points')"></small>
                    </div>
                    <div class="col-md-6">
                    <label>&nbsp;</label>
                        <div class="switch-h d-flex justify-content-between align-items-center border p-2 mb-3">
                            <h4 class="font-size-h4 text-dark mb-0">Is Feature</h4>
                            <div class="custom-control switch custom-switch-info custom-switch custom-control-inline mr-0">
                                <input type="checkbox" class="custom-control-input" id="features" :value="is_featured" v-model="is_featured" v-on:input="setIsFeatured($event.target.value)">
                                <label class="custom-control-label mr-1" for="features">
                                </label>
                            </div>
                        </div>
                        <small class="form-text text-danger" v-if="errors.has('is_featured')" v-text="errors.get('is_featured')"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Units</label>
                        <fieldset class="form-group mb-3">
                            <select @change="setUnit($event.target.value)" class="single-select w-100 mb-3 categories-select ms-offscreen" v-model="product_unit">
                                <option value="">Select Unit</option>
                                <option v-for="unit in units" v-bind:value="unit.id">
                                {{ unit.detail == null ? '' : (unit.detail[0] ? unit.detail[0].name : '') }}
                                </option>
                            </select>
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('product_unit')" v-text="errors.get('product_unit')"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Brands</label>
                        <fieldset class="form-group mb-3">
                            <select @change="setBrand($event.target.value)" class="single-select w-100 mb-3 categories-select ms-offscreen" v-model="brand_id">
                                <option value="">Select Brand</option>
                                <option v-for="brand in brands" v-bind:value="brand.brand_id">
                                {{ brand.brand_name }}
                                </option>
                            </select>
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('brand_id')" v-text="errors.get('brand_id')"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Product Weight</label>
                        <fieldset class="form-group mb-3">
                            <input type="text" id="weight" class="form-control round bg-transparent text-dark" placeholder="Enter Weight" v-on:input="setProductWeight($event.target.value)" v-model="product_weight">
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('product_weight')" v-text="errors.get('product_weight')"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Price</label>
                        <fieldset class="form-group mb-3">
                            <input type="number" class="form-control round bg-transparent text-dark" placeholder="Enter Price" v-on:input="setPrice($event.target.value)" v-model="price">
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('price')" v-text="errors.get('price')"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Discount Price</label>
                        <fieldset class="form-group mb-3">
                            <input type="number" class="form-control round bg-transparent text-dark" placeholder="Enter Discount Price" v-on:input="setDiscountPrice($event.target.value)" v-model="discount_price">
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('discount_price')" v-text="errors.get('discount_price')"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Minimum Order</label>
                        <fieldset class="form-group mb-3">
                            <input type="text" id="type" class="form-control round bg-transparent text-dark" placeholder="Enter Minimum Order" v-on:input="setProductMinOrder($event.target.value)" v-model="product_min_order">
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('product_min_order')" v-text="errors.get('product_min_order')"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Maximum Order</label>
                        <fieldset class="form-group mb-3">
                            <input type="text" id="type-max" class="form-control round bg-transparent text-dark" placeholder="Enter Maximum Order" v-on:input="setProductMaxOrder($event.target.value)" v-model="product_max_order">
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('product_max_order')" v-text="errors.get('product_max_order')"></small>
                    </div>

                    <div class="col-md-6">
                        <label>SKU</label>
                        <fieldset class="form-group mb-3">
                            <input type="text" id="type-max" class="form-control round bg-transparent text-dark" placeholder="Enter Sku" v-on:input="setProductsku($event.target.value)" v-model="sku">
                        </fieldset>
                        <small class="form-text text-danger" v-if="errors.has('sku')" v-text="errors.get('sku')"></small>
                    </div>
                    <!-- <div class="col-md-6" v-if="product_type == 'variable'">
                    </div> -->

                    <div class="col-md-6" v-if="product_type == 'variable'">
                        <label>Attributes</label>
                        <fieldset class="form-group mb-3 d-flex">
                            <select class="single-select w-100 mb-3 categories-select ms-offscreen" v-model="attribute">
                                <option value="">Select Attributes</option>
                                <option v-for="attributes in attributes" v-bind:value="attributes.attribute_id">
                                {{ attributes.detail == null ? '' : (attributes.detail[0] ? attributes.detail[0].name : '') }}
                                </option>
                            </select>
                            <button type="button" @click.prevent="getVariation()" class="btn-secondary btn ml-2 white pt-2 pb-1" :disabled="editChild == true">ADD</button>
                            <button type="button" @click.prevent="unsetVariationData()" class="btn-secondary btn ml-2 white pt-2 pb-1" :disabled="editChild == true" v-show="displayClearBtn">Remove</button>
                        </fieldset>
                            <small class="form-text text-danger" v-if="errors.has('attributes')" v-text="errors.get('attributes')"></small>
                    </div>
                    <div class="col-md-6" v-if="product_type == 'variable'">
                    </div>
                    <template v-if="product_type == 'variable'" v-for="(variation, index) in variations">
                        <div class="col-md-6">
                            <label>{{variation.detail == null ? '' : variation.detail[0].name}}</label>
                            <fieldset class="form-group mb-3 d-flex">
                                <select class="single-select w-100 mb-3 categories-select ms-offscreen" v-model="variationData['variation_'+variation.attribute_id]" multiple @change="setVariations('variation_'+variation.attribute_id)" :disabled="editChild == true">
                                    <option value="" selected disabled>Select {{variation.detail == null ? '' : variation.detail[0].name}}</option>
                                    <option v-for="variationDetail in variation.variations" v-bind:value="variationDetail.id" :set="allVariations[variationDetail.id] = variationDetail.detail == null ? '' : variationDetail.detail[0].name">
                                    {{ variationDetail.detail == null ? '' : variationDetail.detail[0].name }}
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </template>
                    <template v-if="product_type == 'variable'" v-for="(combination_detail, index) in combinationDetail">
                        <template v-if="index == 0">
                            <div class="col-md-3">Variant</div>
                            <div class="col-md-3">Variat Price</div>
                            <div class="col-md-3">SKU</div>
                            <div class="col-md-3">Image</div>
                        </template>
                        
                        <div class="col-md-3 mt-3">
                            {{combination_detail.variation_name}}
                        </div>
                        <div class="col-md-3 mt-3">
                            <input type="text" :name="combination_detail.price" v-model="combinationPrice[combination_detail.price]" v-on:input="setCombinationPrice(combination_detail.price,combinationPrice[combination_detail.price])" />
                        </div>
                        <div class="col-md-3 mt-3">
                            <input type="text" :name="combination_detail.sku" v-model="combinationSku[combination_detail.sku]"  v-on:input="setCombinationSku(combination_detail.sku,$event.target.value)" />
                            
                        </div>
                        <div class="col-md-3 mt-3">
                            <button type="button" class="btn btn-primary" @click="toggleImageSelect(combination_detail.gallary)">Upload Media</button>
                            <img v-if="combinationGalleryPath[combination_detail.gallary] != '' && combinationGalleryPath[combination_detail.gallary] != null" :src="combinationGalleryPath[combination_detail.gallary]" style="width:100px;height:100px;"/>
                        </div>
                            
                    </template>

                </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a data-toggle="pill" @click.prevent="setActive('info-tab')" :class="{ active: isActive('info-tab') }" class="btn btn-dark swipe-to-top cta ">Back</a>
                <a data-toggle="pill" href="#" class="btn btn-primary cta" @click.prevent="setActive('seo-tab')" :class="{ active: isActive('seo-tab') }">Continue</a>
            </div>
        </div>
        <attach-image @toggleImageSelect="toggleImageSelect" :showModal="showModal" @setImage="setImage"/>
    </div>
</template>

<script>

export default {
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            units: [],
            new_sku: [],
            brands: [],
            attributes: [],
            variations: [],
            product_type: '',
            attribute: '',
            selectedAttribute: [],
            product_status: true,
            is_featured: true,
            is_points: true,
            product_unit: '',
            product_weight: '',
            brand_id: '',
            price: '',
            sku:'',
            discount_price: '',
            product_min_order: 1,
            product_max_order: 5,
            combinationPrice:{},
            combinationSku:{},
            combinationGallery:{},
            combinationGalleryPath:{},
            variationData:{},
            combinations:[],
            combinationDetail: [],
            allVariations: [],
            showModal:false,
            currentSelectedGalleryName:'',
            lastSku:'',
            token: [],
            edit_combination_detail: [],
            editChild: false,
            displayClearBtn: 0,
        };
    },
    methods: {
        // fetchSku() {
        //     this.$parent.$parent.loading = true;
        //     var token = localStorage.getItem('token');
        //     const config = {
        //         headers: {
        //             Authorization: `Bearer ${token}`
        //         }
        //     };
        //     var responseData = {};

        //     axios.post('/api/admin/product/sku', {}, this.token)
        //         .then(res => {
        //             if (res.data.status == "Success") {
        //                 this.lastSku = res.data.data;
        //                 this.makeCombinationData();
        //             }
        //         })
        //         .finally(() => (this.$parent.$parent.loading = false));
        // },
        fetchUnits() {
            this.$parent.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/unit?getAllData=1&getDetail=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.units = res.data.data;
                    }
                })
                .finally(() => (this.$parent.$parent.loading = false));
        },
        fetchAttributes() {
            this.$parent.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/attribute?getAllData=1&getDetail=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.attributes = res.data.data;
                    }
                })
                .finally(() => (this.$parent.$parent.loading = false));
        },
        fetchBrands() {
            this.$parent.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/brand?getAllData=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.brands = res.data.data;
                    }
                })
                .finally(() => (this.$parent.$parent.loading = false));
        },
        setUnit(value) {
            this.$emit('setUnitInChild', value);
        },
        setBrand(value) {
            this.$emit('setBrandInChild', value);
        },
        setProductWeight(value) {
            this.$emit('setProductWeightInChild', value);
        },
        setProductMinOrder(value) {
            this.$emit('setProductMinOrderInChild', value);
        },
        setProductMaxOrder(value) {
            this.$emit('setProductMaxOrderInChild', value);
        },
        setProductsku(value) {
            this.$emit('setProductskuInChild', value);
            
        },
        setPrice(value) {
            this.$emit('setPriceInChild', value);
        },
        setDiscountPrice(value) {
            this.$emit('setDiscountPriceInChild', value);
        },
        setProductType(value) {
            this.$emit('setProductTypeInChild', value);
        },
        setProductStatus(value) {
            this.$emit('setProductStatusInChild', value);
        },
        setIsFeatured(value) {
            this.$emit('setIsFeaturedInChild', value);
        },
        setIsPoints(value) {
            this.$emit('setIsPointsInChild', value);
        },
        
        setAttributes(value) {
            this.$emit('setAttributesInChild', value);
        },
        isActive(value) {
            this.$emit('isActiveInChild', value);
        },
        setActive(value) {
            this.$emit('setActiveInChild', value);
        },
        setCombinationPrice(name,price) {
            console.log(name,price)
            var newprice = price != null ? price : this.price;
            if(this.combinationPrice[name] == null){
                this.combinationPrice[name] = newprice;
            }
            this.$emit('setCombinationPriceInChild', name, newprice);
        },
        setCombinationSku(name,sku) {
            console.log(name,sku);
            var newsku = sku != null ? sku : this.sku;

            this.$emit('setCombinationSkuInChild', name, newsku);
        },
        setCombinationGallery(name) {
            if(this.combinationGallery[name] == null){
                this.combinationGallery[name] = 0;
            }
            this.$emit('setCombinationGalleryInChild', name, this.combinationGallery[name]);
        },
        unsetVariationData(){
            this.variations = [];
            this.variationData = {};
            this.selectedAttribute = [];
            this.combinationDetail = [];
            this.combinationPrice = {};
            this.combinationSku = {};
            this.combinationGallery = {};
            this.combinations = [];
            this.combinationGalleryPath = {};
            this.displayClearBtn = 0;

        },
        setVariations(name) {
            if(this.edit == 0 && (this.price == '' || this.sku == '')){
                this.$toaster.error('Price or Sku Field can"t be empty');
                return
            }

            this.$emit('setVariationsInChild', name, this.variationData[name]);
            // Check variation is selected against every attribute
            var totalVariations = 0;


            for(var i= 0; i < this.selectedAttribute.length; i++){
                // console.log(this.variationData[i]);
                if(this.variationData['variation_'+this.selectedAttribute[i]].length > 0){
                    totalVariations = parseInt(totalVariations) + 1;
                }
            }

            if(this.selectedAttribute.length != totalVariations){
                this.combinationDetail = [];
                return;
            }
            if(this.edit == 0){
                this.displayClearBtn = 1;
            }

            // create product combinations
            this.combinationDetail = [];
            this.combinationPrice = {};
            this.combinationSku = {};
            this.combinationGallery = {};
            this.combinations = [];
            for(var i= 0; i < this.selectedAttribute.length; i++){
                this.combinations.push(this.variationData['variation_'+this.selectedAttribute[i]]);
            }
            
            this.makeCombinationData();
            
        },

        makeCombinationData(){
            var res = this.cartesian(this.combinations);
            console.log(this.lastSku,"last sku");
            var new_sku,sku_no;
            new_sku = this.lastSku;
            for(var i= 0; i < res.length; i++){
                    var arr = {};
                    var price = 'combination_price_';
                    var sku = 'combination_sku_';
                    var gallary = 'combination_gallary_';
                    var variation_name = '';
                    for(var j= 0; j < res[i].length; j++){
                        if(this.allVariations[res[i][j]] == null){
                            continue;
                        }
                        if (res[i].length - 1 == j) {
                            
                           if(!this.edit){
                            arr.new_sku = this.sku+'-'+(i+1);
                            arr.price = this.price;
                           }
                            variation_name += this.allVariations[res[i][j]] == null ? '' : this.allVariations[res[i][j]];
                            arr.variation_name = variation_name;
                            
                            arr.price = price+res[i][j];
                            arr.sku = sku + res[i][j];
                            arr.gallary = gallary + res[i][j];
                            if(!this.edit){
                                this.setCombinationPrice(arr.price,null);
                                this.combinationSku[arr.sku] = arr.new_sku;
                                this.setCombinationSku(arr.sku,null);
                            }
                        } else {
                            variation_name += this.allVariations[res[i][j]] == null ? '' : this.allVariations[res[i][j]]+' - ';
                            
                            price = price + res[i][j]+'_';
                            sku = sku + res[i][j]+'_';
                            gallary = gallary + res[i][j]+'_';
                        }
                    }
                    if(arr.hasOwnProperty('price') != false){

                        this.combinationDetail.push(arr);
                    }
                    
            }
            // console.log(this.edit_combination_detail.length);
            if(this.combinationDetail.length > 0 && this.edit_combination_detail.length > 0){
                for(var i= 0; i < res.length; i++){
                    var variation_id = [];
                    var price_name = 'combination_price_';
                    var sku_name = 'combination_sku_';
                    var gallary_name = 'combination_gallary_';
                    for(var j= 0; j < res[i].length; j++){
                        variation_id.push(res[i][j]);
                        if (res[i].length - 1 == j) {
                            price_name = price_name+res[i][j];
                            sku_name = sku_name+res[i][j];
                            gallary_name = gallary_name+res[i][j];
                   
                            for(var j = 0; j < this.edit_combination_detail.length; j++){
                                var is_combination = [];
                                var edit_variation_id = [];
                                for(var jj = 0; jj < this.edit_combination_detail[j].combination.length; jj++){
                                    if(variation_id.indexOf(this.edit_combination_detail[j].combination[jj].variation_id) > -1){
                                        is_combination.push(1);
                                    }
                                    else{
                                        is_combination.push(0);
                                    }
                                    
                                }
                                if(is_combination.indexOf(0) == -1){
                                    // console.log(price_name + ' => ' + this.edit_combination_detail[j].price);
                                    this.combinationPrice[price_name] = this.edit_combination_detail[j].price;
                                    this.setCombinationPrice(price_name,this.edit_combination_detail[j].price);
                                    this.combinationSku[sku_name] = this.edit_combination_detail[j].sku;
                                    
                                    this.setCombinationSku(sku_name,this.edit_combination_detail[j].sku);
                                    this.combinationGalleryPath[gallary_name] = '/gallary/'+this.edit_combination_detail[j].gallary.gallary_name;
                                    this.combinationGallery[gallary_name] = this.edit_combination_detail[j].gallary.id;
                                    this.setCombinationGallery(gallary_name);
                                }


                            }
                        }
                        else{
                            price_name = price_name+res[i][j]+'_';
                            sku_name = sku_name+res[i][j]+'_';
                            gallary_name = gallary_name+res[i][j]+'_';
                        }
                    }
                    
                    
                    
                }
            }

                        
        },

        formatNumberLength(num, length) {
            var r = "" + num;
            while (r.length < length) {
                r = "0" + r;
            }
            return r;
        },

        searchVariationName(variation_id){
            for (var i=0; i < this.variations.length; i++) {
                for (var j=0; i < this.variations[i].variations.length; j++) {
                    if (this.variations[i].variations[j].id == variation_id) {
                        return this.variations[i].variations[j].detail == null ? '' : this.variations[i].variations[j].detail[0].name;
                    }
                }
            }
        },

        cartesian(args) {
            var r = [], max = args.length-1;
            function helper(arr, i) {
                for (var j=0, l=args[i].length; j<l; j++) {
                    var a = arr.slice(0); // clone arr
                    a.push(args[i][j]);
                    if (i==max)
                        r.push(a);
                    else
                        helper(a, i+1);
                }
            }
            helper([], 0);
            return r;
        },
        getVariation(){
            this.$parent.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            if(this.selectedAttribute.indexOf(this.attribute) < 0){
              this.selectedAttribute.push(this.attribute);
              this.setAttributes(this.attribute);
           }
           else{
               this.$parent.$parent.loading = false;
               return false;
           }
            var name = 'variation_'+this.attribute;
            this.$set(this.variationData, name, []);

            axios.get('/api/admin/attribute/'+this.attribute+'?getVariation=1&getDetail=1', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.variations.push(res.data.data);
                        // this.variations = res.data.data;
                    }
                })
                .finally(() => (this.$parent.$parent.loading = false));
        },
        toggleImageSelect(name){
            this.showModal = !this.showModal;
            this.currentSelectedGalleryName = name;
        },
        setImage(gallary){
            // console.log(gallary);
            this.combinationGalleryPath[this.currentSelectedGalleryName] = gallary.gallary_path;
            this.combinationGallery[this.currentSelectedGalleryName] = gallary.gallary_id;
            this.setCombinationGallery(this.currentSelectedGalleryName);
        }
    },
    watch:{
        product(newVal, oldVal){
        console.log(newVal,"newval");
        this.editChild = this.$parent.edit;
        this.product_type = newVal.product_type;
        this.sku = newVal.sku;
        
        this.product_status = newVal.product_status == 'inactive' ? 0 : 1;
        this.is_featured = newVal.is_featured == true || newVal.is_featured == 'true' ? 1 : 0;
        this.is_points = newVal.is_points == true || newVal.is_points == 'true' ? 1 : 0;
        this.product_unit = newVal.product_unit;
        this.brand_id = newVal.brand_id;
        this.price = parseFloat(newVal.price);
                
        this.discount_price = newVal.discount_price;
        this.product_max_order = newVal.product_max_order;
        this.product_min_order = newVal.product_min_order;
        this.product_weight = newVal.product_weight;

        console.log(this.sku,"sku")
        if(newVal.product_type == 'variable'){
            
            this.edit_combination_detail = newVal.combination_detail;
            
            newVal.attributes.map((attribute_id, index) => {
                this.attribute = attribute_id;
                this.getVariation();

                setTimeout(() => {
                    for(var i = 0; i < newVal.combination[attribute_id].variations.length; i++){
                        this.variationData['variation_'+attribute_id].push(newVal.combination[attribute_id].variations[i].product_variation.id);
                        }
                    this.setVariations('variation_'+attribute_id); 
                 }, 3000);

                // this.setVariations('variation_'+attribute_id);
            });


        }
        
        }
    },
    mounted() {
        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchUnits();
        this.fetchBrands();
        this.fetchAttributes();
    },
    props: ['product', 'errors', 'edit'],
};
</script>
