<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        // warehouse, purchaser and setting seeder
        $this->call(WarehouseTableSeeder::class);
        $this->call(SettingSeeder::class);
        
        $this->call(CountryTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermisssionTableSeeder::class);
        
        $this->call(UserTableSeeder::class);
        $this->call(UserWarehouseTableSeeder::class);

        $this->call(LanguageTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        

        $this->call(GallarySeeder::class);
        $this->call(GallaryDetailSeeder::class);
        $this->call(GallaryTagsSeeder::class);
        $this->call(TagsSeeder::class);
        
        // units seeder
        $this->call(UnitsSeeder::class);
        $this->call(UnitDetailSeeder::class);
        
        

        $this->call(PaymentMethodSeeder::class);
        // $this->call(PaymentMethodSettingSeeder::class);
        // $this->call(PaymentMethodDescriptionSeeder::class);
        $this->call(ShippingMethodTableSeeder::class);

        // website sliders seeder
        $this->call(SliderTypeSeeder::class);
        $this->call(SliderNavigationSeeder::class);
        $this->call(SlidersSeeder::class);
        // end

        $this->call(AccountSeeder::class);
        $this->call(DefaultAccountSeeder::class);
        
        $this->call(TaxTableSeeder::class);
        $this->call(TimezoneSeeder::class);
        $this->call(BannerSeeder::class);
        
        $this->call(PageTableSeeder::class);
        $this->call(ConstantBannerSeeder::class);
        $this->call(MenuBuilderTableSeeder::class);
        $this->call(HomeBannerTableSeeder::class);
        $this->call(HomePageBuilderSeeder::class);
        

        // default data entry for blog seeders
        $this->call(BlogCategoriesSeeder::class);
        $this->call(BlogCategoryDetailSeeder::class);
        $this->call(BlogNewsSeeder::class);
        $this->call(BlogNewsDetailSeeder::class);

        // default data entry seeders 
        
        // $this->call(CategorySeeder::class);
        // $this->call(CategoryDetailSeeder::class);
        // $this->call(BrandSeeder::class);
        // $this->call(AttributeSeeder::class);
        // $this->call(VariationSeeder::class);
        // $this->call(SimpleProductSeeder::class);
        // $this->call(VariableProductSeeder::class);
        // $this->call(CustomerAddressSeeder::class);
        // $this->call(WishlistSeeder::class);
        
        // end
        
        $this->call(AssignPermissionsTableSeeder::class);

        \Artisan::call('key:generate');
        \Artisan::call('config:clear');
        \Artisan::call('config:cache');
        \Artisan::call('passport:install');
        \Artisan::call('passport:keys');
        Schema::enableForeignKeyConstraints();
        // User::factory(2)
        //     ->has(
        //         Product::factory(10)
        //             ->has(ProductDetail::factory(2))
        //     )
        //     ->has(
        //         Brand::factory(5)
        //     )
        //     ->has(
        //         Category::factory(5)
        //         ->has(CategoryDetail::factory(5))
        //     )->has(
        //         BlogCategory::factory(5)
        //             ->has(BlogCategoryDetail::factory(5))
        //     )->has(
        //     Attribute::factory(5)
        //         ->has(
        //             Variation::factory(5)
        //         )
        // )->create();

    }
}
