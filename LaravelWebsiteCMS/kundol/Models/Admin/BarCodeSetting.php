<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarCodeSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'continous_feed_or_rolls',
        'additional_top_margin',
        'height_of_sticker',
        'width_of_sticker',
        'paper_width',
        'paper_height',
        'stickers_in_one_row',
        'distance_between_two_rows',
        'distance_between_two_columns',
        'no_of_stickers_per_sheet',
        'created_by', 'updated_by',
    ];
}
