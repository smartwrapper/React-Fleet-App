<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class ShippingMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $size = Language::count();
        return [
            'language_id' => 'exclude_if:is_default,1|required|array|exists:languages,id|size:' . $size,
            'language_value' => 'exclude_if:is_default,1|required|array|size:' . $size,
            'language_value.*' => 'exclude_if:is_default,1|string|max:191',
            'is_default' => 'in:DEFAULT,1,0',
            'status' => 'in:DEFAULT,1,0',
            'amount' => 'exclude_if:is_default,1|required'
        ];
    }
}
