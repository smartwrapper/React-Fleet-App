<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\CurrentTheme;
class HomePageBuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrentTheme::where('id', '>', '0')->delete();
        CurrentTheme::insertOrIgnore([
                'home_setting' => '[{"id":"1","name":"Header","template_postfix":"header","value":"style1","display":true,"class":"","skip":true,"image":"/assets/images/prototypes/header-styles/header1.jpg","multiple":true},{"id":"2","name":"Carousal","template_postfix":"slider","value":"style1","display":true,"class":"","skip":true,"image":"/assets/images/prototypes/carousal-styles/carousal1.jpg","multiple":true},{"id":"5","name":"Banner","template_postfix":"banner","value":"style2","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/banner-styles/banner2.jpg","multiple":true},{"id":"8","name":"Product Tabs","template_postfix":"tabs","value":"product_tabs","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/tab.jpg","multiple":false},{"id":"3","name":"categories","template_postfix":"category","value":"style2","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/categories.jpg","multiple":false},{"id":"4","name":"Home Banner 1","template_postfix":"banner-1","value":"ad_section_1","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/ad_banner_section.jpg","multiple":false},{"id":"7","name":"Latest Product","template_postfix":"new-arrival","value":"latest_product","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/newest_product.jpg","multiple":false},{"id":"6","name":"Home Banner 2","template_postfix":"banner-2","value":"ad_section_2","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/sec_ad_section.jpg","multiple":false},{"id":"14","name":"Week Sale","template_postfix":"week-sale","value":"week-sale","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/weekly-sale.png","multiple":false},{"id":"9","name":"Home Banner 3","template_postfix":"banner-3","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/ad_banner_section.jpg","multiple":false},{"id":"11","name":"Blog section","template_postfix":"news","value":"blog_section","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/blog_section.jpg","multiple":false},{"id":"13","name":"Info","template_postfix":"info","value":"info","display":true,"class":"moving-card","skip":false,"image":"/assets/images/prototypes/info_boxes.jpg","multiple":false},{"id":"15","name":"Footer","template_postfix":"footer","value":"style1","display":true,"class":"","skip":true,"image":"/assets/images/prototypes/footer-styles/footer1.png","multiple":true}]'
            
        ]);
        
     
    }
}
