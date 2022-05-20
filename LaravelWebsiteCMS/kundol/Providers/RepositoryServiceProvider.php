<?php

namespace App\Providers;

use App\Contract\Admin\AccountInterface;
use App\Contract\Web\CustomerInterface as WebCustomerInterface;
use App\Contract\Admin\AttributeInterface;
use App\Contract\Admin\PageInterface;
use App\Contract\Admin\AuthInterface;
use App\Contract\Admin\AvailableQtyInterface;
use App\Contract\Admin\BarcodeInterface;
use App\Contract\Admin\BannerInterface;
use App\Contract\Admin\ConstantBannerInterface;
use App\Contract\Admin\BarCodeSettingInterface;
use App\Contract\Admin\BillerInterface;
use App\Contract\Admin\BlogCategoryInterface;
use App\Contract\Admin\BlogNewsInterface;
use App\Contract\Admin\BrandInterface;
use App\Contract\Admin\BusinessSettingInterface;
use App\Contract\Admin\CategoryInterface;
use App\Contract\Admin\CoaInterface;
use App\Contract\Admin\CountryInterface;
use App\Contract\Admin\CouponSettingInterface;
use App\Contract\Admin\CurrencyInterface;
use App\Contract\Admin\MembershipInterface;
use App\Contract\Admin\CustomCssJsInterface;
use App\Contract\Admin\CustomerInterface;
use App\Contract\Admin\EmailTemplateSettingInterface;
use App\Contract\Admin\GallaryInterface;
use App\Contract\Admin\LanguageInterface;
use App\Contract\Admin\OrderInterface as AdminOrderInterface;
use App\Contract\Admin\MenuInterface;
use App\Contract\Admin\NewsletterInterface;
use App\Contract\Admin\PaymentMethodInterface;
use App\Contract\Admin\ProductInterface;
use App\Contract\Admin\PurchaseInterface;
use App\Contract\Admin\PurchaseReturnInterface;
use App\Contract\Admin\PurchaserInterface;
use App\Contract\Admin\QuotationInterface;
use App\Contract\Admin\RoleInterface;
use App\Contract\Admin\SaleInterface;
use App\Contract\Admin\SaleReturnInterface;
use App\Contract\Admin\SettingInterface;
use App\Contract\Admin\ShippingMethodInterface;
use App\Contract\Admin\SliderInterface;
use App\Contract\Admin\SliderNavigationInterface;
use App\Contract\Admin\SliderTypeInterface;
use App\Contract\Admin\StateInterface;
use App\Contract\Admin\StockInterface;
use App\Contract\Admin\StockTransferInterface;
use App\Contract\Admin\TagInterface;
use App\Contract\Admin\TaxInterface;
use App\Contract\Admin\TaxRateInterface;
use App\Contract\Admin\TimezoneInterface;
use App\Contract\Admin\UnitInterface;
use App\Contract\Admin\UserInterface;
use App\Contract\Admin\VariationInterface;
use App\Contract\Admin\WarehouseInterface;
use App\Contract\Admin\DefaultAccountInterface;
use App\Contract\Web\PointInterface;
use App\Contract\Web\CartInterface;
use App\Contract\Web\CommentInterface;
use App\Contract\Web\CompareInterface;
use App\Contract\Web\CouponInterface;
use App\Contract\Web\CustomerAuthInterface;
use App\Contract\Web\OrderInterface;
use App\Contract\Web\ReviewInterface;
use App\Contract\Web\WishlistInterface;
use App\Contract\Web\CustomerAddressBookInterface;
use App\Contract\Admin\HomeBannerInterface;
use App\Contract\Admin\TransactionInterface;
use App\Contract\Admin\DeliveryBoyInterface;




////

