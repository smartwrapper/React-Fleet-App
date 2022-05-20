<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class BarCodeSetting extends JsonResource
{
    public function toArray($request)
    {
        return [
            'bar_code_id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'continous_feed_or_rolls' => $this->continous_feed_or_rolls,
            'additional_top_margin' => $this->additional_top_margin,
            'height_of_sticker' => $this->height_of_sticker,
            'width_of_sticker' => $this->width_of_sticker,
            'paper_width' => $this->paper_width,
            'paper_height' => $this->paper_height,
            'stickers_in_one_row' => $this->stickers_in_one_row,
            'distance_between_two_rows' => $this->distance_between_two_rows,
            'distance_between_two_columns' => $this->distance_between_two_columns,
            'no_of_stickers_per_sheet' => $this->no_of_stickers_per_sheet,
        ];
    }
}
