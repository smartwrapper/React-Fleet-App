<?php

namespace Database\Seeders;

use App\Models\Admin\Customer;
use App\Models\Admin\Purchaser;
use App\Models\Admin\Setting;
use App\Models\Admin\Warehouse;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $customers = Customer::oldest()->first();
        $purchaser = Purchaser::oldest()->first();
        $warehouse = Warehouse::oldest()->first();

        //POS Settiings 
        if ($customers && $purchaser && $warehouse) {

            Setting::where('id', '>', '0')->delete();
            Setting::insertOrIgnore([
                    [
                        'key' => 'default_customer',
                        'value' => $customers->id,
                        'type' => 'pos',
                    ],
                    [
                        'key' => 'default_biller',
                        'value' => $purchaser->id,
                        'type' => 'pos',
                    ],
                    [
                        'key' => 'default_warehouse',
                        'value' => $warehouse->id,
                        'type' => 'pos',
                    ],
                    [
                        'key' => 'no_of_products',
                        'value' => 4,
                        'type' => 'pos',
                    ],
                ]);
        }

            //Email Smtp Setting
            Setting::insertOrIgnore([
                [
                    'key' => 'mail_engine',
                    'value' => env('MAIL_MAILER', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_host',
                    'value' => env('MAIL_HOST', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_port',
                    'value' => env('MAIL_PORT', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_encription',
                    'value' => env('MAIL_ENCRYPTION', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_username',
                    'value' => env('MAIL_USERNAME', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_password',
                    'value' => env('MAIL_PASSWORD', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_from_email',
                    'value' => env('MAIL_FROM_ADDRESS', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_from_name',
                    'value' => env('MAIL_FROM_NAME', 'test'),
                    'type' => 'email_smtp',
                ],
                [
                    'key' => 'smtp_status',
                    'value' => 'active',
                    'type' => 'email_smtp',
                ],
            ]);

            //sms settings

            Setting::insertOrIgnore([
                [
                    'key' => 'gateway',
                    'value' => 'twilio',
                    'type' => 'sms',
                ],
                [
                    'key' => 'twilio_sid',
                    'value' => rand(),
                    'type' => 'sms',
                ],
                [
                    'key' => 'twilio_auth_token',
                    'value' => '',
                    'type' => 'sms',
                ],
                [
                    'key' => 'twilio_number',
                    'value' => '12345678',
                    'type' => 'sms',
                ],
                [
                    'key' => 'firebase_api_key',
                    'value' => '12345678',
                    'type' => 'sms',
                ],
                [
                    'key' => 'firebase_secret_key',
                    'value' => '12345678',
                    'type' => 'sms',
                ],
            ]);

            //Invoice settings

            Setting::insertOrIgnore([
                [
                    'key' => 'invoice_logo',
                    'value' => '/gallary/01-logo.png',
                    'type' => 'invoice',
                ],
                [
                    'key' => 'invoice_address',
                    'value' => 'New York, USA.',
                    'type' => 'invoice',
                ],
                [
                    'key' => 'invoice_email',
                    'value' => 'info@your-site.com',
                    'type' => 'invoice',
                ],
                [
                    'key' => 'invoice_mobile',
                    'value' => '0123456789',
                    'type' => 'invoice',
                ],
                [
                    'key' => 'invoice_phone',
                    'value' => '0123456789',
                    'type' => 'invoice',
                ],
                [
                    'key' => 'invoice_prefix',
                    'value' => 'TXN-',
                    'type' => 'invoice',
                ],
                [
                    'key' => 'invoice_footer_content',
                    'value' => 'your-site.com',
                    'type' => 'invoice',
                ],
            ]);

            //Barcode settings

            Setting::insertOrIgnore([
                [
                    'key' => 'barcode_style',
                    'value' => 'abc 4x 45y dummy',
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_site_name',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_product_name',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_price',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_currency',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_unit',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_category',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_variant',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_product_image',
                    'value' => true,
                    'type' => 'barcode',
                ],
                [
                    'key' => 'barcode_check_promotional_price',
                    'value' => true,
                    'type' => 'barcode',
                ],
            ]);

            //Website General settings

            Setting::insertOrIgnore([
                [
                    'key' => 'site_name_or_logo',
                    'value' => 'logo',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'site_name',
                    'value' => 'LOGO',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'site_logo',
                    'value' => '/gallary/01-logo.png',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'favicon',
                    'value' => '/gallary/01-fav.png',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'facebook_url',
                    'value' => 'https://facebook.com',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'google_url',
                    'value' => 'https://google.com',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'twitter_url',
                    'value' => 'https://twitter.com',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'linkedin_url',
                    'value' => 'https://linkedin.com',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'instagram_url',
                    'value' => 'https://instagram.com',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'about_store',
                    'value' => 'About store text will goes here',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'contect_us_description',
                    'value' => 'contact us text will goes here',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'allow_cookies',
                    'value' => true,
                    'type' => 'website_general',
                ],
                [
                    'key' => 'client_secret',
                    'value' => 'sk_1234',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'client_id',
                    'value' => '1234',
                    'type' => 'website_general',
                ],
                [
                    'key' => 'instagram_embed',
                    'value' => 'Instagram Widget',
                    'type' => 'website_general',
                ]
            ]);

            //SEO settings

            Setting::insertOrIgnore([
                [
                    'key' => 'seo_title',
                    'value' => 'abc xyz',
                    'type' => 'seo',
                ],
                [
                    'key' => 'seo_meta_tags',
                    'value' => 'ecommers',
                    'type' => 'seo',
                ],
                [
                    'key' => 'seo_keywords',
                    'value' => 'abc,xyz,ecommerce',
                    'type' => 'seo',
                ],
                [
                    'key' => 'seo_description',
                    'value' => 'bss',
                    'type' => 'seo',
                ],
            ]);

            // Webiste login/signup setting
            Setting::insertOrIgnore([
                [
                    'key' => 'authenticate_with_email_password',
                    'value' => true,
                    'type' => 'website_login_signup',
                ],
                [
                    'key' => 'authenticate_with_phone',
                    'value' => true,
                    'type' => 'website_login_signup',
                ],
                [
                    'key' => 'authenticate_with_facebook',
                    'value' => true,
                    'type' => 'website_login_signup',
                ],
                [
                    'key' => 'authenticate_with_google',
                    'value' => true,
                    'type' => 'website_login_signup',
                ],
                [
                    'key' => 'authenticate_with_guest_checkout',
                    'value' => true,
                    'type' => 'website_login_signup',
                ],
                [
                    'key' => 'login_signup_form',
                    'value' => '1',
                    'type' => 'website_login_signup',
                ],
            ]);

            // Webiste sociallite login setting
            Setting::insertOrIgnore([
                [
                    'key' => 'facebook_client_id',
                    'value' => '',
                    'type' => 'login_credential',
                ],
                [
                    'key' => 'facebook_client_secret',
                    'value' => '',
                    'type' => 'login_credential',
                ],
                [
                    'key' => 'facebook_redirect',
                    'value' => url('/').'/api/client/customer_login/facebook/callback',
                    'type' => 'login_credential',
                ],
                [
                    'key' => 'google_client_id',
                    'value' => '',
                    'type' => 'login_credential',
                ],
                [
                    'key' => 'google_client_secret',
                    'value' => '',
                    'type' => 'login_credential',
                ],
                [
                    'key' => 'google_redirect',
                    'value' => url('/').'/api/client/customer_login/google/callback',
                    'type' => 'login_credential',
                ],
                [
                    'key' => 'sociallite_login',
                    'value' => true,
                    'type' => 'login_credential',
                ],
            ]);
            
            //Website Theme Settings
            Setting::insertOrIgnore([
                [
                    "key" => "card_style",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],[
                    "key" => "header_style",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "Footer_style",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "slider_style",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "about_us_web",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "blog",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "banner_style",
                    "value" => "style2",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "cart_page",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "contact_us",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "login",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "product_detail",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "shop",
                    "value" => "style1",
                    "type" => "web_theme_setting"
                ],
                [
                    "key" => "color",
                    "value" => "style",
                    "type" => "web_theme_setting"
                ]
                
            ]);

            //App genral settings

            Setting::insertOrIgnore([
                [
                    'key' => 'app_name',
                    'value' => 'Ecommerce Solution',
                    'type' => 'app_general',
                ],
                [
                    'key' => 'category_style',
                    'value' => '4',
                    'type' => 'app_general',
                ],
                [
                    'key' => 'home_style',
                    'value' => '4',
                    'type' => 'app_general',
                ],
                [
                    'key' => 'card_style',
                    'value' => '1',
                    'type' => 'app_general',
                ],
                [
                    'key' => 'banner_style',
                    'value' => '1',
                    'type' => 'app_general',
                ],
                [
                    'key' => 'ios_app_url',
                    'value' => 'http://apple.com',
                    'type' => 'app_general',
                ],
                [
                    'key' => 'google_login',
                    'value' => false,
                    'type' => 'app_general',
                ],
                [
                    'key' => 'facebook_login',
                    'value' => false,
                    'type' => 'app_general',
                ],
                [
                    'key' => 'phone_login',
                    'value' => false,
                    'type' => 'app_general',
                ],
                [
                    'key' => 'email_login',
                    'value' => false,
                    'type' => 'app_general',
                ],
                [
                    'key' => 'inventory',
                    'value' => false,
                    'type' => 'app_general',
                ],

            ]);

            // App Display In Menu/Sidebar
            Setting::insertOrIgnore([
                [
                    'key' => 'wishList',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'edit_profile',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'shipping_address',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'my_orders',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'contact_us',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'about_us',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'news',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'introduction',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'shareApp',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'rateapp',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
                [
                    'key' => 'setting',
                    'value' => 'show',
                    'type' => 'app_display_in_setting',
                ],
            ]);

            //app Local Notification

            Setting::insertOrIgnore([
                [
                    'key' => 'title',
                    'value' => 'Ionic Ecommerce',
                    'type' => 'app_notification_setting',
                ],
                [
                    'key' => 'detail',
                    'value' => 'A bundle of products waiting for you!',
                    'type' => 'app_notification_setting',
                ],
                [
                    'key' => 'notification_duration',
                    'value' => 'Year',
                    'type' => 'app_notification_setting',
                ],
            ]);

            //App Login / sign up settings

            Setting::insertOrIgnore([
                [
                    'key' => 'authenticate_with_email_password',
                    'value' => true,
                    'type' => 'app_login_signup',
                ],
                [
                    'key' => 'authenticate_with_phone',
                    'value' => true,
                    'type' => 'app_login_signup',
                ],
                [
                    'key' => 'authenticate_with_facebook',
                    'value' => true,
                    'type' => 'app_login_signup',
                ],
                [
                    'key' => 'authenticate_with_google',
                    'value' => true,
                    'type' => 'app_login_signup',
                ],
                [
                    'key' => 'authenticate_with_guest_checkout',
                    'value' => true,
                    'type' => 'app_login_signup',
                ],
                [
                    'key' => 'login_signup_form',
                    'value' => '1',
                    'type' => 'app_login_signup',
                ],
            ]);

            //gallary setting
            Setting::insertOrIgnore([
                [
                    'key' => 'thumbnail_height',
                    'value' => '150',
                    'type' => 'gallary_setting',
                ],
                [
                    'key' => 'thumbnail_width',
                    'value' => '150',
                    'type' => 'gallary_setting',
                ],
                [
                    'key' => 'medium_height',
                    'value' => '400',
                    'type' => 'gallary_setting',
                ],
                [
                    'key' => 'medium_width',
                    'value' => '400',
                    'type' => 'gallary_setting',
                ],

                [
                    'key' => 'large_height',
                    'value' => '900',
                    'type' => 'gallary_setting',
                ],

                [
                    'key' => 'large_width',
                    'value' => '900',
                    'type' => 'gallary_setting',
                ],
            ]);

            //Store setting
            Setting::insertOrIgnore([
                [
                    'key' => 'physical_store',
                    'value' => 1,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'physical_store_inventory',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'physical_store_simple',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'physical_store_advance',
                    'value' => 0,
                    'type' => 'store_setting',
                ], [
                    'key' => 'physical_store_pos',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'physical_store_pos_warehouse',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'physical_store_account_managment',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'physical_store_purchasing',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'digital_store',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
                [
                    'key' => 'digital_store_account_managment',
                    'value' => 0,
                    'type' => 'store_setting',
                ],
            ]);

            //Business Notification setting
            Setting::insertOrIgnore([
                [
                    'key' => 'default_notification',
                    'value' => 'FCM',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'onesignal_app_id',
                    'value' => '6053d948-b8f6-472a-87e4-379fa89f78d8',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'onsignal_sender_id',
                    'value' => '50877237723',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'firebase_api_key',
                    'value' => '50877237723',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'firebase_auth_domain',
                    'value' => '50877237723',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'firebase_database_url',
                    'value' => '50877237723',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'firebase_project_id',
                    'value' => '50877237723',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'firebase_storage_bucket',
                    'value' => '50877237723',
                    'type' => 'business_notification_setting',
                ],
                [
                    'key' => 'firebase_sender_id',
                    'value' => '50877237723',
                    'type' => 'business_notification_setting',
                ],
            ]);




            //Business Notification setting
            Setting::insertOrIgnore([
                [
                    'key' => 'about_us',
                    'value' => 'Themes-Coder is a clothing brand offers more than 100+ International brands at 20%-70% discount, all 365 days a year. We offer customers a wide range of brands and categories at absolutely great prices in an ambience that is refreshingly enjoyable. ',
                    'type' => 'business_general',
                ],
                [
                    'key' => 'address',
                    'value' => 'New York, USA',
                    'type' => 'business_general',
                ],
                [
                    'key' => 'phone_number',
                    'value' => '888 - 963 - 600',
                    'type' => 'business_general',
                ],
                [
                    'key' => 'email',
                    'value' => 'bussiness@email.com',
                    'type' => 'business_general',
                ]
            ]);

            
            //Point Settings
            Setting::insertOrIgnore([
                [
                    "key" => "point_setting",
                    "value" => "enable",
                    "type" => "point_setting"
                ],
                [
                    "key" => "checkin_point",
                    "value" => "0.01",
                    "type" => "point_setting"
                ],
                [
                    "key" => "checkin_hour",
                    "value" => "24",
                    "type" => "point_setting"
                ],
                [
                    "key" => "per_point",
                    "value" => "0.05",
                    "type" => "point_setting"
                ],
                [
                    "key" => "product_share_point",
                    "value" => "5",
                    "type" => "point_setting"
                ],
                [
                    "key" => "invite_friend_share_point",
                    "value" => "5",
                    "type" => "point_setting"
                ],
                [
                    "key" => "per_order_price_point",
                    "value" => "50",
                    "type" => "point_setting"
                ],
                [
                    "key" => "redeem_point",
                    "value" => "100",
                    "type" => "point_setting"
                ],
            ]);

            //Membership Settings
            Setting::insertOrIgnore([
                [
                    "key" => "first_level_amount",
                    "value" => "100",
                    "type" => "membership_setting"
                ],
                [
                    "key" => "second_level_amount",
                    "value" => "200",
                    "type" => "membership_setting"
                ],
                [
                    "key" => "third_level_amount",
                    "value" => "500",
                    "type" => "membership_setting"
                ],
                [
                    "key" => "fourth_level_amount",
                    "value" => "1000",
                    "type" => "membership_setting"
                ],
                [
                    "key" => "fifth_level_amount",
                    "value" => "5000",
                    "type" => "membership_setting"
                ],
            ]);

            //Email notification Setting
            Setting::insertOrIgnore([
                [
                    "key" => "notify_email",
                    "value" => "umar.vectorcoder@gmail.com,abrar.vectorcoder@gmail.com",
                    "type" => "email_notify_setting"
                ],
            ]);


            //is_purchased_setting
            Setting::insertOrIgnore([
                [
                    "key" => "is_web_purchased",
                    "value" => true,
                    "type" => "is_purchased_setting"
                ],
                [
                    "key" => "is_app_purchased",
                    "value" => true,
                    "type" => "is_purchased_setting"
                ],
                [
                    "key" => "is_deliveryboyapp_purchased",
                    "value" => true,
                    "type" => "is_purchased_setting"
                ],
            ]);


            //installer_env_settings
            Setting::insertOrIgnore([
                [
                    "key" => "external_website_link",
                    "value" => '',
                    "type" => "installer_env_settings"
                ],
                [
                    "key" => "app_name",
                    "value" => '',
                    "type" => "installer_env_settings"
                ],
                [
                    "key" => "environment",
                    "value" => '',
                    "type" => "installer_env_settings"
                ],
            ]);



            //kundol_settings
            Setting::insertOrIgnore([
                [
                    "key" => "home_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
                [
                    "key" => "shop_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
                [
                    "key" => "product_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
                [
                    "key" => "cart_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
                [
                    "key" => "about_us_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
                [
                    "key" => "contact_us_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
                [
                    "key" => "blog_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
                [
                    "key" => "login_page",
                    "value" => 'style1',
                    "type" => "kundol_web_setting"
                ],
            ]);

            //business firebase setting
            Setting::insertOrIgnore([
                [
                    'key' => 'api_key',
                    'value' => '',
                    'type' => 'business_firebase_setting',
                ],
                [
                    'key' => 'auth_domain',
                    'value' => '',
                    'type' => 'business_firebase_setting',
                ],
                [
                    'key' => 'database_url',
                    'value' => '',
                    'type' => 'business_firebase_setting',
                ],
                [
                    'key' => 'peoject_id',
                    'value' => '',
                    'type' => 'business_firebase_setting',
                ],
                [
                    'key' => 'storage_bucket',
                    'value' => '',
                    'type' => 'business_firebase_setting',
                ],
                [
                    'key' => 'messaging_sender_id',
                    'value' => '',
                    'type' => 'business_firebase_setting',
                ],
                [
                    'key' => 'app_id',
                    'value' => '',
                    'type' => 'business_firebase_setting',
                ]
            ]);


             //business business_google_setting setting
             Setting::insertOrIgnore([
                [
                    'key' => 'google_map_api_string',
                    'value' => '',
                    'type' => 'business_google_setting',
                ]
            ]);


            
          
    }
}