use App\Repository\Admin\AccountRepository;
use App\Repository\Admin\AttributeRepository;
use App\Repository\Admin\PageRepository;
use App\Repository\Admin\AuthRepository;
use App\Repository\Admin\AvailableQtyRepository;
use App\Repository\Admin\BarcodeRepository;
use App\Repository\Admin\BannerRepository;
use App\Repository\Admin\ConstantBannerRepository;
use App\Repository\Admin\BarCodeSettingRepository;
use App\Repository\Admin\BillerRepository;
use App\Repository\Admin\BlogCategoryRepository;
use App\Repository\Admin\BlogNewsRepository;
use App\Repository\Admin\BrandRepository;
use App\Repository\Admin\BusinessSettingRepository;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\CoaRepository;
use App\Repository\Admin\CountryRepository;
use App\Repository\Admin\CouponSettingRepository;
use App\Repository\Admin\CurrencyRepository;
use App\Repository\Admin\CustomCssJsRepository;
use App\Repository\Admin\CustomerRepository;
use App\Repository\Admin\OrderRepository as AdminOrderRepository;
use App\Repository\Admin\EmailTemplateSettingRepository;
use App\Repository\Admin\GallaryRepository;
use App\Repository\Admin\LanguageRepository;
use App\Repository\Admin\MenuRepository;
use App\Repository\Admin\NewsletterRepository;
use App\Repository\Web\CustomerRepository as WebCustomerRepository;
use App\Repository\Admin\PaymentMethodRepository;
use App\Repository\Admin\ProductRepository;
use App\Repository\Admin\PurchaseRepository;
use App\Repository\Admin\PurchaseReturnRepository;
use App\Repository\Admin\PurchaserRepository;
use App\Repository\Admin\QuotationRepository;
use App\Repository\Admin\RoleRepository;
use App\Repository\Admin\SaleRepository;
use App\Repository\Admin\SaleReturnRepository;
use App\Repository\Admin\SettingRepository;
use App\Repository\Admin\ShippingMethodRepository;
use App\Repository\Admin\SliderNavigationRepository;
use App\Repository\Admin\SliderRepository;
use App\Repository\Admin\SliderTypeRepository;
use App\Repository\Admin\StateRepository;
use App\Repository\Admin\StockRepository;
use App\Repository\Admin\StockTransferRepository;
use App\Repository\Admin\TagRepository;
use App\Repository\Admin\DefaultAccountRepository;
use App\Repository\Admin\TaxRateRepository;
use App\Repository\Admin\MembershipRepository;
use App\Repository\Admin\TaxRepository;
use App\Repository\Admin\TimezoneRepository;
use App\Repository\Admin\UnitRepository;
use App\Repository\Admin\UserRepository;
use App\Repository\Admin\VariationRepository;
use App\Repository\Admin\WarehouseRepository;
use App\Repository\Web\CartRepository;
use App\Repository\Web\PointRepository;
use App\Repository\Web\CommentRepository;
use App\Repository\Web\CompareRepository;
use App\Repository\Web\CouponRepository;
use App\Repository\Web\CustomerAuthRepository;
use App\Repository\Web\OrderRepository;
use App\Repository\Web\ReviewRepository;
use App\Repository\Web\WishlistRepository;
use App\Repository\Web\CustomerAddressBookRepository;
use App\Repository\Admin\HomeBannerRepository;
use App\Repository\Admin\TransactionRepository;
use App\Repository\Admin\DeliveryBoyRepository;




