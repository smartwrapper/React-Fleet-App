<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddressBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rule1 = 'nullable|string|max:191';
        $id = 0;
        if (isset($this->customer_address_book['id'])) {
            $id = $this->customer_address_book['id'];
        }
        $isDeliveryboy = isset(getSetting()['is_deliveryboyapp_purchased']) && getSetting()['is_deliveryboyapp_purchased'] == '1' ? 'required|string|max:191,' : 'nullable|string|max:191,';
        
        return [
            'gender' => 'nullable|in:Male,Female,Other',
            'first_name' => 'exclude_if:is_default_type,default_action|required',
            'last_name' => 'exclude_if:is_default_type,default_action|required',
            'is_default' => 'nullable|in:0,1',
            'company' => 'exclude_if:type,profile|required|string|max:191',
            'street_address' => 'exclude_if:type,profile|required|string|max:191|unique:customer_address_book,street_address,' . $id,
            'suburb' => $rule1,
            'postcode' => $rule1,
            'dob' => 'nullable|date|date_format:Y-m-d',
            'city' => 'exclude_if:type,profile|required|string|max:191',
            'country_id' => 'exclude_if:type,profile|required|exists:countries,id',
            'state_id' => 'nullable|integer|exists:states,id',
            'lattitude' => $rule1,
            'longitude' => $rule1,
            'latlong' => $isDeliveryboy . $id,
            'phone' => 'exclude_if:type,profile|required|string|max:191',
        ];
    }
}
