<?php
namespace Database\Seeders;

use App\Models\Admin\Slider;
use Illuminate\Database\Seeder;

class SlidersSeeder extends Seeder
{
    public function run()
    {

        Slider::where('id', '>', '0')->delete();
        
        Slider::insertOrIgnore([
            'title'=>'Slider One',
            'description'=>'Slider 1 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'1',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider Two',
            'description'=>'Slider 2 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'1',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق واحد',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'1',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق الثاني',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'1',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider One',
            'description'=>'Slider 1 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'2',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider Two',
            'description'=>'Slider 2 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'2',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق واحد',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'2',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق الثاني',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'2',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider One',
            'description'=>'Slider 1 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'3',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider Two',
            'description'=>'Slider 2 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'3',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق واحد',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'3',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق الثاني',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'3',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider One',
            'description'=>'Slider 1 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'4',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider Two',
            'description'=>'Slider 2 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'4',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق واحد',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'4',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق الثاني',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'4',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);

         Slider::insertOrIgnore([
            'title'=>'Slider One',
            'description'=>'Slider 1 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'5',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'Slider Two',
            'description'=>'Slider 2 Text Goes Here',
            'language_id'=>'1',
            'slider_type_id'=>'5',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق واحد',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'5',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);	
         Slider::insertOrIgnore([
            'title'=>'المنزلق الثاني',
            'description'=>'يظهر النص المنزلق هنا',
            'language_id'=>'2',
            'slider_type_id'=>'5',
            'slider_navigation_id'=>'1',
            'gallary_id'=>'2',
            'ref_id'=>'0',
            'url'=>'https://codecanyon.net/user/themes-coder',
            'created_by'=>'1',
            'updated_by'=>'1',
            
         ]);
         
    }
}