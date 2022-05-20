<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarCodeSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'continous_feed_or_rolls' => 'required|in:DEFAULT,Yes,No',
            'additional_top_margin' => 'required|string|max:255',
            'height_of_sticker' => 'required|string|max:255',
            'width_of_sticker' => 'required|string|max:255',
            'paper_width' => 'required|string|max:255',
            'paper_height' => 'required|string|max:255',
            'distance_between_two_rows' => 'required|string|max:255',
            'distance_between_two_columns' => 'required|string|max:255',
            'no_of_stickers_per_sheet' => 'required|string|max:255',
            'stickers_in_one_row' => 'required|string|max:255',
        ];
    }
}
