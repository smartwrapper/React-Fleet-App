<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\MenuBuilder;

class MenuBuilderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        MenuBuilder::where('id', '>', '0')->delete();
        MenuBuilder::insertOrIgnore([
                'menu' => '[
                    {
                        "id": 1628672836150,
                        "link": "",
                        "name": [
                            "Home",
                            "الصفحة الرئيسية"
                        ],
                        "page": "/",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2
                        ]
                    },
                    {
                        "id": 1628672997563,
                        "link": "",
                        "name": [
                            "Shop",
                            "محل"
                        ],
                        "page": "/shop",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2
                        ]
                    },
                    {
                        "id": 1628672976637,
                        "link": "",
                        "name": [
                            "Blog",
                            "مقالات"
                        ],
                        "page": "/blog",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2
                        ]
                    },
                    {
                        "id": 1628672935413,
                        "link": "",
                        "name": [
                            "Contact Us",
                            "اتصل بنا"
                        ],
                        "page": "/contact-us",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2
                        ]
                    }
                    
            ]'
            
        ]);
        
        
    }
}