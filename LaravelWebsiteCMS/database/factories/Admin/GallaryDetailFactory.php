<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin\GallaryDetail;
use App\Models\Admin\Gallary;
use App\Models\User;
class GallaryDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GallaryDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $width = 640;
        $height = 480;
        return [
            'gallary_id' => Gallary::factory(),
            'gallary_type' =>'large',
            'height' => $width,
            'width' => $height,
            'path' => 'https://source.unsplash.com/random/'.$width.'*'.$height
        ];
    }
}
