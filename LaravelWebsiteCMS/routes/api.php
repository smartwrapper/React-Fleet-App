<?php

use App\Models\Admin\Customer;
use App\Models\Admin\Product;
use App\Models\User;
use App\Models\Web\CustomerAddressBook;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('/login', 'API\Admin\AuthController@login');
Route::post('/register', 'API\Admin\AuthController@register');

Route::get('/login', function () {
    return response()->json(['status' => 'Error', 'message' => 'Unauthorized, please login to get access to specfied route!'], 401);
})->name('login');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:user-api', 'scopes:user']], function () {

    Route::post('/token-validate', 'API\Admin\AuthController@tokenValidate');

    Route::post('/logout', 'API\Admin\AuthController@logout');
    Route::get('/barcode', 'API\Admin\BarcodeController@index');
    Route::resource('current-theme', 'API\Admin\CurrentThemeController', ['names' => ['index' => 'admin.current-theme.index', 'store' => 'admin.current-theme.store']])->only(['index', 'store']);

    Route::resource('menu-builder', 'API\Admin\MenuBuilderController', ['names' => ['index' => 'admin.menu-builder.index', 'store' => 'admin.menu-builder.store']])->only(['index', 'store']);


    Route::resource('newsletter', 'API\Admin\NewsletterController', ['names' => ['index' => 'admin.newsletter.index', 'store' => 'admin.newsletter.store', 'update' => 'admin.newsletter.update', 'destroy' => 'admin.newsletter.delete']])->only(['index', 'store']);
    Route::resource('custom-css-js', 'API\Admin\CustomCssJsController', ['names' => ['index' => 'admin.custom_css_js.index', 'store' => 'admin.custom_css_js.store', 'update' => 'admin.custom_css_js.update', 'destroy' => 'admin.custom_css_js.delete']])->only(['index', 'store']);
    Route::resource('user', 'API\Admin\UserController', ['names' => ['index' => 'admin.user.index', 'store' => 'admin.user.store', 'update' => 'admin.user.update', 'destroy' => 'admin.user.delete']])->except(['edit', 'create']);
    
    Route::resource('account', 'API\Admin\AccountController', ['names' => ['index' => 'admin.account.index', 'store' => 'admin.account.store', 'update' => 'admin.account.update', 'destroy' => 'admin.account.delete']])->except(['edit', 'create']);
    Route::resource('delivery_boy', 'API\Admin\DeliveryBoyController', ['names' => ['index' => 'admin.account.index', 'store' => 'admin.account.store', 'update' => 'admin.account.update', 'destroy' => 'admin.account.delete']])->except(['edit', 'create']);
    Route::resource('pages', 'API\Admin\PageController', ['names' => ['index' => 'admin.pages.index', 'store' => 'admin.pages.store', 'update' => 'admin.pages.update', 'destroy' => 'admin.pages.delete']])->except(['edit', 'create']);
    Route::resource('menu', 'API\Admin\MenuController', ['names' => ['index' => 'admin.menu.index', 'store' => 'admin.menu.store', 'update' => 'admin.menu.update', 'destroy' => 'admin.menu.delete']])->except(['edit', 'create']);
    Route::resource('country', 'API\Admin\CountryController', ['names' => ['index' => 'admin.country.index', 'store' => 'admin.country.store', 'update' => 'admin.country.update', 'destroy' => 'admin.country.delete']])->except(['edit', 'create']);
    Route::resource('default_account', 'API\Admin\DefaultAccountController', ['names' => ['index' => 'admin.default_account.index', 'store' => 'admin.default_account.store', 'update' => 'admin.default_account.update', 'destroy' => 'admin.default_account.delete']])->except(['edit', 'create']);
    Route::resource('role', 'API\Admin\RoleController', ['names' => ['index' => 'admin.role.index', 'store' => 'admin.role.store', 'update' => 'admin.role.update', 'destroy' => 'admin.role.delete']])->except(['edit', 'create']);
    Route::resource('permission_role', 'API\Admin\PermissionRoleController', ['names' => ['index' => 'admin.permission_role.index', 'store' => 'admin.permission_role.store', 'update' => 'admin.permission_role.update', 'destroy' => 'admin.permission_role.delete']]);
    Route::resource('permission', 'API\Admin\PermissionController', ['names' => ['store' => 'admin.permission.store']]);
    Route::resource('attribute', 'API\Admin\AttributeController', ['names' => ['index' => 'admin.attribute.index', 'store' => 'admin.attribute.store', 'update' => 'admin.attribute.update', 'destroy' => 'admin.attribute.delete']])->except(['edit', 'create']);
    Route::resource('variation', 'API\Admin\VariationController', ['names' => ['index' => 'admin.variation.index', 'store' => 'admin.variation.store', 'update' => 'admin.variation.update', 'destroy' => 'admin.variation.delete']])->except(['edit', 'create']);
    Route::resource('language', 'API\Admin\LanguageController', ['names' => ['index' => 'admin.language.index', 'store' => 'admin.language.store', 'update' => 'admin.language.update', 'destroy' => 'admin.language.delete']])->except(['edit', 'create']);
    Route::post('language/is_default', 'API\Admin\LanguageController@isDefault');
    Route::resource('currency', 'API\Admin\CurrencyController', ['names' => ['index' => 'admin.currency.index', 'store' => 'admin.currency.store', 'update' => 'admin.currency.update', 'destroy' => 'admin.currency.delete']])->except(['edit', 'create']);
    Route::post('currency/is_default', 'API\Admin\CurrencyController@isDefault');
    Route::resource('unit', 'API\Admin\UnitController', ['names' => ['index' => 'admin.unit.index', 'store' => 'admin.unit.store', 'update' => 'admin.unit.update', 'destroy' => 'admin.unit.delete']])->except(['edit', 'create']);
    Route::resource('category', 'API\Admin\CategoryController', ['names' => ['index' => 'admin.category.index', 'store' => 'admin.category.store', 'update' => 'admin.category.update', 'destroy' => 'admin.category.delete']])->except(['edit', 'create']);
    Route::resource('coa', 'API\Admin\CoaController', ['names' => ['index' => 'admin.coa.index', 'store' => 'admin.coa.store', 'update' => 'admin.coa.update', 'destroy' => 'admin.coa.delete']])->except(['edit', 'create']);
    Route::resource('warehouse', 'API\Admin\WarehouseController', ['names' => ['index' => 'admin.warehouse.index', 'store' => 'admin.warehouse.store', 'update' => 'admin.warehouse.update', 'destroy' => 'admin.warehouse.delete']])->except(['edit', 'create']);
    Route::resource('shipping_method', 'API\Admin\ShippingMethodController', ['names' => ['index' => 'admin.shipping_method.index', 'update' => 'admin.shipping_method.update']])->only(['index', 'show', 'update']);
    Route::resource('brand', 'API\Admin\BrandController', ['names' => ['index' => 'admin.brand.index', 'store' => 'admin.brand.store', 'update' => 'admin.brand.update', 'destroy' => 'admin.brand.delete']])->except(['edit', 'create']);
    Route::resource('setting', 'API\Admin\SettingController', ['names' => ['index' => 'admin.setting.index', 'update' => 'admin.setting.update']])->only(['index', 'update']);
    Route::resource('coupon_setting', 'API\Admin\CouponSettingController', ['names' => ['index' => 'admin.coupon_setting.index', 'store' => 'admin.coupon_setting.store', 'update' => 'admin.coupon_setting.update', 'destroy' => 'admin.coupon_setting.delete']])->except(['edit', 'create']);
    Route::resource('tax', 'API\Admin\TaxController', ['names' => ['index' => 'admin.tax.index', 'store' => 'admin.tax.store', 'update' => 'admin.tax.update', 'destroy' => 'admin.tax.delete']])->except(['edit', 'create']);
    Route::resource('tax_rate', 'API\Admin\TaxRateController', ['names' => ['index' => 'admin.tax_rate.index', 'store' => 'admin.tax_rate.store', 'update' => 'admin.tax_rate.update', 'destroy' => 'admin.tax_rate.delete']])->except(['edit', 'create']);
    Route::resource('state', 'API\Admin\StateController', ['names' => ['index' => 'admin.state.index']])->only(['index', 'show']);

    Route::resource('payment_method', 'API\Admin\PaymentMethodController', ['names' => ['index' => 'admin.payment_method.index', 'store' => 'admin.payment_method.store', 'update' => 'admin.payment_method.update', 'destroy' => 'admin.payment_method.delete']])->only(['index', 'show', 'update']);
    
    Route::resource('gallary', 'API\Admin\GallaryController', ['names' => ['index' => 'admin.gallary.index', 'store' => 'admin.gallary.store']])->except(['edit', 'create', 'destroy']);
    Route::delete('gallary', 'API\Admin\GallaryController@destroy')->name('admin.gallary.delete');
    Route::post('gallary/resize_single_image', 'API\Admin\GallaryController@resizeSingleImage')->name('gallary.resize');
    Route::post('gallary/regenrate_all_images', 'API\Admin\GallaryController@regenrateAllImages')->name('gallary.regenrateAllImages');
    Route::resource('purchaser', 'API\Admin\PurchaserController', ['names' => ['index' => 'admin.purchaser.index', 'store' => 'admin.purchaser.store', 'update' => 'admin.purchaser.update', 'destroy' => 'admin.purchaser.delete']])->except(['edit', 'create']);
    Route::resource('biller', 'API\Admin\BillerController', ['names' => ['index' => 'admin.biller.index', 'store' => 'admin.biller.store', 'update' => 'admin.biller.update', 'destroy' => 'admin.biller.delete']])->except(['edit', 'create']);
    Route::resource('quotation', 'API\Admin\QuotationController', ['names' => ['index' => 'admin.quotation.index', 'store' => 'admin.quotation.store', 'update' => 'admin.quotation.update', 'destroy' => 'admin.quotation.delete']])->except(['edit', 'create']);
    Route::resource('customer', 'API\Admin\CustomerController', ['names' => ['index' => 'admin.customer.index', 'store' => 'admin.customer.store', 'update' => 'admin.customer.update', 'destroy' => 'admin.customer.delete']])->except(['edit', 'create']);
    Route::resource('slider', 'API\Admin\SliderController', ['names' => ['index' => 'admin.slider.index', 'store' => 'admin.slider.store', 'update' => 'admin.slider.update', 'destroy' => 'admin.slider.delete']])->except(['edit', 'create']);
    Route::resource('banner', 'API\Admin\BannerController', ['names' => ['index' => 'admin.banner.index', 'store' => 'admin.banner.store', 'update' => 'admin.banner.update', 'destroy' => 'admin.banner.delete']])->except(['edit', 'create']);

    Route::resource('constant_banner', 'API\Admin\ConstantBannerController', ['names' => ['index' => 'admin.banner.index', 'store' => 'admin.banner.store', 'update' => 'admin.banner.update', 'destroy' => 'admin.banner.delete']])->except(['edit', 'create']);

    Route::resource('home_banner', 'API\Admin\HomeBannerController', ['names' => ['index' => 'admin.banner.index', 'store' => 'admin.banner.store', 'update' => 'admin.banner.update', 'destroy' => 'admin.banner.delete']])->except(['edit', 'create']);

    Route::resource('slider_type', 'API\Admin\SliderTypeController')->only(['index', 'show']);
    Route::resource('slider_navigation', 'API\Admin\SliderNavigationController')->only(['index', 'show']);
    Route::resource('purchase', 'API\Admin\PurchaseController', ['names' => ['index' => 'admin.purchase.index', 'store' => 'admin.purchase.store', 'update' => 'admin.purchase.update', 'destroy' => 'admin.purchase.delete']])->except(['edit', 'create', 'update']);
    Route::resource('purchase_return', 'API\Admin\PurchaseReturnController', ['names' => ['index' => 'admin.purchase_return.index', 'store' => 'admin.purchase_return.store', 'update' => 'admin.purchase_return.update', 'destroy' => 'admin.purchase_return.delete']])->except(['edit', 'create', 'update']);
    Route::resource('product', 'API\Admin\ProductController', ['names' => ['index' => 'admin.product.index', 'store' => 'admin.product.store', 'update' => 'admin.product.update', 'destroy' => 'admin.product.delete']])->except(['edit', 'create']);
    Route::get('available_qty', 'API\Admin\AvailableQtyController@index');
    Route::get('transaction', 'API\Admin\TransactionController@index');
    Route::post('transaction', 'API\Admin\TransactionController@store');
    
    Route::post('product/sku', 'API\Admin\ProductController@sku');

    Route::resource('sale', 'API\Admin\SaleController', ['names' => ['index' => 'admin.sale.index', 'store' => 'admin.sale.store', 'destroy' => 'admin.sale.delete']])->middleware('store');
    Route::resource('sale_return', 'API\Admin\SaleReturnController', ['names' => ['index' => 'admin.sale_return.index', 'store' => 'admin.sale_return.store', 'destroy' => 'admin.sale_return.delete']])->middleware('store');
    Route::resource('blog_category', 'API\Admin\BlogCategoryController', ['names' => ['index' => 'admin.blog_category.index', 'store' => 'admin.blog_category.store', 'update' => 'admin.blog_category.update', 'destroy' => 'admin.blog_category.delete']])->except(['edit', 'create']);
    Route::resource('timezone', 'API\Admin\TimezoneController', ['names' => ['index' => 'admin.timezone.index', 'show' => 'admin.timezone.show', 'store' => 'admin.timezone.store', 'update' => 'admin.timezone.update', 'destroy' => 'admin.timezone.delete']])->except(['edit', 'create']);
    Route::resource('stock_transfer', 'API\Admin\StockTransferController', ['names' => ['index' => 'admin.stock_transfer.index', 'store' => 'admin.stock_transfer.store', 'update' => 'admin.stock_transfer.update', 'destroy' => 'admin.stock_transfer.delete']])->except(['edit', 'create', 'update']);
    Route::resource('stock', 'API\Admin\StockController', ['names' => ['index' => 'admin.stock.index', 'store' => 'admin.stock.store']])->except(['destroy', 'edit', 'create', 'update']);
    Route::resource('blog_news', 'API\Admin\BlogNewsController', ['names' => ['index' => 'admin.blog_news.index', 'store' => 'admin.blog_news.store', 'update' => 'admin.blog_news.update', 'destroy' => 'admin.blog_news.delete']])->except(['edit', 'create']);
    Route::resource('email_template_setting', 'API\Admin\EmailTemplateSettingController', ['names' => ['index' => 'admin.EmailTemplateSetting.index', 'store' => 'admin.EmailTemplateSetting.store', 'destroy' => 'admin.EmailTemplateSetting.delete']])->except(['edit', 'create', 'update']);
    Route::resource('business_setting', 'API\Admin\BusinessSettingController')->only(['store', 'show']);
    Route::resource('bar_code_setting', 'API\Admin\BarCodeSettingController', ['names' => ['index' => 'admin.bar_code_setting.index', 'store' => 'admin.bar_code_setting.store', 'update' => 'admin.bar_code_setting.update', 'destroy' => 'admin.bar_code_setting.delete']])->except(['edit', 'create']);
    Route::resource('tag', 'API\Admin\TagController')->only(['index']);
    Route::resource('membership', 'API\Admin\MembershipController', ['names' => ['index' => 'admin.membership.index', 'store' => 'admin.membership.store']])->only(['index', 'store']);
    Route::get('review', 'API\Web\ReviewController@index')->name('admin.review.index');
    Route::post('review/status', 'API\Web\ReviewController@status')->name('admin.review.status');
    Route::post('comment/reply', 'API\Web\CommentController@reply');
    Route::get('comment', 'API\Web\CommentController@index');
    Route::get('/points', 'API\Web\PointController@index')->name('admin.points.index');
    Route::resource('order', 'API\Admin\OrderController', ['names' => ['index' => 'admin.order.index', 'update' => 'admin.order.update']])->only(['index', 'show', 'update']);
    

    
    Route::post('add_notes', 'API\Admin\OrderController@addOrderNotes');
    Route::post('add_comments', 'API\Admin\OrderController@addOrderComments');

    Route::get('user/{id}', 'API\Admin\AuthController@show')->name('admin.auth.show');
    Route::put('user/{id}', 'API\Admin\AuthController@update')->name('admin.auth.update');
    Route::get('/dashboard','Web\IndexController@orderStats');
    Route::resource('cart', 'API\Web\CartController', ['names' => ['store' => 'client.cart.store']])->except(['edit', 'create', 'update','index','destroy']);
    Route::post('order', 'API\Web\OrderController@store');
    Route::resource('customer_address_book', 'API\Web\CustomerAddressBookController', ['names' => ['index' => 'admin.customer_address_book.index', 'store' => 'admin.customer_address_book.store', 'update' => 'admin.customer_address_book.update', 'destroy' => 'admin.customer_address_book.delete']])->except(['edit', 'create']);


});

Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'API\Web\PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'API\Web\PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'API\Web\PaypalController@getPaymentStatus',));

