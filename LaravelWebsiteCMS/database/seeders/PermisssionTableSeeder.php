<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use Illuminate\Database\Seeder;

class PermisssionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Permission::where('id', '>', '0')->delete();
        //1
         Permission::insertOrIgnore([
            'key' => 'Dashboard',
            'Value' => 'dashboard',
            'parent_id'=>0

        ]);

        //2
        Permission::insertOrIgnore([
            'key' => 'Media Module',
            'Value' => 'media',
            'parent_id'=>0
        ]);
        //3
        Permission::insertOrIgnore([
            'key' => 'Media Settings',
            'Value' => 'media-settings',
            'parent_id'=>2
        ]);
        //4
        Permission::insertOrIgnore([
            'key' => 'Manage Media',
            'Value' => 'manage-media',
            'parent_id'=>2
        ]);


        //5
        Permission::insertOrIgnore([
            'key' => 'Catalog',
            'Value' => 'catalog',
            'parent_id'=>0
        ]);
        //6
        Permission::insertOrIgnore([
            'key' => 'Product Unit',
            'Value' => 'product-unit-list',
            'parent_id'=>5
        ]);
        //7
        Permission::insertOrIgnore([
            'key' => 'Manage Product Unit',
            'Value' => 'product-unit-manage',
            'parent_id'=>5
        ]);

        //8
        Permission::insertOrIgnore([
            'key' => 'Product Attribute',
            'Value' => 'product-attribute-list',
            'parent_id'=>5

        ]);
        //9
        Permission::insertOrIgnore([
            'key' => 'Manage Product Attribute',
            'Value' => 'product-attribute-manage',
            'parent_id'=>5

        ]);

        //10
        Permission::insertOrIgnore([
            'key' => 'Product Variation',
            'Value' => 'product-variation-list',
            'parent_id'=>5

        ]);

        //11
        Permission::insertOrIgnore([
            'key' => 'Manage Product Variation',
            'Value' => 'product-variation-manage',
            'parent_id'=>5

        ]);

        //12
        Permission::insertOrIgnore([
            'key' => 'Product Brand',
            'Value' => 'product-brand-list',
            'parent_id'=>5

        ]);

        //13
        Permission::insertOrIgnore([
            'key' => 'Manage Product Brand',
            'Value' => 'product-brand-manage',
            'parent_id'=>5

        ]);

        //14
        Permission::insertOrIgnore([
            'key' => 'Product Category',
            'Value' => 'product-category-list',
            'parent_id'=>5

        ]);
        //15
        Permission::insertOrIgnore([
            'key' => 'Manage Product Category',
            'Value' => 'product-category-manage',
            'parent_id'=>5

        ]);
        //16
        Permission::insertOrIgnore([
            'key' => 'Product',
            'Value' => 'product-list',
            'parent_id'=>5

        ]);

        //17
        Permission::insertOrIgnore([
            'key' => 'Manage Product',
            'Value' => 'product-manage',
            'parent_id'=>5

        ]);

        //18
        Permission::insertOrIgnore([
            'key' => 'Product Reviews',
            'Value' => 'product-reviews',
            'parent_id'=>5

        ]);

        //19
        Permission::insertOrIgnore([
            'key' => 'Stock',
            'Value' => 'stock',
            'parent_id'=>0
        ]);

        //20
        Permission::insertOrIgnore([
            'key' => 'Stock List',
            'Value' => 'stock-list',
            'parent_id'=>19

        ]);

        //21
        Permission::insertOrIgnore([
            'key' => 'Manage Stock',
            'Value' => 'stock-manage',
            'parent_id'=>19

        ]);

        //22
        Permission::insertOrIgnore([
            'key' => 'Stock Transfer',
            'Value' => 'stock-transfer-list',
            'parent_id'=>19

        ]);

        //23
        Permission::insertOrIgnore([
            'key' => 'Manage Stock Transfer',
            'Value' => 'stock-transfer-manage',
            'parent_id'=>19

        ]);

        //24
        Permission::insertOrIgnore([
            'key' => 'Quotations',
            'Value' => 'quotation-list',
            'parent_id'=>0
        ]);

        //25
        Permission::insertOrIgnore([
            'key' => 'Manage Quotations',
            'Value' => 'quotation-manage',
            'parent_id'=>24
        ]);

        //26
        Permission::insertOrIgnore([
            'key' => 'Purchase',
            'Value' => 'purchase-list',
            'parent_id'=>0

        ]);

    
        //27
        Permission::insertOrIgnore([
            'key' => 'Manage Purchase',
            'Value' => 'purchase-manage',
            'parent_id'=>26

        ]);

        //28
        Permission::insertOrIgnore([
            'key' => 'Sale/Order',
            'Value' => 'sale-order',
            'parent_id'=>0
        ]);

        //29
        Permission::insertOrIgnore([
            'key' => 'Sale List',
            'Value' => 'sale-list',
            'parent_id'=>28
        ]);

        //30
        Permission::insertOrIgnore([
            'key' => 'Manage Sale',
            'Value' => 'sale-manage',
            'parent_id'=>28

        ]);

        //31
        Permission::insertOrIgnore([
            'key' => 'Order',
            'Value' => 'order-list',
            'parent_id'=>28

        ]);

        //32
        Permission::insertOrIgnore([
            'key' => 'POS',
            'Value' => 'pos',
            'parent_id'=>28

        ]);

        //33
        Permission::insertOrIgnore([
            'key' => 'Returns',
            'Value' => 'return',
            'parent_id'=>0
        ]);

        //34
        Permission::insertOrIgnore([
            'key' => 'Sale Return List',
            'Value' => 'sale-return-list',
            'parent_id'=>33
        ]);

        //35
        Permission::insertOrIgnore([
            'key' => 'Manage Sale Return',
            'Value' => 'sale-return-manage',
            'parent_id'=>33
        ]);

        //36
        Permission::insertOrIgnore([
            'key' => 'Purchase Return List',
            'Value' => 'purchase-return-list',
            'parent_id'=>33

        ]);

        //37
        Permission::insertOrIgnore([
            'key' => 'Manage Purchase Return',
            'Value' => 'purchase-return-manage',
            'parent_id'=>33

        ]);
        
        //38
        Permission::insertOrIgnore([
            'key' => 'Accounts',
            'Value' => 'account',
            'parent_id'=>0
        ]);
        
        //39
        Permission::insertOrIgnore([
            'key' => 'Account List',
            'Value' => 'account-list',
            'parent_id'=>38
        ]);
        //40
        Permission::insertOrIgnore([
            'key' => 'Manage Accounts',
            'Value' => 'account-manage',
            'parent_id'=>38

        ]);
        //41
        Permission::insertOrIgnore([
            'key' => 'Ledger Report',
            'Value' => 'ledger-report',
            'parent_id'=>38

        ]);

        //42
        Permission::insertOrIgnore([
            'key' => 'Assets Adjustment',
            'Value' => 'assets-adjustment',
            'parent_id'=>38

        ]);

        //43
        Permission::insertOrIgnore([
            'key' => 'Payments',
            'Value' => 'payment',
            'parent_id'=>38

        ]);

        //44
        Permission::insertOrIgnore([
            'key' => 'Reciepts',
            'Value' => 'reciepts',
            'parent_id'=>38

        ]);

        //45
        Permission::insertOrIgnore([
            'key' => 'Expense',
            'Value' => 'expense',
            'parent_id'=>38

        ]);

        //46
        Permission::insertOrIgnore([
            'key' => 'Blog/News',
            'Value' => 'blog-list',
            'parent_id'=>0
        ]);

        //47
        Permission::insertOrIgnore([
            'key' => 'Blog/News List',
            'Value' => 'blog-list',
            'parent_id'=>46
        ]);

        //48
        Permission::insertOrIgnore([
            'key' => 'Manage Blog/News',
            'Value' => 'blog-manage',
            'parent_id'=>46
        ]);

        //49
        Permission::insertOrIgnore([
            'key' => 'Content Page',
            'Value' => 'content-page-manage',
            'parent_id'=>0
            
        ]);

        //50
        Permission::insertOrIgnore([
            'key' => 'Content Page',
            'Value' => 'content-page-manage',
            'parent_id'=>49
        ]);

        //51
        Permission::insertOrIgnore([
            'key' => 'People',
            'Value' => 'people',
            'parent_id'=>0
        ]);

         //52
        Permission::insertOrIgnore([
            'key' => 'Roles',
            'Value' => 'role-list',
            'parent_id'=>51
        ]);

         //53   
        Permission::insertOrIgnore([
            'key' => 'Manage Roles',
            'Value' => 'role-manage',
            'parent_id'=>51

        ]);

         //54
        Permission::insertOrIgnore([
            'key' => 'Customers',
            'Value' => 'customer-list',
            'parent_id'=>51

        ]);

         //55
        Permission::insertOrIgnore([
            'key' => 'Manage Customers',
            'Value' => 'customer-manage',
            'parent_id'=>51

        ]);


         //56
        Permission::insertOrIgnore([
            'key' => 'Purchaser',
            'Value' => 'purchaser-list',
            'parent_id'=>51

        ]);

         //57
        Permission::insertOrIgnore([
            'key' => 'Manage Purchaser',
            'Value' => 'purchaser-manage',
            'parent_id'=>51

        ]);

         //58
        Permission::insertOrIgnore([
            'key' => 'Users',
            'Value' => 'user-list',
            'parent_id'=>51

        ]);

         //59
        Permission::insertOrIgnore([
            'key' => 'Manage Users',
            'Value' => 'user-manage',
            'parent_id'=>51

        ]);

         //60
        Permission::insertOrIgnore([
            'key' => 'Business Settings',
            'Value' => 'business-setting',
            'parent_id'=>0
        ]);

         //61
        Permission::insertOrIgnore([
            'key' => 'General Settings',
            'Value' => 'general-setting',
            'parent_id'=>60
        ]);

        //62
        Permission::insertOrIgnore([
            'key' => 'Warehouses',
            'Value' => 'warehouse-list',
            'parent_id'=>60

        ]);

        //63
        Permission::insertOrIgnore([
            'key' => 'Warehouse',
            'Value' => 'warehouse-manage',
            'parent_id'=>60

        ]);

        //64
        Permission::insertOrIgnore([
            'key' => 'Language',
            'Value' => 'language-list',
            'parent_id'=>60

        ]);

        //65
        Permission::insertOrIgnore([
            'key' => 'Manage Language',
            'Value' => 'language-manage',
            'parent_id'=>60

        ]);

        //66
        Permission::insertOrIgnore([
            'key' => 'Currency',
            'Value' => 'currency-list',
            'parent_id'=>60

        ]);

        //67
        Permission::insertOrIgnore([
            'key' => 'Manage Currency',
            'Value' => 'currency-manage',
            'parent_id'=>60

        ]);

        //68
        Permission::insertOrIgnore([
            'key' => 'Payement Methods',
            'Value' => 'payment-methods-list',
            'parent_id'=>60

        ]);

        //69
        Permission::insertOrIgnore([
            'key' => 'Manage Payement Methods',
            'Value' => 'payment-methods-manage',
            'parent_id'=>60

        ]);

        //70
        Permission::insertOrIgnore([
            'key' => 'Shipping Methods',
            'Value' => 'shipping-methods-list',
            'parent_id'=>60

        ]);

        //71
        Permission::insertOrIgnore([
            'key' => 'Manage Shipping Methods',
            'Value' => 'shipping-methods-manage',
            'parent_id'=>60

        ]);

        //72
        Permission::insertOrIgnore([
            'key' => 'Tax Settings',
            'Value' => 'tax-setting-list',
            'parent_id'=>60

        ]);
        //73
        Permission::insertOrIgnore([
            'key' => 'Manage Tax Settings',
            'Value' => 'tax-setting-manage',
            'parent_id'=>60

        ]);

        //74
        Permission::insertOrIgnore([
            'key' => 'Tax Rate Settings',
            'Value' => 'tax-setting-rate-list',
            'parent_id'=>60

        ]);

        //75
        Permission::insertOrIgnore([
            'key' => 'Manage Tax Rate Settings',
            'Value' => 'tax-setting-rate-manage',
            'parent_id'=>60

        ]);

        //76
        Permission::insertOrIgnore([
            'key' => 'Coupon Settings',
            'Value' => 'coupon-list',
            'parent_id'=>60

        ]);

        //77
        Permission::insertOrIgnore([
            'key' => 'Manage Coupon Settings',
            'Value' => 'coupon-manage',
            'parent_id'=>60

        ]);

        //78
        Permission::insertOrIgnore([
            'key' => 'Website Settings',
            'Value' => 'website-setting',
            'parent_id'=>0
        ]);

        //79
        Permission::insertOrIgnore([
            'key' => 'Home Page Builder',
            'Value' => 'home-page-builder',
            'parent_id'=>78
        ]);

        //80
        Permission::insertOrIgnore([
            'key' => 'Slider Banner Settings',
            'Value' => 'slider-bannder-list',
            'parent_id'=>78

        ]);

        //81
        Permission::insertOrIgnore([
            'key' => 'Manage Slider Banner Settings',
            'Value' => 'slider-bannder-manage',
            'parent_id'=>78

        ]);

        //82
        Permission::insertOrIgnore([
            'key' => 'Constant Banner Settings',
            'Value' => 'constant-bannder-list',
            'parent_id'=>78
            
        ]);

        //83
        Permission::insertOrIgnore([
            'key' => 'Manage Constant Banner Settings',
            'Value' => 'constant-bannder-manage',
            'parent_id'=>78

        ]);

        //84
        Permission::insertOrIgnore([
            'key' => 'Parrallex Banner Settings',
            'Value' => 'parrallex-bannder-list',
            'parent_id'=>78

        ]);

        //85
        Permission::insertOrIgnore([
            'key' => 'Manage Parrallex Banner Settings',
            'Value' => 'parrallex-bannder-manage',
            'parent_id'=>78

        ]);

        //86
        Permission::insertOrIgnore([
            'key' => 'Menu Builder',
            'Value' => 'menu-builder',
            'parent_id'=>78

        ]);

        //87
        Permission::insertOrIgnore([
            'key' => 'Mobile App Settings',
            'Value' => 'mobile-setting',
            'parent_id'=>0
        ]);

        //88
        Permission::insertOrIgnore([
            'key' => 'Mobile General Settings',
            'Value' => 'mobile-general-setting',
            'parent_id'=>87
        ]);

        //89
        Permission::insertOrIgnore([
            'key' => 'Mobile Slider Banner',
            'Value' => 'mobile-slider-bannder-list',
            'parent_id'=>87

        ]);

        //90
        Permission::insertOrIgnore([
            'key' => 'Manage Mobile Slider Banner',
            'Value' => 'mobile-slider-bannder-manage',
            'parent_id'=>87

        ]);


        //91
        Permission::insertOrIgnore([
            'key' => 'Delivery Boy',
            'Value' => 'delivery-boy-list',
            'parent_id'=>0

        ]);

        //92
        Permission::insertOrIgnore([
            'key' => 'Delivery Boy List',
            'Value' => 'delivery-boy-list',
            'parent_id'=>91

        ]);

        //93
        Permission::insertOrIgnore([
            'key' => 'Manage Delivery Boy',
            'Value' => 'manage-delivery-boy',
            'parent_id'=>91

        ]);

       

    }
}
