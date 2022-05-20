<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $sizeOfLanguage = Language::count();
        return [
            'language_value' => 'required|array',
            'language_value.*' => 'string|max:255',
            'language_id' => 'required|array|exists:languages,id|size:' . $sizeOfLanguage,
            'sub_name_1' => 'nullable|array',
            'sub_name_1.*' => 'nullable|string|max:255',
            'sub_name_2' => 'nullable|array',
            'sub_name_2.*' => 'nullable|string|max:255',
        ];
    }
}
