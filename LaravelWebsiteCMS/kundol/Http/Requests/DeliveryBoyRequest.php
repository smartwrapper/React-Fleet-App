<?php

namespace App\Http\Requests;

use App\Models\Admin\DeliveryBoy;
use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DeliveryBoyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        // $id = 0;
        // $deliveryBoy = DeliveryBoy::where('email',$request->email)->first();
        // if (isset($deliveryBoy) && $deliveryBoy) {
        //     $id =$deliveryBoy->id;
        // }
        $id = 0;
        if (isset($this->delivery_boy['id'])) {
            $id = $this->delivery_boy['id'];
        }

        //  dd($id);
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:delivery_boys,email,'. $id,
            'phone_number' => 'required|string|unique:delivery_boys,phone_number,'. $id,
            'pin_code' => 'required|string',
            'status' => 'in:DEFAULT,0,1',
            'availability_status' => 'in:DEFAULT,0,1',
            'state' => 'required|exists:states,id',
            'country' => 'required|exists:countries,id',

        ];
    }
}
