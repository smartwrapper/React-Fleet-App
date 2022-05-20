<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\HomeBanner;

class HomeBannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeBanner::where('id', '>', '0')->delete();
        HomeBanner::insertOrIgnore([
            'banner_name'=>'banners_1',
            'language_id'=>'1',
            'content'=>'<div class="parallax-banner-text"><h2>Parallax Banner One</h2><h4>Sunday Special</h4><div class="hover-link"><a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">Shop Now</a></div></div>',
            'gallary_id'=>'41',
            
         ]);	
         HomeBanner::insertOrIgnore([
            'banner_name'=>'banners_2',
            'language_id'=>'1',
            'content'=>'<div class="parallax-banner-text">        <h2>Parallax Banner Two</h2>            <h4>Farm Fresh</h4>            <div class="hover-link">               <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">Shop Now</a>        </div>      </div>',
            'gallary_id'=>'41',
            
         ]);	
         HomeBanner::insertOrIgnore([
            'banner_name'=>'banners_3',
            'language_id'=>'1',
            'content'=>'<div class="parallax-banner-text">      <h2>Parallax Banner Three</h2>          <h4>Your Favorite</h4>          <div class="hover-link">             <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">Shop Now </a>      </div>    </div>',
            'gallary_id'=>'41',
            
         ]);	
         HomeBanner::insertOrIgnore([
            'banner_name'=>'banners_1',
            'language_id'=>'2',
            'content'=>'<div class="parallax-banner-text">      <h2> مهرجان طعام</h2>         <h4>رمضان خاص</h4>         <div class="hover-link">             <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">تسوق الآن</a>      </div>    </div>',
            'gallary_id'=>'41',
            
         ]);	
         HomeBanner::insertOrIgnore([
            'banner_name'=>'banners_2',
            'language_id'=>'2',
            'content'=>'<div class="parallax-banner-text">      <h2>فواكه وخضروات طازجة</h2>         <h4>الزراعية الطازجة</h4>         <div class="hover-link">             <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">عرض كل المدى</a>      </div>    </div>',
            'gallary_id'=>'41',
            
         ]);	
         HomeBanner::insertOrIgnore([
            'banner_name'=>'banners_3',
            'language_id'=>'2',
            'content'=>'<div class="parallax-banner-text">      <h2>منطقة البقالة</h2>         <h4>المفضلة لديك</h4>         <div class="hover-link">             <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">اشتري الآن</a>      </div>    </div>	
            ',
            'gallary_id'=>'41',
            
         ]);
         
    }
}
