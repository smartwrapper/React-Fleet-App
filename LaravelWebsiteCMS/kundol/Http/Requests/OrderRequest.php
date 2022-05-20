<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rule1 = 'required|string|max:191';
        $rule2 = 'nullable|string|max:191';
        $isDeliveryboy = isset(getSetting()['is_deliveryboyapp_purchased']) && getSetting()['is_deliveryboyapp_purchased'] == '1' ? 'required|string|max:191,' : 'nullable|string|max:191,';
        return [
            'billing_first_name' => $rule1,
            'billing_last_name' => $rule1,
            'billing_company' => $rule2,
            'billing_street_aadress' => $rule1,
            'billing_suburb' => $rule2,
            'billing_city' => $rule1,
            'billing_postcode' => $rule1,
            'billing_country' => 'required|exists:countries,id',
            'billing_state' => 'required|exists:states,id',
            'billing_phone' => $rule1,
            'delivery_first_name' => $rule1,
            'delivery_last_name' => $rule1,
            'delivery_company' => $rule2,
            'delivery_street_aadress' => $rule1,
            'delivery_suburb' => $rule2,
            'delivery_city' => $rule1,
            'delivery_postcode' => $rule1,
            'delivery_country' => 'required|exists:countries,id',
            'delivery_state' => 'required|exists:states,id',
            'delivery_phone' => $rule1,
            'cc_type' => $rule2,
            'cc_owner' => $rule2,
            'currency_id' => 'required|exists:currency,id',
            'currency_value' => $rule2,
            'shipping_method' => $rule2.'|in:shippingByWeight,localPickup,freeShipping,flateRate',
            'shipping_duration' => $rule2,
            'order_notes' => $rule2,
            'latlong' => $isDeliveryboy,
            'order_status' => 'nullable|in:Pending,Inprocess,Dispatched,Complete,Return,Cancel,Shipped',
            'coupon_code' => 'nullable|exists:coupon_setting,code',
            'payment_method' => $rule1.'|in:cod,paypal,stripe,banktransfer,braintree,authorize_net,mollie,sagepay,razorpay,paytm,paystack',
            'cc_number' => 'exclude_if:payment_method,cod,banktransfer,braintree,paytm,mollie,razorpay,paystack|required|integer',
            'cc_expiry_month' => 'exclude_if:payment_method,cod,banktransfer,braintree,paytm,mollie,razorpay,paystack|required|integer',
            'cc_expiry_year' => 'exclude_if:payment_method,cod,banktransfer,braintree,paytm,mollie,razorpay,paystack|required|integer',
            'cc_cvc' => 'exclude_if:payment_method,cod,banktransfer,braintree,paytm,mollie,razorpay,paystack|required|integer',
            'transaction_id' => $rule2,
            'total_tax' => $rule2,
        ];
    }
}