Route::group(['prefix' => 'client'], function () {
    Route::post('/customer_login', 'API\Web\CustomerAuthController@login');
    Route::get('customer_login/{provider}', 'API\Web\CustomerAuthController@redirect');
    Route::get('customer_login/{provider}/callback', 'API\Web\CustomerAuthController@Callback');
    Route::post('/customer_register', 'API\Web\CustomerAuthController@register');
    Route::post('/forget_password', 'API\Web\CustomerAuthController@forgetPassword');
    Route::post('/reset_password', 'API\Web\CustomerAuthController@resetPassword');
    Route::put('order_status_by_delivery_boy/{order}', 'API\Web\OrderController@update');
});

Route::group(['prefix' => 'client', 'middleware' => ['auth:customer-api', 'scopes:customer']], function () {
    Route::post('/customer_logout', 'API\Web\CustomerAuthController@logout');
    Route::post('/get-braintree-auth-token', 'API\Web\OrderController@getBraintreeAuthToken');
    Route::post('/isDefaultShipping', 'API\Admin\ShippingMethodController@isDefault')->name('shipping_method.isDefault');
    Route::post('paystack-authorization', 'API\Web\OrderController@paystackAuthorization');
    

    Route::get('/tax_rate', 'API\Admin\TaxRateController@findByState')->name('taxrate.index');
    Route::post('/redeem', 'API\Web\PointController@store')->name('redeem.store');
    Route::post('customer/membership', 'API\Web\MembershipLevelController@index');
    Route::get('/points', 'API\Web\PointController@index')->name('customer.points');
    Route::resource('wishlist', 'API\Web\WishlistController', ['names' => ['index' => 'client.wishlist.index', 'store' => 'client.wishlist.store', 'destroy' => 'client.wishlist.delete']])->except(['edit', 'create', 'update']);
    Route::resource('compare', 'API\Web\CompareController')->except(['edit', 'create', 'update']);
    Route::post('order', 'API\Web\OrderController@store');
    Route::put('order/{order}', 'API\Web\OrderController@update');
    Route::post('review', 'API\Web\ReviewController@store');
    Route::post('comment', 'API\Web\CommentController@store');
    Route::resource('cart', 'API\Web\CartController', ['names' => ['index' => 'client.cart.index', 'store' => 'client.cart.store', 'destroy' => 'client.cart.delete']])->except(['edit', 'create', 'update']);
    Route::delete('cart/delete', 'API\Web\CartController@destroy');
    Route::resource('customer_address_book', 'API\Web\CustomerAddressBookController', ['names' => ['index' => 'admin.customer_address_book.index', 'store' => 'admin.customer_address_book.store', 'update' => 'admin.customer_address_book.update', 'destroy' => 'admin.customer_address_book.delete']])->except(['edit', 'create']);

    Route::resource('customer/order', 'API\Admin\OrderController')->only(['index', 'show']);
    Route::resource('profile', 'API\Web\CustomerController')->only(['show', 'update']);
    Route::resource('coupon', 'API\Web\CouponController')->except(['edit', 'show', 'create', 'update', 'destroy']);
    Route::post('add_comments', 'API\Web\OrderController@addOrderComments');
    Route::get('available_qty', 'API\Admin\AvailableQtyController@index');

});

