<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'gallary_id' => 'required|exists:gallary,id',
            'timezone_id' => 'required|exists:timezones,id',
            'business_name' => 'required|string|max:255',
            'start_date' => 'required|date|date_format:Y-m-d',
            'default_profit_percentage' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'year_start_month' => 'required|in:DEFAULT,January,February,March,April,May,June,July,August,September,October,November,December',
            'accounting_method' => 'required|in:DEFAULT,FIFO,LIFO',
            'transaction_edit_days' => 'required|integer',
            'date_format' => 'required|in:DEFAULT,mm/dd/yyyy,mm-dd-yyyy,dd-mm-yyyy,dd/mm/yyyy',
            'time_format' => 'required|in:DEFAULT,12 hr,24 hr',
        ];
    }
}
