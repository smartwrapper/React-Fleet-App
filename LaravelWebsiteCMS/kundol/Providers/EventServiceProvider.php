<?php

namespace App\Providers;

use App\Models\Admin\Attribute;
use App\Models\Admin\Biller;
use App\Models\Admin\Brand;
use App\Models\Admin\BusinessSetting;
use App\Models\Admin\CouponSetting;
use App\Models\Admin\Currency;
use App\Models\Admin\Inventory;
use App\Models\Admin\Language;
use App\Models\Admin\PaymentMethod;
use App\Models\Admin\PermissionRole;
use App\Models\Admin\Purchaser;
use App\Models\Admin\Purchase;
use App\Models\Admin\PurchaseReturn;
use App\Models\Admin\Quotation;
use App\Models\Admin\Role;
use App\Models\Admin\Sale;
use App\Models\Admin\SaleReturn;
use App\Models\Admin\Setting;
use App\Models\Admin\StockTransfer;
use App\Models\Admin\Tag;
use App\Models\Admin\Tax;
use App\Models\Admin\TaxRate;
use App\Models\Admin\Variation;
use App\Models\Admin\Warehouse;
use App\Models\User;
use App\Observers\AttributeObserver;
use App\Observers\BillerObserver;
use App\Observers\BrandObserver;
use App\Observers\BusinessSettingObserver;
use App\Observers\CouponSettingObserver;
use App\Observers\CurrencyObserver;
use App\Observers\InventoryObserver;
use App\Observers\LanguageObserver;
use App\Observers\PaymentMethodObserver;
use App\Observers\PermissionRoleObserver;
use App\Observers\PurchaseReturnObserver;
use App\Observers\PurchaseObserver;
use App\Observers\PurchaserObserver;
use App\Observers\QuotationObserver;
use App\Observers\RoleObserver;
use App\Observers\SaleObserver;
use App\Observers\SaleReturnObserver;
use App\Observers\SettingObserver;
use App\Observers\StockTransferObserver;
use App\Observers\TagObserver;
use App\Observers\TaxObserver;
use App\Observers\TaxRateObserver;
use App\Observers\UserObserver;
use App\Observers\VariationObserver;
use App\Observers\WarehouseObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Attribute::observe(AttributeObserver::class);
        Brand::observe(BrandObserver::class);
        CouponSetting::observe(CouponSettingObserver::class);
        Currency::observe(CurrencyObserver::class);
        Inventory::observe(InventoryObserver::class);
        Language::observe(LanguageObserver::class);
        PaymentMethod::observe(PaymentMethodObserver::class);
        PermissionRole::observe(PermissionRoleObserver::class);
        PurchaseReturn::observe(PurchaseReturnObserver::class);
        Purchase::observe(PurchaseObserver::class);
        Purchaser::observe(PurchaserObserver::class);
        Role::observe(RoleObserver::class);
        SaleReturn::observe(SaleReturnObserver::class);
        Sale::observe(SaleObserver::class);
        Setting::observe(SettingObserver::class);
        Tax::observe(TaxObserver::class);
        TaxRate::observe(TaxRateObserver::class);
        User::observe(UserObserver::class);
        Variation::observe(VariationObserver::class);
        Warehouse::observe(WarehouseObserver::class);
        BusinessSetting::observe(BusinessSettingObserver::class);
        Tag::observe(TagObserver::class);
        Quotation::observe(QuotationObserver::class);
        Biller::observe(BillerObserver::class);
        StockTransfer::observe(StockTransferObserver::class);
    }

    public function shouldDiscoverEvents()
    {
        return true;
    }
}
