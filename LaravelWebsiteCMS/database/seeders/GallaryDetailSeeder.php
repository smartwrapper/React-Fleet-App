<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\GallaryDetail;

class GallaryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GallaryDetail::where('id', '>', '0')->delete();
        GallaryDetail::insertOrIgnore([
            'gallary_id'=>'1',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/01-largelogo.png',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'1',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/01-mediumlogo.png',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'1',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/01-thumbnaillogo.png',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'2',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large01-slider.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'2',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium01-slider.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'2',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail01-slider.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'3',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109042527banner_270x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'3',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109042527banner_270x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'3',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109042527banner_270x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'4',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109025727banner_270x229.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'4',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109025727banner_270x229.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'4',
            'gallary_type'=>'thumbnail',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/thumbnail202109025727banner_270x229.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'5',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109042309banner_271x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'5',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109042309banner_271x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'5',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109042309banner_271x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'6',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109025813banner_368x550.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'6',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109025813banner_368x550.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'6',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109025813banner_368x550.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'7',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109025823banner_370x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'7',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109025823banner_370x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'7',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109025823banner_370x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'8',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109025851banner_370x220.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'8',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109025851banner_370x220.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'8',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109025851banner_370x220.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'9',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109025909banner_370x230.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'9',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109025909banner_370x230.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'9',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109025909banner_370x230.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'10',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109025939banner_370x230.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'10',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109025939banner_370x230.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'10',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109025939banner_370x230.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'11',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109020219banner_370x277.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'11',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109020219banner_370x277.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'11',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109020219banner_370x277.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'12',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109040046banner_370x493.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'12',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109040046banner_370x493.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'12',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109040046banner_370x493.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'13',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109045900banner_372x546.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'13',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109045900banner_372x546.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'13',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109045900banner_372x546.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'14',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109020247banner_470x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'14',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109020247banner_470x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'14',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109020247banner_470x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'15',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109020336banner_470x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'15',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109020336banner_470x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'15',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109020336banner_470x210.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'16',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109020344banner_568x298.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'16',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109020344banner_568x298.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'16',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109020344banner_568x298.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'17',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109042006banner_570x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'17',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109042006banner_570x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'17',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109042006banner_570x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'18',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109041942banner_570x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'18',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109041942banner_570x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'18',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109041942banner_570x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'19',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109020413banner_570x490.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'19',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109020413banner_570x490.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'19',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109020413banner_570x490.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'20',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109043135banner_770x259.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'20',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109043135banner_770x259.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'20',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109043135banner_770x259.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'21',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109045938banner_770x301.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'21',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109045938banner_770x301.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'21',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109045938banner_770x301.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'22',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109045900banner_372x546.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'22',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109045900banner_372x546.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'22',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109045900banner_372x546.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'23',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109045938banner_770x301.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'23',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109045938banner_770x301.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'23',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109045938banner_770x301.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'24',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109045420banner_270x229.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'24',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109045420banner_270x229.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'24',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109045420banner_270x229.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'25',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109041942banner_570x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'25',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109041942banner_570x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'25',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109041942banner_570x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'26',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109042006banner_570x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'26',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109042006banner_570x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'26',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109042006banner_570x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'27',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109042527banner_270x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'27',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109042527banner_270x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'27',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109042527banner_270x211.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'28',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109042309banner_271x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'28',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109042309banner_271x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'28',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109042309banner_271x451.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'29',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109040046banner_370x493.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'29',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109040046banner_370x493.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'29',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109040046banner_370x493.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'30',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109043135banner_770x259.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'30',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109043135banner_770x259.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'30',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109043135banner_770x259.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'31',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109054227banner_370x193.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'31',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109054227banner_370x193.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'31',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109054227banner_370x193.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'32',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109054758category900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'32',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109054758category900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'32',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109054758category900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'33',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109055140wUJPQ27501.png',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'33',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109055140wUJPQ27501.png',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'33',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109055140wUJPQ27501.png',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'34',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109050158product_1_900x900.jpg',
            
         ]);	
         
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'34',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109050158product_1_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'34',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109050158product_1_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'35',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109050215product_2_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'35',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109050215product_2_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'35',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109050215product_2_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'36',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109050235product_3_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'36',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109050235product_3_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'36',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109050235product_3_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'37',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109052217product_4_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'37',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109052217product_4_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'37',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109052217product_4_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'38',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109052232product_5_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'38',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109052232product_5_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'38',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109052232product_5_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'39',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109052248product_6_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'39',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109052248product_6_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'39',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109052248product_6_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'40',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109052304product_7_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'40',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109052304product_7_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'40',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109052304product_7_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'41',
            'gallary_type'=>'large',
            'height'=>'1600',
            'width'=>'1600',
            'path'=>'/gallary/large202109061656homebanner1600x800.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'41',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109061656homebanner1600x800.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'41',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109061656homebanner1600x800.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'42',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109081240product_8_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'42',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109081240product_8_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'42',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109081240product_8_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'43',
            'gallary_type'=>'large',
            'height'=>'900',
            'width'=>'900',
            'path'=>'/gallary/large202109081253product_9_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'43',
            'gallary_type'=>'medium',
            'height'=>'400',
            'width'=>'400',
            'path'=>'/gallary/medium202109081253product_9_900x900.jpg',
            
         ]);	
         GallaryDetail::insertOrIgnore([
            'gallary_id'=>'43',
            'gallary_type'=>'thumbnail',
            'height'=>'150',
            'width'=>'150',
            'path'=>'/gallary/thumbnail202109081253product_9_900x900.jpg',
            
         ]);
         
    }
}
