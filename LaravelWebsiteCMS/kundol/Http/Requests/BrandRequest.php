<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = 0;
        if (isset($this->brand['id'])) {
            $id = $this->brand['id'];
        }
        return [
            'name' => 'required|string|max:255',
            'gallary_id' => 'nullable|exists:gallary,id',
            'status' => 'in:DEFAULT,inactive,active',
        ];
    }
}
