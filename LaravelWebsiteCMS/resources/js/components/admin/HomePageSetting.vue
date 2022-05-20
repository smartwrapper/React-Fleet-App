<template>

<div>

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-header border-0 align-items-center">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Home Page Builder
                    </h3>
                </div>
                <div class="card-body">
                    <ol class="dd-list">
                    <draggable v-model="elements" :group="elements" @start="drag=true" @end="drag=false" draggable=".moving-card">
                        <li style="cursor:pointer;" class="dd-item" v-for="(element,index) in elements" :key="element.id" :class="element.class">
                            <div class="dd-handle">{{element.name}}</div>
                            <div class="inner-content">
                                <button style="margin-right: 30px !important;" class="btn btn-primary" v-if="element.multiple == true"  @click="toggleModal(element.name,index)">Choose</button>
                                    <div class="custom-control switch custom-switch-info custom-switch custom-control-inline mr-0">
                                        <input type="checkbox" class="custom-control-input" :checked="element.display == true" :id="'customSwitchcolor'+element.id" @change="toggleDisplay(index)">
                                        <label class="custom-control-label mr-1" :for="'customSwitchcolor'+element.id" style="vertical-align: middle !important;">
                                        </label>
                                    </div>
                                
                            </div>
                            <img :src="element.image"/>
                        </li>

                    </draggable>
                    </ol>
                </div>
            </div>
            <button @click="updateSetting()" type="submit" class="btn btn-primary" style="float: right;">Update Home Page Builder Settings</button>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
    <div class="modal fade text-left" :class="{ 'show': toggleModel }" style="overflow:auto" id="imagepopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" :style="[toggleModel ? {'display': 'block !important'} : {'display': 'none'}]">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body" >
                <div v-for="(modelRenderImage, index) in modelRenderImagesArray" style="width:100%;" >
                    <img  :src="modelRenderImage[1]" style="width:100%;" :style="selectedItem== modelRenderImage[1] || modelRenderImage[2] == 'selected' ? 'border:4px solid green' :'border:4px solid #E8E8E8' " @click="setSelectedItem(modelRenderImage[1],modelRenderImage[0], index)"/>
                    <hr />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal" @click="toggleModal()">
                    <span class="">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
</div>


</template>

<script>
import draggable from 'vuedraggable'