Route::group(['prefix' => 'client', 'middleware' => ['checkClientCredentials']], function () {
    Route::get('cart/guest/get', 'API\Web\CartController@index');
    Route::get('blog_news', 'API\Admin\BlogNewsController@index');
    Route::get('blog_category', 'API\Admin\BlogCategoryController@index');
    Route::get('menu', 'API\Admin\MenuController@index');
    Route::post('cart/guest/store', 'API\Web\CartController@store');
    Route::delete('cart/guest/delete', 'API\Web\CartController@destroy');
    Route::resource('country', 'API\Admin\CountryController', ['names' => ['index' => 'client.country.index']])->only(['index', 'show']);
    Route::resource('state', 'API\Admin\StateController', ['names' => ['index' => 'client.state.index']])->only(['index', 'show']);
    Route::resource('products', 'API\Admin\ProductController')->only(['index', 'show']);
    Route::post('products/price-range', 'API\Admin\ProductController@priceRange');
    Route::resource('category', 'API\Admin\CategoryController', ['names' => ['index' => 'client.category.index', 'show' => 'client.category.show']])->except(['store', 'update', 'destroy', 'edit', 'create']);
    Route::resource('brand', 'API\Admin\BrandController', ['names' => ['index' => 'client.brand.index', 'show' => 'client.banner.show']])->except(['store', 'update', 'destroy', 'edit', 'create']);
    Route::resource('setting', 'API\Admin\SettingController', ['names' => ['index' => 'client.setting.index']])->only(['index']);
    
    Route::resource('slider', 'API\Admin\SliderController', ['names' => ['index' => 'client.slider.index']])->except(['store', 'update', 'destroy', 'edit', 'create']);
    Route::resource('slider_type', 'API\Admin\SliderTypeController')->only(['index', 'show']);
    Route::resource('slider_navigation', 'API\Admin\SliderNavigationController')->only(['index', 'show']);
    Route::resource('banner', 'API\Admin\BannerController', ['names' => ['index' => 'client.banner.index', 'show' => 'client.banner.show']])->except(['store', 'update', 'destroy', 'edit', 'create']);
    Route::resource('language', 'API\Admin\LanguageController', ['names' => ['index' => 'client.language.index']])->except(['store', 'update', 'destroy', 'edit', 'create']);;
    Route::resource('currency', 'API\Admin\CurrencyController', ['names' => ['index' => 'client.currency.index']])->except(['store', 'update', 'destroy', 'edit', 'create']);;
    Route::get('available_qty', 'API\Admin\AvailableQtyController@index');
    Route::get('review', 'API\Web\ReviewController@index');
    Route::get('custom-css-js', 'API\Admin\CustomCssJsController@index');
    // Route::get('pages', 'API\Admin\PageController@index');
    Route::resource('pages', 'API\Admin\PageController')->only(['show']);
    Route::resource('payment_method', 'API\Admin\PaymentMethodController')->only(['index', 'show']);
    Route::resource('attributes', 'API\Admin\AttributeController')->only(['index', 'show']);
    Route::resource('variations', 'API\Admin\VariationController')->only(['index', 'show']);
    Route::post('contact-us', 'API\Web\MailController@contact_us');
    Route::resource('constant_banner', 'API\Admin\ConstantBannerController', ['names' => ['index' => 'admin.banner.index']])->except(['update','destroy','store','edit', 'create']);
    Route::resource('order', 'API\Admin\OrderController', ['names' => ['index' => 'admin.order.index']])->only(['index', 'show']);
    Route::post('/delivery_validate_pin', 'API\Admin\DeliveryBoyController@validatePin')->name('delivery_boy.validate_pin');
    Route::put('/update_delivery_boy_status', 'API\Admin\DeliveryBoyController@UpdateStatus')->name('delivery_boy.validate_pin');
    
});

Route::get('clear', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:cache');
    return 'clear';
});

\Route::bind('product', function ($val) {
    return Product::where('id', $val)->type()->firstOrFail();
});
\Route::bind('customer_address_book', function ($val) {
    return CustomerAddressBook::where('id', $val)->getCustomerAddress(\Auth::id())->firstOrFail();
});
\Route::bind('profile', function ($id) {
    return Customer::customerId($id)->customerId(\Auth::id())->firstOrFail();
});
