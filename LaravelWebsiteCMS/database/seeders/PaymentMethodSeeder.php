<?php

namespace Database\Seeders;

use App\Models\Admin\PaymentMethod;
use Illuminate\Database\Seeder;
use App\Models\Admin\PaymentMethodSetting;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::where('id', '>', '0')->delete();
        PaymentMethodSetting::where('id', '>', '0')->delete();
        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'paypal',
                'title' => 'paypal',
                'type' => 'card'
            ]
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'PAYPAL_API_USERNAME',
                'value' => 'sb-cwqvm941213_api1.business.example.com',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'PAYPAL_API_PASSWORD',
                'value' => 'VH2KQNCZE3HDXUU7',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'PAYPAL_API_SIGNATURE',
                'value' => 'A7lRxa76xmHCL33PX02qN6zIbG7iAi0V.vGofZ9iT8c3NTOhP4zDHldo',
            ],
        ]
        );



        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'stripe',
                'title' => 'stripe',
                'type' => 'card',
            ]
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'STRIPE_API_KEY',
                'value' => 'sk_test_EdlHXXNPrUkesCURiqVqrneU00kKeCNpor',
            ],
        ]
        );


        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'banktransfer',
                'title' => 'banktransfer',
                'type' => 'banktransfer',
            ],
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_NAME',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_DETAIL',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_ACC_NAME',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_ACC_NUM',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_BANK_NAME',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_IFSC',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_IBAN',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'BANK_TRANSFER_BIC_SWIFT',
                'value' => '--',
            ],
        ]
        );


        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'cod',
                'title' => 'cod',
                'type' => 'cod',
            ],
        );




        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'braintree',
                'title' => 'braintree',
                'type' => 'webview',
            ],
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'MERCHANT_ID',
                'value' => '6hbm963vhchw8vhr',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'PUBLIC_KEY',
                'value' => '6c4ymbfrbsxqhbrj',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'PRIVATE_KEY',
                'value' => '3d77996a1a73538c2fef93b546bf2ddf',
            ],
        ]
        );



        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'authorize_net',
                'title' => 'authorize_net',
                'type' => 'webview',
            ],
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'APP_LOGIN_ID',
                'value' => '7AV6M4k2p6mW',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'TRANSACTION_KEY',
                'value' => '56VMgKYpm7695r4C',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'KEY',
                'value' => 'Simon',
            ],
        ]
        );



        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'mollie',
                'title' => 'mollie',
                'type' => 'webview',
            ],
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'API_KEY',
                'value' => '--',
            ],
        ]
        );


        

        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'sagepay',
                'title' => 'sagepay',
                'type' => 'webview',
            ],
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => 8,
                'key' => 'YOUR-VENDOR-CODE',
                'value' => '--',
            ],
        ]
        );


        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'razorpay',
                'title' => 'razorpay',
                'type' => 'webview',
            ],
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' =>$paymentMethod->id,
                'key' => 'KEY',
                'value' => '--',
            ],

            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'kEY_ID',
                'value' => 'rzp_test_YSTH90m9DEc0FQ',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'KEY_SECRET',
                'value' => 'IhFlrifl3NnheLh2jtEuirgO',
            ],
        ]
        );




        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'paytm',
                'title' => 'paytm',
                'type' => 'webview',
            ],
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'YOUR_MERCHANT_ID',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'YOUR_MERCHANT_KEY',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'YOUR_WEBSITE',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'YOUR_CHANNEL',
                'value' => '--',
            ],
            [
                'payment_method_id' => $paymentMethod->id,
                'key' => 'YOUR_INDUSTRY_TYPE',
                'value' => '--',
            ],
        ]
        );


        $paymentMethod = PaymentMethod::create(
            [
                'payment_method' => 'paystack',
                'title' => 'paystack',
                'type' => 'webview',
            ]
        );


        PaymentMethodSetting::insertOrIgnore([
            [
                'payment_method_id' =>$paymentMethod->id,
                'key' => 'PAYSTACK_PUBLIC_KEY',
                'value' => 'pk_test_6427b2a59d1619ff48db15945be380fa6616a15d',
            ],
            [
                'payment_method_id' =>$paymentMethod->id,
                'key' => 'PAYSTACK_SECRET_KEY',
                'value' => 'sk_test_f29dcc0597d53da59f33fa17c35a265cd30e1a66',
            ],
            [
                'payment_method_id' =>$paymentMethod->id,
                'key' => 'PAYSTACK_PAYMENT_URL',
                'value' => 'https://paystack.com/pay/uax047t8wu',
            ],
            [
                'payment_method_id' =>$paymentMethod->id,
                'key' => 'MERCHANT_EMAIL',
                'value' => 'ui.themescoder@gmail.com',
            ]         
        ]);
        
        
        
        
       
       
        
        
        








        
    }
}