use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionInterface::class, TransactionRepository::class);
        $this->app->bind(AttributeInterface::class, AttributeRepository::class);
        $this->app->bind(PageInterface::class, PageRepository::class);
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(VariationInterface::class, VariationRepository::class);
        $this->app->bind(CurrencyInterface::class, CurrencyRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(LanguageInterface::class, LanguageRepository::class);
        $this->app->bind(MenuInterface::class, MenuRepository::class);
        $this->app->bind(WarehouseInterface::class, WarehouseRepository::class);
        $this->app->bind(ShippingMethodInterface::class, ShippingMethodRepository::class);
        $this->app->bind(BrandInterface::class, BrandRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(UnitInterface::class, UnitRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(CoaInterface::class, CoaRepository::class);
        $this->app->bind(AvailableQtyInterface::class, AvailableQtyRepository::class);
        $this->app->bind(SettingInterface::class, SettingRepository::class);
        $this->app->bind(CouponSettingInterface::class, CouponSettingRepository::class);
        $this->app->bind(TaxInterface::class, TaxRepository::class);
        $this->app->bind(TaxRateInterface::class, TaxRateRepository::class);
        $this->app->bind(CountryInterface::class, CountryRepository::class);
        $this->app->bind(StateInterface::class, StateRepository::class);
        $this->app->bind(PaymentMethodInterface::class, PaymentMethodRepository::class);
        $this->app->bind(GallaryInterface::class, GallaryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(PurchaserInterface::class, PurchaserRepository::class);
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(SliderInterface::class, SliderRepository::class);
        $this->app->bind(MembershipInterface::class, MembershipRepository::class);
        $this->app->bind(SliderTypeInterface::class, SliderTypeRepository::class);
        $this->app->bind(SliderNavigationInterface::class, SliderNavigationRepository::class);
        $this->app->bind(PurchaseInterface::class, PurchaseRepository::class);
        $this->app->bind(PurchaseReturnInterface::class, PurchaseReturnRepository::class);
        $this->app->bind(SaleInterface::class, SaleRepository::class);
        $this->app->bind(SaleReturnInterface::class, SaleReturnRepository::class);
        $this->app->bind(WishlistInterface::class, WishlistRepository::class);
        $this->app->bind(CompareInterface::class, CompareRepository::class);
        $this->app->bind(CartInterface::class, CartRepository::class);
        $this->app->bind(PointInterface::class, PointRepository::class);
        $this->app->bind(BlogCategoryInterface::class, BlogCategoryRepository::class);
        $this->app->bind(BlogNewsInterface::class, BlogNewsRepository::class);
        $this->app->bind(EmailTemplateSettingInterface::class, EmailTemplateSettingRepository::class);
        $this->app->bind(BillerInterface::class, BillerRepository::class);
        $this->app->bind(QuotationInterface::class, QuotationRepository::class);
        $this->app->bind(TagInterface::class, TagRepository::class);
        $this->app->bind(AccountInterface::class, AccountRepository::class);
        $this->app->bind(DefaultAccountInterface::class, DefaultAccountRepository::class);

        $this->app->bind(CustomerAuthInterface::class, CustomerAuthRepository::class);
        $this->app->bind(TimezoneInterface::class, TimezoneRepository::class);
        $this->app->bind(BusinessSettingInterface::class, BusinessSettingRepository::class);
        $this->app->bind(BarCodeSettingInterface::class, BarCodeSettingRepository::class);
        $this->app->bind(CouponInterface::class, CouponRepository::class);
        $this->app->bind(OrderInterface::class, OrderRepository::class);
        $this->app->bind(BannerInterface::class, BannerRepository::class);
        $this->app->bind(ConstantBannerInterface::class, ConstantBannerRepository::class);

        $this->app->bind(HomeBannerInterface::class, HomeBannerRepository::class);

        $this->app->bind(BarcodeInterface::class, BarcodeRepository::class);
        $this->app->bind(StockTransferInterface::class, StockTransferRepository::class);
        $this->app->bind(ReviewInterface::class, ReviewRepository::class);
        $this->app->bind(CommentInterface::class, CommentRepository::class);
        $this->app->bind(StockInterface::class, StockRepository::class);
        $this->app->bind(CustomCssJsInterface::class, CustomCssJsRepository::class);
        $this->app->bind(NewsletterInterface::class, NewsletterRepository::class);
        $this->app->bind(CustomerAddressBookInterface::class, CustomerAddressBookRepository::class);
        $this->app->bind(AdminOrderInterface::class, AdminOrderRepository::class);
        $this->app->bind(WebCustomerInterface::class, WebCustomerRepository::class);
        $this->app->bind(DeliveryBoyInterface::class, DeliveryBoyRepository::class);

    }

}