export default {
    components: {
            draggable,
        },
     data() {
         return {
             header_styles:[
                 ['style1',"/assets/images/prototypes/header-styles/header1.jpg", ''],
                  ['style2',"/assets/images/prototypes/header-styles/header2.jpg", ''],
                  ['style3',"/assets/images/prototypes/header-styles/header3.jpg", ''],
                  ['style4',"/assets/images/prototypes/header-styles/header4.jpg", ''],
                  ['style5',"/assets/images/prototypes/header-styles/header5.jpg", ''],
                  ['style6',"/assets/images/prototypes/header-styles/header6.jpg", ''],
                  ['style7',"/assets/images/prototypes/header-styles/header7.jpg", ''],
                  ['style8',"/assets/images/prototypes/header-styles/header8.jpg", ''],
            ],
            footer_styles:[
                 ['style1',"/assets/images/prototypes/footer-styles/footer1.png", ''],
                 ['style2',"/assets/images/prototypes/footer-styles/footer2.png", ''],
                 ['style3',"/assets/images/prototypes/footer-styles/footer3.png", ''],
                 ['style4',"/assets/images/prototypes/footer-styles/footer4.png", ''],
                 ['style5',"/assets/images/prototypes/footer-styles/footer5.png", ''],
                 ['style6',"/assets/images/prototypes/footer-styles/footer6.png", ''],
                 ['style7',"/assets/images/prototypes/footer-styles/footer7.png", ''],
                 ['style8',"/assets/images/prototypes/footer-styles/footer8.png", ''],
            ],
            carousal_styles:[
                 ['style1',"/assets/images/prototypes/carousal-styles/carousal1.jpg", ''],
                 ['style2',"/assets/images/prototypes/carousal-styles/carousal2.jpg", ''],
                 ['style3',"/assets/images/prototypes/carousal-styles/carousal3.jpg", ''],
                 ['style4',"/assets/images/prototypes/carousal-styles/carousal4.jpg", ''],
                 ['style5',"/assets/images/prototypes/carousal-styles/carousal5.jpg", ''],
            ],
            banner_styles:[
                 ['style1',"/assets/images/prototypes/banner-styles/banner1.jpg", ''],
                 ['style2',"/assets/images/prototypes/banner-styles/banner2.jpg", ''],
                 ['style3',"/assets/images/prototypes/banner-styles/banner3.jpg", ''],
                 ['style4',"/assets/images/prototypes/banner-styles/banner4.jpg", ''],
                 ['style5',"/assets/images/prototypes/banner-styles/banner5.jpg", ''],
                 ['style6',"/assets/images/prototypes/banner-styles/banner6.jpg", ''],
                 ['style7',"/assets/images/prototypes/banner-styles/banner7.jpg", ''],
                 ['style8',"/assets/images/prototypes/banner-styles/banner8.jpg", ''],
                 ['style9',"/assets/images/prototypes/banner-styles/banner9.jpg", ''],
                 ['style10',"/assets/images/prototypes/banner-styles/banner10.jpg", ''],
                 ['style12',"/assets/images/prototypes/banner-styles/banner11.jpg", ''],
                 ['style13',"/assets/images/prototypes/banner-styles/banner12.jpg", ''],
                 ['style14',"/assets/images/prototypes/banner-styles/banner13.jpg", ''],
                 ['style15',"/assets/images/prototypes/banner-styles/banner14.jpg", ''],
                 ['style16',"/assets/images/prototypes/banner-styles/banner15.jpg", ''],
                 ['style17',"/assets/images/prototypes/banner-styles/banner16.jpg", ''],
                 ['style18',"/assets/images/prototypes/banner-styles/banner17.jpg", ''],
                 ['style19',"/assets/images/prototypes/banner-styles/banner18.jpg", ''],
                 ['style10',"/assets/images/prototypes/banner-styles/banner19.jpg", ''],
            ],
            toggleModel:false,
            selectedheader:"",
            selectedbanner:"",
            selectedcarousal :"",
            selectedfooter :"",

            selectedName:"",
            selectedItem:"",
            selectedIndex:"",
            modelRenderImagesArray:[],
            elements: [
                {
                    "id": "1",
                    "name": "Header",
                    "template_postfix": "header",
                    "value": "style1",
                    "display": true,
                    "class": '',
                    "skip":true,
                    "image":"/assets/images/prototypes/header-styles/header1.jpg",
                    "multiple":true
                },
                {
                    "id": "2",
                    "name": "Carousal",
                    "template_postfix": "slider",
                    "value": "style1",
                    "display": true,
                    "class": '',
                    "skip":true,
                    "image":"/assets/images/prototypes/carousal-styles/carousal1.jpg",
                    "multiple":true
                },
                {
                    "id": "3",
                    "name": "categories",
                    "template_postfix": "category",
                    "value": "categories",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/categories.jpg",
                    "multiple":false
                },
                {
                    "id": "4",
                    "name": "Home Banner 1",
                    "template_postfix": "banner-1",
                    "value": "ad_section_1",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/ad_banner_section.jpg",
                    "multiple":false
                },
                {
                    "id": "5",
                    "name": "Banner",
                    "template_postfix": "banner",
                    "value": "style1",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/banner-styles/banner1.jpg",
                    "multiple":true
                },
                {
                    "id": "6",
                    "name": "Home Banner 2",
                    "template_postfix": "banner-2",
                    "value": "ad_section_2",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/sec_ad_section.jpg",
                    "multiple":false
                },
                {
                    "id": "7",
                    "name": "Latest Product",
                    "template_postfix": "new-arrival",
                    "value": "latest_product",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/newest_product.jpg",
                    "multiple":false
                },
                {
                    "id": "8",
                    "name": "Product Tabs",
                    "template_postfix": "tabs",
                    "value": "product_tabs",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/tab.jpg",
                    "multiple":false
                },
                {
                    "id": "9",
                    "name": "Home Banner 3",
                    "template_postfix": "banner-3",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/ad_banner_section.jpg",
                    "multiple":false
                },
                {
                    "id": "11",
                    "name": "Blog section",
                    "template_postfix": "news",
                    "value": "blog_section",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/blog_section.jpg",
                    "multiple":false
                },
                {
                    "id": "13",
                    "name": "Info",
                    "template_postfix": "info",
                    "value": "info",
                   "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/info_boxes.jpg",
                    "multiple":false
                },
                {
                    "id": "14",
                    "name": "Week Sale",
                    "template_postfix": "week-sale",
                    "value": "week-sale",
                    "display": true,
                    "class": 'moving-card',
                    "skip":false,
                    "image":"/assets/images/prototypes/weekly-sale.png",
                    "multiple":false
                },
                {
                    "id": "15",
                    "name": "Footer",
                    "template_postfix": "footer",
                    "value": "style1",
                    "display": true,
                    "class": '',
                    "skip":true,
                    "image":"/assets/images/prototypes/footer-styles/footer1.png",
                    "multiple":true
                },
                
                ]
         }
     },
     methods : {
         fetchHomePageSetting() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/current-theme', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.elements = JSON.parse(res.data.data.home_setting);
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
         fetchWebThemeSetting() {
            this.$parent.loading = true;
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            axios.get('/api/admin/setting?type=web_theme_setting', config)
                .then(res => {
                    if (res.data.status == "Success") {
                        for (var i = 0; i < res.data.data.length; i++) {
                            if(res.data.data[i].setting_key == 'header_style'){
                                this.selectedheader = res.data.data[i].setting_value;
                                var index1 = '-1';
                                for(var j = 0; j < this.header_styles.length; j++){
                                    if(res.data.data[i].setting_value == this.header_styles[j][0]){
                                        index1 = j;
                                    }
                                    else{
                                        this.header_styles[j][2] = '';
                                    }
                                }
                                if(index1 != '-1'){
                                    this.header_styles[index1][2] = 'selected';
                                }
                            }
                            
                            if(res.data.data[i].setting_key == 'Footer_style'){
                                this.selectedfooter = res.data.data[i].setting_value;
                                var index1 = '-1';
                                for(var j = 0; j < this.footer_styles.length; j++){
                                    if(res.data.data[i].setting_value == this.footer_styles[j][0]){
                                        index1 = j;
                                    }
                                    else{
                                        this.footer_styles[j][2] = '';
                                    }
                                }
                                if(index1 != '-1'){
                                    this.footer_styles[index1][2] = 'selected';
                                }
                            }
                            if(res.data.data[i].setting_key == 'slider_style'){
                                this.selectedcarousal = res.data.data[i].setting_value;
                                var index1 = '-1';
                                for(var j = 0; j < this.carousal_styles.length; j++){
                                    if(res.data.data[i].setting_value == this.carousal_styles[j][0]){
                                        index1 = i;
                                    }
                                    else{
                                        this.carousal_styles[j][2] = '';
                                    }
                                }
                                if(index1 != '-1'){
                                    this.carousal_styles[index1][2] = 'selected';
                                }
                            }
                            if(res.data.data[i].setting_key == 'banner_style'){
                                this.selectedbanner = res.data.data[i].setting_value;
                                var index1 = '-1';
                                for(var j = 0; j < this.banner_styles.length; j++){
                                    if(res.data.data[i].setting_value == this.banner_styles[j][0]){
                                        index1 = j;
                                    }
                                    else{
                                        this.banner_styles[j][2] = '';
                                    }
                                
                                }
                                if(index1 != '-1'){
                                    this.banner_styles[index1][2] = 'selected';
                                }
                            }
                        }
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },
         setSelectedItem(item,index, index1 = ''){
             this.selectedItem = item;
              if(this.selectedName == "Header"){
                 this.selectedheader =index;
                 this.elements[0]['value'] = index;
                 for(var i = 0; i < this.header_styles.length; i++){
                     this.header_styles[i][2] = '';
                 }
                 this.header_styles[index1][2] = 'selected';
             }
             else if(this.selectedName == "Carousal"){
                 this.selectedcarousal =index;
                 this.elements[1]['value'] = index;
                 for(var i = 0; i < this.carousal_styles.length; i++){
                     this.carousal_styles[i][2] = '';
                 }
                 this.carousal_styles[index1][2] = 'selected';
             }
             else if(this.selectedName == "Banner"){
                 this.selectedbanner =index;
                 this.elements[4]['value'] = index;
                 for(var i = 0; i < this.banner_styles.length; i++){
                     this.banner_styles[i][2] = '';
                 }
                 this.banner_styles[index1][2] = 'selected';
             }
             else if(this.selectedName == "Footer"){
                 this.selectedfooter =index;
                 this.elements[12]['value'] = index;
                 for(var i = 0; i < this.footer_styles.length; i++){
                     this.footer_styles[i][2] = '';
                 }
                 this.footer_styles[index1][2] = 'selected';
             }
            this.elements[this.selectedIndex].image = item;
         },
         toggleModal(name,index){
             this.selectedName = name;
             this.selectedIndex = index;
             if(name == "Header"){
                 this.modelRenderImagesArray = this.header_styles;
             }
             else if(name == "Carousal"){
                 this.modelRenderImagesArray = this.carousal_styles;
             }
             else if(name == "Banner"){
                 this.modelRenderImagesArray = this.banner_styles;
             }
             else if(name == "Footer"){
                 this.modelRenderImagesArray = this.footer_styles;
             }
             this.toggleModel = !this.toggleModel;
         },
         toggleDisplay(index){
             this.elements[index].display = !this.elements[index].display
         },
         updateSetting() {
            this.$parent.loading = true;
            var key = ['header_style','Footer_style','slider_style','banner_style'];
            var value = [this.selectedheader,this.selectedfooter,this.selectedcarousal,this.selectedbanner];
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/web_theme_setting', {
                    _method: 'PUT',
                    key,
                    value
                }, config)
                .then(res => {
                    // if (res.data.status == "Success") {
                    //     this.$toaster.success(res.data.message)
                    // } else if (res.data.status == 'Error') {
                    //     this.$toaster.error(res.data.message)
                    // }

                })
                .catch(err => {
                    // if (err.response.data.status == 'Error') {
                    //     this.$toaster.error(err.response.data.message)
                    // }
                })
                var home_setting = JSON.stringify(this.elements);
                axios.post('/api/admin/current-theme', {
                    home_setting
                }, config)
                .then(res => {
                    if (res.data.status == "Success") {
                        this.$toaster.success(res.data.message)
                    } else if (res.data.status == 'Error') {
                        this.$toaster.error(res.data.message)
                    }

                })
                .catch(err => {
                    if (err.response.data.status == 'Error') {
                        this.$toaster.error(err.response.data.message)
                    }
                })
                .finally(() => (this.$parent.loading = false));

        }
     },
     mounted() {
         this.fetchWebThemeSetting();
         this.fetchHomePageSetting();
     }
};
</script>